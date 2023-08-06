<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Home extends BaseController
{
    function index()
    {
        // cekSession();
        // $cekSession = cekSession();

        // $data['me'] = $cekSession;
        $data['title'] = 'Home Murid';
        $data['active'] = 'HOME';

        $this->global['page_title'] = 'Home  · E-learning';
        // $this->load->view('murid/home', $data);
        $this->loadViews('murid/home', $this->global, $data, NULL, TRUE);
    }
}
