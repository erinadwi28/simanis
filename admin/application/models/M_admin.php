<?php

class M_admin extends CI_Model
{

    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('admin', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data fo untuk ubah katasandi
    public function get_admin($id)
    {
        $query = $this->db->get_where('admin', ['id_admin' => $id]);
        return $query->row_array();
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_admin', $where);
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
        $this->db->where('id_admin', $detailhere);
        $this->db->update($table, $data);
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
    public function get_data_fo($id_fo)
    {
        $this->db->select('fo.*');
        $this->db->from('fo');
        $this->db->order_by('fo.id_fo', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data fo
    public function get_list_data_fo()
    {
        $this->db->select('fo.*');
        $this->db->from('fo');
        $this->db->order_by('fo.id_fo', 'desc');

        return $this->db->get();
    }
    public function get_data_bo($id_bo)
    {
        $this->db->select('bo.*');
        $this->db->from('bo');
        $this->db->order_by('bo.id_bo', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data bo
    public function get_list_data_bo()
    {
        $this->db->select('bo.*');
        $this->db->from('bo');
        $this->db->order_by('bo.id_bo', 'desc');

        return $this->db->get();
    }
    public function get_data_kasi($id_kasi)
    {
        $this->db->select('kasi.*');
        $this->db->from('kasi');
        $this->db->order_by('kasi.id_kasi', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data kasi
    public function get_list_data_kasi()
    {
        $this->db->select('kasi.*');
        $this->db->from('kasi');
        $this->db->order_by('kasi.id_kasi', 'desc');

        return $this->db->get();
    }
    public function get_data_kasubag($id_kasubag)
    {
        $this->db->select('kasubag.*');
        $this->db->from('kasubag');
        $this->db->order_by('kasubag.id_kasubag', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data kasubag
    public function get_list_data_kasubag()
    {
        $this->db->select('kasubag.*');
        $this->db->from('kasubag');
        $this->db->order_by('kasubag.id_kasubag', 'desc');

        return $this->db->get();
    }
    public function get_data_kepala($id_kepala)
    {
        $this->db->select('kepala.*');
        $this->db->from('kepala');
        $this->db->order_by('kepala.id_kepala', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data kepala
    public function get_list_data_kepala()
    {
        $this->db->select('kepala.*');
        $this->db->from('kepala');
        $this->db->order_by('kepala.id_kepala', 'desc');

        return $this->db->get();
    }
    public function get_data_timteknis($id_tim_teknis)
    {
        $this->db->select('tim_teknis.*');
        $this->db->from('tim_teknis');
        $this->db->order_by('tim_teknis.id_tim_teknis', 'desc');

        $hasil= $this->db->get();
        return $hasil;
    }

    //get list data timteknis
    public function get_list_data_timteknis()
    {
        $this->db->select('tim_teknis.*');
        $this->db->from('tim_teknis');
        $this->db->order_by('tim_teknis.id_tim_teknis', 'desc');

        return $this->db->get();
    }
}
