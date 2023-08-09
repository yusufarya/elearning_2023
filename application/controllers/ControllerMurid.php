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

        $this->global['page_title'] = $data['title'] . ' · E-learning';
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
        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/jadwal_pelajaran', $this->global, $data, NULL, TRUE);
    }

    function detailJadwal($kode_pelajaran)
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Mata Pelajaran';
        $data['active'] = '';

        $data['getDetailMapel'] = $this->Master_model->getDetailMapel($kode_pelajaran);

        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/detailJadwal', $this->global, $data, NULL, TRUE);
    }

    function detailPembahasan($materi_id)
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Daftar Tugas';
        $data['active'] = '';

        $data['detailPembahasan'] = $this->Master_model->getDetailPembahasan($materi_id);

        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/detail_pembahasan', $this->global, $data, NULL, TRUE);
    }

    function daftar_tugas($id_materi)
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Daftar Tugas';
        $data['active'] = '';

        $data['daftarTugas'] = $this->Master_model->daftarTugas($id_materi);

        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/daftar_tugas', $this->global, $data, NULL, TRUE);
    }

    function uploadTugas($id_tugas)
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Serahkan Tugas';
        $data['active'] = '';
        $data['tugas_id'] = $id_tugas;

        $data['tugas_materi'] = $this->db->select('t.pertemuan, t.materi_id, m.judul AS materi')
            ->from('tugas t')
            ->join('materi AS m', 'm.id=t.materi_id')
            ->where('t.id', $id_tugas)->get()->row_array();

        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/serahkan_tugas', $this->global, $data, NULL, TRUE);
    }

    function upTugas()
    {
        $cekSession = cekSessionMurid();
        $post = $this->input->post(NULL, true);

        $dataInsert = [
            "nomor_identitas" => $post['nomor_identitas'],
            "tugas_id" => $post['id_tugas'],
            "update_oleh" => $cekSession['nama'],
            'tgl_update' => date("Y-m-d")
        ];

        $config['upload_path']          = './assets/docfile/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('file_kosong' => 'File gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $this->upload->data();
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $dataInsert['file'] = $file_name;
        if ($file_name) {
            $dataInsert['file'] = "tugas" . $file_name;
        }

        $result = $this->db->insert('nilai_tugas', $dataInsert);

        if ($result) {
            $this->session->set_flashData('message', 'Tugas anda berhasil di serahkan');
            redirect('daftar_tugas/' . $post['materi_id']);
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function penilaian_tugas()
    {
        $cekSession = cekSessionMurid();

        $data['me'] = $cekSession;
        $data['title'] = 'Tugas dan Penilaian';
        $data['active'] = 'TUGAS';

        $data['penilaian_tugas'] = $this->Master_model->listTugasPenilaian($data['me']['kelas_id']);

        $this->global['page_title'] = $data['title'] . ' · E-learning';
        $this->loadViews('murid/tugas_penilaian', $this->global, $data, NULL, TRUE);
    }
}
