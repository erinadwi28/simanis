<?php

class M_super_admin extends CI_Model
{

    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('super_admin', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data fo untuk ubah katasandi
    public function get_super_admin($id)
    {
        $query = $this->db->get_where('super_admin', ['id_super_admin' => $id]);
        return $query->row_array();
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_super_admin', $where);
        $this->db->update($table, $data);
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

    // get data detail profil saya
    public function get_detail_profil_saya($detailhere, $tabel)
    {
        return $this->db->get_where($tabel, $detailhere);
    }

    // aksi ubah data profil saya                                                                                                       
    public function aksi_ubah_data_profil_saya($detailhere, $data, $table)
    {
        $this->db->where('id_super_admin', $detailhere);
        $this->db->update($table, $data);
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

    //data kepala 
    public function get_data_kepala($id_permohonan)
    {
        $this->db->select('kepala.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('kepala', 'permohonan_ptsp.id_kepala = kepala.id_kepala', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);

        $hasil = $this->db->get();
        return $hasil;
    }

    public function get_data_pemohon($id_pemohon)
    {
        $this->db->select('pemohon.*');
        $this->db->from('pemohon');
        $this->db->order_by('pemohon.id_pemohon', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data pemohon
    public function get_list_data_pemohon()
    {
        $this->db->select('pemohon.*');
        $this->db->from('pemohon');
        $this->db->order_by('pemohon.id_pemohon', 'desc');

        return $this->db->get();
    }
}
