<?php

class M_kasubag extends CI_Model
{
    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('kasubag', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    //get data kasubag untuk ubah katasandi
    public function get_kasubag($id)
    {
        $query = $this->db->get_where('kasubag', ['id_kasubag' => $id]);
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
        $this->db->where('id_kasubag', $detailhere);
        $this->db->update($table, $data);
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_kasubag', $where);
        $this->db->update($table, $data);
    }

    // jumlah notif permohonan masuk
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Kasubag'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    // hitung jumlah permohonan yang sudah disetujui kasubag
    public function jml_permohonan_selesaiKasubag()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as permohonan_selesaiKasubag');
        $this->db->from('permohonan_ptsp');
        $this->db->where("(id_kasubag != 'null')");
        $this->db->where("(status = 'Selesai')");
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
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

    //get list data permohonan dengan status tertentu
    public function get_data_kepala()
    {
        $this->db->select('id_kepala');
        $this->db->from('kepala');
        $this->db->where('status_delete', 0);

        $data = $this->db->get();

        return $data;
    }

    //get list data permohonan yang sudah disetujui kasubag
    public function get_list_data_permohonan_selesaiKasubag()
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, pemohon.nama');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('pemohon', 'permohonan_ptsp.id_pemohon = pemohon.id_pemohon', 'INNER');
        $this->db->where("(permohonan_ptsp.id_kasubag != 'null')");
        $this->db->where("(permohonan_ptsp.status = 'Selesai')");
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
}
