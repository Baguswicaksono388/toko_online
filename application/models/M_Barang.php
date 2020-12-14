<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Barang extends CI_Model {
    public function tampil_data() {
        return $this->db->get('tb_barang');
    }
}