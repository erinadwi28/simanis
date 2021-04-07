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
        $data_title['title'] = 'SIMANIS: Dashboard';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();
        $data_permohonan['total_notif'] = $this->m_bo->jml_notif()->result();
        $data_permohonan['permohonan_selesaiBO'] = $this->m_bo->jml_permohonan_selesaiBO()->result();
        $data_permohonan['permohonan_prosesKasi'] = $this->m_bo->jml_permohonan_prosesKasi()->result();

        $this->load->view('header', $data_title);
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/dashboard', $data_permohonan);
        $this->load->view('footer');
    }

    //profil
    public function profil()
    {
        $data_title['title'] = 'Profil Saya';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();
        $detailhere = array('id_bo' => $this->session->userdata('id_bo'));
        $data_detail['detail_profil_saya'] = $this->m_bo->get_detail_profil_saya($detailhere, 'bo')->result();

        $this->load->view('header', $data_title);
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
        $data_title['title'] = 'Ubah Kata Sandi Saya';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();

        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header', $data_title);
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
        $data_title['title'] = 'List Permohonan Masuk';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan('Proses BO')->result();

        $this->load->view('header',$data_title);
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_masuk', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan yang sudah disetujui BO
    public function list_permohonan_selesaiBO()
    {
        $data_title['title'] = 'List Permohonan Proses BO';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan_selesaiBO()->result();

        $this->load->view('header',$data_title);
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/list_permohonan_selesaiBO', $data_detail);
        $this->load->view('footer');
    }

    //list permohonan masuk
    public function list_permohonan_prosesKasi()
    {
        $data_title['title'] = 'List Permohonan Proses Kasi';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['data_permohonan'] = $this->m_bo->get_list_data_permohonan('Proses Kasi')->result();

        $this->load->view('header',$data_title);
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

    //menampilkan detail data permohonan dari list permohonan
    public function detail_data_permohonan($id_permohonan_ptsp, $id_layanan)
    {
        $data_title['title'] = 'Detail Permohonan';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['detail_permohonan'] = $this->m_bo->get_data_permohonan($id_permohonan_ptsp, 'permohonan_ptsp')->result();

        if ($id_layanan == 5) {
            $data_detail['detail_ptsp'] = $this->m_bo->get_detail_ptsp($id_permohonan_ptsp, 'ptsp05')->result();
        }

        $this->load->view('header',$data_title);
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        if ($id_layanan == 5) {
            $this->load->view('backoffice/ptsp5/detail_ptsp05', $data_detail);
        }
        $this->load->view('footer');
    }

    //tampil form tolak permohonan
    public function form_input_keterangan($id_permohonan_ptsp)
    {
        $data_title['title'] = 'Form Keterangan Pending';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $data_detail['id_permohonan_ptsp'] = $this->db->get_where('permohonan_ptsp', ['id_permohonan_ptsp' =>
        $id_permohonan_ptsp])->row_array();

        $this->load->view('header',$data_title);
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/form_input_keterangan', $data_detail);
        $this->load->view('footer');
    }

    //aksi tolak permohonan
    public function kirim_alasn_permohonan()
    {
        $data = array(
            'id_bo' => $this->session->userdata('id_bo'),
            'keterangan' => $this->input->post('keterangan'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Pending',
            'tgl_persetujuan_fo' => date("Y/m/d")
        );

        $detailhere = $this->input->post('id_permohonan_ptsp');

        $email = $this->m_bo->get_data_pemohon($this->input->post('id_pemohon'));
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'klatenkemenag7@gmail.com',  // Email gmail
            'smtp_pass'   => 'dpdzadjbieahxykx',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@simanisklaten.com', 'simanisklaten.com');

        // Email penerima
        $this->email->to($email->email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //     $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Informasi Permohonan Anda');

        // Isi email
        $this->email->message('<b>Kepada Yth. ' . $email->nama . '</b>, <br><br> Menginformasikan kepada pemohon bahwasannya permohonan anda dipending dikarenakan ' . $this->input->post('keterangan') . ', mohon pemberitahuan ini untuk segera ditindak lanjuti. <br>Terimakasih<br>Salam,<br><br>Kementrian Agama Kabupaten Klaten');

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }

        $this->m_bo->update_status_permohonan($detailhere, $data, 'permohonan_ptsp');

        if ($this->m_bo->update_status_permohonan($detailhere, $data, 'permohonan_ptsp')); {
            $this->session->set_flashdata('success', 'ditolak');
            redirect('dashboard/list_permohonan_masuk');
        }
    }

    //update status permohonan menjadi Proses Kasi
    public function aksi_update_status_setujui($id_permohonan_ptsp)
    {
        $data = array(
            'id_bo' => $this->session->userdata('id_bo'),
            'notif_pemohon' => 'Belum Dibaca',
            'status' => 'Proses Kasi',
            'tgl_persetujuan_fo' => date("Y/m/d")
        );

        $this->m_bo->update_status_permohonan($id_permohonan_ptsp, $data, 'permohonan_ptsp');

        $this->session->set_flashdata('success', 'permohonan sukses disetujui');
        redirect('dashboard/list_permohonan_masuk');
    }
	//tampil detail ptsp06
    public function detail_ptsp06()
    {	$data_title['title'] = 'List Permohonan Masuk';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/ptsp6/detail_ptsp06');
        $this->load->view('footer');
    }
	//tampil detail ptsp14
    public function detail_ptsp14()
    {	$data_title['title'] = 'List Permohonan Masuk';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar',$data);
        $this->load->view('backoffice/ptsp14/detail_ptsp14');
        $this->load->view('footer');
    }
	//tampil detail ptsp15
    public function detail_ptsp15()
    {	$data_title['title'] = 'List Permohonan Masuk';                
        $data['bo'] = $this->db->get_where('bo', ['id_bo' =>
        $this->session->userdata('id_bo')])->row_array();
        $data['total_notif'] = $this->m_bo->jml_notif()->result();

        $this->load->view('header');
        $this->load->view('backoffice/sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('backoffice/ptsp15/detail_ptsp15');
        $this->load->view('footer');
    }
}
