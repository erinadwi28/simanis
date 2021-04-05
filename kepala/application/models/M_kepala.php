<?php

class M_kepala extends CI_Model
{
    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('kepala', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data kepala untuk ubah katasandi
    public function get_kepala($id)
    {
        $query = $this->db->get_where('kepala', ['id_kepala' => $id]);
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
        $this->db->where('id_kepala', $detailhere);
        $this->db->update($table, $data);
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_kepala', $where);
        $this->db->update($table, $data);
    }

    // hitung jumlah permohonan status pending
    public function jml_permohonan_pending()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_pending');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Pending'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan yang sudah disetujui fo
    public function jml_permohonan_prosesFO()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesFO');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Validasi Kemenag');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses BO
    public function jml_permohonan_prosesBO()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesBO');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses BO'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Kasi
    public function jml_permohonan_prosesKasi()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesKasi');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Kasi'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Kasubag
    public function jml_permohonan_prosesKasubag()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesKasubag');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Kasubag'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan status pending
    public function jml_permohonan_selesai()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesai');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Selesai'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //get list data permohonan dengan status tertentu
    public function get_list_data_permohonan($status)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }
}
