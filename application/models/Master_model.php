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
        $semester = $this->session->userdata('semester');
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
        $this->db->where('semester', $semester);
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

    function getDataMateri($kode_pelajaran = '')
    {
        $this->db->select("m.*, kls.kelas AS kelass");
        $this->db->from("materi m");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        if ($kode_pelajaran) {

            $this->db->where(['mp.kode' => $kode_pelajaran]);
        }
        $this->db->order_by('kls.kelas');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function listLearningMaterials($filterKelas = '')
    {
        $semester = $this->session->userdata('semester');
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
        $this->db->where('semester', $semester);
        $this->db->order_by('m.pertemuan, m.id', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function listTask($filterKelas = '')
    {
        $semester = $this->session->userdata('semester');
        if ($filterKelas) {
            $where = ['mp.kelas_id' => $filterKelas];
        } else {
            $where = ['mp.kelas_id <>' => $filterKelas];
        }
        $this->db->select("t.*, mp.pelajaran AS mapel, kls.kelas AS kelass");
        $this->db->from("tugas t");
        $this->db->join("materi AS m", "m.id = t.materi_id");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where($where);
        $this->db->where('t.semester', $semester);
        $this->db->order_by('t.pertemuan, t.id', 'DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }

    function getDetailMapel($kode)
    {
        $this->db->select("m.*, mp.pelajaran, kls.kelas AS kelass");
        $this->db->from("materi m");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where('mp.kode', $kode);
        $this->db->order_by('m.pertemuan', 'ASC');
        $result = $this->db->get()->result_array();
        // pre($this->db->last_query()); die();
        return $result;
    }

    function getDetailPembahasan($id)
    {
        $this->db->select("m.*, mp.pelajaran, kls.kelas AS kelass");
        $this->db->from("materi m");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where('m.id', $id);
        $this->db->order_by('m.pertemuan', 'ASC');
        $result = $this->db->get()->row_array();
        // pre($this->db->last_query()); die();
        return $result;
    }

    function daftarTugas($id)
    {
        $this->db->select("t.*, mp.pelajaran, kls.kelas AS kelass, m.judul ");
        $this->db->from("tugas t");
        $this->db->join("materi AS m", "m.id = t.materi_id");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $this->db->where('t.materi_id', $id);
        $this->db->order_by('m.id', 'ASC');
        $result = $this->db->get()->result_array();
        // pre($this->db->last_query()); die();
        return $result;
    }

    function listTugasPenilaian()
    {
        $this->db->select("nt.*, mp.pelajaran, kls.kelas AS kelass, m.judul ");
        $this->db->from("nilai_tugas nt");
        $this->db->join("tugas AS t", "t.id = nt.tugas_id");
        $this->db->join("materi AS m", "m.id = t.materi_id");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $result = $this->db->get()->result_array();
        // pre($this->db->last_query());
        // die();
        return $result;
    }
}
