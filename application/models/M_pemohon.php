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

    //get data pemohon untuk ubah katasandi
    public function get_pemohon($id)
    {
        $query = $this->db->get_where('pemohon', ['id_pemohon' => $id]);
        return $query->row_array();
    }

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_pemohon', $where);
        $this->db->update($table, $data);
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
        $this->db->where("(status = 'Validasi Kemenag'
        OR status = 'Proses BO'
        OR status = 'Proses Kasi'
        OR status = 'Proses Kasubag')", null, false);
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

    //aksi update notif
    public function update_notif($data, $id)
    {
        $this->db->where('id_permohonan_ptsp', $id);
        $this->db->update('permohonan_ptsp', $data);
    }

    //get data validasi kemenag
    public function list_permohonan_validasi_kemenag()
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('permohonan_ptsp.status_delete', 0);
        $this->db->where("(permohonan_ptsp.status = 'Validasi Kemenag'
        OR permohonan_ptsp.status = 'Proses BO'
        OR permohonan_ptsp.status = 'Proses Kasi'
        OR permohonan_ptsp.status = 'Proses Kasubag')", null, false);
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        $hasil = $this->db->get();
        return $hasil;
    }

    //get data permohonan pending
    public function list_permohonan_pending()
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('permohonan_ptsp.status_delete', 0);
        $this->db->where('permohonan_ptsp.status', 'Pending');
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        $hasil = $this->db->get();
        return $hasil;
    }

    //get data permohonan selesai
    public function list_permohonan_selesai()
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->where('permohonan_ptsp.id_pemohon', $this->session->userdata('id_pemohon'));
        $this->db->where('permohonan_ptsp.status_delete', 0);
        $this->db->where('permohonan_ptsp.status', 'Selesai');
        $this->db->order_by('permohonan_ptsp.id_permohonan_ptsp', 'desc');

        $hasil = $this->db->get();
        return $hasil;
    }

    // aksi tambah data permohonan
    public function tambah_permohonan($data_permohonan)
    {
        $this->db->insert('permohonan_ptsp', $data_permohonan);
        return $this->db->insert_id();
    }

    //aksi tambah data ptsp
    public function tambah_ptsp($data_ptsp, $tabel)
    {
        $this->db->insert($tabel, $data_ptsp);
    }

    public function get_data_permohonan($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_permohonan_ptsp', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
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

    //detail permohonan ptsp04
    public function get_detail_ptsp04($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp04.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp04', 'permohonan_ptsp.id_permohonan_ptsp = ptsp04.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp05
    public function get_detail_ptsp05($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp05.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp05', 'permohonan_ptsp.id_permohonan_ptsp = ptsp05.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp06
    public function get_detail_ptsp06($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp06.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp06', 'permohonan_ptsp.id_permohonan_ptsp = ptsp06.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp14
    public function get_detail_ptsp14($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp14.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp14', 'permohonan_ptsp.id_permohonan_ptsp = ptsp14.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp15
    public function get_detail_ptsp15($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp15.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp15', 'permohonan_ptsp.id_permohonan_ptsp = ptsp15.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp18
    public function get_detail_ptsp18($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp18.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp18', 'permohonan_ptsp.id_permohonan_ptsp = ptsp18.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp19
    public function get_detail_ptsp19($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp19.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp19', 'permohonan_ptsp.id_permohonan_ptsp = ptsp19.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp20
    public function get_detail_ptsp20($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp20.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp20', 'permohonan_ptsp.id_permohonan_ptsp = ptsp20.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);
    
        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp21
    public function get_detail_ptsp21($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp21.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp21', 'permohonan_ptsp.id_permohonan_ptsp = ptsp21.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp22
    public function get_detail_ptsp22($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp22.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp22', 'permohonan_ptsp.id_permohonan_ptsp = ptsp22.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp23
    public function get_detail_ptsp23($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp23.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp23', 'permohonan_ptsp.id_permohonan_ptsp = ptsp23.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp24
    public function get_detail_ptsp24($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp24.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp24', 'permohonan_ptsp.id_permohonan_ptsp = ptsp24.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp25
    public function get_detail_ptsp25($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp25.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp25', 'permohonan_ptsp.id_permohonan_ptsp = ptsp25.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp26
    public function get_detail_ptsp26($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp26.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp26', 'permohonan_ptsp.id_permohonan_ptsp = ptsp26.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //detail permohonan ptsp27
    public function get_detail_ptsp27($id_permohonan)
    {
        $this->db->select('permohonan_ptsp.*, layanan_ptsp.nama_layanan, ptsp27.*');
        $this->db->from('permohonan_ptsp');
        $this->db->join('layanan_ptsp', 'permohonan_ptsp.id_layanan = layanan_ptsp.id_layanan', 'INNER');
        $this->db->join('ptsp27', 'permohonan_ptsp.id_permohonan_ptsp = ptsp27.id_permohonan_ptsp', 'INNER');
        $this->db->where('permohonan_ptsp.id_permohonan_ptsp', $id_permohonan);
        $this->db->where('permohonan_ptsp.status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }

    //get detail ptsp
    public function get_data_ptsp($detailhere, $tabel)
    {
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('id_ptsp', $detailhere);

        $hasil = $this->db->get();

        return $hasil;
    }

    //aksi update data permohonan
    public function update_ptsp($where, $data, $table)
    {
        $this->db->where('id_permohonan_ptsp', $where);
        $this->db->update($table, $data);
    }

    //update status permohonan
    public function update_status_permohonan($where, $data, $tabel)
    {
        $this->db->where('id_permohonan_ptsp ', $where);
        $this->db->update($tabel, $data);
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
