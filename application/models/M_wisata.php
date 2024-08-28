<?php

class M_wisata extends CI_Model {

    public function simpan($data)
    
    {
        $this->db->insert('tbl_wisata', $data);
        
    }
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_wisata');
        $this->db->order_by('id_wisata', 'desc');
        
        return $this->db->get()->result();
        
        
        
    }
    public function detail($id_wisata)
    {
        $this->db->select('*');
        $this->db->from('tbl_wisata');
        $this->db->where('id_wisata', $id_wisata);
        
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_wisata', $data['id_wisata']);
        $this->db->update('tbl_wisata', $data);
        
    }

    public function hapus($data)
        {
            $this->db->where('id_wisata', $data['id_wisata']);
            $this->db->delete('tbl_wisata', $data);
        }

}

/* End of file ModelName.php */
