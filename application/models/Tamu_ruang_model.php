<?php

class Tamu_ruang_model extends CI_Model {
    function fetch_data(){
        $query = $this->db->query("SELECT * FROM ruang");
        return $query;
    }

    function fetch_single_data($id){
        $this->db->where('idruang', $id);
        $query = $this->db->get('ruang');
        return $query;
    }

    function fetch_single_user($id){
        $this->db->where('idtamu', $id);
        $query = $this->db->get('tamu');
        return $query;

    }

    function insert_pemesanan($data){
        $this->db->insert('pemesanan', $data);

        $query = $this->db->query("UPDATE `ruang` SET `jumlah`= `jumlah` - " . $data['jumlah'] . " WHERE  `idruang`=" . $data['idruang']);

        return $query;
    }

    function fetch_pemesanan_user($id){
        $query = $this->db->query("SELECT * FROM pemesanan a 
        LEFT OUTER JOIN ruang b ON a.idruang = b.idruang
        WHERE idtamu = ". $id . " ORDER BY idpesan DESC");

        return $query;
    }

    function insert_pembayaran($data){
        $this->db->insert('pembayaran', $data);
        $query = $this->db->query("UPDATE pemesanan SET status = 'Berhasil' WHERE idpesan = " . $data['idpesan']);
        return $query;
    }
}

?>