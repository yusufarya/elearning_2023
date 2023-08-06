<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_model extends CI_Model
{
    function listMapel($filterKelas = '')
    {
        if ($filterKelas) {
            $where = ['mp.kelas_id' => $filterKelas];
        } else {
            $where = ['mp.kelas_id <>' => $filterKelas];
        }
        $result = $this->db->select("mp.*, kls.kelas AS kelass")
            ->from('mata_pelajaran mp')
            ->join('kelas AS kls', 'kls.id = mp.kelas_id', 'left')
            ->where($where)
            ->get()->result_array();
        return $result;
    }

    function listJadwal($filterKelas = '')
    {
        if ($filterKelas) {
            $where = ['mp.kelas_id' => $filterKelas];
        } else {
            $where = ['mp.kelas_id <>' => $filterKelas];
        }
        $this->db->select("jp.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
        $this->db->from("jadwal_pelajaran jp");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = jp.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where($where);
        $this->db->order_by('jp.id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function jadwalInfo($id)
    {
        $result = $this->db->get_where('jadwal_pelajaran', ['id' => $id])->row_array();
        return $result;
    }

    function listClass()
    {
        $query = "SELECT * FROM `kelas` ";
        $data = $this->db->query($query);
        $result = $data->result_array();
        return $result;
    }

    function getMapelAndKelas($kls = '')
    {
        $this->db->select("mp.*, kls.kelas AS kelass");
        $this->db->from("mata_pelajaran mp");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        if ($kls) {
            
            $this->db->where(['mp.kelas_id' => $kls]);
        }
        $this->db->order_by('kls.kelas');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function listLearningMaterials($filterKelas = '')
    {
        if ($filterKelas) {
            $where = ['mp.kelas_id' => $filterKelas];
        } else {
            $where = ['mp.kelas_id <>' => $filterKelas];
        }
        $this->db->select("m.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
        $this->db->from("materi m");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where($where);
        $this->db->order_by('m.id');
        $result = $this->db->get()->result_array();
        return $result;
    }
}