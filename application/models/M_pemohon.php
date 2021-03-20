<?php

class M_pemohon extends CI_Model
{
    //register
    public function register($data)
    {
        return $this->db->insert('pemohon', $data);
    }

    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('pemohon', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    // jumlah notif permohonan
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where('id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('notif_pemohon', 'Belum Dibaca');
        $this->db->where("(status = 'Pending' 
		OR status = 'Selesai')", null, false);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan status validasi kemenag
    public function jml_permohonan_validasi_kemenag()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_validasi_kemenag');
        $this->db->from('permohonan_ptsp');
        $this->db->where('id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('status', 'Validasi Kemenag');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan status pending
    public function jml_permohonan_pending()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_pending');
        $this->db->from('permohonan_ptsp');
        $this->db->where('id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('status', 'Pending');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan status pending
    public function jml_permohonan_selesai()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesai');
        $this->db->from('permohonan_ptsp');
        $this->db->where('id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('status', 'Selesai');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // get data detail profil saya
    public function get_detail_profil_saya($detailhere, $tabel)
    {
        return $this->db->get_where($tabel, $detailhere);
    }

    // aksi ubah data profil saya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    public function aksi_ubah_data_profil_saya($detailhere, $data, $table)
    {
        $this->db->where('id_pemohon', $detailhere);
        $this->db->update($table, $data);
    }


    // //get list data permohonan yang belum dibaca
    // public function get_permohonan_belum_dibaca($id_pemohon)
    // {
    //     $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
    //     $this->db->from('permohonan_ptsp');
    //     $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
    //     $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);
    //     $this->db->where('permohonan_ptsp.status_delete', 0);
    //     $this->db->where('permohonan_ptsp.notif', 'Belum Dibaca');
    //     $this->db->where("(permohonan_ptsp.status = 'Validasi Kemenag' 
    // 	OR permohonan_ptsp.status = 'Pending'
    // 	OR permohonan_ptsp.status = 'Selesai')", null, false);
    //     $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

    //     return $this->db->get();
    // }

    // //get list data permohonan dengan status tertentu
    // public function get_history_permohonan($id_pemohon, $status)
    // {
    //     $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
    //     $this->db->from('permohonan_ptsp');
    //     $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
    //     $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);
    //     $this->db->where('permohonan_ptsp.status', $status);
    //     $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

    //     return $this->db->get();
    // }
}
