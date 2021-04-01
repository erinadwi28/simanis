<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kasubag', 'm_kasubag');

        if (!$this->session->userdata('role_kasubag')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $data_permohonan['permohonan_selesaiKasubag'] = $this->m_kasubag->jml_permohonan_selesaiKasubag()->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/dashboard', $data_permohonan);
        $this->load->view('footer');
    }
    //profil
    public function profil()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $detailhere = array('id_kasubag' => $this->session->userdata('id_kasubag'));
        $data_detail['detail_profil_saya'] = $this->m_kasubag->get_detail_profil_saya($detailhere, 'kasubag')->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_kasubag = $this->session->userdata('id_kasubag');

        $config['upload_path']          = './../assets/kasubag/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/kasubag/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/kasubag/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_kasubag', $id_kasubag)->get('kasubag')->row();

                //replace foto lama 
                if ($item->foto_profil_kasubag != "placeholder_profil.png") {
                    $target_file = './../assets/kasubag/profil/' . $item->foto_profil_kasubag;
                    unlink($target_file);
                }
                $data['foto_profil_kasubag'] = $uploadData['file_name'];
                $this->db->where('id_kasubag', $id_kasubag);
                $this->db->update('kasubag', $data);
            }
        }
        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/ubahsandi');
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

        $where = $this->session->userdata('id_kasubag');

        $fo = $this->m_kasubag->get_kasubag($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_kasubag->update_sandi($where, $data_baru, 'kasubag');
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

    //list data permohonan masuk
    public function list_permohonan_masuk()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $data_detail['data_permohonan'] = $this->m_kasubag->get_list_data_permohonan('Proses Kasubag')->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list data permohonan yang teralh disetujui
    public function list_permohonan_selesaiKasubag()
    {
        $data['kasubag'] = $this->db->get_where('kasubag', ['id_kasubag' =>
        $this->session->userdata('id_kasubag')])->row_array();

        $data['total_notif'] = $this->m_kasubag->jml_notif()->result();
        $data_detail['data_permohonan'] = $this->m_kasubag->get_list_data_permohonan_selesaiKasubag()->result();

        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('kasubag/list_permohonan_selesaiKasubag', $data_detail);
        $this->load->view('footer');
    }

    //tampil detail ptsp05
    public function detail_ptsp05()
    {
        $this->load->view('header');
        $this->load->view('kasubag/sidebar');
        $this->load->view('topbar');
        $this->load->view('kasubag/ptsp5/detail_ptsp05');
        $this->load->view('footer');
    }
}
