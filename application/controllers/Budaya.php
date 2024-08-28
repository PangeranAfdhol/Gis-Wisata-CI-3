<?php

class Budaya extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_budaya');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Budaya',
            'budaya'=> $this->M_budaya->tampil(),
            'isi'   => 'v_databudaya'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_budaya', 'Nama Budaya', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()== TRUE) {
            $config['upload_path']          ='./gambar/';
            $config['allowed_types']        ='gif|jpg|png|jpeg|icon';
            $config['max_size']             =2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title'         => 'Input Data Budaya' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'isi'           => 'v_input_databudaya'
            );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_budaya'       => $this->input->post('nama_budaya'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                 );
        $this->M_budaya->simpan($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
        redirect('budaya/input');
            }
        }
        $data = array(
            'title'         => 'Input Data Budaya' , 
            'isi'           => 'v_input_databudaya'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_budaya)
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_budaya', 'Nama Budaya', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()== TRUE) {
            $config['upload_path']          ='./gambar/';
            $config['allowed_types']        ='gif|jpg|png|jpeg|icon';
            $config['max_size']             =2000;
            $this->upload->initialize($config);
            if (! $this->upload->do_upload('gambar')) {
                $data = array(
                    'title'         => 'Edit Data Budaya' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'budaya'        => $this->M_budaya->detail($id_budaya),
                    'isi'           => 'v_edit_datawisata'
            );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                // Edit Dengan Ubah Gambar
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_budaya'         => $id_budaya,
                    'nama_budaya'       => $this->input->post('nama_budaya'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'gambar'            =>$upload_data['uploads']['file_name'],
                 );
        $this->M_budaya->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('budaya');
            }
            // Edit Tanpa Ubah Gambar
            $data = array(
                'id_budaya'         => $id_budaya,
                'nama_budaya'       => $this->input->post('nama_budaya'),
                'keterangan'        => $this->input->post('keterangan'),
             );
    $this->M_budaya->edit($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
    redirect('budaya');
        }
        $data = array(
            'title'         => 'Edit Data Budaya' , 
            'budaya'        => $this->M_budaya->detail($id_budaya),
            'isi'           => 'v_edit_databudaya'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }

            public function hapus($id_budaya)
            {
                $this->user_login->cek_login();
                $data = array('id_budaya'=>$id_budaya);
                $this->M_budaya->hapus($data);
                $this->M_budaya->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
                redirect('budaya');
            }
}

/* End of file Controllername.php */
