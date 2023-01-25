<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Politeknik extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $politeknik_id = $this->get('politeknik_id');
        if ($politeknik_id == '') {
            $kontak = $this->db->get('ref_politeknik')->result();
        } else {
            $this->db->where('politeknik_id', $politeknik_id);
            $kontak = $this->db->get('ref_politeknik')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'politeknik_id' => $this->post('politeknik_id'),
            'nama_politeknik' => $this->post('nama_politeknik'),
        );
        $insert = $this->db->insert('ref_politeknik', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $politeknik_id = $this->put('politeknik_id');
        $data = array(
            'politeknik_id' => $this->put('politeknik_id'),
            'nama_politeknik' => $this->put('nama_politeknik'),
        );
        $this->db->where('politeknik_id', $politeknik_id);
        $update = $this->db->update('ref_politeknik', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $politeknik_id = $this->delete('politeknik_id');
        $this->db->where('politeknik_id', $politeknik_id);
        $delete = $this->db->delete('ref_politeknik');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>