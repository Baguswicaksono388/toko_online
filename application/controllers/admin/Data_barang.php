<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {
    public function index() {
        $data['barang'] = $this->M_Barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi() {
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan   = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga   = $this->input->post('harga');
        $stok   = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if ($gambar='') {} else {
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal di Upload";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }


        $data = array (
            'nama_brg' => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'  => $kategori,
            'harga'     =>$harga,
            'stok'      =>$stok,
            'gambar'    =>$gambar

        );

        $this->M_Barang->tambah_barang($data, 'tb_barang');
        redirect('../admin/Data_barang');
    }
}