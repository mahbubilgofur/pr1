<?php
class Barang_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_barang()
    {
        return $this->db->get('tbl_brg')->result();
    }

    public function add_barang($data)
    {
        $this->db->insert('tbl_brg', $data);
    }

    public function kurangi_stok($kodebrg, $qty)
    {
        $this->db->set('stok', 'stok - ' . (int)$qty, false);
        $this->db->where('kodebrg', $kodebrg);
        $this->db->update('tbl_brg');
    }

    public function get_stok_by_kodebrg($kodebrg)
    {
        $this->db->select('stok');
        $this->db->where('kodebrg', $kodebrg);
        $query = $this->db->get('tbl_brg');
        $row = $query->row();
        return $row->stok;
    }
    public function tambah_stok_barang($kodebrg, $qty)
    {
        // Ambil stok barang saat ini
        $stok_sekarang = $this->db->get_where('tbl_brg', array('kodebrg' => $kodebrg))->row()->stok;

        // Hitung stok baru
        $stok_baru = $stok_sekarang + $qty;

        // Update stok barang
        $this->db->where('kodebrg', $kodebrg);
        $this->db->update('tbl_brg', array('stok' => $stok_baru));
    }

    public function get_brg()
    {
        $this->db->select('RIGHT(tbl_brg.kodebrg,3) as kodebrg', FALSE);
        $this->db->order_by('kodebrg', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_brg');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kodebrg) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "BR" . $batas;
        return $kodetampil;
    }
    // Tambahkan fungsi lain sesuai kebutuhan
}
