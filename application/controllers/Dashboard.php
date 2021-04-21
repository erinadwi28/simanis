<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemohon', 'm_pemohon');

        if (!$this->session->userdata('role_pemohon')) {
            redirect('masuk');
        }
    }

    public function index()
    {
        $data_title['title'] = 'SIMANIS: Dashboard';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_permohonan['permohonan_validasi_kemenag'] = $this->m_pemohon->jml_permohonan_validasi_kemenag()->result();
        $data_permohonan['permohonan_pending'] = $this->m_pemohon->jml_permohonan_pending()->result();
        $data_permohonan['permohonan_selesai'] = $this->m_pemohon->jml_permohonan_selesai()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/dashboard_pemohon', $data_permohonan);
        $this->load->view('footer');
    }

    //tampil halaman profil saya
    public function profil_pemohon()
    {
        $data_title['title'] = 'Profil Saya';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/profil_pemohon', $data_detail);
        $this->load->view('footer');
    }

    //ubah foto profil
    public function upload_foto_profil()
    {

        $id_pemohon = $this->session->userdata('id_pemohon');

        $config['upload_path']          = './assets/dashboard/images/pemohon/profil/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profil-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {

                $uploadData = $this->upload->data();

                //Compres Foto
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/dashboard/images/pemohon/profil/' . $uploadData['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 480;
                $config['height'] = 640;

                $config['new_image'] = './assets/dashboard/images/pemohon/profil/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $item = $this->db->where('id_pemohon', $id_pemohon)->get('pemohon')->row();

                //replace foto lama 
                if ($item->foto_profil_pemohon != "placeholder_profil.png") {
                    $target_file = './assets/dashboard/images/pemohon/profil/' . $item->foto_profil_pemohon;
                    unlink($target_file);
                }

                $data['foto_profil_pemohon'] = $uploadData['file_name'];

                $this->db->where('id_pemohon', $id_pemohon);
                $this->db->update('pemohon', $data);
            }
        }

        $this->session->set_flashdata('success', 'diubah');
        redirect('dashboard/profil_pemohon');
    }

    //menampilkan halaman form ubah kata sandi
    public function form_ubahsandi()
    {
        $data_title['title'] = 'Ubah Kata Sandi Saya';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ubahsandi', $data_detail);
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

        $where = $this->session->userdata('id_pemohon');

        $fo = $this->m_pemohon->get_pemohon($where);

        if ($konfirmasi === $kata_sandi_baru) {
            if ($data_lama === $fo['kata_sandi']) {
                $this->m_pemohon->update_sandi($where, $data_baru, 'pemohon');
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
    public function list_permohonan_validasi_kemenag()
    {
        $data_title['title'] = 'List Permohonan Proses Kemenag';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_validasi_kemenag()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_validasi_kemenag', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan pending
    public function list_permohonan_pending()
    {
        $data_title['title'] = 'List Permohonan Pending';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_pending()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan selesai
    public function list_permohonan_selesai()
    {
        $data_title['title'] = 'List Permohonan Selesai';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_selesai()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_selesai', $data_detail);
        $this->load->view('footer');
    }

    //menampilkan detail data permohonan dari list data permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();

        $data_notif = array(
            'notif_pemohon' => 'Dibaca',
        );

        $this->m_pemohon->update_notif($data_notif, $id_permohonan_ptsp);

        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

        if ($id_layanan == 1) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp01($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 3) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 4) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp05($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 6) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp06($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 14) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp14($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 15) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp15($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 18) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp18($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 19) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp19($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 20) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp20($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 21) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp21($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 22) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp22($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 23) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp23($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 24) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp24($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 25) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp25($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 26) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp26($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 27) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp27($id_permohonan_ptsp)->result();
        }

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        if ($id_layanan == 1) {
            $this->load->view('pemohon/ptsp3/detail_ptsp01', $data_detail);
        } elseif ($id_layanan == 3) {
            $this->load->view('pemohon/ptsp3/detail_ptsp03', $data_detail);
        } elseif ($id_layanan == 4) {
            $this->load->view('pemohon/ptsp4/detail_ptsp04', $data_detail);
        } elseif ($id_layanan == 5) {
            $this->load->view('pemohon/ptsp5/detail_ptsp05', $data_detail);
        } elseif ($id_layanan == 6) {
            $this->load->view('pemohon/ptsp6/detail_ptsp06', $data_detail);
        } elseif ($id_layanan == 14) {
            $this->load->view('pemohon/ptsp14/detail_ptsp14', $data_detail);
        } elseif ($id_layanan == 15) {
            $this->load->view('pemohon/ptsp15/detail_ptsp15', $data_detail);
        } elseif ($id_layanan == 18) {
            $this->load->view('pemohon/ptsp18/detail_ptsp18', $data_detail);
        } elseif ($id_layanan == 19) {
            $this->load->view('pemohon/ptsp19/detail_ptsp19', $data_detail);
        } elseif ($id_layanan == 20) {
            $this->load->view('pemohon/ptsp20/detail_ptsp20', $data_detail);
        } elseif ($id_layanan == 21) {
            $this->load->view('pemohon/ptsp21/detail_ptsp21', $data_detail);
        } elseif ($id_layanan == 22) {
            $this->load->view('pemohon/ptsp22/detail_ptsp22', $data_detail);
        } elseif ($id_layanan == 23) {
            $this->load->view('pemohon/ptsp23/detail_ptsp23', $data_detail);
        } elseif ($id_layanan == 24) {
            $this->load->view('pemohon/ptsp24/detail_ptsp24', $data_detail);
        } elseif ($id_layanan == 25) {
            $this->load->view('pemohon/ptsp25/detail_ptsp25', $data_detail);
        } elseif ($id_layanan == 26) {
            $this->load->view('pemohon/ptsp26/detail_ptsp26', $data_detail);
        } elseif ($id_layanan == 27) {
            $this->load->view('pemohon/ptsp27/detail_ptsp27', $data_detail);
        } 
        $this->load->view('footer');
    }

    //tampil halaman sop ptsp03
    public function sop_ptsp03()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/sop_ptsp03');
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp03
    public function form_ptsp03()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/form_ptsp03', $data_detail);
        $this->load->view('footer');
    }

    // aksi pengajuan ptsp03
    public function aksi_pengajuan_ptsp03()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '3',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp03');


        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp03/' . $id_permohonan);
    }

    //upload ijazah ptsp03
    private function aksi_upload_ptsp03($id_ptsp03)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp03/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'ijazah-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {

                $uploadData = $this->upload->data();

                $data['ijazah'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp03);
                $this->db->update('ptsp03', $data);
            }
        }
    }

    // upload ulang ijazah
    public function update_ijazah_ptsp03($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_ptsp03($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp03/' . $permohonan);
    }

    public function detail_ptsp03($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'ptsp03')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/detail_ptsp03', $data_detail);
        $this->load->view('footer');
    }

    //tampil form ubah ptsp03
    public function form_ubah_ptsp03($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/form_ubah_ptsp03', $data_detail);
        $this->load->view('footer');
    }

    // aksi update permohonan ptsp03
    public function aksi_update_pengajuan_ptsp03($id_permohonan)
    {
        $data_ptsp = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp03');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp03/' . $id_permohonan);
    }

    //tampil halaman sop ptsp04
    public function sop_ptsp04()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp4/sop_ptsp04');
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp04
    public function form_ptsp04()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp4/form_ptsp04', $data_detail);
        $this->load->view('footer');
    }

    // aksi pengajuan ptsp04
    public function aksi_pengajuan_ptsp04()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '4',
            'sie' => 'PAIS, Pontren, Penyelenggara Katolik',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp04');


        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $id_permohonan);
    }

    //upload dokumen legalisir ptsp04
    private function aksi_upload_ptsp04($id_ptsp04)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp04/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['berkas']['name'])) {
            if ($this->upload->do_upload('berkas')) {

                $uploadData = $this->upload->data();

                $data['dokumen'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp04);
                $this->db->update('ptsp04', $data);
            }
        }
    }

    //menampilkan detail ptsp04
    public function detail_ptsp04($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'ptsp03')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp4/detail_ptsp04', $data_detail);
        $this->load->view('footer');
    }

    // upload ulang dokumen legalisir
    public function update_dokumen_ptsp04($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_ptsp04($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $permohonan);
    }

    //menampilkan form ubah ptsp04
    public function form_ubah_ptsp04($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp4/form_ubah_ptsp04', $data_detail);
        $this->load->view('footer');
    }

    // aksi update permohonan ptsp04
    public function aksi_update_pengajuan_ptsp04($id_permohonan)
    {
        $data_ptsp = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp04');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $id_permohonan);
    }

    //update status permohonan
    public function aksi_update_status_permohonan($id_permohonan_ptsp)
    {
        $data = array(
            'status' => 'Validasi Kemenag',
        );

        $this->m_pemohon->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

        $this->session->set_flashdata('success', 'diajukan');
        redirect('dashboard/list_permohonan_validasi_kemenag');
    }

    //tampil halaman sop ptsp05
    public function sop_ptsp05()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/sop_ptsp05');
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp05
    public function form_ptsp05()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/form_ptsp05', $data_detail);
        $this->load->view('footer');
    }

    // aksi pengajuan ptsp05
    public function aksi_pengajuan_ptsp05()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '5',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'nomor_porsi' => $this->input->post('nomor_porsi'),
            'tahun_hijriah' => $this->input->post('tahun_hijriah'),
            'tahun_masehi' => $this->input->post('tahun_masehi'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp05');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $id_permohonan);
    }

    //upload surat permohonan ptsp05
    private function aksi_upload_srt_permohonan_ptsp05($id_ptsp05)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp05)->get('ptsp05')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp05/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
    }

    // upload ulang surat permohonan ptsp05
    public function update_srt_permohonan_ptsp05($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp05($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $permohonan);
    }

    //upload surat pernyataan ptsp05
    private function aksi_upload_srt_pernyataan_ptsp05($id_ptsp05)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_pernyataan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_pernyataan']['name'])) {
            if ($this->upload->do_upload('srt_pernyataan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp05)->get('ptsp05')->row();

                //replace foto lama 
                if ($item->srt_pernyataan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp05/srt_pernyataan/' . $item->srt_pernyataan;
                    unlink($target_file);
                }

                $data['srt_pernyataan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
    }

    // upload ulang surat pernyataan ptsp05
    public function update_srt_pernyataan_ptsp05($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_pernyataan_ptsp05($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $permohonan);
    }

    //upload fc ktp ptsp05
    private function aksi_upload_fc_ktp_ptsp05($id_ptsp05)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_ktp']['name'])) {
            if ($this->upload->do_upload('fc_ktp')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp05)->get('ptsp05')->row();

                //replace foto lama 
                if ($item->ktp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/' . $item->ktp;
                    unlink($target_file);
                }

                $data['ktp'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
    }

    // upload ulang fc ktp ptsp05
    public function update_fc_ktp_ptsp05($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_ktp_ptsp05($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $permohonan);
    }

    //upload surat bukti pelunasan ptsp05
    private function aksi_upload_bukti_pelunasan_ptsp05($id_ptsp05)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'bukti_pelunasan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['bukti_pelunasan']['name'])) {
            if ($this->upload->do_upload('bukti_pelunasan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp05)->get('ptsp05')->row();

                //replace foto lama 
                if ($item->bukti_pelunasan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp05/bukti_pelunasan/' . $item->bukti_pelunasan;
                    unlink($target_file);
                }

                $data['bukti_pelunasan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
    }

    // upload ulang bukti pelunasan ptsp05
    public function update_bukti_pelunasan_ptsp05($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_bukti_pelunasan_ptsp05($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $permohonan);
    }

    //tampil detail permohonan ptsp05
    public function detail_ptsp05($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp05($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/detail_ptsp05', $data_detail);
        $this->load->view('footer');
    }

    //tampil form ubah ptsp05
    public function form_ubah_ptsp05($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp05($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/form_ubah_ptsp05', $data_detail);
        $this->load->view('footer');
    }

    // aksi update permohonan ptsp05
    public function aksi_update_pengajuan_ptsp05($id_permohonan)
    {
        $data_ptsp = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
            'nomor_porsi' => $this->input->post('nomor_porsi'),
            'tahun_hijriah' => $this->input->post('tahun_hijriah'),
            'tahun_masehi' => $this->input->post('tahun_masehi'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp05');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $id_permohonan);
    }

    //tampil preview ptsp05
    public function tampil_ptsp05()
    {
        $data_title['title'] = 'Preview Surat';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/tampil_ptsp05');
        $this->load->view('footer');
    }

    //cetak ptsp05
    public function cetak_ptsp05()
    {
        $this->load->view('pemohon/ptsp5/cetak_ptsp05');
    }

    //tampil sop ptsp06
    public function sop_ptsp06()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp6/sop_ptsp06');
        $this->load->view('footer');
    }
    //tampil form ptsp06
    public function form_ptsp06()
    { // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp6/form_ptsp06', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp06
    public function aksi_pengajuan_ptsp06()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '6',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_jamaah_haji' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_ppiu_pihk' => $this->input->post('nama_agen'),
            'no_sk_ppiu_pihk' => $this->input->post('no_sk_agen'),
            'tahun_sk' => $this->input->post('tahun_sk_agen'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp06');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $id_permohonan);
    }
    //upload surat permohonan ptsp06
    private function aksi_upload_srt_permohonan_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp06
    public function update_srt_permohonan_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload sk_ijin_oprasional ptsp06
    private function aksi_upload_sk_ijin_oprasional_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/sk_ijin_oprasional/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sk_ijin_oprasional-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sk_ijin_oprasional']['name'])) {
            if ($this->upload->do_upload('sk_ijin_oprasional')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->sk_ijin_oprasional != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/sk_ijin_oprasional/' . $item->sk_ijin_oprasional;
                    unlink($target_file);
                }

                $data['sk_ijin_oprasional'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang sk_ijin_oprasional ptsp06
    public function update_sk_ijin_oprasional_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sk_ijin_oprasional_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload ktp ptsp06
    private function aksi_upload_ktp_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/ktp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['ktp']['name'])) {
            if ($this->upload->do_upload('ktp')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->ktp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/ktp/' . $item->ktp;
                    unlink($target_file);
                }

                $data['ktp'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang ktp ptsp06
    public function update_ktp_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_ktp_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload kk ptsp06
    private function aksi_upload_kk_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/kk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'kk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['kk']['name'])) {
            if ($this->upload->do_upload('kk')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->kk != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/kk/' . $item->kk;
                    unlink($target_file);
                }

                $data['kk'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang kk ptsp06
    public function update_kk_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_kk_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //tampil detail ptsp06
    public function detail_ptsp06($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp06($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp6/detail_ptsp06', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp06
    public function form_ubah_ptsp06($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp06($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp6/form_ubah_ptsp06', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp06
    public function aksi_update_pengajuan_ptsp06($id_permohonan)
    {
        $data_ptsp = array(
            'nama_jamaah_haji' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_ppiu_pihk' => $this->input->post('nama_agen'),
            'no_sk_ppiu_pihk' => $this->input->post('no_sk_agen'),
            'tahun_sk' => $this->input->post('tahun_sk_agen'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp06');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $id_permohonan);
    }

    //tampil sop ptsp14
    public function sop_ptsp14()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/sop_ptsp14');
        $this->load->view('footer');
    }
    //tampil form ptsp14
    public function form_ptsp14()
    { // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/form_ptsp14', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp14
    public function aksi_pengajuan_ptsp14()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '14',
            'sie' => 'Pontren',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            // 'no_surat' => $this->input->post('no_surat'),
            'nama_lpq' => $this->input->post('nama_lpq'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'yayasan' => $this->input->post('yayasan'),
            'sk_menkumham' => $this->input->post('sk_menkumham'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'berlaku' => $this->input->post('berlaku'),
            // 'no_statistik_pend_alquran' => $this->input->post('no_statistik_pend_alquran'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp14');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp14/' . $id_permohonan);
    }
    //tampil detail ptsp14
    public function detail_ptsp14($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp14($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/detail_ptsp14', $data_detail);
        $this->load->view('footer');
    }
    //upload proposal permohonan ptsp14
    private function aksi_upload_proposal_permohonan_ptsp14($id_ptsp14)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp14/proposal_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal_permohonan']['name'])) {
            if ($this->upload->do_upload('proposal_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp14)->get('ptsp14')->row();

                //replace foto lama 
                if ($item->proposal_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp14/proposal_permohonan/' . $item->proposal_permohonan;
                    unlink($target_file);
                }

                $data['proposal_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp14);
                $this->db->update('ptsp14', $data);
            }
        }
    }
    // upload ulang proposal permohonan ptsp14
    public function update_proposal_permohonan_ptsp14($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_permohonan_ptsp14($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp14/' . $permohonan);
    }
    //tampil form ubah ptsp14
    public function form_ubah_ptsp14($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp14($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/form_ubah_ptsp14', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts14
    public function aksi_update_pengajuan_ptsp14($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            // 'no_surat' => $this->input->post('no_surat'),
            'nama_lpq' => $this->input->post('nama_lpq'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'yayasan' => $this->input->post('yayasan'),
            'sk_menkumham' => $this->input->post('sk_menkumham'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'berlaku' => $this->input->post('berlaku'),
            // 'no_statistik_pend_alquran' => $this->input->post('no_statistik_pend_alquran'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp14');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp14/' . $id_permohonan);
    }

    //tampil sop ptsp15
    public function sop_ptsp15()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/sop_ptsp15');
        $this->load->view('footer');
    }
    //tampil form ptsp15
    public function form_ptsp15()
    { // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/form_ptsp15', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp15
    public function aksi_pengajuan_ptsp15()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '15',
            'sie' => 'Pontren',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            // 'no_surat' => $this->input->post('no_surat'),
            'nama_madrasah' => $this->input->post('nama_madrasah'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            // 'nomor_statistik' => $this->input->post('nomor_statistik'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp15');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp15/' . $id_permohonan);
    }
    //tampil detail ptsp15
    public function detail_ptsp15($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp15($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/detail_ptsp15', $data_detail);
        $this->load->view('footer');
    }
    //upload proposal permohonan ptsp15
    private function aksi_upload_proposal_permohonan_ptsp15($id_ptsp15)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp15/proposal_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal_permohonan']['name'])) {
            if ($this->upload->do_upload('proposal_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp15)->get('ptsp15')->row();

                //replace foto lama 
                if ($item->proposal_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp15/proposal_permohonan/' . $item->proposal_permohonan;
                    unlink($target_file);
                }

                $data['proposal_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp15);
                $this->db->update('ptsp15', $data);
            }
        }
    }
    // upload ulang proposal permohonan ptsp15
    public function update_proposal_permohonan_ptsp15($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_permohonan_ptsp15($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp15/' . $permohonan);
    }
    //tampil form ubah ptsp15
    public function form_ubah_ptsp15($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp15($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/form_ubah_ptsp15', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts15
    public function aksi_update_pengajuan_ptsp15($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            // 'no_surat' => $this->input->post('no_surat'),
            'nama_madrasah' => $this->input->post('nama_madrasah'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            // 'nomor_statistik' => $this->input->post('nomor_statistik'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp15');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp15/' . $id_permohonan);
    }

    //tampil sop ptsp18
    public function sop_ptsp18()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp18/sop_ptsp18');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp18
    public function form_ptsp18()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp18/form_ptsp18', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp18
    public function aksi_pengajuan_ptsp18()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '18',
            'sie' => 'Bimas Islam',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'no_surat' => $this->input->post('no_surat'),
            'nama_masjid' => $this->input->post('nama_masjid'),
            // 'no_surat_permohonan' => $this->input->post('no_surat_permohonan'),
            'tgl_surat_permohonan' => $this->input->post('tgl_surat_permohonan'),
            'nama_ketua_takmir' => $this->input->post('nama_ketua_takmir'),
            'alamat_masjid' => $this->input->post('alamat_masjid'),
            'no_id_masjid' => $this->input->post('no_id_masjid'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp18');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp18/' . $id_permohonan);
    }
    //tampil detail ptsp18
    public function detail_ptsp18($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp18($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp18/detail_ptsp18', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp18
    private function aksi_upload_srt_permohonan_ptsp18($id_ptsp18)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp18/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp18)->get('ptsp18')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp18/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp18);
                $this->db->update('ptsp18', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp18
    public function update_srt_permohonan_ptsp18($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp18($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp18/' . $permohonan);
    }
    //upload proposal ptsp18
    private function aksi_upload_proposal_ptsp18($id_ptsp18)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp18/proposal/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal']['name'])) {
            if ($this->upload->do_upload('proposal')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp18)->get('ptsp18')->row();

                //replace foto lama 
                if ($item->proposal != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp18/proposal/' . $item->proposal;
                    unlink($target_file);
                }

                $data['proposal'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp18);
                $this->db->update('ptsp18', $data);
            }
        }
    }
    // upload ulang proposal ptsp18
    public function update_proposal_ptsp18($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_ptsp18($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp18/' . $permohonan);
    }
    //tampil form ubah ptsp18
    public function form_ubah_ptsp18($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp18($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp18/form_ubah_ptsp18', $data_detail);
        $this->load->view('footer');
    }
    //tampil preview ptsp18
    public function tampil_ptsp18()
    {
        $data_title['title'] = 'Preview Surat';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp18/tampil_ptsp18');
        $this->load->view('footer');
    }
    // aksi update permohonan pts18
    public function aksi_update_pengajuan_ptsp18($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'no_surat' => $this->input->post('no_surat'),
            'nama_masjid' => $this->input->post('nama_masjid'),
            // 'no_surat_permohonan' => $this->input->post('no_surat_permohonan'),
            'tgl_surat_permohonan' => $this->input->post('tgl_surat_permohonan'),
            'nama_ketua_takmir' => $this->input->post('nama_ketua_takmir'),
            'alamat_masjid' => $this->input->post('alamat_masjid'),
            'no_id_masjid' => $this->input->post('no_id_masjid'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp18');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp18/' . $id_permohonan);
    }

    //tampil sop ptsp19
    public function sop_ptsp19()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp19/sop_ptsp19');
        $this->load->view('footer');
    }
    //tampil form ptsp19
	public function form_ptsp19()
	{ // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp19/form_ptsp19',$data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp19
    public function aksi_pengajuan_ptsp19()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '19',
            'sie' => 'Bimas Islam',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_studio' => $this->input->post('nama_studio'),
            'kabupaten_studio' => $this->input->post('kabupaten_studio'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'agama' => $this->input->post('agama'),
            'bln_siaran' => $this->input->post('bln_siaran'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp19');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp19/' . $id_permohonan);
    }
    //tampil detail ptsp19
    public function detail_ptsp19($id_permohonan)
    { 
        $data_title['title'] = 'Detail Permohonan'; 
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp19($id_permohonan)->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp19/detail_ptsp19',$data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp19
    private function aksi_upload_srt_permohonan_ptsp19($id_ptsp19)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp19/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp19)->get('ptsp19')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp19/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp19);
                $this->db->update('ptsp19', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp19
    public function update_srt_permohonan_ptsp19($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp19($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp19/' . $permohonan);
    }
    //upload jadwal siaran ptsp19
    private function aksi_upload_jadwal_siaran_ptsp19($id_ptsp19)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp19/jadwal_siaran/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'jadwal_siaran-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['jadwal_siaran']['name'])) {
            if ($this->upload->do_upload('jadwal_siaran')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp19)->get('ptsp19')->row();

                //replace foto lama 
                if ($item->jadwal_siaran != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp19/jadwal_siaran/' . $item->jadwal_siaran;
                    unlink($target_file);
                }

                $data['jadwal_siaran'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp19);
                $this->db->update('ptsp19', $data);
            }
        }
    }
    // upload ulang jadwal siaran ptsp19
    public function update_jadwal_siaran_ptsp19($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_jadwal_siaran_ptsp19($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp19/' . $permohonan);
    }
    //tampil form ubah ptsp19
    public function form_ubah_ptsp19($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp19($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp19/form_ubah_ptsp19', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts19
    public function aksi_update_pengajuan_ptsp19($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_studio' => $this->input->post('nama_studio'),
            'kabupaten_studio' => $this->input->post('kabupaten_studio'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'agama' => $this->input->post('agama'),
            'bln_siaran' => $this->input->post('bln_siaran'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp19');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp19/' . $id_permohonan);
    }

	//tampil sop ptsp20
	public function sop_ptsp20()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp20/sop_ptsp20');
        $this->load->view('footer');
    }
	//tampil form ptsp20
	public function form_ptsp20()
	{ // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp20/form_ptsp20',$data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp20
    public function aksi_pengajuan_ptsp20()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '20',
            'sie' => 'Bimas Islam',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_majelis_taklim' => $this->input->post('nama_majelis_taklim'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp20');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp20/' . $id_permohonan);
    }
	//tampil detail ptsp20
	public function detail_ptsp20($id_permohonan)
	{ // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp20($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp20/detail_ptsp20',$data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp20
    private function aksi_upload_srt_permohonan_ptsp20($id_ptsp20)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp20/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp20)->get('ptsp20')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp20/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp20);
                $this->db->update('ptsp20', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp20
    public function update_srt_permohonan_ptsp20($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp20($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp20/' . $permohonan);
    }
    //upload surat rekomendasi ptsp20
    private function aksi_upload_srt_rek_kua_ptsp20($id_ptsp20)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp20/srt_rek_kua/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_rek_kua-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_rek_kua']['name'])) {
            if ($this->upload->do_upload('srt_rek_kua')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp20)->get('ptsp20')->row();

                //replace foto lama 
                if ($item->srt_rek_kua != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp20/srt_rek_kua/' . $item->srt_rek_kua;
                    unlink($target_file);
                }

                $data['srt_rek_kua'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp20);
                $this->db->update('ptsp20', $data);
            }
        }
    }
    // upload ulang surat rekomendasi ptsp20
    public function update_srt_rek_kua_ptsp20($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_rek_kua_ptsp20($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp20/' . $permohonan);
    }
	//tampil form ubah ptsp20
	public function form_ubah_ptsp20($id_permohonan)
	{ // $id_permohonan
        $data_title['title'] = 'Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp20($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp20/form_ubah_ptsp20', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts20
    public function aksi_update_pengajuan_ptsp20($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_majelis_taklim' => $this->input->post('nama_majelis_taklim'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp20');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp20/' . $id_permohonan);
    }

    //tampil sop ptsp21
    public function sop_ptsp21()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp21/sop_ptsp21');
        $this->load->view('footer');
    }
    //tampil form ptsp21
	public function form_ptsp21()
	{ // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp21/form_ptsp21',$data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp21
    public function aksi_pengajuan_ptsp21()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '21',
            'sie' => 'Bimas Islam',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_masjid' => $this->input->post('nama_masjid'),
            'dukuh' => $this->input->post('dukuh'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp21');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp21/' . $id_permohonan);
    }
    //tampil detail ptsp21
    public function detail_ptsp21($id_permohonan)
    { 
        $data_title['title'] = 'Detail Permohonan'; 
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp21($id_permohonan)->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp21/detail_ptsp21',$data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp21
    private function aksi_upload_srt_permohonan_ptsp21($id_ptsp21)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp21/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp21)->get('ptsp21')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp21/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp21);
                $this->db->update('ptsp21', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp21
    public function update_srt_permohonan_ptsp21($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp21($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp21/' . $permohonan);
    }
    //tampil form ubah ptsp21
	public function form_ubah_ptsp21($id_permohonan)
	{ // $id_permohonan
        $data_title['title'] = 'Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp21($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp21/form_ubah_ptsp21', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts21
    public function aksi_update_pengajuan_ptsp21($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_masjid' => $this->input->post('nama_masjid'),
            'dukuh' => $this->input->post('dukuh'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp21');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp21/' . $id_permohonan);
    }

    //tampil sop ptsp22
    public function sop_ptsp22()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp22/sop_ptsp22');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp22
    public function form_ptsp22()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp22/form_ptsp22', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp22
    public function aksi_pengajuan_ptsp22()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '22',
            'sie' => 'Bimas Islam',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_masjid' => $this->input->post('nama_masjid'),
            'tipologi' => $this->input->post('tipologi'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp22');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp22/' . $id_permohonan);
    }
    //tampil detail ptsp22
    public function detail_ptsp22($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp22($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp22/detail_ptsp22', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp22
    private function aksi_upload_srt_permohonan_ptsp22($id_ptsp22)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp22/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp22)->get('ptsp22')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp22/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp22);
                $this->db->update('ptsp22', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp22
    public function update_srt_permohonan_ptsp22($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp22($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp22/' . $permohonan);
    }
    //upload formulir ptsp22
    private function aksi_upload_formulir_ptsp22($id_ptsp22)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp22/formulir/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'formulir-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['formulir']['name'])) {
            if ($this->upload->do_upload('formulir')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp22)->get('ptsp22')->row();

                //replace foto lama 
                if ($item->formulir != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp22/formulir/' . $item->formulir;
                    unlink($target_file);
                }

                $data['formulir'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp22);
                $this->db->update('ptsp22', $data);
            }
        }
    }
    // upload ulang formulir ptsp22
    public function update_formulir_ptsp22($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_formulir_ptsp22 ($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp22/' . $permohonan);
    }
    //tampil form ubah ptsp22
    public function form_ubah_ptsp22($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp22($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp22/form_ubah_ptsp22', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts22
    public function aksi_update_pengajuan_ptsp22($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_masjid' => $this->input->post('nama_masjid'),
            'tipologi' => $this->input->post('tipologi'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp22');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp22/' . $id_permohonan);
    }

    //tampil sop ptsp23
    public function sop_ptsp23()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp23/sop_ptsp23');
        $this->load->view('footer');
    }
    //tampil form ptsp23
	public function form_ptsp23()
	{ // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp23/form_ptsp23',$data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp23
    public function aksi_pengajuan_ptsp23()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '23',
            'sie' => 'PAIS',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_sekolah_satmikal' => $this->input->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->input->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->input->post('kabupaten_sekolah_satmikal'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'tgl_srt_persetujuan_pengawas_pai' => $this->input->post('tgl_srt_persetujuan_pengawas_pai'),
            'nama_pns' => $this->input->post('nama_pns'),
            'nip' => $this->input->post('nip'),
            'pangkat_pns' => $this->input->post('pangkat_pns'),
            'jabatan' => $this->input->post('jabatan'),
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->input->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->input->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->input->post('tgl_mulai_mengajar'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp23');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp23/' . $id_permohonan);
    }
    //tampil detail ptsp23
    public function detail_ptsp23($id_permohonan)
    { 
        $data_title['title'] = 'Detail Permohonan'; 
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp23($id_permohonan)->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp23/detail_ptsp23',$data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp23
    private function aksi_upload_srt_permohonan_ptsp23($id_ptsp23)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp23/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp23)->get('ptsp23')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp23/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp23);
                $this->db->update('ptsp23', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp23
    public function update_srt_permohonan_ptsp23($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp23($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp23/' . $permohonan);
    }
    //tampil form ubah ptsp23
	public function form_ubah_ptsp23($id_permohonan)
	{ // $id_permohonan
        $data_title['title'] = 'Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp23($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp23/form_ubah_ptsp23', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts23
    public function aksi_update_pengajuan_ptsp23($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_sekolah_satmikal' => $this->input->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->input->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->input->post('kabupaten_sekolah_satmikal'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'tgl_srt_persetujuan_pengawas_pai' => $this->input->post('tgl_srt_persetujuan_pengawas_pai'),
            'nama_pns' => $this->input->post('nama_pns'),
            'nip' => $this->input->post('nip'),
            'pangkat_pns' => $this->input->post('pangkat_pns'),
            'jabatan' => $this->input->post('jabatan'),
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->input->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->input->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->input->post('tgl_mulai_mengajar'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp23');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp23/' . $id_permohonan);
    }

    //tampil sop ptsp24
    public function sop_ptsp24()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp24/sop_ptsp24');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp24
    public function form_ptsp24()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp24/form_ptsp24', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp24
    public function aksi_pengajuan_ptsp24()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '24',
            'sie' => 'Bimas Islam, Penyelenggara Katolik,Hindu, Sub Bag (Kristen, Budha)',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'jml_roda_kendaraan' => $this->input->post('jml_roda_kendaraan'),
            'merek_kendaraan' => $this->input->post('merek_kendaraan'),
            'no_polisi' => $this->input->post('no_polisi'),
            'pemilik_kendaraan' => $this->input->post('pemilik_kendaraan'),
            'fungsional_kendaraan' => $this->input->post('fungsional_kendaraan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp24');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp24/' . $id_permohonan);
    }
    //tampil detail ptsp24
    public function detail_ptsp24($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp24($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp24/detail_ptsp24', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp24
    private function aksi_upload_srt_permohonan_ptsp24($id_ptsp24)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp24/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp24)->get('ptsp24')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp24/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp24);
                $this->db->update('ptsp24', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp24
    public function update_srt_permohonan_ptsp24($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp24($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp24/' . $permohonan);
    }
    //upload fc_dokumen ptsp24
    private function aksi_upload_fc_dokumen_ptsp24($id_ptsp24)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp24/fc_dokumen/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_dokumen']['name'])) {
            if ($this->upload->do_upload('fc_dokumen')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp24)->get('ptsp24')->row();

                //replace foto lama 
                if ($item->fc_dokumen != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp24/fc_dokumen/' . $item->fc_dokumen;
                    unlink($target_file);
                }

                $data['fc_dokumen'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp24);
                $this->db->update('ptsp24', $data);
            }
        }
    }
    // upload ulang fc_dokumen ptsp24
    public function update_fc_dokumen_ptsp24($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_dokumen_ptsp24($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp24/' . $permohonan);
    }
    //tampil form ubah ptsp24
    public function form_ubah_ptsp24($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp24($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp24/form_ubah_ptsp24', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts24
    public function aksi_update_pengajuan_ptsp24($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'jml_roda_kendaraan' => $this->input->post('jml_roda_kendaraan'),
            'merek_kendaraan' => $this->input->post('merek_kendaraan'),
            'no_polisi' => $this->input->post('no_polisi'),
            'pemilik_kendaraan' => $this->input->post('pemilik_kendaraan'),
            'fungsional_kendaraan' => $this->input->post('fungsional_kendaraan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp24');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp24/' . $id_permohonan);
    }

    //tampil sop ptsp25
    public function sop_ptsp25()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/sop_ptsp25');
        $this->load->view('footer');
    }
    //tampil form ptsp25
    public function form_ptsp25()
    { // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/form_ptsp25', $data_detail);
        $this->load->view('footer');
    }
	
    // aksi pengajuan ptsp25
    public function aksi_pengajuan_ptsp25()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '25',
            'sie' => 'Garazawa',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'perihal_konsultasi' => $this->input->post('perihal_konsultasi'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp25');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp25/' . $id_permohonan);
    }
    //tampil detail permohonan ptsp25
    public function detail_ptsp25($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp25($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/detail_ptsp25', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp25
    public function form_ubah_ptsp25($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp25($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/form_ubah_ptsp25', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp25
    public function aksi_update_pengajuan_ptsp25($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'perihal_konsultasi' => $this->input->post('perihal_konsultasi'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp25');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp25/' . $id_permohonan);
    }


    //tampil sop ptsp26
    public function sop_ptsp26()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp26/sop_ptsp26');
        $this->load->view('footer');
    }
    //tampil form ptsp26
    public function form_ptsp26()
    { // $id_permohonan
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp26/form_ptsp26',$data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp26
    public function aksi_pengajuan_ptsp26()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '26',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'tujuan_permohonan_data' => $this->input->post('tujuan_permohonan_data'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp26');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp26/' . $id_permohonan);
    }
    //tampil detail permohonan ptsp26
    public function detail_ptsp26($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';                
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp26($id_permohonan)->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp26/detail_ptsp26',$data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp26
    public function form_ubah_ptsp26($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp26($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp26/form_ubah_ptsp26', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp26
    public function aksi_update_pengajuan_ptsp26($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'tujuan_permohonan_data' => $this->input->post('tujuan_permohonan_data'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp26');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp26/' . $id_permohonan);
    }

    //tampil sop ptsp27
    public function sop_ptsp27()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp27/sop_ptsp27');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp27
    public function form_ptsp27()
    {
        $data_title['title'] = 'Form Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar',$data);
        $this->load->view('pemohon/ptsp10/form_ptsp10');
        $this->load->view('footer');
    }
	//tampil detail ptsp10
    public function detail_ptsp10()
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header',$data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp27/form_ptsp27');
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp27
    public function aksi_pengajuan_ptsp27()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '27',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'tujuan_permohonan_suket_penghasilan' => $this->input->post('tujuan_permohonan_suket_penghasilan'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp27');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp27/' . $id_permohonan);
    }
    //tampil detail ptsp27
    public function detail_ptsp27($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp27($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp27/detail_ptsp27', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp27
    private function aksi_upload_srt_permohonan_ptsp27($id_ptsp27)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp27/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp27)->get('ptsp27')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp27/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp27);
                $this->db->update('ptsp27', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp27
    public function update_srt_permohonan_ptsp27($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp27($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp27/' . $permohonan);
    }
    //tampil form ubah ptsp27
    public function form_ubah_ptsp27($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp27($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp27/form_ubah_ptsp27', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts27
    public function aksi_update_pengajuan_ptsp27($id_permohonan)
    {
        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'alamat' => $this->input->post('alamat'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'no_hp' => $this->input->post('no_hp'),
            'tujuan_permohonan_suket_penghasilan' => $this->input->post('tujuan_permohonan_suket_penghasilan'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp27');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp27/' . $id_permohonan);
    }

}


