<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model');
        $this->load->database();
    }

    public function index()
    {
        $data = [];
        $this->load->view('modul2',$data);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = strlen($username);
            $pass = strlen($password);
            $x = true;
            $data['errors'] = [];

            if($user>7){
                $data['errors'][] = "username lebih dari 7";
                $x = false;
            }
            if (!preg_match("/[A-Z]/", $password) ) {
                $data['errors'][] = "password kapital";
                $x = false;
            }
            if (!preg_match("/[a-z]/", $password)) {
                $data['errors'][] = "password kecil";
                $x = false;
            }
            if (!preg_match("/[^a-zA-Z\d]/", $password)) {
                $data['errors'][] = "password special character";
                $x = false;
            }
            if (!preg_match("/[0-9]/", $password)) {
                $data['errors'][] = "password digit";
                $x = false;
            }
            if($pass<10){
                $data['errors'][] = "password kurang dari 10";
                $x = false;
            }
            if ($x == false) {
                $this->load->view('modul2', $data);
            } else {
                redirect('Pegawai/view');
            }
        } else {
            $this->load->view('views/modul2');
        }
    }

    function view()
    {
        $data['pegawai'] = $this->pegawai_model->getAllPegawai();
        $this->load->view('pegawai_view', $data);
    }

    function delete($id)
    {
        $this->pegawai_model->deletePegawai($id);
        redirect('Pegawai/view');
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'gaji' => $this->input->post('gaji')
        );
        $this->pegawai_model->updatePegawai($id, $data);
        redirect('Pegawai/view');
    }

    function tambah()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'gaji' => $this->input->post('gaji')
        );
        $this->pegawai_model->tambahPegawai($data);
        redirect('Pegawai/view');
    }
}
