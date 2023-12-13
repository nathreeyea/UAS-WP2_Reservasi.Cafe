<?php 
class Admin_model extends CI_Model {
    function fetch_ruang(){
        $query = $this->db->query("SELECT * FROM ruang");

        return $query;
    }

    
    function fetch_ruang_perpage($limit, $start){
        // $this->db->get('t_penduduk', $limit, $start);
        // $query = 
        // return $query;
        $query = $this->db->query("SELECT * FROM ruang a
        ORDER BY a.idruang DESC
        LIMIT " . $start . ", " . $limit);

        return $query;
    }

    function fetch_ruang_single($id){
        $query = $this->db->query("SELECT * FROM ruang WHERE idruang = " . $id);

        return $query;
    }

    function insert_ruang($data){
        $this->db->insert('ruang', $data);
    }

    function ruangid_ai(){
        $query = $this->db->query("SELECT (MAX(idruang) + 1) as ruangid_ai FROM ruang");

        return $query;
    }

    function update_ruang($data){
        $this->db->where('idruang', $data['idruang']);
        $this->db->update('ruang', $data);
    }

    function delete_ruang($id){
        $this->db->where('idruang', $id);
        $this->db->delete('ruang');
    }

    function fetch_tamu_perpage($limit, $start){
        $query = $this->db->query("SELECT * FROM tamu a
        ORDER BY a.idtamu DESC
        LIMIT " . $start . ", " . $limit);

        return $query;

    }

    function fetch_pemesanan_perpage($limit, $start){
        $query = $this->db->query("SELECT a.*, b.*, c.jumlah_bayaran, c.bank, c.norek, c.namarek, c.bukti_pembayaran 
        FROM pemesanan a 
        LEFT OUTER JOIN kamar b ON a.idkamar = b.idkamar
        LEFT OUTER JOIN pembayaran c ON a.idpesan = c.idpesan
        ORDER BY a.idpesan DESC
        LIMIT " . $start . ", " . $limit);

        return $query;

    }

    function update_pemesanan_status($data){
        $this->db->where('idpesan', $data['idpesan']);
        $this->db->update('pemesanan', $data);

    }
}
?>