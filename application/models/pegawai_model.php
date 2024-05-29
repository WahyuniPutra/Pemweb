<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    public function getAllPegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function deletePegawai($id)
    {
        $this->db->delete('pegawai', array('id' => $id));
    }

    public function updatePegawai($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
    }

    public function tambahPegawai($data)
    {
        $this->db->insert('pegawai', $data);
    }

    public function getPegawaiById($id)
    {
        return $this->db->get_where('pegawai', array('id' => $id))->row_array();
    }
}