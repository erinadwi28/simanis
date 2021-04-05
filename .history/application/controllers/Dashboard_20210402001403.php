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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_permohonan['permohonan_validasi_kemenag'] = $this->m_pemohon->jml_permohonan_validasi_kemenag()->result();
        $data_permohonan['permohonan_pending'] = $this->m_pemohon->jml_permohonan_pending()->result();
        $data_permohonan['permohonan_selesai'] = $this->m_pemohon->jml_permohonan_selesai()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/dashboard_pemohon', $data_permohonan);
        $this->load->view('footer');
    }

    //tampil halaman profil saya
    public function profil_pemohon()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_validasi_kemenag()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_validasi_kemenag', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan pending
    public function list_permohonan_pending()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_pending()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_pending', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan selesai
    public function list_permohonan_selesai()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_pemohon->list_permohonan_selesai()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/list_permohonan_selesai', $data_detail);
        $this->load->view('footer');
    }

    //menampilkan detail data permohonan dari list data permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
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
        }

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        if ($id_layanan == 1) {
            $this->load->view('pemohon/ptsp3/detail_ptsp01', $data_detail);
        } elseif ($id_layanan == 3) {
            $this->load->view('pemohon/ptsp3/detail_ptsp03', $data_detail);
        } elseif ($id_layanan == 4) {
            $this->load->view('pemohon/ptsp4/detail_ptsp04', $data_detail);
        }
        $this->load->view('footer');
    }

    //tampil halaman sop ptsp03
    public function sop_ptsp03()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/sop_ptsp03');
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp03
    public function form_ptsp03()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'ptsp03')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp3/detail_ptsp03', $data_detail);
        $this->load->view('footer');
    }

    //tampil form ubah ptsp03
    public function form_ubah_ptsp03($id_permohonan)
    {
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan)->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp4/sop_ptsp04');
        $this->load->view('footer');
    }

    //tampil halaman form pengajuan ptsp04
    public function form_ptsp04()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'ptsp03')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan)->result();

        $this->load->view('header');
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
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan)->result();

        $this->load->view('header');
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
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/sop_ptsp05');
        $this->load->view('footer');
    }

	//tampil halaman form pengajuan ptsp05
	public function form_ptsp05()
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $detailhere = array('id_pemohon' => $this->session->userdata('id_pemohon'));
        $data_detail['detail_profil_saya'] = $this->m_pemohon->get_detail_profil_saya($detailhere, 'pemohon')->result();

        $this->load->view('header');
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

        $id_ptsp05 = $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp05');

        if ($_FILES != null) {
            $this->aksi_upload_ptsp05($id_ptsp05);
        }


        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp05/' . $id_permohonan);
    }

    //upload dokumen legalisir ptsp05
    private function aksi_upload_ptsp05($id_ptsp05)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp05/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
        if (!empty($_FILES['srt_pernyataan']['name'])) {
            if ($this->upload->do_upload('srt_pernyataan')) {

                $uploadData = $this->upload->data();

                $data['srt_pernyataan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp05);
                $this->db->update('ptsp05', $data);
            }
        }
    }

    //tampil detail permohonan ptsp05
    public function detail_ptsp05($id_permohonan)
    {
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp05($id_permohonan)->result();

        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp5/detail_ptsp05', $data_detail);
        $this->load->view('footer');
    }

	//tampil form ubah ptsp05
	public function form_ubah_ptsp05()
    {
        $this->load->view('header');
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar');
        $this->load->view('pemohon/ptsp5/form_ubah_ptsp05');
        $this->load->view('footer');
    }
}
