<?php

class M_fo extends CI_Model
{

    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('fo', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data fo untuk ubah katasandi
    public function get_fo($id)
    {
        $query = $this->db->get_where('fo', ['id_fo' => $id]);
        return $query->row_array();
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_fo', $where);
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

    // jumlah notif permohonan masuk
    public function jml_laporan()
    {
        $this->db->select('id_pengaduan, COUNT(id_pengaduan) as total_laporan');
        $this->db->from('aduan_layanan');
        $this->db->where('id_fo', null);

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

    // hitung jumlah permohonan yang sudah disetujui fo
    public function jml_permohonan_selesaiFO()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesaiFO');
        $this->db->from('permohonan_ptsp');
        $this->db->where("(id_fo != 'null')");
        $this->db->where("(status != 'Pending')");
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses BO
    public function jml_permohonan_prosesBO()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesBO');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses BO');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Tim Teknis
    public function jml_permohonan_prosesTimTeknis()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesTimTeknis');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Tim Teknis');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Kasi
    public function jml_permohonan_prosesKasi()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesKasi');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Kasi');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //hitung jumlah permohonan Proses Kasubag
    public function jml_permohonan_prosesKasubag()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_prosesKasubag');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Kasubag');
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
        $this->db->where('status_cetak', 0);
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan yang sudah disetujui fo
    public function jml_permohonan_arsip()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_arsip');
        $this->db->from('permohonan_ptsp');
        $this->db->where("(id_fo != 'null')");
        $this->db->where("(status = 'Selesai')");
        $this->db->where('status_delete', 0);
        $this->db->where('status_cetak', 1);

        $hasil = $this->db->get();
        return $hasil;
    }

    // get data detail profil saya
    public function get_detail_profil_saya($detailhere, $tabel)
    {
        return $this->db->get_where($tabel, $detailhere);
    }

    // insert_idfo
    public function insert_idfo($detailhere, $id_pengaduan)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        $this->db->update('aduan_layanan', $detailhere);
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
    public function get_list_data_permohonan_arsip($status, $cetak)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->where('permohonan_ptsp.status_cetak', $cetak);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        return $this->db->get();
    }

    //get list data permohonan dengan status tertentu
    public function get_list_data_permohonan_selesai($status)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->where('permohonan_ptsp.status_cetak', 0);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'asc');

        return $this->db->get();
    }

    //get get_list_data_laporan_masuk
    public function get_list_data_laporan_masuk()
    {
        $this->db->select('*');
        $this->db->from('aduan_layanan');
        $this->db->where('id_fo', null);
        $this->db->order_by('id_pengaduan', 'asc');

        return $this->db->get();
    }

    //get get_list_data_laporan
    public function get_list_data_laporan()
    {
        $this->db->select('*');
        $this->db->from('aduan_layanan');
        $this->db->order_by('id_pengaduan', 'desc');

        return $this->db->get();
    }

    // get_data_laporan
    public function get_data_laporan($id_pengaduan)
    {
        $this->db->select('*');
        $this->db->from('aduan_layanan');
        $this->db->where('id_pengaduan', $id_pengaduan);

        return $this->db->get();
    }

    //get list data permohonan dengan status tertentu 
    public function get_list_data_permohonan($status)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.status', $status);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'asc');

        return $this->db->get();
    }

    //get list data permohonan yang sudah disetujui fo
    public function get_list_data_permohonan_selesaiFO()
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where("(permohonan_ptsp.id_fo != 'null')");
        $this->db->where("(permohonan_ptsp.status != 'Pending')");
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
        $this->db->from('permohonan_ptsp');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $id_pemohon);

        return $this->db->get()->row();
    }
    public function get_data_permohonan_ptsp($id_permohonan_ptsp)
    {
        $this->db->select('permohonan_ptsp.*');
        $this->db->from('pemohon');
        $this->db->join('permohonan_ptsp', 'pemohon.id_pemohon = permohonan_ptsp.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan_ptsp);

        return $this->db->get()->row();
    }

    //get data pemohon yang mengajukan permohonan
    public function get_data_pemohon_ptsp($id_permohonan_ptsp)
    {
        $this->db->select('pemohon.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan_ptsp);

        return $this->db->get();
    }

    //aksi update data permohonan
    public function update_ptsp($where, $data, $table)
    {
        $this->db->where('id_permohonan_ptsp', $where);
        $this->db->update($table, $data);
    }

    //get data petugas doa ptsp01
    public function data_petugas_doa($id_permohonan)
    {
        $this->db->select('petugas_doa.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('ptsp01', 'permohonan_ptsp.id_permohonan_ptsp = ptsp01.id_permohonan_ptsp', 'INNER');
        $this->db->join('petugas_doa', 'ptsp01.id_ptsp = petugas_doa.id_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // aksi tambah data permohonan
    public function tambah_permohonan($data_permohonan, $id_permohonan_ptsp)
    {
        $this->db->where('id_permohonan_ptsp', $id_permohonan_ptsp);
        $this->db->update('permohonan_ptsp', $data_permohonan);
    }
}
