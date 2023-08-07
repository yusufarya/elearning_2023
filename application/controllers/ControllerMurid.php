<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class ControllerMurid extends BaseController
{
    function jadwal_pelajaran()
    {
        // cekSession();
        // $cekSession = cekSession();

        // $data['me'] = $cekSession;
        $data['title'] = 'Home Murid';
        $data['active'] = 'HOME';

        $this->global['page_title'] = 'Home  · E-learning';
        // $this->load->view('murid/home', $data);
        $this->loadViews('murid/jadwal_pelajaran', $this->global, $data, NULL, TRUE);
    }
}
