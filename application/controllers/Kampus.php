<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kampus extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $kampus_id = $this->get('kampus_id');
        if ($kampus_id == '') {
            $kontak = $this->db->get('kampus')->result();
        } else {
            $this->db->where('kampus_id', $kampus_id);
            $kontak = $this->db->get('kampus')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'kampus_id' => $this->post('kampus_id'),
            'nama_kampus' => $this->post('nama_kampus'),
            'jurusan' => $this->post('jurusan')
        );
        $insert = $this->db->insert('kampus', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $kampus_id = $this->put('kampus_id');
        $data = array(
            'kampus_id' => $this->put('kampus_id'),
            'nama_kampus' => $this->put('nama_kampus'),
            'jurusan' => $this->put('jurusan')
        );
        $this->db->where('kampus_id', $kampus_id);
        $update = $this->db->update('kampus', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $kampus_id = $this->delete('kampus_id');
        $this->db->where('kampus_id', $kampus_id);
        $delete = $this->db->delete('kampus');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>