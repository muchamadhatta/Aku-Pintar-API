<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Tipe extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $tipe_id = $this->get('tipe_id');
        if ($tipe_id == '') {
            $kontak = $this->db->get('ref_tipe')->result();
        } else {
            $this->db->where('tipe_id', $tipe_id);
            $kontak = $this->db->get('ref_tipe')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'tipe_id' => $this->post('tipe_id'),
            'nama_tipe' => $this->post('nama_tipe'),
        );
        $insert = $this->db->insert('ref_tipe', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('tipe' => 'fail', 502));
        }
    }

    ///Memperbarui data kontak yang telah ada
    function index_put()
    {
        $tipe_id = $this->put('tipe_id');
        $data = array(
            'tipe_id' => $this->put('tipe_id'),
            'nama_tipe' => $this->put('nama_tipe'),
        );
        $this->db->where('tipe_id', $tipe_id);
        $update = $this->db->update('ref_tipe', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('tipe' => 'fail', 502));
        }
    }

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $tipe_id = $this->delete('tipe_id');
        $this->db->where('tipe_id', $tipe_id);
        $delete = $this->db->delete('ref_tipe');
        if ($delete) {
            $this->response(array('tipe' => 'success'), 201);
        } else {
            $this->response(array('tipe' => 'fail', 502));
        }
    }
}
?>