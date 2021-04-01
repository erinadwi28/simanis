<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kepala', 'm_kepala');

        if (!$this->session->userdata('role_kepala')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_permohonan['permohonan_pending'] = $this->m_kepala->jml_permohonan_pending()->result();
        $data_permohonan['permohonan_prosesFO'] = $this->m_kepala->jml_permohonan_prosesFO()->result();
        $data_permohonan['permohonan_prosesBO'] = $this->m_kepala->jml_permohonan_prosesBO()->result();
        $data_permohonan['permohonan_prosesKasi'] = $this->m_kepala->jml_permohonan_prosesKasi()->result();
        $data_permohonan['permohonan_prosesKasubag'] = $this->m_kepala->jml_permohonan_prosesKasubag()->result();
        $data_permohonan['permohonan_selesai'] = $this->m_kepala->jml_permohonan_selesai()->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $detailhere = array('id_kepala' => $this->session->userdata('id_kepala'));
        $data_detail['detail_profil_saya'] = $this->m_kepala->get_detail_profil_saya($detailhere, 'kepala')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_kepala = $this->session->userdata('id_kepala');

        $config['upload_path']          = './../assets/kepala/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/kepala/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/kepala/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_kepala', $id_kepala)->get('kepala')->row();

                //replace foto lama 
                if ($item->foto_profil_kepala != "placeholder_profil.png") {
                    $target_file = './../assets/kepala/profil/' . $item->foto_profil_kepala;
                    unlink($target_file);
                }
                $data['foto_profil_kepala'] = $uploadData['file_name'];
                $this->db->where('id_kepala', $id_kepala);
                $this->db->update('kepala', $data);
            }
        }
        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ubahsandi');
        $this->load->view('footer');
    }

    // aksi ubah kata
    public function ubah_sandi()
    {
        $kata_sandi_awal = $this->input->post('kata_sandi_awal');
        $data_lama = sha1($kata_sandi_awal);

        $kata_sandi_baru = $this->input->post('kata_sandi_baru');
        $kata_sandi_hash = sha1($kata_sandi_baru);

        $data_baru = array(
            'kata_sandi' => $kata_sandi_hash,
        );

        $konfirmasi = $this->input->post('konfirmasi');

        $where = $this->session->userdata('id_kepala');

        $fo = $this->m_kepala->get_kepala($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_kepala->update_sandi($where, $data_baru, 'kepala');
                $this->session->set_flashdata('success', '<b>Kata Sandi</b> Berhasil Diubah');
                redirect('dashboard/form_ubahsandi');
            } else {
                $this->session->set_flashdata('error', '<b>Kata Sandi Lama</b> Salah');
                redirect('dashboard/form_ubahsandi');
            }
        } else {
            $this->session->set_flashdata('error', 'Konfirmasi Sandi<b> Tidak Sesuai</b>');
            redirect('dashboard/form_ubahsandi');
        }
    }

    //list data permohonan pending
    public function list_permohonan_pending()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Pending')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses FO
    public function list_permohonan_prosesFO()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Validasi Kemenag')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesFO', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses BO
    public function list_permohonan_prosesBO()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses BO')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesBO', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses Kasi
    public function list_permohonan_prosesKasi()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses Kasi')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesKasi', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses Kasubag
    public function list_permohonan_prosesKasubag()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses Kasubag')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesKasubag', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan Selesai
    public function list_permohonan_selesai()
    {
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Selesai')->result();

        $this->load->view('header');
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_selesai', $data_detail);
        $this->load->view('footer');
    }
}
