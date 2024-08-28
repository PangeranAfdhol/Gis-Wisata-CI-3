<?php

class M_budaya extends CI_Model {

    public function simpan($data)
    
    {
        $this->db->insert('tbl_budaya', $data);
        
    }
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('tbl_budaya');
        $this->db->order_by('id_budaya', 'desc');
        
        return $this->db->get()->result();
        
    }

    public function detail($id_budaya)
    {
        $this->db->select('*');
        $this->db->from('tbl_budaya');
        $this->db->where('id_budaya', $id_budaya);
        
        return $this->db->get()->row();
    }

    public function detailbudaya($id_budaya)
    {
        $this->db->select('*');
        $this->db->from('tbl_budaya');
        $this->db->where('id_budaya', $id_budaya);
        
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id_budaya', $data['id_budaya']);
        $this->db->update('tbl_budaya', $data);
        
    }

    public function hapus($data)
        {
            $this->db->where('id_budaya', $data['id_budaya']);
            $this->db->delete('tbl_budaya', $data);
        }

}

/* End of file ModelName.php */
