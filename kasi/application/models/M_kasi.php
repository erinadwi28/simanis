<?php

class M_kasi extends CI_Model
{
    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('kasi', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data kasi untuk ubah katasandi
    public function get_kasi($id)
    {
        $query = $this->db->get_where('kasi', ['id_kasi' => $id]);
        return $query->row_array();
    }

    // get data detail profil saya
    public function get_detail_profil_saya($detailhere, $tabel)
    {
        return $this->db->get_where($tabel, $detailhere);
    }

    // aksi ubah data profil saya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
    public function aksi_ubah_data_profil_saya($detailhere, $data, $table)
    {
        $this->db->where('id_kasi', $detailhere);
        $this->db->update($table, $data);
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_kasi', $where);
        $this->db->update($table, $data);
    }

    // jumlah notif permohonan masuk
    public function jml_notif($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Kasi');
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan yang sudah disetujui kasi
    public function jml_permohonan_selesaiKasi($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesaiKasi');
        $this->db->from('permohonan_ptsp');
        $this->db->where("(id_kasi != 'null')");
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Kasubag
    public function jml_permohonan_prosesKasubag($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesKasubag');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Kasubag');
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //get list data permohonan dengan status tertentu
    public function get_list_data_permohonan($status, $sie)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->where('permohonan_ptsp.sie', $sie);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    //get list data permohonan yang sudah disetujui kasi
    public function get_list_data_permohonan_selesaiKasi($sie)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where("(permohonan_ptsp.id_kasi != 'null')");
        $this->db->where("(permohonan_ptsp.status != 'Proses Kasubag')");
        $this->db->where('permohonan_ptsp.sie', $sie);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    //get list data permohonan dengan status tertentu
    public function get_list_data_permohonan_prosesKasubag($status)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    //detail permohonan ptsp 
    public function get_detail_ptsp($id_permohonan, $tabel)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ' . $tabel . '.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join($tabel, 'permohonan_ptsp.id_permohonan_ptsp = ' . $tabel . '.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_data_permohonan($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_permohonan_ptsp', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //update status permohonan
    public function update_status_permohonan($where, $data, $tabel)
    {
        $this->db->where('id_permohonan_ptsp ', $where);
        $this->db->update($tabel, $data);
    }

    public function get_data_pemohon($id_pemohon)
    {
        $this->db->select('pemohon.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);

        return $this->db->get()->row();
    }

    //input nomor surat
    public function insert_no_surat($id_permohonan_ptsp, $tabel, $no_surat)
    {
        $this->db->where('id_permohonan_ptsp ', $id_permohonan_ptsp);
        $this->db->update($tabel, $no_surat);
    }
}
