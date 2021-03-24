<?php

class M_fo extends CI_Model
{

    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('fo', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    // jumlah notif permohonan masuk
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
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
        $this->db->where('id_fo', $detailhere);
        $this->db->update($table, $data);
    }

    //get list data permohonan yang belum dibaca
    public function get_permohonan_belum_dibaca($id_fo)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.id_fo', $id_fo);
        $this->db->where('permohonan_ptsp.status_delete', 0);
        $this->db->where('permohonan_ptsp.notif', 'Belum Dibaca');
        $this->db->where("(permohonan_ptsp.status = 'Validasi Kemenag' 
    	OR permohonan_ptsp.status = 'Pending'
    	OR permohonan_ptsp.status = 'Selesai')", null, false);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
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

    //detail permohonan ptsp03
    public function get_detail_ptsp03($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp03.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp03', 'permohonan_ptsp.id_permohonan_ptsp = ptsp03.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_data_pemohon($id_pemohon){
        $this->db->select('pemohon.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon','INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);

        return $this->db->get();

    }
}
