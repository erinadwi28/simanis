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

    public function get_data_pemohon($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_pemohon', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data pemohon
    public function get_list_data_pemohon()
    {
        $this->db->select('pemohon.*');
        $this->db->from('pemohon');
        $this->db->where('status_delete', 0);
        $this->db->order_by('pemohon.id_pemohon', 'desc');

        return $this->db->get();
    }
    public function get_data_fo($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_fo', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data fo
    public function get_list_data_fo()
    {
        $this->db->select('fo.*');
        $this->db->from('fo');
        $this->db->where('status_delete', 0);
        $this->db->order_by('fo.id_fo', 'desc');

        return $this->db->get();
    }
    public function get_data_bo($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_bo', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data bo
    public function get_list_data_bo()
    {
        $this->db->select('bo.*');
        $this->db->from('bo');
        $this->db->where('status_delete', 0);
        $this->db->order_by('bo.id_bo', 'desc');

        return $this->db->get();
    }
    public function get_data_kasi($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_kasi', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data kasi
    public function get_list_data_kasi()
    {
        $this->db->select('kasi.*');
        $this->db->from('kasi');
        $this->db->where('status_delete', 0);
        $this->db->order_by('kasi.id_kasi', 'desc');

        return $this->db->get();
    }
    public function get_data_kasubag($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_kasubag', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data kasubag
    public function get_list_data_kasubag()
    {
        $this->db->select('kasubag.*');
        $this->db->from('kasubag');
        $this->db->where('status_delete', 0);
        $this->db->order_by('kasubag.id_kasubag', 'desc');

        return $this->db->get();
    }
    public function get_data_kepala($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_kepala', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data kepala
    public function get_list_data_kepala()
    {
        $this->db->select('kepala.*');
        $this->db->from('kepala');
        $this->db->where('status_delete', 0);
        $this->db->order_by('kepala.id_kepala', 'desc');

        return $this->db->get();
    }
    public function get_data_timteknis($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_tim_teknis', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //get list data timteknis
    public function get_list_data_timteknis()
    {
        $this->db->select('tim_teknis.*');
        $this->db->from('tim_teknis');
        $this->db->where('status_delete', 0);
        $this->db->order_by('tim_teknis.id_tim_teknis', 'desc');

        return $this->db->get();
    }
    //aksi tambah data pemohon
    public function tambah_pemohon($data_pemohon, $tabel)
    {
        $this->db->insert($tabel, $data_pemohon);
    }
    //aksi tambah data fo
    public function tambah_fo($data_fo, $tabel)
    {
        $this->db->insert($tabel, $data_fo);
    }
    //aksi tambah data bo
    public function tambah_bo($data_bo, $tabel)
    {
        $this->db->insert($tabel, $data_bo);
    }
    //aksi tambah data kasi
    public function tambah_kasi($data_kasi, $tabel)
    {
        $this->db->insert($tabel, $data_kasi);
    }
    //aksi tambah data kasubag
    public function tambah_kasubag($data_kasubag, $tabel)
    {
        $this->db->insert($tabel, $data_kasubag);
    }
    //aksi tambah data kepala
    public function tambah_kepala($data_kepala, $tabel)
    {
        $this->db->insert($tabel, $data_kepala);
    }
    //aksi tambah data tim teknis
    public function tambah_timteknis($data_timteknis, $tabel)
    {
        $this->db->insert($tabel, $data_timteknis);
    }
    //aksi update data pemohon
    public function update_pemohon($where, $data, $table)
    {
        $this->db->where('id_pemohon', $where);
        $this->db->update($table, $data);
    }
    //aksi update data fo
    public function update_fo($where, $data, $table)
    {
        $this->db->where('id_fo', $where);
        $this->db->update($table, $data);
    }
    //aksi update data bo
    public function update_bo($where, $data, $table)
    {
        $this->db->where('id_bo', $where);
        $this->db->update($table, $data);
    }
    //aksi update data kasi
    public function update_kasi($where, $data, $table)
    {
        $this->db->where('id_kasi', $where);
        $this->db->update($table, $data);
    }
    //aksi update data kasubag
    public function update_kasubag($where, $data, $table)
    {
        $this->db->where('id_kasubag', $where);
        $this->db->update($table, $data);
    }
    //aksi update data kepala
    public function update_kepala($where, $data, $table)
    {
        $this->db->where('id_kepala', $where);
        $this->db->update($table, $data);
    }
    //aksi update data timteknis
    public function update_timteknis($where, $data, $table)
    {
        $this->db->where('id_tim_teknis', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi pemohon
    public function update_sandi_pemohon($where, $data, $table)
    {
        $this->db->where('id_pemohon', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi fo
    public function update_sandi_fo($where, $data, $table)
    {
        $this->db->where('id_fo', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi bo
    public function update_sandi_bo($where, $data, $table)
    {
        $this->db->where('id_bo', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi kasi
    public function update_sandi_kasi($where, $data, $table)
    {
        $this->db->where('id_kasi', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi kasubag
    public function update_sandi_kasubag($where, $data, $table)
    {
        $this->db->where('id_kasubag', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi kepala
    public function update_sandi_kepala($where, $data, $table)
    {
        $this->db->where('id_kepala', $where);
        $this->db->update($table, $data);
    }
    //aksi ubah kata sandi tim teknis
    public function update_sandi_timteknis($where, $data, $table)
    {
        $this->db->where('id_tim_teknis', $where);
        $this->db->update($table, $data);
    }

    //aksi hapus pemohon
    public function hapus_pemohon($where, $data, $table)
    {
        $this->db->where('id_pemohon', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus fo
    public function hapus_fo($where, $data, $table)
    {
        $this->db->where('id_fo', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus bo
    public function hapus_bo($where, $data, $table)
    {
        $this->db->where('id_bo', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus kasi
    public function hapus_kasi($where, $data, $table)
    {
        $this->db->where('id_kasi', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus kasubag
    public function hapus_kasubag($where, $data, $table)
    {
        $this->db->where('id_kasubag', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus kepala
    public function hapus_kepala($where, $data, $table)
    {
        $this->db->where('id_kepala', $where);
        $this->db->update($table, $data);
    }
    //aksi hapus tim teknis
    public function hapus_timteknis($where, $data, $table)
    {
        $this->db->where('id_tim_teknis', $where);
        $this->db->update($table, $data);
    }
}
