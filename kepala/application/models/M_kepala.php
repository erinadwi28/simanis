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

    //aksi ubah kata sandi
    public function update_sandi($where, $data, $table)
    {
        $this->db->where('id_kepala', $where);
        $this->db->update($table, $data);
    }

    // jumlah notif permohonan masuk
    public function jml_notif()
    {
        $this->db->select('id_permohonan_ptsp, COUNT(id_permohonan_ptsp) as total_notif');
        $this->db->from('permohonan_ptsp');
        $this->db->where(
            'status',
            'Proses Kepala Kemenag'
        );
        $this->db->where('status_delete', 0);

        $hasil = $this->db->get();
        return $hasil;
    }
}
