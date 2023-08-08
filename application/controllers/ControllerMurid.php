<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class ControllerMurid extends BaseController
{

    function profile()
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Biodata';
        $data['active'] = '';
        
        $this->global['page_title'] = $data['title'].' · E-learning';
        $this->loadViews('murid/profile', $this->global, $data, NULL, TRUE);
    }

    function jadwal_pelajaran()
    {
        // cekSession();
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Jadwal Pelajaran';
        $data['active'] = 'JADWAL';
        
        $data['dataJadwal'] = $this->Master_model->listJadwal($data['me']['kelas_id']);
        // pre($this->db->last_query()); die();
        $this->global['page_title'] = $data['title'].' · E-learning';
        $this->loadViews('murid/jadwal_pelajaran', $this->global, $data, NULL, TRUE);
    }

    function detailJadwal($kode_pelajaran) 
    {
        $data['title'] = 'Mata Pelajaran';
        $data['active'] = '';

        $data['getDetailMapel'] = $this->Master_model->getDetailMapel($kode_pelajaran);

        $this->global['page_title'] = $data['title'].' · E-learning'; 
        $this->loadViews('murid/detailJadwal', $this->global, $data, NULL, TRUE);
    }   

    function detailPembahasan($materi_id) 
    {
        $data['title'] = 'Daftar Tugas';
        $data['active'] = '';

        $data['detailPembahasan'] = $this->Master_model->getDetailPembahasan($materi_id);

        $this->global['page_title'] = $data['title'].' · E-learning'; 
        $this->loadViews('murid/detail_pembahasan', $this->global, $data, NULL, TRUE);
    } 

    function daftar_tugas($id_materi) 
    {
        $data['title'] = 'Daftar Tugas';
        $data['active'] = '';

        $data['daftarTugas'] = $this->Master_model->daftarTugas($id_materi);

        $this->global['page_title'] = $data['title'].' · E-learning'; 
        $this->loadViews('murid/daftar_tugas', $this->global, $data, NULL, TRUE);
    }  

    function uploadTugas($id_tugas) 
    {
        $data['title'] = 'Serahkan Tugas';
        $data['active'] = '';
        $data['tugas_id'] = $id_tugas;

        $this->global['page_title'] = $data['title'].' · E-learning'; 
        $this->loadViews('murid/serahkan_tugas', $this->global, $data, NULL, TRUE);
    }  


}
