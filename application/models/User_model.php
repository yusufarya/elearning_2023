<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function listTeacher()
    {
        $where = ['us.role_id' => 2];
        $this->db->select('us.*, mp.pelajaran AS mapel');
        $this->db->from('users us');
        $this->db->join('mata_pelajaran AS mp', 'mp.kode = us.mapel_id', 'left');
        $this->db->where($where);
        $data = $this->db->get();
        $result = $data->result_array();
        return $result;
    }

    function listStudent($filterKelas = '', $orderText = '')
    {
        if($filterKelas) {
            $where = ['us.role_id' => '3', 'us.kelas_id' => $filterKelas];
        } else {
            $where = ['us.role_id' => '3'];
        }
        $this->db->select('us.*, kls.kelas AS kelass');
        $this->db->from('users us');
        $this->db->join('kelas AS kls', 'kls.id = us.kelas_id', 'left');
        $this->db->where($where);
        $data = $this->db->get();
        $result = $data->result_array();
        return $result;
    }
}
