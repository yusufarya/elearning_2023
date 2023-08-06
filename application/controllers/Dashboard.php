<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController
{
    function index()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Dashboard Admin';
        $data['active'] = 'DASHBOARD';

        $this->global['page_title'] = 'Dashboard  · E-learning';
        $this->loadViewsAdmin('admin/dashboard', $this->global, $data, NULL, TRUE);
    }
}
