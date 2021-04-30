<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Pemohon extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['data_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['data_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['data_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function data_get(){
        $data = $this->db->get("pemohon") -> result_array();
        if ($data){
            $this->response([
                'meta' => [
                    'success' => true,
                    'message' => "Successfully",
                    'code' => 200,
                ],
                'data' => $data
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'meta' => [
                    'success' => false,
                    'message' => "PIN Transaksi Tidak Sesuai",
                    'code' => 200,
                ],
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function data_post(){
        $data = [
            'nik' => $this->post('nik'),
            'email' => $this->post('email'),
            'kata_sandi' => $this->post('kata_sandi'),
            'nama' => $this->post('nama'),
            'foto_profil_pemohon' => $this->post('foto_profil_pemohon'),
            'no_hp' => $this->post('no_hp'),
            'update' => $this->post('update'),
            'status_delete' => $this->post('status_delete'),
            'role_pemohon' => $this->post('role_pemohon'),
            'device' => $this->post('device')
        ];
        $this->db->insert("pemohon",$data);
        $this->set_response([
            'kode' => 1,
            'pesan' => 'Data Tersedia',
            'data' => $data,
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    
    public function data_delete(){ }

}
