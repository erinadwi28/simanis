<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_bo', 'm_bo');

        if (!$this->session->userdata('role_bo')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_bo->jml_notif()->result();
        $data_permohonan['permohonan_selesaiBO'] = $this->m_bo->jml_permohonan_selesaiBO()->result();
        $data_permohonan['permohonan_prosesKasi'] = $this->m_bo->jml_permohonan_prosesKasi()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/dashboard', $data_permohonan);
        $this->load->view('footer');
    }

    //profil
    public function profil()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();
        $detailhere = array('id_bo' => $this->session->userdata('id_bo'));
        $data_detail['detail_profil_saya'] = $this->m_bo->get_detail_profil_saya($detailhere, 'bo')->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/profil', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {
        $id_bo = $this->session->userdata('id_bo');

        $config['upload_path']          = './../assets/dashboard/images/backoffice/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {
                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './../assets/dashboard/images/backoffice/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;
                $config['new_image'] = './../assets/dashboard/images/backoffice/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $item = $this->db->where('id_bo', $id_bo)->get('bo')->row();

                //replace foto lama 
                if ($item->foto_profil_bo != "placeholder_profil.png") {
                    $target_file = './../assets/dashboard/images/backoffice/profil/' . $item->foto_profil_bo;
                    unlink($target_file);
                }
                $data['foto_profil_bo'] = $uploadData['file_name'];
                $this->db->where('id_bo', $id_bo);
                $this->db->update('bo', $data);
            }
        }
        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/ubahsandi');
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

        $where = $this->session->userdata('id_bo');

        $bo = $this->m_bo->get_bo($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $bo['kata_sandi']) {
                $this->m_bo->update_sandi($where, $data_baru, 'bo');
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

    //list permohonan masuk
    public function list_permohonan_masuk()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan('Proses BO')->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui BO
    public function list_permohonan_selesaiBO()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan_selesaiBO()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_selesaiBO', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan masuk
    public function list_permohonan_prosesKasi()
    {
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan('Proses Kasi')->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_prosesKasi', $data_detail);
        $this->load->view('footer');
    }

    //tampil detail ptsp05
    public function detail_ptsp05()
    {
        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar');
        $this->load->view('backoffice/ptsp5/detail_ptsp05');
        $this->load->view('footer');
    }
}
