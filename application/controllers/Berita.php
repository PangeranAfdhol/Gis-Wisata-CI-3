<?php

class Berita extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_berita');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Berita',
            'berita'=> $this->M_berita->tampil(),
            'isi'   => 'v_databerita'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_berita', 'Berita', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('link', 'Link', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()== TRUE) {
            $config['upload_path']          ='./gambar/';
            $config['allowed_types']        ='gif|jpg|png|jpeg|icon';
            $config['max_size']             =2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title'         => 'Input Data Berita' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'isi'           => 'v_input_databerita'
            );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_berita'       => $this->input->post('nama_berita'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'link'              => $this->input->post('link'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                 );
        $this->M_berita->simpan($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
        redirect('berita/input');
            }
        }
        $data = array(
            'title'         => 'Input Data Berita' , 
            'isi'           => 'v_input_databerita'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_berita)
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_berita', 'Berita', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('link', 'Link', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()== TRUE) {
            $config['upload_path']          ='./gambar/';
            $config['allowed_types']        ='gif|png|jpg|jpeg|icon';
            $config['max_size']             =2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title'         => 'Edit Data Berita' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'berita'        => $this->M_berita->detail($id_berita),
                    'isi'           => 'v_edit_databerita'
            );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                // Edit Dengan Ubah Gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_berita'         => $id_berita,
                    'nama_berita'       => $this->input->post('nama_berita'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'link'              => $this->input->post('link'),
                    'gambar'            =>$upload_data['uploads']['file_name'],
                 );
        $this->M_berita->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('berita');
            }
            // Edit Tanpa Ubah Gambar
            $data = array(
                'id_berita'         => $id_berita,
                'nama_berita'       => $this->input->post('nama_berita'),
                'keterangan'        => $this->input->post('keterangan'),
                'link'              => $this->input->post('link'),
             );
    $this->M_berita->edit($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
    redirect('berita');
        }
        $data = array(
            'title'         => 'Edit Data Berita' , 
            'berita'        => $this->M_berita->detail($id_berita),
            'isi'           => 'v_edit_databerita'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }

            public function hapus($id_berita)
            {
                $this->user_login->cek_login();
                $data = array('id_berita'=>$id_berita);
                $this->M_berita->hapus($data);
                $this->M_berita->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
                redirect('berita');
            }
}

/* End of file Controllername.php */
