<?php

class M_kasi extends CI_Model
{
    // Cek email untuk login
    public function cek_email($email, $status_delete)
    {
        $query = $this->db->get_where('kasi', ['email' => $email, 'status_delete' => $status_delete]);
        return $query->row_array();
    }

    // jumlah notif permohonan masuk
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where('status', 'Proses Kasi');
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }
}
