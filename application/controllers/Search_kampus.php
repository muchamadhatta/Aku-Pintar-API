<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;



class Search_kampus extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }
    function search(){
        $data['kampus'] = $this->db->get('kampus')->result();
        $this->load->view('search_kampus', $data);
    }
    //Menampilkan data kontak dengan fitur pencarian
    function index_get()
    {
        $kampus_id = $this->get('kampus_id');
        $nama_kampus = $this->get('nama_kampus');
        $jurusan = $this->get('jurusan');
        $politeknik = $this->get('politeknik');
        $provinsi = $this->get('provinsi');
        $status = $this->get('status');
        $tipe = $this->get('tipe');

        $this->db->select('kampus_id, nama_kampus, jurusan, politeknik, provinsi, status, tipe');
        $this->db->from('kampus');

        if ($kampus_id != '') {
            $this->db->where('kampus_id', $kampus_id);
        }
        if ($nama_kampus != '') {
            $this->db->like('nama_kampus', $nama_kampus);
        }
        if ($jurusan != '') {
            $this->db->like('jurusan', $jurusan);
        }
        if ($politeknik != '') {
            $this->db->like('politeknik', $politeknik);
        }
        if ($provinsi != '') {
            $this->db->like('provinsi', $provinsi);
        }
        if ($status != '') {
            $this->db->like('status', $status);
        }
        if ($tipe != '') {
            $this->db->like('tipe', $tipe);
        }

        $kontak = $this->db->get()->result();
        $this->response($kontak, 200);
    }

}