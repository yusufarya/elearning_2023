<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class ControllerUser extends BaseController
{
    function teacherData()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Data Guru';
        $data['active'] = 'GURU';

        $data['dataUser'] = $this->User_model->listTeacher();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/dataGuru', $this->global, $data, NULL, TRUE);
    }

    function addTeacher()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Guru';
        $data['active'] = 'GURU';

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addGuru', $this->global, $data, NULL, TRUE);
    }

    function studentData()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Data Murid';
        $data['active'] = 'MURID';
        $filterKelas = $this->input->post('kelas');
        $data['dataUser'] = $this->User_model->listStudent($filterKelas);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/dataMurid', $this->global, $data, NULL, TRUE);
    }

    function addStudent()
    {
        cekSession();
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Data Murid';
        $data['active'] = 'MURID';

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addMurid', $this->global, $data, NULL, TRUE);
    }

    function insertDataUser()
    {
        $post = $this->input->post(NULL, true);
        // pre($post);
        $type = $post['type'];
        $nomor = $post['nomor'];
        $nama = $post['nama'];
        $jns_kel = $post['jns_kel'];
        $email = $post['email'];
        $tempat_lahir = $post['tempat_lahir'];
        $tgl_lahir = $post['tgl_lahir'];
        $agama = $post['agama'];
        $alamat = $post['alamat'];
        $no_telp = $post['no_telp'];
        $password = $post['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        if ($type == 'guru') {
            $mapel_id = $post['mapel_id'];
            $kelas_id = '';
            $role_id = 2;
        } else {
            $kelas_id = $post['kelas_id'];
            $mapel_id = '';
            $role_id = 3;
        }

        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1024;
        // $gambar = $post['gambar']; 


        $dataInsert = [
            "nomor_identitas" => $nomor,
            "nama" => $nama,
            "jenis_kel" => $jns_kel,
            "email" => $email,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir" => $tgl_lahir,
            "agama" => $agama,
            "alamat" => $alamat,
            "no_telp" => $no_telp,
            "mapel_id" => $mapel_id,
            "kelas_id" => $kelas_id,
            "password" => $password,
            "role_id" => $role_id,
            "status" => 1,
            'tgl_dibuat' => date("Y-m-d")
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('gambar_kosong' => 'Gambar gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        if ($file_name) {
            $dataInsert['gambar'] = $file_name;
        }

        $emailExist = $this->db->select('email')->get_where('users', ['email' => $email])->row_array();
        if ($emailExist) {
            $this->session->set_flashData('message', 'Email yang anda gunakan telah terdaftar.');
            if ($type == 'guru') {
                redirect('addTeacher');
            } else if ($type == 'murid') {
                redirect('addStudent');
            }
        }

        $result = $this->db->insert('users', $dataInsert);

        if ($result != false && $type == 'guru') {
            redirect('listTeacher');
        } else if ($result != false && $type == 'murid') {
            redirect('listStudent');
        }
    }

    function editTeacher($nomor = '')
    {
        cekSession();
        $cekSession = cekSession();

        $data['dataEdit'] = $this->db->get_where('users', ['nomor_identitas' => $nomor])->row_array();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Data Guru';
        $data['active'] = 'GURU';

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editGuru', $this->global, $data, NULL, TRUE);
    }

    function editStudent($nomor = '')
    {
        cekSession();
        $cekSession = cekSession();

        $data['dataEdit'] = $this->db->get_where('users', ['nomor_identitas' => $nomor])->row_array();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Data Murid';
        $data['active'] = 'MURID';

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editMurid', $this->global, $data, NULL, TRUE);
    }

    function updateDataUser()
    {
        $post = $this->input->post(NULL, true);
        // pre($post); die();
        $type = $post['type'];
        $nomor = $post['nomor'];
        $nama = $post['nama'];
        $jns_kel = $post['jns_kel'];
        // $email = $post['email'];
        $tempat_lahir = $post['tempat_lahir'];
        $tgl_lahir = $post['tgl_lahir'];
        $agama = $post['agama'];
        $alamat = $post['alamat'];
        $no_telp = $post['no_telp'];
        $password = $post['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        if ($type == 'guru') {
            $mapel_id = $post['mapel_id'];
            $kelas_id = '';
        } else {
            $kelas_id = $post['kelas_id'];
            $mapel_id = '';
        }

        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 1024;

        $data = [
            "nama" => $nama,
            "jenis_kel" => $jns_kel,
            // "email" => $email,
            "tempat_lahir" => $tempat_lahir,
            "tgl_lahir" => $tgl_lahir,
            "agama" => $agama,
            "alamat" => $alamat,
            "no_telp" => $no_telp,
            "mapel_id" => $mapel_id,
            "kelas_id" => $kelas_id,
            // "password" => $password,
        ];

        if ($password) {
            $data['password'] = $password;
        }

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('gambar_kosong' => 'Gambar gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $data['gambar'] = $file_name;
        if ($file_name) {
            $data['gambar'] = $file_name;
        }

        $result = $this->db->update('users', $data, ["nomor_identitas" => $nomor]);

        if ($result != false && $type == 'guru') {
            redirect('listTeacher');
        } else if ($result != false && $type == 'murid') {
            redirect('listStudent');
        }
    }

    function deleteDataUser()
    {
        $nomor = $this->input->post('nomor');
        $type = $this->input->post('type');

        $result = $this->db->delete('users', ['nomor_identitas' => $nomor]);
        if ($result != false && $type == 'guru') {
            redirect('listTeacher');
        } else if ($result != false && $type == 'murid') {
            redirect('listStudent');
        }
    }
}
