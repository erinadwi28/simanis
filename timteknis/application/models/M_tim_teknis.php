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

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_tim_teknis', $where);
        $this->db->update($table, $data);
    }

    // jumlah notif permohonan masuk
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Tim Teknis'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }
}
