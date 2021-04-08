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
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $id_ptsp03 = $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp03');

        if ($_FILES != null) {
            $this->aksi_upload_ptsp03($id_ptsp03);
        }


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
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $id_ptsp04 = $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp04');

        if ($_FILES != null) {
            $this->aksi_upload_ptsp04($id_ptsp04);
        }


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
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
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
            'no_hp' => $this->input->post('nomor_hp'),
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
            'no_hp' => $this->input->post('nomor_hp'),
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/sop_ptsp14');
        $this->load->view('footer');
    }
    //tampil form ptsp14
    public function form_ptsp14()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/form_ptsp14');
        $this->load->view('footer');
    }
    //tampil detail ptsp14
    public function detail_ptsp14()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/detail_ptsp14');
        $this->load->view('footer');
    }
    //tampil form ubah ptsp14
    public function form_ubah_ptsp14()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp14/form_ubah_ptsp14');
        $this->load->view('footer');
    }

    //tampil sop ptsp15
    public function sop_ptsp15()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/sop_ptsp15');
        $this->load->view('footer');
    }
    //tampil form ptsp15
    public function form_ptsp15()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/form_ptsp15');
        $this->load->view('footer');
    }
    //tampil detail ptsp15
    public function detail_ptsp15()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/detail_ptsp15');
        $this->load->view('footer');
    }
    //tampil form ubah ptsp15
    public function form_ubah_ptsp15()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp15/form_ubah_ptsp15');
        $this->load->view('footer');
    }

    //tampil sop ptsp25
    public function sop_ptsp25()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/sop_ptsp25');
        $this->load->view('footer');
    }

    //tampil form ptsp25
    public function form_ptsp25()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/form_ptsp25');
        $this->load->view('footer');
    }

    //tampil detail ptsp25

    //tampil form ubah ptsp25

    //tampil preview ptsp25
    public function tampil_ptsp25()
    { // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp25/tampil_ptsp25');
        $this->load->view('footer');
    }

    //cetak ptsp05
    public function cetak_ptsp25()
    {
        $this->load->view('pemohon/ptsp25/cetak_ptsp25');
    }
}
