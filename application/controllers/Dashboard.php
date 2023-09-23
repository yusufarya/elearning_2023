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

        $data['jumlah_kelas10'] = $this->db->get_where('users', ['role_id' => 3, 'kelas_id' => 1])->num_rows();
        $data['jumlah_kelas11'] = $this->db->get_where('users', ['role_id' => 3, 'kelas_id' => 2])->num_rows();
        $data['jumlah_kelas12'] = $this->db->get_where('users', ['role_id' => 3, 'kelas_id' => 3])->num_rows();
        $data['jumlah_guru'] = $this->db->get_where('users', ['role_id' => 2])->num_rows();
        $data['jumlah_gurulk'] = $this->db->get_where('users', ['role_id' => 2, 'jenis_kel' => 'L'])->num_rows();
        $data['jumlah_gurupr'] = $this->db->get_where('users', ['role_id' => 2, 'jenis_kel' => 'P'])->num_rows();

        $this->global['page_title'] = 'Dashboard  · E-learning';
        $this->loadViewsAdmin('admin/dashboard', $this->global, $data, NULL, TRUE);
    }
}
