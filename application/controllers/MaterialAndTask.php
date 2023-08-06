<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class MaterialAndTask extends BaseController
{
    function SubjectsData()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Mata Pelajaran';
        $data['active'] = 'MAPEL';

        $filterKelas = $this->input->post('kelas');

        $data['dataUser'] = $this->Master_model->listMapel($filterKelas);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/mapel', $this->global, $data, NULL, TRUE);
    }

    function addSubjects()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Mata Pelajaran';
        $data['active'] = 'MAPEL';

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addMapel', $this->global, $data, NULL, TRUE);
    }

    function insertMapel()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);
        // pre($post);
        $kode = $post['kode'];
        $pelajaran = $post['pelajaran'];
        $kelas = $post['kelas'];

        $data = [
            "kode" => $kode,
            "pelajaran" => $pelajaran,
            "kelas_id" => $kelas,
            "dibuat_oleh" => $cekSession['nama'],
            'tgl_dibuat' => date("Y-m-d")
        ];

        $result = $this->db->insert('mata_pelajaran', $data);
        if ($result) {
            redirect('listSubjects');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function editMapel($kode = '')
    {
        $cekSession = cekSession();

        $data['dataEdit'] = $this->db->get_where('mata_pelajaran', ['kode' => $kode])->row_array();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Mata Pelajaran';
        $data['active'] = 'Mapel';

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editMapel', $this->global, $data, NULL, TRUE);
    }

    function updateMapel()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);
        // pre($post);
        $kode = $post['kode'];
        $pelajaran = $post['pelajaran'];
        $kelas = $post['kelas'];

        $data = [
            "kode" => $kode,
            "pelajaran" => $pelajaran,
            "kelas_id" => $kelas,
            "update_oleh" => $cekSession['nama'],
            'tgl_update' => date("Y-m-d")
        ];

        $result = $this->db->update('mata_pelajaran', $data, ["kode" => $kode]);
        if ($result) {
            redirect('listSubjects');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function deleteMapel()
    {
        $kode = $this->input->post('kode');

        $result = $this->db->delete('mata_pelajaran', ['kode' => $kode]);
        if ($result) {
            redirect('listSubjects');
        }
    }

    function scheduleOfSubjectsData()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Jadwal Pelajaran';
        $data['active'] = 'JADWAL';

        $filterKelas = $this->input->post('kelas');
        $data['filterKelas'] = $filterKelas;
        $data['dataJadwal'] = $this->Master_model->listJadwal($filterKelas);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/jadwalPelajaran', $this->global, $data, NULL, TRUE);
    }

    function scheduleOfSubjectspreview()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Jadwal Pelajaran';
        $data['active'] = 'JADWAL';

        $filterKelas = $this->input->post('kelas');
        $data['filterKelas'] = $filterKelas;
        $data['dataJadwal'] = $this->Master_model->listJadwal($filterKelas);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/previewJadwalPelajaran', $this->global, $data, NULL, TRUE);
    }

    function addSchedule()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Jadwal Pelajaran';
        $data['active'] = 'JADWAL';

        $data['dataJadwal'] = $this->Master_model->listJadwal();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addJadwalPelajaran', $this->global, $data, NULL, TRUE);
    }

    function insertSchedule()
    {
        $cekSession = cekSession();
        $kodeSemester = $this->session->userdata('semester');
        $post = $this->input->post(NULL, true);
        // pre($post);
        $hari = $post['hari'];
        $kode_pelajaran = $post['kode_pelajaran'];
        $jam_mulai = $post['jam_mulai'];
        $jam_selesai = $post['jam_selesai'];

        $getScheduleExist = $this->db->get_where(
            'jadwal_pelajaran',
            ['kode_pelajaran' => $kode_pelajaran, 'hari' => $hari, 'semester' => $kodeSemester]
        )->num_rows();

        if ($getScheduleExist) {
            $this->session->set_flashData('warning', 'Jadwal pelajaran yg di pilih sudah ada');
            redirect('addSchedule');
        }

        $data = [
            "hari" => $hari,
            "kode_pelajaran" => $kode_pelajaran,
            'semester' => $kodeSemester,
            "jam_mulai" => $jam_mulai,
            "jam_selesai" => $jam_selesai,
            "dibuat_oleh" => $cekSession['nama'],
            'tgl_dibuat' => date("Y-m-d")
        ];

        $result = $this->db->insert('jadwal_pelajaran', $data);
        if ($result) {
            redirect('scheduleOfSubjects');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function editSchedule($id)
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Jadwal Pelajaran';
        $data['active'] = 'JADWAL';

        $data['dataJadwal'] = $this->Master_model->jadwalInfo($id);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editJadwalPelajaran', $this->global, $data, NULL, TRUE);
    }

    function updateSchedule()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);
        // pre($post); die();
        $id = $post['id'];
        $hari = $post['hari'];
        $kode_pelajaran = $post['kode_pelajaran'];
        $jam_mulai = $post['jam_mulai'];
        $jam_selesai = $post['jam_selesai'];

        $data = [
            "hari" => $hari,
            "kode_pelajaran" => $kode_pelajaran,
            "jam_mulai" => $jam_mulai,
            "jam_selesai" => $jam_selesai,
            "update_oleh" => $cekSession['nama'],
            'tgl_update' => date("Y-m-d")
        ];

        $result = $this->db->update('jadwal_pelajaran', $data, ['id' => $id]);
        // pre($this->db->last_query()); die();
        if ($result) {
            redirect('scheduleOfSubjects');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function deleteSchedule()
    {
        $id = $this->input->post('id');

        $result = $this->db->delete('jadwal_pelajaran', ['id' => $id]);
        if ($result) {
            redirect('scheduleOfSubjects');
        }
    }

    function listDiscussion()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Pembahasan';
        $data['active'] = 'PEMBAHASAN';

        $filterKelas = $this->input->post('kelas');
        $data['filterKelas'] = $filterKelas;

        $data['pembahasan'] = $this->Master_model->listLearningMaterials($filterKelas);

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/data_pembahasan', $this->global, $data, NULL, TRUE);
    }

    function getSubjectByClass()
    {
        $kelas = $this->input->post('kelas');

        $data = $this->Master_model->getMapelAndKelas($kelas);

        echo json_encode($data);
    }

    function addDiscussion()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Pembahasan';
        $data['active'] = 'PEMBAHASAN';

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addPembahasan', $this->global, $data, NULL, TRUE);
    }

    function insertDiscussion()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);

        $dataInsert = [
            'judul' => ucfirst($post['judul']),
            'pembahasan' => ucwords($post['pembahasan']),
            'tanggal' => $post['tanggal'],
            'link' => $post['link'],
            'kode_pelajaran' => $post['kode_pelajaran'],
            'pertemuan' => $post['pertemuan'],
            'semester' => $this->session->userdata('semester'),
            "dibuat_oleh" => $cekSession['nama'],
            'tgl_dibuat' => date("Y-m-d")
        ];

        $config['upload_path']          = './assets/docfile/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('file_kosong' => 'File gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $dataInsert['file'] = $file_name;
        if ($file_name) {
            $dataInsert['file'] = $file_name;
        }

        $result = $this->db->insert('materi', $dataInsert);

        if ($result) {
            redirect('listDiscussion');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function editDiscussion($id)
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Pembahasan';
        $data['active'] = 'PEMBAHASAN';

        $this->db->select("m.*, kls.id AS kelas_id, mp.pelajaran AS mapel, kls.kelas AS kelass");
        $this->db->from("materi m");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = m.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $data_materi = $this->db->get_where('materi', ['m.id' => $id])->row_array();
        $data['materi'] = $data_materi;

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editPembahasan', $this->global, $data, NULL, TRUE);
    }

    function updateDiscussion()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);
        $id = $post['id'];
        $oldFile = $post['oldFile'];

        $config['upload_path']          = './assets/docfile/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;

        $dataUpdate = [
            'judul' => ucfirst($post['judul']),
            'pembahasan' => ucwords($post['pembahasan']),
            'link' => $post['link'],
            "update_oleh" => $cekSession['nama'],
            'tgl_update' => date("Y-m-d")
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('file_kosong' => 'File gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        if ($file_name) {
            unlink("./assets/docfile/" . $oldFile);
            $dataUpdate['file'] = $file_name;
        }

        $result = $this->db->update('materi', $dataUpdate, ['id' => $id]);

        if ($result) {
            redirect('listDiscussion');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function deleteDiscuss()
    {
        $id = $this->input->post('id');

        $result = $this->db->delete('materi', ['id' => $id]);
        if ($result) {
            redirect('listDiscussion');
        }
    }

    function taskEvaluation()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tugas dan Penilaian';
        $data['active'] = 'EVALUASI';

        $filterKelas = $this->input->post('kelas');
        $data['filterKelas'] = $filterKelas;

        $data['dataJadwal'] = $this->Master_model->listTask();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/tugas_dan_penilaian', $this->global, $data, NULL, TRUE);
    }

    function addTask()
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Tambah Tugas';
        $data['active'] = 'EVALUASI';

        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/addTugas', $this->global, $data, NULL, TRUE);
    }

    function insertTask()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);

        $dataInsert = [
            'tugas' => ucfirst($post['tugas']),
            'deskripsi' => ucwords($post['deskripsi']),
            'kode_pelajaran' => $post['kode_pelajaran'],
            'pertemuan' => $post['pertemuan'],
            'semester' => $this->session->userdata('semester'),
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
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        $dataInsert['file'] = $file_name;
        if ($file_name) {
            $dataInsert['file'] = $file_name;
        }

        $result = $this->db->insert('tugas', $dataInsert);

        if ($result) {
            redirect('taskEvaluation');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }

    function editTask($id)
    {
        $cekSession = cekSession();

        $data['me'] = $cekSession;
        $data['title'] = 'Ubah Pembahasan';
        $data['active'] = 'EVALUASI';

        $this->db->select("t.*, kls.id AS kelas_id, mp.pelajaran AS mapel, kls.kelas AS kelass");
        $this->db->from("tugas t");
        $this->db->join("mata_pelajaran AS mp", "mp.kode = t.kode_pelajaran");
        $this->db->join("kelas AS kls", "kls.id = mp.kelas_id");
        $data_materi = $this->db->get_where('materi', ['t.id' => $id])->row_array();
        $data['tugas'] = $data_materi;

        $this->global['page_title'] = $data['title'] . '  · E-learning';
        $this->loadViewsAdmin('admin/editTugas', $this->global, $data, NULL, TRUE);
    }

    function updateTask()
    {
        $cekSession = cekSession();
        $post = $this->input->post(NULL, true);
        $id = $post['id'];
        $oldFile = $post['oldFile'];

        $config['upload_path']          = './assets/docfile/';
        $config['allowed_types']        = 'pdf|doc|docx';
        $config['max_size']             = 2048;

        $dataUpdate = [
            'tugas' => ucfirst($post['tugas']),
            'deskripsi' => ucwords($post['deskripsi']),
            "update_oleh" => $cekSession['nama'],
            'tgl_update' => date("Y-m-d")
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('file_kosong' => 'File gagal di upload');
            $this->session->set_flashdata($error);
        } else {
            $status = array('upload_data' => $this->upload->data());
        }
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        if ($file_name) {
            unlink("./assets/docfile/" . $oldFile);
            $dataUpdate['file'] = $file_name;
        }

        $result = $this->db->update('tugas', $dataUpdate, ['id' => $id]);

        if ($result) {
            redirect('taskEvaluation');
        } else {
            die("Proses Gagal : Hubungi Administrator");
        }
    }


    function deleteTask()
    {
        $id = $this->input->post('id');

        $result = $this->db->delete('tugas', ['id' => $id]);
        if ($result) {
            redirect('taskEvaluation');
        }
    }
}
