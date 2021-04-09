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
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_permohonan['permohonan_pending'] = $this->m_kepala->jml_permohonan_pending()->result();
        $data_permohonan['permohonan_prosesFO'] = $this->m_kepala->jml_permohonan_prosesFO()->result();
        $data_permohonan['permohonan_prosesBO'] = $this->m_kepala->jml_permohonan_prosesBO()->result();
        $data_permohonan['permohonan_prosesKasi'] = $this->m_kepala->jml_permohonan_prosesKasi()->result();
        $data_permohonan['permohonan_prosesKasubag'] = $this->m_kepala->jml_permohonan_prosesKasubag()->result();
        $data_permohonan['permohonan_selesai'] = $this->m_kepala->jml_permohonan_selesai()->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $data_title['title'] = 'Profil Saya';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $detailhere = array('id_kepala' => $this->session->userdata('id_kepala'));
        $data_detail['detail_profil_saya'] = $this->m_kepala->get_detail_profil_saya($detailhere, 'kepala')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_kepala = $this->session->userdata('id_kepala');

        $config['upload_path']          = './../assets/dashboard/images/kepala/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/dashboard/images/kepala/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/dashboard/images/kepala/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_kepala', $id_kepala)->get('kepala')->row();

                //replace foto lama 
                if ($item->foto_profil_kepala != "placeholder_profil.png") {
                    $target_file = './../assets/dashboard/images/kepala/profil/' . $item->foto_profil_kepala;
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
        $data_title['title'] = 'Ubah Kata Sandi Saya';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header', $data_title);
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
        $data_title['title'] = 'List Permohonan Pending';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Pending')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses FO
    public function list_permohonan_prosesFO()
    {
        $data_title['title'] = 'List Permohonan Proses FO';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Validasi Kemenag')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesFO', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses BO
    public function list_permohonan_prosesBO()
    {
        $data_title['title'] = 'List Permohonan Proses FO';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses BO')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesBO', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses Kasi
    public function list_permohonan_prosesKasi()
    {
        $data_title['title'] = 'List Permohonan Proses Kasi';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses Kasi')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesKasi', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan proses Kasubag
    public function list_permohonan_prosesKasubag()
    {
        $data_title['title'] = 'List Permohonan Proses Kasubag';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Proses Kasubag')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_prosesKasubag', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan Selesai
    public function list_permohonan_selesai()
    {
        $data_title['title'] = 'List Permohonan Selesai';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['data_permohonan'] = $this->m_kepala->get_list_data_permohonan('Selesai')->result();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/list_permohonan_selesai', $data_detail);
        $this->load->view('footer');
    }
    //Detail Permohonan ptsp06
    public function detail_ptsp06()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ptsp6/detail_ptsp06');
        $this->load->view('footer');
    }
    //Detail Permohonan ptsp14
    public function detail_ptsp14()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ptsp14/detail_ptsp14');
        $this->load->view('footer');
    }
    //Detail Permohonan ptsp15
    public function detail_ptsp15()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ptsp15/detail_ptsp15');
        $this->load->view('footer');
    }

    //menampilkan detail data permohonan dari list permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $data_detail['detail_permohonan'] = $this->m_kepala->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

        if ($id_layanan == 1) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp01')->result();
        } elseif ($id_layanan == 3) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp03')->result();
        } elseif ($id_layanan == 4) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp04')->result();
        } elseif ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
        } elseif ($id_layanan == 6) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp06')->result();
        } elseif ($id_layanan == 7) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp07')->result();
        } elseif ($id_layanan == 8) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp08')->result();
        } elseif ($id_layanan == 9) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp09')->result();
        } elseif ($id_layanan == 10) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp10')->result();
        } elseif ($id_layanan == 11) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp11')->result();
        } elseif ($id_layanan == 12) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp12')->result();
        } elseif ($id_layanan == 13) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp13')->result();
        } elseif ($id_layanan == 14) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp14')->result();
        } elseif ($id_layanan == 15) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp15')->result();
        } elseif ($id_layanan == 16) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp16')->result();
        } elseif ($id_layanan == 17) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp17')->result();
        } elseif ($id_layanan == 18) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp18')->result();
        } elseif ($id_layanan == 19) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp19')->result();
        } elseif ($id_layanan == 20) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp20')->result();
        } elseif ($id_layanan == 21) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp21')->result();
        } elseif ($id_layanan == 22) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp22')->result();
        } elseif ($id_layanan == 23) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp23')->result();
        } elseif ($id_layanan == 24) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp24')->result();
        } elseif ($id_layanan == 25) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp25')->result();
        } elseif ($id_layanan == 26) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp26')->result();
        } elseif ($id_layanan == 27) {
            $data_detail['detail_ptsp'] = $this->m_kepala->get_detail_ptsp($id_permohonan_ptsp, 'ptsp27')->result();
        }

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        if ($id_layanan == 1) {
            $this->load->view('kepala/ptsp1/detail_ptsp01', $data_detail);
        } elseif ($id_layanan == 3) {
            $this->load->view('kepala/ptsp3/detail_ptsp03', $data_detail);
        } elseif ($id_layanan == 4) {
            $this->load->view('kepala/ptsp4/detail_ptsp04', $data_detail);
        } elseif ($id_layanan == 5) {
            $this->load->view('kepala/ptsp5/detail_ptsp05', $data_detail);
        } elseif ($id_layanan == 6) {
            $this->load->view('kepala/ptsp6/detail_ptsp06', $data_detail);
        } elseif ($id_layanan == 7) {
            $this->load->view('kepala/ptsp7/detail_ptsp07', $data_detail);
        } elseif ($id_layanan == 8) {
            $this->load->view('kepala/ptsp8/detail_ptsp08', $data_detail);
        } elseif ($id_layanan == 9) {
            $this->load->view('kepala/ptsp9/detail_ptsp09', $data_detail);
        } elseif ($id_layanan == 10) {
            $this->load->view('kepala/ptsp10/detail_ptsp10', $data_detail);
        } elseif ($id_layanan == 11) {
            $this->load->view('kepala/ptsp11/detail_ptsp11', $data_detail);
        } elseif ($id_layanan == 12) {
            $this->load->view('kepala/ptsp12/detail_ptsp12', $data_detail);
        } elseif ($id_layanan == 13) {
            $this->load->view('kepala/ptsp13/detail_ptsp13', $data_detail);
        } elseif ($id_layanan == 14) {
            $this->load->view('kepala/ptsp14/detail_ptsp14', $data_detail);
        } elseif ($id_layanan == 15) {
            $this->load->view('kepala/ptsp15/detail_ptsp15', $data_detail);
        } elseif ($id_layanan == 16) {
            $this->load->view('kepala/ptsp16/detail_ptsp16', $data_detail);
        } elseif ($id_layanan == 17) {
            $this->load->view('kepala/ptsp17/detail_ptsp17', $data_detail);
        } elseif ($id_layanan == 18) {
            $this->load->view('kepala/ptsp18/detail_ptsp18', $data_detail);
        } elseif ($id_layanan == 19) {
            $this->load->view('kepala/ptsp19/detail_ptsp19', $data_detail);
        } elseif ($id_layanan == 20) {
            $this->load->view('kepala/ptsp20/detail_ptsp20', $data_detail);
        } elseif ($id_layanan == 21) {
            $this->load->view('kepala/ptsp21/detail_ptsp21', $data_detail);
        } elseif ($id_layanan == 22) {
            $this->load->view('kepala/ptsp22/detail_ptsp22', $data_detail);
        } elseif ($id_layanan == 23) {
            $this->load->view('kepala/ptsp23/detail_ptsp23', $data_detail);
        } elseif ($id_layanan == 24) {
            $this->load->view('kepala/ptsp24/detail_ptsp24', $data_detail);
        } elseif ($id_layanan == 25) {
            $this->load->view('kepala/ptsp25/detail_ptsp25', $data_detail);
        } elseif ($id_layanan == 26) {
            $this->load->view('kepala/ptsp26/detail_ptsp26', $data_detail);
        } elseif ($id_layanan == 27) {
            $this->load->view('kepala/ptsp27/detail_ptsp27', $data_detail);
        }
        $this->load->view('footer');
    }
	//Detail Permohonan ptsp20
    public function detail_ptsp20()
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['kepala'] = $this->db->get_where('kepala', ['id_kepala' =>
        $this->session->userdata('id_kepala')])->row_array();

        $this->load->view('header', $data_title);
        $this->load->view('kepala/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kepala/ptsp20/detail_ptsp20');
        $this->load->view('footer');
    }
}
