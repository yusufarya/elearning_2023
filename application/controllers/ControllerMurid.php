<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class ControllerMurid extends BaseController
{
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

    function detailJadwal($id) 
    {
        $data['title'] = 'Mata Pelajaran';
        $data['active'] = '';

        $data['getDetailMapel'] = $this->Master_model->getDetailMapel($id);

        $this->global['page_title'] = $data['title'].' · E-learning'; 
        $this->loadViews('murid/detail_pelajaran', $this->global, $data, NULL, TRUE);
    }
}
