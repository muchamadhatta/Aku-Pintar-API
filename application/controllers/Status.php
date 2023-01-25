<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Status extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $status_id = $this->get('status_id');
        if ($status_id == '') {
            $kontak = $this->db->get('ref_status')->result();
        } else {
            $this->db->where('status_id', $status_id);
            $kontak = $this->db->get('ref_status')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'status_id' => $this->post('status_id'),
            'nama_status' => $this->post('nama_status'),
        );
        $insert = $this->db->insert('ref_status', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $status_id = $this->put('status_id');
        $data = array(
            'status_id' => $this->put('status_id'),
            'nama_status' => $this->put('nama_status'),
        );
        $this->db->where('status_id', $status_id);
        $update = $this->db->update('ref_status', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $status_id = $this->delete('status_id');
        $this->db->where('status_id', $status_id);
        $delete = $this->db->delete('ref_status');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>