<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Master extends BaseController
{
    function dataKelas()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Daftar Kelas';
        $data['active'] = 'KELAS';

        $data['dataKelas'] = $this->Master_model->listClass();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/kelas', $this->global, $data, NULL, TRUE);
    }

    function addDataKelas()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Kelas';
        $data['active'] = 'KELAS';

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addKelas', $this->global, $data, NULL, TRUE);
    }

    function insertKelas()
    {
        cekSession();
        $kelas = $this->input->post('kelas');

        $this->db->insert('kelas', ['kelas' => $kelas]);
        redirect('listClass');
    }

    function editDataKelas($id)
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Data Kelas';
        $data['active'] = 'KELAS';

        $data['kelasDetail'] = $this->db->get_where('kelas', ['id' => $id])->row_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editKelas', $this->global, $data, NULL, TRUE);
    }

    function updateKelas()
    {
        cekSession();
        $id = $this->input->post('id');
        $kelas = $this->input->post('kelas');

        $this->db->update('kelas', ['kelas' => $kelas], ['id' => $id]);
        redirect('listClass');
    }

    function deleteKelas()
    {
        $id = $this->input->post('id');

        $result = $this->db->delete('kelas', ['id' => $id]);
        if ($result) {
            redirect('listClass');
        }
    }
}