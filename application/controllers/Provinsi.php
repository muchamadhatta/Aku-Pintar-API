<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Provinsi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $provinsi_id = $this->get('provinsi_id');
        if ($provinsi_id == '') {
            $kontak = $this->db->get('ref_provinsi')->result();
        } else {
            $this->db->where('provinsi_id', $provinsi_id);
            $kontak = $this->db->get('ref_provinsi')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'provinsi_id' => $this->post('provinsi_id'),
            'nama_provinsi' => $this->post('nama_provinsi'),
        );
        $insert = $this->db->insert('ref_provinsi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $provinsi_id = $this->put('provinsi_id');
        $data = array(
            'provinsi_id' => $this->put('provinsi_id'),
            'nama_provinsi' => $this->put('nama_provinsi'),
        );
        $this->db->where('provinsi_id', $provinsi_id);
        $update = $this->db->update('ref_provinsi', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $provinsi_id = $this->delete('provinsi_id');
        $this->db->where('provinsi_id', $provinsi_id);
        $delete = $this->db->delete('ref_provinsi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>