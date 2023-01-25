<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Jurusan extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $jurusan_id = $this->get('jurusan_id');
        if ($jurusan_id == '') {
            $kontak = $this->db->get('ref_jurusan')->result();
        } else {
            $this->db->where('jurusan_id', $jurusan_id);
            $kontak = $this->db->get('ref_jurusan')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'jurusan_id' => $this->post('jurusan_id'),
            'nama_jurusan' => $this->post('nama_jurusan'),
        );
        $insert = $this->db->insert('ref_jurusan', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $jurusan_id = $this->put('jurusan_id');
        $data = array(
            'jurusan_id' => $this->put('jurusan_id'),
            'nama_jurusan' => $this->put('nama_jurusan'),
        );
        $this->db->where('jurusan_id', $jurusan_id);
        $update = $this->db->update('ref_jurusan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $jurusan_id = $this->delete('jurusan_id');
        $this->db->where('jurusan_id', $jurusan_id);
        $delete = $this->db->delete('ref_jurusan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>