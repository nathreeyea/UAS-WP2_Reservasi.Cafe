<?php

class Pemesanan_model extends CI_Model {
    function fetch_data(){
        $query = $this->db->query("SELECT * FROM pemesanan a 
        LEFT OUTER JOIN ruang b ON a.idruang = b.idruang
        ORDER BY a.idpesan DESC");
        return $query;
    }
}

?>