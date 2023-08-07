<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class LoginMurid extends BaseController
{
    function index()
    {
        $cekSession = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        if ($cekSession != '') {
            if ($cekSession['divisi_id'] != '3') {
                redirect('dashboard');
            } else {
                redirect('student');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus diisi.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() != false) {
            $this->_login();
        } else {
            $data['title'] = 'Login';
            $data['active'] = '';

            $this->global['page_title'] = 'Login · E-learning';
            $this->loadViews('murid/login', $this->global, $data, NULL, TRUE);
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $semester = $this->input->post('semester');

        $users = $this->db->get_where('users', ['email' => $email, 'role_id' => 3])->row_array();
        // print_r(password_verify($password, $users['password']));
        // die();
        if ($users) {
            if ($users['status'] > 0) {
                if (password_verify($password, $users['password'])) {
                    $data = [
                        'email' => $users['email'],
                        'semester' => $semester
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Email atau password salah.</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Maaf, akun anda tidak aktif!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger py-1" role="alert">Maaf, email anda belum terdaftar!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', '<div class="alert alert-success py-1" role="alert">Anda telah logout.</div>');
        redirect('login');
    }
}
