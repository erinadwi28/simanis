<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Data extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['pemohon_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['pemohon_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['pemohon_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['layanan_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['layanan_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['layanan_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp01_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp01_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp01_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp02_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp02_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp02_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp03_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp03_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp03_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp04_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp04_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp04_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp05_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp05_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp05_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp06_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp06_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp06_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp07_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp07_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp07_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp08_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp08_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp08_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp09_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp09_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp09_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp10_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp10_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp10_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp11_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp11_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp11_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp12_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp12_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp12_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp13_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp13_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp13_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp14_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp14_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp14_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp15_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp15_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp15_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp16_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp16_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp16_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp17_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp17_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp17_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp18_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp18_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp18_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp19_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp19_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp19_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp20_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp20_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp20_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp21_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp21_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp21_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp22_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp22_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp22_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp23_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp23_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp23_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp24_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp24_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp24_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp25_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp25_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp25_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp26_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp26_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp26_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['ptsp27_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['ptsp27_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['ptsp27_delete']['limit'] = 50; // 50 requests per hour per user/key

    }

    // Rest Api Login/Register
    public function pemohon_get(){
        $email = $this->get('email');
        if($email === NULL){
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
        }else {
            $this->db->where(array("email"=>$email));
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
        
    }
    public function pemohon_post(){
        $data = [
            'nik' => $this->post('nik'),
            'email' => $this->post('email'),
            'kata_sandi' => $this->post('kata_sandi'),
            'nama' => $this->post('nama'),
            'foto_profil_pemohon' => $this->post('foto_profil_pemohon'),
            'no_hp' => $this->post('no_hp'),
            'status_delete' => $this->post('status_delete'),
            'role_pemohon' => $this->post('role_pemohon')
        ];
        $this->db->insert("pemohon",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function pemohon_delete(){}
    
    // Rest Api Data Setiap Layanan
    public function layanan_get(){
        $id_pemohon = $this->get('id_pemohon');
        if($id_pemohon === NULL){
            $data = $this->db->get("permohonan_ptsp") -> result_array();
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
        } else {
            $this->db->where(array("id_pemohon"=>$id_pemohon));
            $data = $this->db->get("permohonan_ptsp") -> result_array();
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

        
    }
    public function layanan_post(){
        $data = [
            'id_pemohon' => $this->post('id_pemohon'),
            'id_layanan' => $this->post('id_layanan'),
            'sie' => $this->post('sie'),
            'tgl_permohonan' => $this->post('tgl_permohonan')
        ];
        $this->db->insert("permohonan_ptsp",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function layanan_delete(){}

    // Rest Api ptsp01
    public function ptsp01_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp01") -> result_array();
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

        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp01") -> result_array();
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

    }
    public function ptsp01_post(){
        $data = [
            'pemohon' => $this->post('pemohon'),
            'no_hp' => $this->post('no_hp'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'nama_acara' => $this->post('nama_acara'),
            'hari_acara' => $this->post('hari_acara'),
            'tgl_acara' => $this->post('tgl_acara'),
            'waktu_acara' => $this->post('waktu_acara'),
            'tempat_acara' => $this->post('tempat_acara'),
            'Jml_petugas_doa' => $this->post('Jml_petugas_doa'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp01",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp01_delete(){}

    // Rest Api ptsp02
    public function ptsp02_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp02") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp02") -> result_array();
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

    }
    public function ptsp02_post(){
        $data = [
            'pemohon' => $this->post('pemohon'),
            'no_hp' => $this->post('no_hp'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'hari_kegiatan' => $this->post('hari_kegiatan'),
            'tgl_kegiatan' => $this->post('tgl_kegiatan'),
            'tempat_kegiatan' => $this->post('tempat_kegiatan'),
            'waktu_kegiatan' => $this->post('waktu_kegiatan'),
            'nama_kegiatan' => $this->post('nama_kegiatan'),
            'jml_peserta' => $this->post('jml_peserta'),
            'agenda_kegiatan' => $this->post('agenda_kegiatan'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp02",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp02_delete(){}

    // Rest Api ptsp03
    public function ptsp03_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp03") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp03") -> result_array();
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
        
    }
    public function ptsp03_post(){
        $data = [
            'nama' => $this->post('nama'),
            'no_hp' => $this->post('no_hp'),
            'keperluan_legalisir_ijazah' => $this->post('keperluan_legalisir_ijazah'),
            'fc_ijazah' => $this->post('fc_ijazah')
        ];
        $this->db->insert("ptsp03",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp03_delete(){}

    // Rest Api ptsp04
    public function ptsp04_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp04") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp04") -> result_array();
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
        
    }
    public function ptsp04_post(){
        $data = [
            'nama' => $this->post('nama'),
            'no_hp' => $this->post('no_hp'),
            'keperluan_legalisir_dokumen' => $this->post('keperluan_legalisir_dokumen'),
            'fc_dokumen' => $this->post('fc_dokumen')
        ];
        $this->db->insert("ptsp04",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp04_delete(){}

    // Rest Api ptsp05
    public function ptsp05_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp05") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp05") -> result_array();
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
        
    }
    public function ptsp05_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'tempat_lahir' => $this->post('tempat_lahir'),
            'tanggal_lahir' => $this->post('tanggal_lahir'),
            'nomor_porsi' => $this->post('nomor_porsi'),
            'tahun_angkatan_haji_hijriah' => $this->post('tahun_angkatan_haji_hijriah'),
            'tahun_angkatan_haji_masehi' => $this->post('tahun_angkatan_haji_masehi'),
            'no_hp' => $this->post('no_hp'),
            'alamat' => $this->post('alamat'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'fc_ktp' => $this->post('fc_ktp'),
            'srt_pernyataan' => $this->post('srt_pernyataan'),
            'bukti_pelunasan' => $this->post('bukti_pelunasan'),
        ];
        $this->db->insert("ptsp05",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp05_delete(){}

    // Rest Api ptsp06
    public function ptsp06_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp06") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp06") -> result_array();
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
        
    }
    public function ptsp06_post(){
        $data = [
            'nama' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'tempat_lahir' => $this->post('tempat_lahir'),
            'tanggal_lahir' => $this->post('tanggal_lahir'),
            'no_hp' => $this->post('no_hp'),
            'nama_agen' => $this->post('nama_agen'),
            'no_sk_agen' => $this->post('no_sk_agen'),
            'tahun_sk' => $this->post('tahun_sk'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'fc_sk_ijin_operasi' => $this->post('fc_sk_ijin_operasi'),
            'fc_ktp' => $this->post('fc_ktp'),
            'fc_kk' => $this->post('fc_kk'),
            'fc_dokumen' => $this->post('fc_dokumen')
        ];
        $this->db->insert("ptsp06",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp06_delete(){}

    // Rest Api ptsp07
    public function ptsp07_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp07") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp07") -> result_array();
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
        
    }
    public function ptsp07_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'nama_yayasan' => $this->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->post('alamat_kantor'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'akte_notaris' => $this->post('akte_notaris'),
            'foto_kantor' => $this->post('foto_kantor'),
            'susunan_pengurus' => $this->post('susunan_pengurus'),
            'sertifikat_pembimbing' => $this->post('sertifikat_pembimbing'),
            'program_manasik' => $this->post('program_manasik')
        ];
        $this->db->insert("ptsp07",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp07_delete(){}

    // Rest Api ptsp08
    public function ptsp08_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp08") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp08") -> result_array();
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
        
    }
    public function ptsp08_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'nama_yayasan' => $this->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->post('alamat_kantor'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'akte_notaris' => $this->post('akte_notaris'),
            'foto_kantor' => $this->post('foto_kantor'),
            'susunan_pengurus' => $this->post('susunan_pengurus'),
            'sertifikat_pembimbing' => $this->post('sertifikat_pembimbing'),
            'program_manasik' => $this->post('program_manasik'),
            'laporan_bimbingan' => $this->post('laporan_bimbingan'),
            'sertifikat_akreditasi' => $this->post('sertifikat_akreditasi'),
            'sk_pendirian' => $this->post('sk_pendirian'),
            'rincian_penggunaan_biaya_bimbingan' => $this->post('rincian_penggunaan_biaya_bimbingan')
        ];
        $this->db->insert("ptsp08",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp08_delete(){}

    // Rest Api ptsp09
    public function ptsp09_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){ 
            $data = $this->db->get("ptsp09") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp)); 
            $data = $this->db->get("ptsp09") -> result_array();
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
       
    }
    public function ptsp09_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'nama_pt' => $this->post('nama_pt'),
            'nama_kantor_cabang' => $this->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->post('alamat_kantor_cabang'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'akte_notaris' => $this->post('akte_notaris'),
            'izin_usaha' => $this->post('izin_usaha'),
            'skud' => $this->post('skud'),
            'npwp' => $this->post('npwp'),
            'srt_rekomendasi_pemkab' => $this->post('srt_rekomendasi_pemkab'),
            'laporan_keuangan' => $this->post('laporan_keuangan'),
            'susunan_pengurus' => $this->post('susunan_pengurus'),
            'data_pemegang_saham' => $this->post('data_pemegang_saham'),
            'data_direksi_komisaris' => $this->post('data_direksi_komisaris')
        ];
        $this->db->insert("ptsp09",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp09_delete(){}

    // Rest Api ptsp10
    public function ptsp10_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp10") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp10") -> result_array();
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
        
    }
    public function ptsp10_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'nama_pt' => $this->post('nama_pt'),
            'nama_kantor_cabang' => $this->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->post('alamat_kantor_cabang'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'sk' => $this->post('sk'),
            'akte_notaris' => $this->post('akte_notaris'),
            'izin_usaha' => $this->post('izin_usaha'),
            'skud' => $this->post('skud'),
            'npwp' => $this->post('npwp'),
            'srt_rekomendasi_pemkab' => $this->post('srt_rekomendasi_pemkab'),
            'laporan_keuangan' => $this->post('laporan_keuangan'),
            'susunan_pengurus' => $this->post('susunan_pengurus'),
            'bukti_pemberangkatan' => $this->post('bukti_pemberangkatan')
        ];
        $this->db->insert("ptsp10",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp10_delete(){}

    // Rest Api ptsp11
    public function ptsp11_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp11") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp11") -> result_array();
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
        
    }
    public function ptsp11_post(){
        $data = [
            'nama_sekolah_tujuan' => $this->post('nama_sekolah_tujuan'),
            'nama_sekolah_asal' => $this->post('nama_sekolah_asal'),
            'no_srt_rek_sekolah_asal' => $this->post('no_srt_rek_sekolah_asal'),
            'tgl_srt_rek_sekolah_asal' => $this->post('tgl_srt_rek_sekolah_asal'),
            'nama_siswa' => $this->post('nama_siswa'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'tempat_lahir_siswa' => $this->post('tempat_lahir_siswa'),
            'tgl_lahir_siswa' => $this->post('tgl_lahir_siswa'),
            'nisn' => $this->post('nisn'),
            'kelas' => $this->post('kelas'),
            'alasan_pindah' => $this->post('alasan_pindah'),
            'no_hp' => $this->post('no_hp'),
            'srt_rekomendasi' => $this->post('srt_rekomendasi'),
            'srt_penerimaan' => $this->post('srt_penerimaan'),
            'raport' => $this->post('raport')
        ];
        $this->db->insert("ptsp11",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp11_delete(){}

    // Rest Api ptsp12
    public function ptsp12_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp12") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp12") -> result_array();
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
        
    }
    public function ptsp12_post(){
        $data = [
            'nama_tujuan' => $this->post('nama_tujuan'),
            'tempat_tujuan' => $this->post('tempat_tujuan'),
            'nama_sekolah' => $this->post('nama_sekolah'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'keperluan' => $this->post('keperluan'),
            'no_hp' => $this->post('no_hp'),
            'proposal_permohonan' => $this->post('proposal_permohonan')
        ];
        $this->db->insert("ptsp12",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp12_delete(){}

    // Rest Api ptsp13
    public function ptsp13_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp13") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp13") -> result_array();
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
        
    }
    public function ptsp13_post(){
        $data = [
            'nama_yayasan' => $this->post('nama_yayasan'),
            'no_srt_pemohon' => $this->post('no_srt_pemohon'),
            'tgl_srt_pemohon' => $this->post('tgl_srt_pemohon'),
            'hal_srt_pemohon' => $this->post('hal_srt_pemohon'),
            'nama_calon_madrasah' => $this->post('nama_calon_madrasah'),
            'alamat_calon_madrasah' => $this->post('alamat_calon_madrasah'),
            'nama_calon_penyelenggara' => $this->post('nama_calon_penyelenggara'),
            'akte_notaris' => $this->post('akte_notaris'),
            'pengesahan_akte_notaris' => $this->post('pengesahan_akte_notaris'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'proposal' => $this->post('proposal')
        ];
        $this->db->insert("ptsp13",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp13_delete(){}

    // Rest Api ptsp14
    public function ptsp14_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp14") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp14") -> result_array();
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
        
    }
    public function ptsp14_post(){
        $data = [
            'nama_lpq' => $this->post('nama_lpq'),
            'alamat' => $this->post('alamat'),
            'desa' => $this->post('desa'),
            'kecamatan' => $this->post('kecamatan'),
            'kabupaten' => $this->post('kabupaten'),
            'provinsi' => $this->post('provinsi'),
            'nama_yayasan' => $this->post('nama_yayasan'),
            'no_sk_menkumham_ri' => $this->post('no_sk_menkumham_ri'),
            'tahun_berdiri' => $this->post('tahun_berdiri'),
            'berlaku' => $this->post('berlaku'),
            'no_hp' => $this->post('no_hp'),
            'proposal_permohonan' => $this->post('proposal_permohonan')
        ];
        $this->db->insert("ptsp14",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp14_delete(){}

    // Rest Api ptsp15
    public function ptsp15_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp15") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp15") -> result_array();
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
        
    }
    public function ptsp15_post(){
        $data = [
            'nama_mtd' => $this->post('nama_mtd'),
            'alamat' => $this->post('alamat'),
            'desa' => $this->post('desa'),
            'kecamatan' => $this->post('kecamatan'),
            'kabupaten' => $this->post('kabupaten'),
            'provinsi' => $this->post('provinsi'),
            'tahun_berdiri' => $this->post('tahun_berdiri'),
            'no_hp' => $this->post('no_hp'),
            'proposal_permohonan' => $this->post('proposal_permohonan')
        ];
        $this->db->insert("ptsp15",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp15_delete(){}

    // Rest Api ptsp16
    public function ptsp16_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp16") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp16") -> result_array();
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
        
    }
    public function ptsp16_post(){
        $data = [
            'nama_tujuan' => $this->post('nama_tujuan'),
            'tempat_tujuan' => $this->post('tempat_tujuan'),
            'nama_instansi_pemohon' => $this->post('nama_instansi_pemohon'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'alamat_instansi_pemohon' => $this->post('alamat_instansi_pemohon'),
            'jenis_bantuan' => $this->post('jenis_bantuan'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'proposal' => $this->post('proposal'),
        ];
        $this->db->insert("ptsp16",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp16_delete(){}

    // Rest Api ptsp17
    public function ptsp17_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){ 
            $data = $this->db->get("ptsp17") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp)); 
            $data = $this->db->get("ptsp17") -> result_array();
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
       
    }
    public function ptsp17_post(){
        $data = [
            'nama_pns' => $this->post('nama_pns'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'kecamatan' => $this->post('kecamatan'),
            'nama_sekolah_satmikal' => $this->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->post('kabupaten_sekolah_satmikal'),
            'agama' => $this->post('agama'),
            'nip' => $this->post('nip'),
            'pangkat_gol' => $this->post('pangkat_gol'),
            'jabatan' => $this->post('jabatan'),
            'nama_sekolah_tujuan' => $this->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->post('tgl_mulai_mengajar'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'srt_persetujuan_sekolah_satmikal' => $this->post('srt_persetujuan_sekolah_satmikal'),
            'srt_persetujuan_sekolah_tujuan' => $this->post('srt_persetujuan_sekolah_tujuan')
        ];
        $this->db->insert("ptsp17",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp17_delete(){}

    // Rest Api ptsp18
    public function ptsp18_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp18") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp18") -> result_array();
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
        
    }
    public function ptsp18_post(){
        $data = [
            'nama_masjid' => $this->post('nama_masjid'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'nama_ketua_takmir' => $this->post('nama_ketua_takmir'),
            'alamat_masjid' => $this->post('alamat_masjid'),
            'no_id_masjid' => $this->post('no_id_masjid'),
            'tujuan_rekomendasi_bantuan' => $this->post('tujuan_rekomendasi_bantuan'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'proposal' => $this->post('proposal'),
        ];
        $this->db->insert("ptsp18",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp18_delete(){}

    // Rest Api ptsp19
    public function ptsp19_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){ 
            $data = $this->db->get("ptsp19") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp)); 
            $data = $this->db->get("ptsp19") -> result_array();
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
       
    }
    public function ptsp19_post(){
        $data = [
            'nama_studio' => $this->post('nama_studio'),
            'kabupaten_studio' => $this->post('kabupaten_studio'),
            'no_srt_permohonan' => $this->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'agama' => $this->post('agama'),
            'bln_siaran' => $this->post('bln_siaran'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'jadwal_siaran' => $this->post('jadwal_siaran'),
        ];
        $this->db->insert("ptsp19",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp19_delete(){}

    // Rest Api ptsp20
    public function ptsp20_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp20") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp20") -> result_array();
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
        
    }
    public function ptsp20_post(){
        $data = [
            'nama_majelis_taklim' => $this->post('nama_majelis_taklim'),
            'alamat' => $this->post('alamat'),
            'desa' => $this->post('desa'),
            'kecamatan' => $this->post('kecamatan'),
            'kabupaten' => $this->post('kabupaten'),
            'provinsi' => $this->post('provinsi'),
            'tahun_berdiri' => $this->post('tahun_berdiri'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'srt_rek_kua' => $this->post('srt_rek_kua'),
        ];
        $this->db->insert("ptsp20",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp20_delete(){}

    // Rest Api ptsp21
    public function ptsp21_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp21") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp21") -> result_array();
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
        
    }
    public function ptsp21_post(){
        $data = [
            'nama_masjid' => $this->post('nama_masjid'),
            'dukuh' => $this->post('dukuh'),
            'rt' => $this->post('rt'),
            'rw' => $this->post('rw'),
            'desa' => $this->post('desa'),
            'kecamatan' => $this->post('kecamatan'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp21",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp21_delete(){}

    // Rest Api ptsp22
    public function ptsp22_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp22") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp22") -> result_array();
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
        
    }
    public function ptsp22_post(){
        $data = [
            'nama_masjid' => $this->post('nama_masjid'),
            'tipologi' => $this->post('tipologi'),
            'alamat' => $this->post('alamat'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'formulir' => $this->post('formulir')
        ];
        $this->db->insert("ptsp22",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp22_delete(){}

    // Rest Api ptsp23
    public function ptsp23_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp23") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp23") -> result_array();
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
        
    }
    public function ptsp23_post(){
        $data = [
            'nama_sekolah_satmikal' => $this->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->post('kabupaten_sekolah_satmikal'),
            'tgl_srt_permohonan' => $this->post('tgl_srt_permohonan'),
            'tgl_srt_persetujuan_pengawas_pai' => $this->post('tgl_srt_persetujuan_pengawas_pai'),
            'nama_pns' => $this->post('nama_pns'),
            'nip' => $this->post('nip'),
            'pangkat_pns' => $this->post('pangkat_pns'),
            'jabatan' => $this->post('jabatan'),
            'nama_sekolah_tujuan' => $this->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->post('tgl_mulai_mengajar'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
        ];
        $this->db->insert("ptsp23",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp23_delete(){}

    // Rest Api ptsp24
    public function ptsp24_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp24") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp24") -> result_array();
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
        
    }
    public function ptsp24_post(){
        $data = [
            'jml_roda_kendaraan' => $this->post('jml_roda_kendaraan'),
            'merek_kendaraan' => $this->post('merek_kendaraan'),
            'no_polisi' => $this->post('no_polisi'),
            'pemilik_kendaraan' => $this->post('pemilik_kendaraan'),
            'fungsional_kendaraan' => $this->post('fungsional_kendaraan'),
            'no_hp' => $this->post('no_hp'),
            'srt_permohonan' => $this->post('srt_permohonan'),
            'fc_dokumen' => $this->post('fc_dokumen')
        ];
        $this->db->insert("ptsp24",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp24_delete(){}

    // Rest Api ptsp25
    public function ptsp25_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp25") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp25") -> result_array();
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
        
    }
    public function ptsp25_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'alamat' => $this->post('alamat'),
            'pekerjaan' => $this->post('pekerjaan'),
            'no_hp' => $this->post('no_hp'),
            'perihal_konsultasi' => $this->post('perihal_konsultasi'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp25",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp25_delete(){}

    // Rest Api ptsp26
    public function ptsp26_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp26") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp26") -> result_array();
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
        
    }
    public function ptsp26_post(){
        $data = [
            'nama_pemohon' => $this->post('nama_pemohon'),
            'alamat' => $this->post('alamat'),
            'pekerjaan' => $this->post('pekerjaan'),
            'no_hp' => $this->post('no_hp'),
            'tujuan_permohonan_data' => $this->post('tujuan_permohonan_data'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp26",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp26_delete(){}

    // Rest Api ptsp27
    public function ptsp27_get(){
        
        $id_permohonan_ptsp = $this->get('id_permohonan_ptsp');
        if($id_permohonan_ptsp === NULL){
            $data = $this->db->get("ptsp27") -> result_array();
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
        } else {
            $this->db->where(array("id_permohonan_ptsp"=>$id_permohonan_ptsp));
            $data = $this->db->get("ptsp27") -> result_array();
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
        
    }
    public function ptsp27_post(){
        $data = [
            'suket_penghasilan' => $this->post('suket_penghasilan'),
            'nama_pemohon' => $this->post('nama_pemohon'),
            'alamat' => $this->post('alamat'),
            'pekerjaan' => $this->post('pekerjaan'),
            'no_hp' => $this->post('no_hp'),
            'tujuan_permohonan_suket_penghasilan' => $this->post('tujuan_permohonan_suket_penghasilan'),
            'srt_permohonan' => $this->post('srt_permohonan')
        ];
        $this->db->insert("ptsp27",$data);
        $this->set_response([
            'meta' => [
                'success' => true,
                'message' => "Successfully",
                'code' => 200,
            ],
            'data' => $data
        ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }
    public function ptsp27_delete(){}

}
