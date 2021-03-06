<?php

class M_tim_teknis extends CI_Model
{
    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('tim_teknis', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data pemohon untuk ubah katasandi
    public function get_tim_teknis($id)
    {
        $query = $this->db->get_where('tim_teknis', ['id_tim_teknis' => $id]);
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
        $this->db->where('id_tim_teknis', $detailhere);
        $this->db->update($table, $data);
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_tim_teknis', $where);
        $this->db->update($table, $data);
    }

    // jumlah notif permohonan masuk
    public function jml_notif($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Tim Teknis'
        );
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan dalam pending
    public function jml_permohonan_pending($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_pending');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Pending');
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan yang sudah disetujui timteknis
    public function permohonan_selesai_tim_teknis($sie)
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesai_tim_teknis');
        $this->db->from('permohonan_ptsp');
        $this->db->where("(id_tim_teknis != 'null')");
        $this->db->where("(status != 'Pending')");
        $this->db->where("(status != 'Validasi Kemenag')");
        $this->db->where("(status != 'Proses BO')");
        $this->db->where('sie', $sie);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //get list data permohonan dengan status tertentu
    public function get_list_data_permohonan($status, $sie)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->where('permohonan_ptsp.sie', $sie);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    //get list data permohonan yang sudah disetujui timteknis
    public function get_list_data_permohonan_selesai_tim_teknis($sie)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where("(permohonan_ptsp.id_tim_teknis != 'null')");
        $this->db->where("(permohonan_ptsp.status != 'Pending')");
        $this->db->where("(permohonan_ptsp.status != 'Validasi Kemenag')");
        $this->db->where("(permohonan_ptsp.status != 'Proses BO')");
        $this->db->where('permohonan_ptsp.sie', $sie);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    public function get_data_pemohon($id_pemohon)
    {
        $this->db->select('pemohon.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);

        return $this->db->get()->row();
    }

    public function get_data_permohonan($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_permohonan_ptsp', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
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

    //update status permohonan
    public function update_status_permohonan($where, $data, $tabel)
    {
        $this->db->where('id_permohonan_ptsp ', $where);
        $this->db->update($tabel, $data);
    }

    //update update_data_ptsp
    public function update_data_ptsp($where, $data, $tabel)
    {
        $this->db->where('id_ptsp', $where);
        $this->db->update($tabel, $data);
    }
}
