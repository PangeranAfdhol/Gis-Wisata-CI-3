<?php

class M_berita extends CI_Model {

    public function simpan($data)
    
    {
        $this->db->insert('tbl_berita', $data);
        
    }
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->order_by('id_berita', 'desc');
        
        return $this->db->get()->result();
    }

    public function detail($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita', $id_berita);
        
        return $this->db->get()->row();
    }

    public function detailberita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('tbl_berita');
        $this->db->where('id_berita', $id_berita);
        
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_berita', $data['id_berita']);
        $this->db->update('tbl_berita', $data);
        
    }

    public function hapus($data)
        {
            $this->db->where('id_berita', $data['id_berita']);
            $this->db->delete('tbl_berita', $data);
        }

}

/* End of file ModelName.php */
