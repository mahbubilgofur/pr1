<?php
class Jual_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_penjualan()
    {
        return $this->db->get('tbl_jual')->result();
    }
    public function tambah_penjualan($data)
    {
        // Memasukkan data penjualan ke dalam tabel tbl_jual
        $this->db->insert('tbl_jual', $data);

        // Cek apakah penambahan berhasil
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function get_penjualan()
    {
        // Ambil data penjualan dari tabel tbl_jual
        return $this->db->get('tbl_jual')->result();
    }

    public function get_penjualan_by_kodebrg($kodebrg)
    {
        // Ambil data penjualan berdasarkan kode barang
        $this->db->where('kodebrg', $kodebrg);
        return $this->db->get('tbl_jual')->result();
    }

    public function get_nama_brg()
    {
        // Mengambil data nama barang dari tabel tbl_barang untuk digunakan dalam opsi select
        $this->db->select('kodebrg, nama');
        $query = $this->db->get('tbl_brg');
        return $query->result();
    }
    public function get_jual()
    {
        $this->db->select('RIGHT(tbl_jual.nofaktur,3) as nofaktur', FALSE);
        $this->db->order_by('nofaktur', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_jual');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->nofaktur) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "N" . $batas;
        return $kodetampil;
    }
}
