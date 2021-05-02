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
            $data_detail['data_petugas_doa'] = $this->m_pemohon->data_petugas_doa($id_permohonan_ptsp)->result();
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp01($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 2) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp02($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 3) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp03($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 4) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp04($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp05($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 6) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp06($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 7) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp07($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 8) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp08($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 9) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp09($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 10) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp10($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 11) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp11($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 12) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp12($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 13) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp13($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 14) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp14($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 15) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp15($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 16) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp16($id_permohonan_ptsp)->result();
        } elseif ($id_layanan == 17) {
            $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp17($id_permohonan_ptsp)->result();
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
            $this->load->view('pemohon/ptsp1/detail_ptsp01', $data_detail);
        } elseif ($id_layanan == 2) {
            $this->load->view('pemohon/ptsp2/detail_ptsp02', $data_detail);
        } elseif ($id_layanan == 3) {
            $this->load->view('pemohon/ptsp3/detail_ptsp03', $data_detail);
        } elseif ($id_layanan == 4) {
            $this->load->view('pemohon/ptsp4/detail_ptsp04', $data_detail);
        } elseif ($id_layanan == 5) {
            $this->load->view('pemohon/ptsp5/detail_ptsp05', $data_detail);
        } elseif ($id_layanan == 6) {
            $this->load->view('pemohon/ptsp6/detail_ptsp06', $data_detail);
        } elseif ($id_layanan == 7) {
            $this->load->view('pemohon/ptsp7/detail_ptsp07', $data_detail);
        } elseif ($id_layanan == 8) {
            $this->load->view('pemohon/ptsp8/detail_ptsp08', $data_detail);
        } elseif ($id_layanan == 9) {
            $this->load->view('pemohon/ptsp9/detail_ptsp09', $data_detail);
        } elseif ($id_layanan == 10) {
            $this->load->view('pemohon/ptsp10/detail_ptsp10', $data_detail);
        } elseif ($id_layanan == 11) {
            $this->load->view('pemohon/ptsp11/detail_ptsp11', $data_detail);
        } elseif ($id_layanan == 12) {
            $this->load->view('pemohon/ptsp12/detail_ptsp12', $data_detail);
        } elseif ($id_layanan == 13) {
            $this->load->view('pemohon/ptsp13/detail_ptsp13', $data_detail);
        } elseif ($id_layanan == 14) {
            $this->load->view('pemohon/ptsp14/detail_ptsp14', $data_detail);
        } elseif ($id_layanan == 15) {
            $this->load->view('pemohon/ptsp15/detail_ptsp15', $data_detail);
        } elseif ($id_layanan == 16) {
            $this->load->view('pemohon/ptsp16/detail_ptsp16', $data_detail);
        } elseif ($id_layanan == 17) {
            $this->load->view('pemohon/ptsp17/detail_ptsp17', $data_detail);
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


    //tampil halaman sop ptsp01
    public function sop_ptsp01()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp1/sop_ptsp01');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp01
    public function form_ptsp01()
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
        $this->load->view('pemohon/ptsp1/form_ptsp01', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp01
    public function aksi_pengajuan_ptsp01()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '1',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'pemohon' => $this->input->post('pemohon'),
            'no_hp' => $this->input->post('no_hp'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'nama_acara' => $this->input->post('nama_acara'),
            'hari_acara' => $this->input->post('hari_acara'),
            'tgl_acara' => $this->input->post('tgl_acara'),
            'waktu_acara' => $this->input->post('waktu_acara'),
            'tempat_acara' => $this->input->post('tempat_acara'),
            'Jml_petugas_doa' => $this->input->post('Jml_petugas_doa'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp01');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp01/' . $id_permohonan);
    }
    //menampilkan detail ptsp01
    public function detail_ptsp01($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp01($id_permohonan)->result();
        $data_detail['data_petugas_doa'] = $this->m_pemohon->data_petugas_doa($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp1/detail_ptsp01', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp01
    private function aksi_upload_srt_permohonan_ptsp01($id_ptsp01)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp01/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp01)->get('ptsp01')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp01/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp01);
                $this->db->update('ptsp01', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp01
    public function update_srt_permohonan_ptsp01($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp01($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp01/' . $permohonan);
    }
    //tampil form ubah ptsp01
    public function form_ubah_ptsp01($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp01($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp1/form_ubah_ptsp01', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp01
    public function aksi_update_pengajuan_ptsp01($id_permohonan)
    {
        $data_ptsp = array(
            'pemohon' => $this->input->post('pemohon'),
            'no_hp' => $this->input->post('no_hp'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'nama_acara' => $this->input->post('nama_acara'),
            'hari_acara' => $this->input->post('hari_acara'),
            'tgl_acara' => $this->input->post('tgl_acara'),
            'waktu_acara' => $this->input->post('waktu_acara'),
            'tempat_acara' => $this->input->post('tempat_acara'),
            'Jml_petugas_doa' => $this->input->post('Jml_petugas_doa'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp01');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp01/' . $id_permohonan);
    }


    //tampil halaman sop ptsp02
    public function sop_ptsp02()
    {
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp2/sop_ptsp02');
        $this->load->view('footer');
    }
    //tampil halaman form pengajuan ptsp02
    public function form_ptsp02()
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
        $this->load->view('pemohon/ptsp2/form_ptsp02', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp02
    public function aksi_pengajuan_ptsp02()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '2',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'pemohon' => $this->input->post('pemohon'),
            'no_hp' => $this->input->post('no_hp'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'hari_kegiatan' => $this->input->post('hari_kegiatan'),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
            'waktu_kegiatan' => $this->input->post('waktu_kegiatan'),
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'jml_peserta' => $this->input->post('jml_peserta'),
            'agenda_kegiatan' => $this->input->post('agenda_kegiatan'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp02');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp02/' . $id_permohonan);
    }
    //menampilkan detail ptsp02
    public function detail_ptsp02($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp02($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp2/detail_ptsp02', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp02
    private function aksi_upload_srt_permohonan_ptsp02($id_ptsp02)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp02/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp02)->get('ptsp02')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp02/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp02);
                $this->db->update('ptsp02', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp02
    public function update_srt_permohonan_ptsp02($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp02($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp02/' . $permohonan);
    }
    //tampil form ubah ptsp02
    public function form_ubah_ptsp02($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        // $id_permohonan
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        // $data_detail['detail_permohonan'] = $this->m_pemohon->get_data_permohonan($id_permohonan, 'permohonan_ptsp')->result();
        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp02($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp2/form_ubah_ptsp02', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp02
    public function aksi_update_pengajuan_ptsp02($id_permohonan)
    {
        $data_ptsp = array(
            'pemohon' => $this->input->post('pemohon'),
            'no_hp' => $this->input->post('no_hp'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'hari_kegiatan' => $this->input->post('hari_kegiatan'),
            'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
            'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
            'waktu_kegiatan' => $this->input->post('waktu_kegiatan'),
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'jml_peserta' => $this->input->post('jml_peserta'),
            'agenda_kegiatan' => $this->input->post('agenda_kegiatan'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp02');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp02/' . $id_permohonan);
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
            'keperluan_legalisir_ijazah' => $this->input->post('keperluan_legalisir_ijazah'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp03');


        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp03/' . $id_permohonan);
    }
    //upload fc_ijazah ptsp03
    private function aksi_upload_fc_ijazah_ptsp03($id_ptsp03)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp03/fc_ijazah/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_ijazah-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_ijazah']['name'])) {
            if ($this->upload->do_upload('fc_ijazah')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp03)->get('ptsp03')->row();

                //replace foto lama 
                if ($item->fc_ijazah != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp03/fc_ijazah/' . $item->fc_ijazah;
                    unlink($target_file);
                }

                $data['fc_ijazah'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp03);
                $this->db->update('ptsp03', $data);
            }
        }
    }
    // upload ulang fc_ijazah ptsp03
    public function update_fc_ijazah_ptsp03($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_ijazah_ptsp03($id_ptsp);
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
            'keperluan_legalisir_ijazah' => $this->input->post('keperluan_legalisir_ijazah'),
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
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'keperluan_legalisir_dokumen' => $this->input->post('keperluan_legalisir_dokumen'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp04');


        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $id_permohonan);
    }
    //upload fc_dokumen ptsp04
    private function aksi_upload_fc_dokumen_ptsp04($id_ptsp04)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp04/fc_dokumen/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_dokumen']['name'])) {
            if ($this->upload->do_upload('fc_dokumen')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp04)->get('ptsp04')->row();

                //replace foto lama 
                if ($item->fc_dokumen != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp04/fc_dokumen/' . $item->fc_dokumen;
                    unlink($target_file);
                }

                $data['fc_dokumen'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp04);
                $this->db->update('ptsp04', $data);
            }
        }
    }
    // upload ulang fc_dokumen ptsp04
    public function update_fc_dokumen_ptsp04($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_dokumen_ptsp04($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $permohonan);
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
            'keperluan_legalisir_dokumen' => $this->input->post('keperluan_legalisir_dokumen'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp04');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp04/' . $id_permohonan);
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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nomor_porsi' => $this->input->post('nomor_porsi'),
            'tahun_angkatan_haji_hijriah' => $this->input->post('tahun_angkatan_haji_hijriah'),
            'tahun_angkatan_haji_masehi' => $this->input->post('tahun_angkatan_haji_masehi'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
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
                if ($item->fc_ktp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp05/fc_ktp/' . $item->fc_ktp;
                    unlink($target_file);
                }

                $data['fc_ktp'] = $uploadData['file_name'];

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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'nomor_porsi' => $this->input->post('nomor_porsi'),
            'tahun_angkatan_haji_hijriah' => $this->input->post('tahun_angkatan_haji_hijriah'),
            'tahun_angkatan_haji_masehi' => $this->input->post('tahun_angkatan_haji_masehi'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
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
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_agen' => $this->input->post('nama_agen'),
            'no_sk_agen' => $this->input->post('no_sk_agen'),
            'tahun_sk' => $this->input->post('tahun_sk'),
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
    //upload fc_sk_ijin_operasi ptsp06
    private function aksi_upload_fc_sk_ijin_operasi_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/fc_sk_ijin_operasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_sk_ijin_operasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_sk_ijin_operasi']['name'])) {
            if ($this->upload->do_upload('fc_sk_ijin_operasi')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->fc_sk_ijin_operasi != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/fc_sk_ijin_operasi/' . $item->fc_sk_ijin_operasi;
                    unlink($target_file);
                }

                $data['fc_sk_ijin_operasi'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang fc_sk_ijin_operasi ptsp06
    public function update_fc_sk_ijin_operasi_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_sk_ijin_operasi_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload fc_ktp ptsp06
    private function aksi_upload_fc_ktp_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/fc_ktp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_ktp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_ktp']['name'])) {
            if ($this->upload->do_upload('fc_ktp')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->fc_ktp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/fc_ktp/' . $item->fc_ktp;
                    unlink($target_file);
                }

                $data['fc_ktp'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang fc_ktp ptsp06
    public function update_fc_ktp_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_ktp_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload fc_kk ptsp06
    private function aksi_upload_fc_kk_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/fc_kk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_kk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_kk']['name'])) {
            if ($this->upload->do_upload('fc_kk')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->fc_kk != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/fc_kk/' . $item->kk;
                    unlink($target_file);
                }

                $data['fc_kk'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang fc_kk ptsp06
    public function update_fc_kk_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_kk_ptsp06($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $permohonan);
    }
    //upload fc_dokumen ptsp06
    private function aksi_upload_fc_dokumen_ptsp06($id_ptsp06)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp06/fc_dokumen/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'fc_dokumen-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['fc_dokumen']['name'])) {
            if ($this->upload->do_upload('fc_dokumen')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp06)->get('ptsp06')->row();

                //replace foto lama 
                if ($item->fc_dokumen != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp06/fc_dokumen/' . $item->kk;
                    unlink($target_file);
                }

                $data['fc_dokumen'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp06);
                $this->db->update('ptsp06', $data);
            }
        }
    }
    // upload ulang fc_dokumen ptsp06
    public function update_fc_dokumen_ptsp06($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_fc_dokumen_ptsp06($id_ptsp);
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
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_agen' => $this->input->post('nama_agen'),
            'no_sk_agen' => $this->input->post('no_sk_agen'),
            'tahun_sk' => $this->input->post('tahun_sk'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp06');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp06/' . $id_permohonan);
    }


    //tampil sop ptsp07
    public function sop_ptsp07()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp7/sop_ptsp07');
        $this->load->view('footer');
    }
    //tampil form ptsp07
    public function form_ptsp07()
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
        $this->load->view('pemohon/ptsp7/form_ptsp07', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp07
    public function aksi_pengajuan_ptsp07()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '7',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->input->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->input->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->input->post('alamat_kantor'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp07');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $id_permohonan);
    }
    //upload surat permohonan ptsp07
    private function aksi_upload_srt_permohonan_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp07
    public function update_srt_permohonan_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //upload akte_notaris ptsp07
    private function aksi_upload_akte_notaris_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/akte_notaris/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['akte_notaris']['name'])) {
            if ($this->upload->do_upload('akte_notaris')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->akte_notaris != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/akte_notaris/' . $item->akte_notaris;
                    unlink($target_file);
                }

                $data['akte_notaris'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang akte_notaris ptsp07
    public function update_akte_notaris_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_akte_notaris_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //upload foto_kantor ptsp07
    private function aksi_upload_foto_kantor_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/foto_kantor/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'foto_kantor-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['foto_kantor']['name'])) {
            if ($this->upload->do_upload('foto_kantor')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->foto_kantor != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/foto_kantor/' . $item->foto_kantor;
                    unlink($target_file);
                }

                $data['foto_kantor'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang foto_kantor ptsp07
    public function update_foto_kantor_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_foto_kantor_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //upload susunan_pengurusn ptsp07
    private function aksi_upload_susunan_pengurus_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/susunan_pengurus/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['susunan_pengurus']['name'])) {
            if ($this->upload->do_upload('susunan_pengurus')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->susunan_pengurus != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/susunan_pengurus/' . $item->susunan_pengurus;
                    unlink($target_file);
                }

                $data['susunan_pengurus'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang susunan_pengurus ptsp07
    public function update_susunan_pengurus_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_susunan_pengurus_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //upload sertifikat_pembimbing ptsp07
    private function aksi_upload_sertifikat_pembimbing_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/sertifikat_pembimbing/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sertifikat_pembimbing-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sertifikat_pembimbing']['name'])) {
            if ($this->upload->do_upload('sertifikat_pembimbing')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->sertifikat_pembimbing != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/sertifikat_pembimbing/' . $item->sertifikat_pembimbing;
                    unlink($target_file);
                }

                $data['sertifikat_pembimbing'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang sertifikat_pembimbing ptsp07
    public function update_sertifikat_pembimbing_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sertifikat_pembimbing_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //upload surat permohonan ptsp07
    private function aksi_upload_program_manasik_ptsp07($id_ptsp07)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp07/program_manasik/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'program_manasik-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['program_manasik']['name'])) {
            if ($this->upload->do_upload('program_manasik')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp07)->get('ptsp07')->row();

                //replace foto lama 
                if ($item->program_manasik != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp07/program_manasik/' . $item->program_manasik;
                    unlink($target_file);
                }

                $data['program_manasik'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp07);
                $this->db->update('ptsp07', $data);
            }
        }
    }
    // upload ulang program_manasik ptsp07
    public function update_program_manasik_ptsp07($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_program_manasik_ptsp07($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $permohonan);
    }
    //tampil detail ptsp07
    public function detail_ptsp07($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp07($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp7/detail_ptsp07', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp07
    public function form_ubah_ptsp07($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp07($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp7/form_ubah_ptsp07', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp07
    public function aksi_update_pengajuan_ptsp07($id_permohonan)
    {
        $data_ptsp = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->input->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->input->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->input->post('alamat_kantor'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp07');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp07/' . $id_permohonan);
    }


    //tampil sop ptsp08
    public function sop_ptsp08()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp8/sop_ptsp08');
        $this->load->view('footer');
    }
    //tampil form ptsp08
    public function form_ptsp08()
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
        $this->load->view('pemohon/ptsp8/form_ptsp08', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp08
    public function aksi_pengajuan_ptsp08()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '8',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->input->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->input->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->input->post('alamat_kantor'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp08');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $id_permohonan);
    }
    //upload surat permohonan ptsp08
    private function aksi_upload_srt_permohonan_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp08
    public function update_srt_permohonan_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload akte_notaris ptsp08
    private function aksi_upload_akte_notaris_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/akte_notaris/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['akte_notaris']['name'])) {
            if ($this->upload->do_upload('akte_notaris')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->akte_notaris != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/akte_notaris/' . $item->akte_notaris;
                    unlink($target_file);
                }

                $data['akte_notaris'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang akte_notaris ptsp08
    public function update_akte_notaris_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_akte_notaris_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload foto_kantor ptsp08
    private function aksi_upload_foto_kantor_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/foto_kantor/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'foto_kantor-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['foto_kantor']['name'])) {
            if ($this->upload->do_upload('foto_kantor')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->foto_kantor != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/foto_kantor/' . $item->foto_kantor;
                    unlink($target_file);
                }

                $data['foto_kantor'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang foto_kantor ptsp08
    public function update_foto_kantor_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_foto_kantor_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload susunan_pengurusn ptsp08
    private function aksi_upload_susunan_pengurus_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/susunan_pengurus/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['susunan_pengurus']['name'])) {
            if ($this->upload->do_upload('susunan_pengurus')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->susunan_pengurus != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/susunan_pengurus/' . $item->susunan_pengurus;
                    unlink($target_file);
                }

                $data['susunan_pengurus'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang susunan_pengurus ptsp08
    public function update_susunan_pengurus_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_susunan_pengurus_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload sertifikat_pembimbing ptsp08
    private function aksi_upload_sertifikat_pembimbing_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_pembimbing/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sertifikat_pembimbing-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sertifikat_pembimbing']['name'])) {
            if ($this->upload->do_upload('sertifikat_pembimbing')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->sertifikat_pembimbing != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_pembimbing/' . $item->sertifikat_pembimbing;
                    unlink($target_file);
                }

                $data['sertifikat_pembimbing'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang sertifikat_pembimbing ptsp08
    public function update_sertifikat_pembimbing_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sertifikat_pembimbing_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload surat permohonan ptsp08
    private function aksi_upload_program_manasik_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/program_manasik/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'program_manasik-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['program_manasik']['name'])) {
            if ($this->upload->do_upload('program_manasik')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->program_manasik != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/program_manasik/' . $item->program_manasik;
                    unlink($target_file);
                }

                $data['program_manasik'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang program_manasik ptsp08
    public function update_program_manasik_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_program_manasik_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload laporan_bimbingan ptsp08
    private function aksi_upload_laporan_bimbingan_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/laporan_bimbingan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'laporan_bimbingan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['laporan_bimbingan']['name'])) {
            if ($this->upload->do_upload('laporan_bimbingan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->laporan_bimbingan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/laporan_bimbingan/' . $item->laporan_bimbingan;
                    unlink($target_file);
                }

                $data['laporan_bimbingan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang laporan_bimbingan ptsp08
    public function update_laporan_bimbingan_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_laporan_bimbingan_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload sertifikat_akreditasi ptsp08
    private function aksi_upload_sertifikat_akreditasi_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_akreditasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sertifikat_akreditasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sertifikat_akreditasi']['name'])) {
            if ($this->upload->do_upload('sertifikat_akreditasi')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->sertifikat_akreditasi != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/sertifikat_akreditasi/' . $item->sertifikat_akreditasi;
                    unlink($target_file);
                }

                $data['sertifikat_akreditasi'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang sertifikat_akreditasi ptsp08
    public function update_sertifikat_akreditasi_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sertifikat_akreditasi_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload sk_pendirian ptsp08
    private function aksi_upload_sk_pendirian_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/sk_pendirian/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sk_pendirian-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sk_pendirian']['name'])) {
            if ($this->upload->do_upload('sk_pendirian')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->sk_pendirian != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/sk_pendirian/' . $item->sk_pendirian;
                    unlink($target_file);
                }

                $data['sk_pendirian'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang sk_pendirian ptsp08
    public function update_sk_pendirian_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sk_pendirian_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //upload rincian_penggunaan_biaya_bimbingan ptsp08
    private function aksi_upload_rincian_penggunaan_biaya_bimbingan_ptsp08($id_ptsp08)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp08/rincian_penggunaan_biaya_bimbingan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'rincian_penggunaan_biaya_bimbingan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['rincian_penggunaan_biaya_bimbingan']['name'])) {
            if ($this->upload->do_upload('rincian_penggunaan_biaya_bimbingan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp08)->get('ptsp08')->row();

                //replace foto lama 
                if ($item->rincian_penggunaan_biaya_bimbingan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp08/rincian_penggunaan_biaya_bimbingan/' . $item->rincian_penggunaan_biaya_bimbingan;
                    unlink($target_file);
                }

                $data['rincian_penggunaan_biaya_bimbingan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp08);
                $this->db->update('ptsp08', $data);
            }
        }
    }
    // upload ulang rincian_penggunaan_biaya_bimbingan ptsp08
    public function update_rincian_penggunaan_biaya_bimbingan_ptsp08($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_rincian_penggunaan_biaya_bimbingan_ptsp08($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $permohonan);
    }
    //tampil detail ptsp08
    public function detail_ptsp08($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp08($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp8/detail_ptsp08', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp08
    public function form_ubah_ptsp08($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp08($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp8/form_ubah_ptsp08', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp08
    public function aksi_update_pengajuan_ptsp08($id_permohonan)
    {
        $data_ptsp = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'nama_kelompok_bimbingan' => $this->input->post('nama_kelompok_bimbingan'),
            'domisili_kelompok_bimbingan' => $this->input->post('domisili_kelompok_bimbingan'),
            'alamat_kantor' => $this->input->post('alamat_kantor'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp08');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp08/' . $id_permohonan);
    }


    //tampil sop ptsp09
    public function sop_ptsp09()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp9/sop_ptsp09');
        $this->load->view('footer');
    }
    //tampil form ptsp09
    public function form_ptsp09()
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
        $this->load->view('pemohon/ptsp9/form_ptsp09', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp09
    public function aksi_pengajuan_ptsp09()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '9',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_pt' => $this->input->post('nama_pt'),
            'nama_kantor_cabang' => $this->input->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->input->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->input->post('alamat_kantor_cabang'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp09');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $id_permohonan);
    }
    //tampil detail ptsp09
    public function detail_ptsp09($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp09($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp9/detail_ptsp09', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp09
    public function form_ubah_ptsp09($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp09($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp9/form_ubah_ptsp09', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan ptsp09
    public function aksi_update_pengajuan_ptsp09($id_permohonan)
    {
        $data_ptsp = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_pt' => $this->input->post('nama_pt'),
            'nama_kantor_cabang' => $this->input->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->input->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->input->post('alamat_kantor_cabang'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp09');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $id_permohonan);
    }
    //upload srt_permohonan ptsp09
    private function aksi_upload_srt_permohonan_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang srt_permohonan ptsp09
    public function update_srt_permohonan_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload akte_notaris ptsp09
    private function aksi_upload_akte_notaris_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/akte_notaris/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['akte_notaris']['name'])) {
            if ($this->upload->do_upload('akte_notaris')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->akte_notaris != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/akte_notaris/' . $item->akte_notaris;
                    unlink($target_file);
                }

                $data['akte_notaris'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang akte_notaris ptsp09
    public function update_akte_notaris_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_akte_notaris_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload izin_usaha ptsp09
    private function aksi_upload_izin_usaha_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/izin_usaha/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'izin_usaha' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['izin_usaha']['name'])) {
            if ($this->upload->do_upload('izin_usaha')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->izin_usaha != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/izin_usaha/' . $item->izin_usaha;
                    unlink($target_file);
                }

                $data['izin_usaha'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang izin_usaha ptsp09
    public function update_izin_usaha_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_izin_usaha_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload skud ptsp09
    private function aksi_upload_skud_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/skud/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'skud-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['skud']['name'])) {
            if ($this->upload->do_upload('skud')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->skud != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/skud/' . $item->skud;
                    unlink($target_file);
                }

                $data['skud'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang skud ptsp09
    public function update_skud_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_skud_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload npwp ptsp09
    private function aksi_upload_npwp_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/npwp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'npwp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['npwp']['name'])) {
            if ($this->upload->do_upload('npwp')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->npwp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/npwp/' . $item->npwp;
                    unlink($target_file);
                }

                $data['npwp'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang npwp ptsp09
    public function update_npwp_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_npwp_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload srt_rekomendasi_pemkab ptsp09
    private function aksi_upload_srt_rekomendasi_pemkab_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/srt_rekomendasi_pemkab/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_rekomendasi_pemkab-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_rekomendasi_pemkab']['name'])) {
            if ($this->upload->do_upload('srt_rekomendasi_pemkab')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->srt_rekomendasi_pemkab != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/srt_rekomendasi_pemkab/' . $item->srt_rekomendasi_pemkab;
                    unlink($target_file);
                }

                $data['srt_rekomendasi_pemkab'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang srt_rekomendasi_pemkab ptsp09
    public function update_srt_rekomendasi_pemkab_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_rekomendasi_pemkab_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload laporan_keuangan ptsp09
    private function aksi_upload_laporan_keuangan_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/laporan_keuangan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'laporan_keuangan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['laporan_keuangan']['name'])) {
            if ($this->upload->do_upload('laporan_keuangan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->laporan_keuangan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/laporan_keuangan/' . $item->laporan_keuangan;
                    unlink($target_file);
                }

                $data['laporan_keuangan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang laporan_keuangan ptsp09
    public function update_laporan_keuangan_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_laporan_keuangan_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload susunan_pengurus ptsp09
    private function aksi_upload_susunan_pengurus_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/susunan_pengurus/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['susunan_pengurus']['name'])) {
            if ($this->upload->do_upload('susunan_pengurus')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->susunan_pengurus != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/susunan_pengurus/' . $item->susunan_pengurus;
                    unlink($target_file);
                }

                $data['susunan_pengurus'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang susunan_pengurus ptsp09
    public function update_susunan_pengurus_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_susunan_pengurus_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload data_pemegang_saham ptsp09
    private function aksi_upload_data_pemegang_saham_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/data_pemegang_saham/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'data_pemegang_saham-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['data_pemegang_saham']['name'])) {
            if ($this->upload->do_upload('data_pemegang_saham')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->data_pemegang_saham != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/data_pemegang_saham/' . $item->data_pemegang_saham;
                    unlink($target_file);
                }

                $data['data_pemegang_saham'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang data_pemegang_saham ptsp09
    public function update_data_pemegang_saham_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_data_pemegang_saham_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }
    //upload data_direksi_komisaris ptsp09
    private function aksi_upload_data_direksi_komisaris_ptsp09($id_ptsp09)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp09/data_direksi_komisaris/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'data_direksi_komisaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['data_direksi_komisaris']['name'])) {
            if ($this->upload->do_upload('data_direksi_komisaris')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp09)->get('ptsp09')->row();

                //replace foto lama 
                if ($item->data_direksi_komisaris != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp09/data_direksi_komisaris/' . $item->data_direksi_komisaris;
                    unlink($target_file);
                }

                $data['data_direksi_komisaris'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp09);
                $this->db->update('ptsp09', $data);
            }
        }
    }
    // upload ulang data_direksi_komisaris ptsp09
    public function update_data_direksi_komisaris_ptsp09($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_data_direksi_komisaris_ptsp09($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp09/' . $permohonan);
    }


    //tampil sop ptsp10
    public function sop_ptsp10()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp10/sop_ptsp10');
        $this->load->view('footer');
    }
    //tampil form ptsp10
    public function form_ptsp10()
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
        $this->load->view('pemohon/ptsp10/form_ptsp10', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp10
    public function aksi_pengajuan_ptsp10()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '10',
            'sie' => 'PHU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_pt' => $this->input->post('nama_pt'),
            'nama_kantor_cabang' => $this->input->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->input->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->input->post('alamat_kantor_cabang'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp10');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $id_permohonan);
    }
    //tampil detail ptsp10
    public function detail_ptsp10($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp10($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp10/detail_ptsp10', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp10
    public function form_ubah_ptsp10($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp10($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp10/form_ubah_ptsp10', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts10
    public function aksi_update_pengajuan_ptsp10($id_permohonan)
    {
        $data_ptsp = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'nama_pt' => $this->input->post('nama_pt'),
            'nama_kantor_cabang' => $this->input->post('nama_kantor_cabang'),
            'domisili_kantor_cabang' => $this->input->post('domisili_kantor_cabang'),
            'alamat_kantor_cabang' => $this->input->post('alamat_kantor_cabang'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp10');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $id_permohonan);
    }
    //upload srt_permohonan ptsp10
    private function aksi_upload_srt_permohonan_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang srt_permohonan ptsp10
    public function update_srt_permohonan_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload akte_notaris ptsp10
    private function aksi_upload_akte_notaris_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/akte_notaris/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'akte_notaris-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['akte_notaris']['name'])) {
            if ($this->upload->do_upload('akte_notaris')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->akte_notaris != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/akte_notaris/' . $item->akte_notaris;
                    unlink($target_file);
                }

                $data['akte_notaris'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang akte_notaris ptsp10
    public function update_akte_notaris_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_akte_notaris_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload izin_usaha ptsp10
    private function aksi_upload_izin_usaha_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/izin_usaha/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'izin_usaha' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['izin_usaha']['name'])) {
            if ($this->upload->do_upload('izin_usaha')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->izin_usaha != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/izin_usaha/' . $item->izin_usaha;
                    unlink($target_file);
                }

                $data['izin_usaha'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang izin_usaha ptsp10
    public function update_izin_usaha_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_izin_usaha_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload skud ptsp10
    private function aksi_upload_skud_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/skud/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'skud-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['skud']['name'])) {
            if ($this->upload->do_upload('skud')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->skud != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/skud/' . $item->skud;
                    unlink($target_file);
                }

                $data['skud'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang skud ptsp10
    public function update_skud_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_skud_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload npwp ptsp10
    private function aksi_upload_npwp_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/npwp/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'npwp-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['npwp']['name'])) {
            if ($this->upload->do_upload('npwp')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->npwp != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/npwp/' . $item->npwp;
                    unlink($target_file);
                }

                $data['npwp'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang npwp ptsp10
    public function update_npwp_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_npwp_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload srt_rekomendasi_pemkab ptsp10
    private function aksi_upload_srt_rekomendasi_pemkab_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/srt_rekomendasi_pemkab/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_rekomendasi_pemkab-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_rekomendasi_pemkab']['name'])) {
            if ($this->upload->do_upload('srt_rekomendasi_pemkab')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->srt_rekomendasi_pemkab != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/srt_rekomendasi_pemkab/' . $item->srt_rekomendasi_pemkab;
                    unlink($target_file);
                }

                $data['srt_rekomendasi_pemkab'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang srt_rekomendasi_pemkab ptsp10
    public function update_srt_rekomendasi_pemkab_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_rekomendasi_pemkab_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload laporan_keuangan ptsp10
    private function aksi_upload_laporan_keuangan_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/laporan_keuangan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'laporan_keuangan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['laporan_keuangan']['name'])) {
            if ($this->upload->do_upload('laporan_keuangan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->laporan_keuangan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/laporan_keuangan/' . $item->laporan_keuangan;
                    unlink($target_file);
                }

                $data['laporan_keuangan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang laporan_keuangan ptsp10
    public function update_laporan_keuangan_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_laporan_keuangan_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload susunan_pengurus ptsp10
    private function aksi_upload_susunan_pengurus_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/susunan_pengurus/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'susunan_pengurus-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['susunan_pengurus']['name'])) {
            if ($this->upload->do_upload('susunan_pengurus')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->susunan_pengurus != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/susunan_pengurus/' . $item->susunan_pengurus;
                    unlink($target_file);
                }

                $data['susunan_pengurus'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang susunan_pengurus ptsp10
    public function update_susunan_pengurus_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_susunan_pengurus_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload sk ptsp10
    private function aksi_upload_sk_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/sk/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'sk-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['sk']['name'])) {
            if ($this->upload->do_upload('sk')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->sk != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/sk/' . $item->sk;
                    unlink($target_file);
                }

                $data['sk'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang sk ptsp10
    public function update_sk_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_sk_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }
    //upload bukti_pemberangkatan ptsp10
    private function aksi_upload_bukti_pemberangkatan_ptsp10($id_ptsp10)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp10/bukti_pemberangkatan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'bukti_pemberangkatan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['bukti_pemberangkatan']['name'])) {
            if ($this->upload->do_upload('bukti_pemberangkatan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp10)->get('ptsp10')->row();

                //replace foto lama 
                if ($item->bukti_pemberangkatan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp10/bukti_pemberangkatan/' . $item->bukti_pemberangkatan;
                    unlink($target_file);
                }

                $data['bukti_pemberangkatan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp10);
                $this->db->update('ptsp10', $data);
            }
        }
    }
    // upload ulang bukti_pemberangkatan ptsp10
    public function update_bukti_pemberangkatan_ptsp10($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_bukti_pemberangkatan_ptsp10($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp10/' . $permohonan);
    }


    //tampil sop ptsp11
    public function sop_ptsp11()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp11/sop_ptsp11');
        $this->load->view('footer');
    }
    //tampil form ptsp11
    public function form_ptsp11()
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
        $this->load->view('pemohon/ptsp11/form_ptsp11', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp11
    public function aksi_pengajuan_ptsp11()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '11',
            'sie' => 'Penmad',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'nama_sekolah_asal' => $this->input->post('nama_sekolah_asal'),
            'no_srt_rek_sekolah_asal' => $this->input->post('no_srt_rek_sekolah_asal'),
            'tgl_srt_rek_sekolah_asal' => $this->input->post('tgl_srt_rek_sekolah_asal'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tempat_lahir_siswa' => $this->input->post('tempat_lahir_siswa'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir_siswa' => $this->input->post('tgl_lahir_siswa'),
            'nisn' => $this->input->post('nisn'),
            'kelas' => $this->input->post('kelas'),
            'alasan_pindah' => $this->input->post('alasan_pindah'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp11');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp11/' . $id_permohonan);
    }
    //tampil detail ptsp11
    public function detail_ptsp11($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp11($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp11/detail_ptsp11', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp11
    public function form_ubah_ptsp11($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp11($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp11/form_ubah_ptsp11', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts11
    public function aksi_update_pengajuan_ptsp11($id_permohonan)
    {
        $data_ptsp = array(
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'nama_sekolah_asal' => $this->input->post('nama_sekolah_asal'),
            'no_srt_rek_sekolah_asal' => $this->input->post('no_srt_rek_sekolah_asal'),
            'tgl_srt_rek_sekolah_asal' => $this->input->post('tgl_srt_rek_sekolah_asal'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'tempat_lahir_siswa' => $this->input->post('tempat_lahir_siswa'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tgl_lahir_siswa' => $this->input->post('tgl_lahir_siswa'),
            'nisn' => $this->input->post('nisn'),
            'kelas' => $this->input->post('kelas'),
            'alasan_pindah' => $this->input->post('alasan_pindah'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp11');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp11/' . $id_permohonan);
    }
    //upload srt_rekomendasi ptsp11
    private function aksi_upload_srt_rekomendasi_ptsp11($id_ptsp11)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp11/srt_rekomendasi/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_rekomendasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_rekomendasi']['name'])) {
            if ($this->upload->do_upload('srt_rekomendasi')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp11)->get('ptsp11')->row();

                //replace foto lama 
                if ($item->srt_rekomendasi != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp11/srt_rekomendasi/' . $item->srt_rekomendasi;
                    unlink($target_file);
                }

                $data['srt_rekomendasi'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp11);
                $this->db->update('ptsp11', $data);
            }
        }
    }
    // upload srt_rekomendasi ptsp11
    public function update_srt_rekomendasi_ptsp11($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_rekomendasi_ptsp11($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp11/' . $permohonan);
    }
    //upload srt_penerimaan ptsp11
    private function aksi_upload_srt_penerimaan_ptsp11($id_ptsp11)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp11/srt_penerimaan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_penerimaan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_penerimaan']['name'])) {
            if ($this->upload->do_upload('srt_penerimaan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp11)->get('ptsp11')->row();

                //replace foto lama 
                if ($item->srt_penerimaan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp11/srt_penerimaan/' . $item->srt_penerimaan;
                    unlink($target_file);
                }

                $data['srt_penerimaan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp11);
                $this->db->update('ptsp11', $data);
            }
        }
    }
    // upload ulang srt_penerimaan ptsp11
    public function update_srt_penerimaan_ptsp11($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_penerimaan_ptsp11($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp11/' . $permohonan);
    }
    //upload raport ptsp11
    private function aksi_upload_raport_ptsp11($id_ptsp11)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp11/raport/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'raport-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['raport']['name'])) {
            if ($this->upload->do_upload('raport')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp11)->get('ptsp11')->row();

                //replace foto lama 
                if ($item->raport != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp11/raport/' . $item->raport;
                    unlink($target_file);
                }

                $data['raport'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp11);
                $this->db->update('ptsp11', $data);
            }
        }
    }
    // upload ulang raport ptsp11
    public function update_raport_ptsp11($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_raport_ptsp11($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp11/' . $permohonan);
    }


    //tampil sop ptsp12
    public function sop_ptsp12()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp12/sop_ptsp12');
        $this->load->view('footer');
    }
    //tampil form ptsp12
    public function form_ptsp12()
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
        $this->load->view('pemohon/ptsp12/form_ptsp12', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp12
    public function aksi_pengajuan_ptsp12()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '12',
            'sie' => 'Penmad',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_tujuan' => $this->input->post('nama_tujuan'),
            'tempat_tujuan' => $this->input->post('tempat_tujuan'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'keperluan' => $this->input->post('keperluan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp12');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp12/' . $id_permohonan);
    }
    //tampil detail ptsp12
    public function detail_ptsp12($id_permohonan)
    {
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp12($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp12/detail_ptsp12', $data_detail);
        $this->load->view('footer');
    }
    //upload proposal permohonan ptsp12
    private function aksi_upload_proposal_permohonan_ptsp12($id_ptsp12)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp12/proposal_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal_permohonan']['name'])) {
            if ($this->upload->do_upload('proposal_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp12)->get('ptsp12')->row();

                //replace foto lama 
                if ($item->proposal_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp12/proposal_permohonan/' . $item->proposal_permohonan;
                    unlink($target_file);
                }

                $data['proposal_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp12);
                $this->db->update('ptsp12', $data);
            }
        }
    }
    // upload ulang proposal permohonan ptsp12
    public function update_proposal_permohonan_ptsp12($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_permohonan_ptsp12($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp12/' . $permohonan);
    }
    //tampil form ubah ptsp12
    public function form_ubah_ptsp12($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp12($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp12/form_ubah_ptsp12', $data_detail);
        $this->load->view('footer');
    }
    // aksi update permohonan pts12
    public function aksi_update_pengajuan_ptsp12($id_permohonan)
    {
        $data_ptsp = array(
            'nama_tujuan' => $this->input->post('nama_tujuan'),
            'tempat_tujuan' => $this->input->post('tempat_tujuan'),
            'nama_sekolah' => $this->input->post('nama_sekolah'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'keperluan' => $this->input->post('keperluan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp12');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp12/' . $id_permohonan);
    }


    //tampil sop ptsp13
    public function sop_ptsp13()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp13/sop_ptsp13');
        $this->load->view('footer');
    }
    //tampil form ptsp13
    public function form_ptsp13()
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
        $this->load->view('pemohon/ptsp13/form_ptsp13', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp13
    public function aksi_pengajuan_ptsp13()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '13',
            'sie' => 'Penmad',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'no_srt_pemohon' => $this->input->post('no_srt_pemohon'),
            'tgl_srt_pemohon' => $this->input->post('tgl_srt_pemohon'),
            'hal_srt_pemohon' => $this->input->post('hal_srt_pemohon'),
            'nama_calon_madrasah' => $this->input->post('nama_calon_madrasah'),
            'alamat_calon_madrasah' => $this->input->post('alamat_calon_madrasah'),
            'nama_calon_madrasah' => $this->input->post('nama_calon_madrasah'),
            'akte_notaris' => $this->input->post('akte_notaris'),
            'pengesahan_akte_notaris' => $this->input->post('pengesahan_akte_notaris'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp13');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp13/' . $id_permohonan);
    }
    //tampil detail ptsp13
    public function detail_ptsp13($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp13($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp13/detail_ptsp13', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp13
    private function aksi_upload_srt_permohonan_ptsp13($id_ptsp13)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp13/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp13)->get('ptsp13')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp13/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp13);
                $this->db->update('ptsp13', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp13
    public function update_srt_permohonan_ptsp13($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp13($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp13/' . $permohonan);
    }
    //upload proposal ptsp13
    private function aksi_upload_proposal_ptsp13($id_ptsp13)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp13/proposal/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal']['name'])) {
            if ($this->upload->do_upload('proposal')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp13)->get('ptsp13')->row();

                //replace foto lama 
                if ($item->proposal != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp13/proposal/' . $item->proposal;
                    unlink($target_file);
                }

                $data['proposal'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp13);
                $this->db->update('ptsp13', $data);
            }
        }
    }
    // upload ulang proposal ptsp13
    public function update_proposal_ptsp13($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_ptsp13($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp13/' . $permohonan);
    }
    //tampil form ubah ptsp13
    public function form_ubah_ptsp13($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp13($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp13/form_ubah_ptsp13', $data_detail);
        $this->load->view('footer');
    }
    //tampil preview ptsp13
    public function tampil_ptsp13()
    {
        $data_title['title'] = 'Preview Surat';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp13/tampil_ptsp13');
        $this->load->view('footer');
    }
    // aksi update permohonan pts13
    public function aksi_update_pengajuan_ptsp13($id_permohonan)
    {
        $data_ptsp = array(
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'no_srt_pemohon' => $this->input->post('no_srt_pemohon'),
            'tgl_srt_pemohon' => $this->input->post('tgl_srt_pemohon'),
            'hal_srt_pemohon' => $this->input->post('hal_srt_pemohon'),
            'nama_calon_madrasah' => $this->input->post('nama_calon_madrasah'),
            'alamat_calon_madrasah' => $this->input->post('alamat_calon_madrasah'),
            'nama_calon_madrasah' => $this->input->post('nama_calon_madrasah'),
            'akte_notaris' => $this->input->post('akte_notaris'),
            'pengesahan_akte_notaris' => $this->input->post('pengesahan_akte_notaris'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp13');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp13/' . $id_permohonan);
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
            'nama_lpq' => $this->input->post('nama_lpq'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'no_sk_menkumham_ri' => $this->input->post('no_sk_menkumham_ri'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'berlaku' => $this->input->post('berlaku'),
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
            'nama_lpq' => $this->input->post('nama_lpq'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'nama_yayasan' => $this->input->post('nama_yayasan'),
            'no_sk_menkumham_ri' => $this->input->post('no_sk_menkumham_ri'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'berlaku' => $this->input->post('berlaku'),
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
            'nama_mtd' => $this->input->post('nama_mtd'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
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
            'nama_mtd' => $this->input->post('nama_mtd'),
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'provinsi' => $this->input->post('provinsi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp15');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp15/' . $id_permohonan);
    }


    //tampil sop ptsp16
    public function sop_ptsp16()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp16/sop_ptsp16');
        $this->load->view('footer');
    }
    //tampil form ptsp16
    public function form_ptsp16()
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
        $this->load->view('pemohon/ptsp16/form_ptsp16', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp16
    public function aksi_pengajuan_ptsp16()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '16',
            'sie' => 'Pontren',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_tujuan' => $this->input->post('nama_tujuan'),
            'tempat_tujuan' => $this->input->post('tempat_tujuan'),
            'nama_instansi_pemohon' => $this->input->post('nama_instansi_pemohon'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'alamat_instansi_pemohon' => $this->input->post('alamat_instansi_pemohon'),
            'jenis_bantuan' => $this->input->post('jenis_bantuan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp16');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp16/' . $id_permohonan);
    }
    //tampil detail ptsp16
    public function detail_ptsp16($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp16($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp16/detail_ptsp16', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp16
    private function aksi_upload_srt_permohonan_ptsp16($id_ptsp16)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp16/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp16)->get('ptsp16')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp16/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp16);
                $this->db->update('ptsp16', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp16
    public function update_srt_permohonan_ptsp16($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp16($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp16/' . $permohonan);
    }
    //upload proposal ptsp16
    private function aksi_upload_proposal_ptsp16($id_ptsp16)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp16/proposal/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'proposal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['proposal']['name'])) {
            if ($this->upload->do_upload('proposal')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp16)->get('ptsp16')->row();

                //replace foto lama 
                if ($item->proposal != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp16/proposal/' . $item->proposal;
                    unlink($target_file);
                }

                $data['proposal'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp16);
                $this->db->update('ptsp16', $data);
            }
        }
    }
    // upload ulang proposal ptsp16
    public function update_proposal_ptsp16($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_proposal_ptsp16($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp16/' . $permohonan);
    }
    //tampil form ubah ptsp16
    public function form_ubah_ptsp16($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp16($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp16/form_ubah_ptsp16', $data_detail);
        $this->load->view('footer');
    }
    //tampil preview ptsp16
    public function tampil_ptsp16()
    {
        $data_title['title'] = 'Preview Surat';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp16/tampil_ptsp16');
        $this->load->view('footer');
    }
    // aksi update permohonan pts16
    public function aksi_update_pengajuan_ptsp16($id_permohonan)
    {
        $data_ptsp = array(
            'nama_tujuan' => $this->input->post('nama_tujuan'),
            'tempat_tujuan' => $this->input->post('tempat_tujuan'),
            'nama_instansi_pemohon' => $this->input->post('nama_instansi_pemohon'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'alamat_instansi_pemohon' => $this->input->post('alamat_instansi_pemohon'),
            'jenis_bantuan' => $this->input->post('jenis_bantuan'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp16');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp16/' . $id_permohonan);
    }


    //tampil sop ptsp17
    public function sop_ptsp17()
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp17/sop_ptsp17');
        $this->load->view('footer');
    }
    //tampil form ptsp17
    public function form_ptsp17()
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
        $this->load->view('pemohon/ptsp17/form_ptsp17', $data_detail);
        $this->load->view('footer');
    }
    // aksi pengajuan ptsp17
    public function aksi_pengajuan_ptsp17()
    {
        $data_permohonan = array(
            'id_pemohon' => $this->session->userdata('id_pemohon'),
            'id_layanan' => '17',
            'sie' => 'Subbag TU',
        );

        $id_permohonan = $this->m_pemohon->tambah_permohonan($data_permohonan);

        $data_ptsp = array(
            'id_permohonan_ptsp' => $id_permohonan,
            'nama_pns' => $this->input->post('nama_pns'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nama_sekolah_satmikal' => $this->input->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->input->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->input->post('kabupaten_sekolah_satmikal'),
            'agama' => $this->input->post('agama'),
            'nip' => $this->input->post('nip'),
            'pangkat_gol' => $this->input->post('pangkat_gol'),
            'jabatan' => $this->input->post('jabatan'),
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->input->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->input->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->input->post('tgl_mulai_mengajar'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->tambah_ptsp($data_ptsp, 'ptsp17');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp17/' . $id_permohonan);
    }
    //tampil detail ptsp17
    public function detail_ptsp17($id_permohonan)
    { // $id_permohonan
        $data_title['title'] = 'Detail Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp17($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp17/detail_ptsp17', $data_detail);
        $this->load->view('footer');
    }
    //tampil form ubah ptsp17
    public function form_ubah_ptsp17($id_permohonan)
    {
        $data_title['title'] = 'Form Ubah Permohonan';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $data_detail['detail_ptsp'] = $this->m_pemohon->get_detail_ptsp17($id_permohonan)->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp17/form_ubah_ptsp17', $data_detail);
        $this->load->view('footer');
    }
    //tampil preview ptsp17
    public function tampil_ptsp17()
    {
        $data_title['title'] = 'Preview Surat';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp17/tampil_ptsp17');
        $this->load->view('footer');
    }
    // aksi update permohonan pts17
    public function aksi_update_pengajuan_ptsp17($id_permohonan)
    {
        $data_ptsp = array(
            'nama_pns' => $this->input->post('nama_pns'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'nama_sekolah_satmikal' => $this->input->post('nama_sekolah_satmikal'),
            'kecamatan_sekolah_satmikal' => $this->input->post('kecamatan_sekolah_satmikal'),
            'kabupaten_sekolah_satmikal' => $this->input->post('kabupaten_sekolah_satmikal'),
            'agama' => $this->input->post('agama'),
            'nip' => $this->input->post('nip'),
            'pangkat_gol' => $this->input->post('pangkat_gol'),
            'jabatan' => $this->input->post('jabatan'),
            'nama_sekolah_tujuan' => $this->input->post('nama_sekolah_tujuan'),
            'kecamatan_sekolah_tujuan' => $this->input->post('kecamatan_sekolah_tujuan'),
            'kabupaten_sekolah_tujuan' => $this->input->post('kabupaten_sekolah_tujuan'),
            'tgl_mulai_mengajar' => $this->input->post('tgl_mulai_mengajar'),
            'no_hp' => $this->input->post('no_hp'),
        );

        $this->m_pemohon->update_ptsp($id_permohonan, $data_ptsp, 'ptsp17');

        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp17/' . $id_permohonan);
    }
    //upload surat permohonan ptsp17
    private function aksi_upload_srt_permohonan_ptsp17($id_ptsp17)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp17/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp17)->get('ptsp17')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp17/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp17);
                $this->db->update('ptsp17', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp17
    public function update_srt_permohonan_ptsp17($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp17($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp17/' . $permohonan);
    }
    //upload srt_persetujuan_sekolah_satmikal ptsp17
    private function aksi_upload_srt_persetujuan_sekolah_satmikal_ptsp17($id_ptsp17)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_satmikal/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_persetujuan_sekolah_satmikal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_persetujuan_sekolah_satmikal']['name'])) {
            if ($this->upload->do_upload('srt_persetujuan_sekolah_satmikal')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp17)->get('ptsp17')->row();

                //replace foto lama 
                if ($item->srt_persetujuan_sekolah_satmikal != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_satmikal/' . $item->srt_persetujuan_sekolah_satmikal;
                    unlink($target_file);
                }

                $data['srt_persetujuan_sekolah_satmikal'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp17);
                $this->db->update('ptsp17', $data);
            }
        }
    }
    // upload ulang srt_persetujuan_sekolah_satmikal ptsp17
    public function update_srt_persetujuan_sekolah_satmikal_ptsp17($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_persetujuan_sekolah_satmikal_ptsp17($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp17/' . $permohonan);
    }
    //upload srt_persetujuan_sekolah_tujuan ptsp17
    private function aksi_upload_srt_persetujuan_sekolah_tujuan_ptsp17($id_ptsp17)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_tujuan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_persetujuan_sekolah_tujuan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_persetujuan_sekolah_tujuan']['name'])) {
            if ($this->upload->do_upload('srt_persetujuan_sekolah_tujuan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp17)->get('ptsp17')->row();

                //replace foto lama 
                if ($item->srt_persetujuan_sekolah_tujuan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp17/srt_persetujuan_sekolah_tujuan/' . $item->srt_persetujuan_sekolah_tujuan;
                    unlink($target_file);
                }

                $data['srt_persetujuan_sekolah_tujuan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp17);
                $this->db->update('ptsp17', $data);
            }
        }
    }
    // upload ulang srt_persetujuan_sekolah_tujuan ptsp17
    public function update_srt_persetujuan_sekolah_tujuan_ptsp17($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_persetujuan_sekolah_tujuan_ptsp17($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp17/' . $permohonan);
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
            'nama_masjid' => $this->input->post('nama_masjid'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'nama_ketua_takmir' => $this->input->post('nama_ketua_takmir'),
            'alamat_masjid' => $this->input->post('alamat_masjid'),
            'no_id_masjid' => $this->input->post('no_id_masjid'),
            'tujuan_rekomendasi_bantuan' => $this->input->post('tujuan_rekomendasi_bantuan'),
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
            'nama_masjid' => $this->input->post('nama_masjid'),
            'no_srt_permohonan' => $this->input->post('no_srt_permohonan'),
            'tgl_srt_permohonan' => $this->input->post('tgl_srt_permohonan'),
            'nama_ketua_takmir' => $this->input->post('nama_ketua_takmir'),
            'alamat_masjid' => $this->input->post('alamat_masjid'),
            'no_id_masjid' => $this->input->post('no_id_masjid'),
            'tujuan_rekomendasi_bantuan' => $this->input->post('tujuan_rekomendasi_bantuan'),
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
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
        $this->load->view('pemohon/ptsp19/form_ptsp19', $data_detail);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp19/detail_ptsp19', $data_detail);
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
        $this->load->view('pemohon/ptsp20/form_ptsp20', $data_detail);
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
        $this->load->view('pemohon/ptsp20/detail_ptsp20', $data_detail);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
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
        $this->load->view('pemohon/ptsp21/form_ptsp21', $data_detail);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp21/detail_ptsp21', $data_detail);
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
            $this->aksi_upload_formulir_ptsp22($id_ptsp);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
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
        $this->load->view('pemohon/ptsp23/form_ptsp23', $data_detail);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp23/detail_ptsp23', $data_detail);
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
            'sie' => 'Subbag TU',
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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
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
    //upload surat permohonan ptsp25
    private function aksi_upload_srt_permohonan_ptsp25($id_ptsp25)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp25/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp25)->get('ptsp25')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp25/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp25);
                $this->db->update('ptsp25', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp25
    public function update_srt_permohonan_ptsp25($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp25($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp25/' . $permohonan);
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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp26/form_ptsp26', $data_detail);
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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
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

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp26/detail_ptsp26', $data_detail);
        $this->load->view('footer');
    }
    //upload surat permohonan ptsp26
    private function aksi_upload_srt_permohonan_ptsp26($id_ptsp26)
    {
        $config['upload_path']          = './assets/dashboard/pemohon/ptsp/ptsp26/srt_permohonan/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|docx|doc|xlsx|xls';
        $config['file_name']            = 'srt_permohonan-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);
        if (!empty($_FILES['srt_permohonan']['name'])) {
            if ($this->upload->do_upload('srt_permohonan')) {

                $uploadData = $this->upload->data();

                $item = $this->db->where('id_ptsp', $id_ptsp26)->get('ptsp26')->row();

                //replace foto lama 
                if ($item->srt_permohonan != null) {
                    $target_file = './assets/dashboard/pemohon/ptsp/ptsp26/srt_permohonan/' . $item->srt_permohonan;
                    unlink($target_file);
                }

                $data['srt_permohonan'] = $uploadData['file_name'];

                $this->db->where('id_ptsp', $id_ptsp26);
                $this->db->update('ptsp26', $data);
            }
        }
    }
    // upload ulang surat permohonan ptsp26
    public function update_srt_permohonan_ptsp26($id_ptsp)
    {
        if ($_FILES != null) {
            $this->aksi_upload_srt_permohonan_ptsp26($id_ptsp);
        }
        $permohonan = $this->input->post('id_permohonan_ptsp');
        $this->session->set_flashdata('success', 'disimpan');
        redirect('dashboard/detail_ptsp26/' . $permohonan);
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
            'nama_pemohon' => $this->input->post('nama_pemohon'),
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
    { // $id_permohonan
        $data_title['title'] = 'Standar Operasional Prosedur';
        $data['pemohon'] = $this->db->get_where('pemohon', ['id_pemohon' =>
        $this->session->userdata('id_pemohon')])->row_array();
        $data['total_notif'] = $this->m_pemohon->jml_notif()->result();

        $this->load->view('header', $data_title);
        $this->load->view('pemohon/sidebar_pemohon');
        $this->load->view('topbar', $data);
        $this->load->view('pemohon/ptsp27/sop_ptsp27');
        $this->load->view('footer');
    }
    //tampil form ptsp27
    public function form_ptsp27()
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
        $this->load->view('pemohon/ptsp27/form_ptsp27', $data_detail);
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
