<?php

class Wisata extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_wisata');
        
    }
    

    public function index()
    {
        $data = array(
            'title' => 'Data Wisata',
            'wisata'=> $this->M_wisata->tampil(),
            'isi'   => 'v_datawisata'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function input()
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_objek_wisata', 'Nama Objek Wisata', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('desa', 'Desa', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('luas', 'Luas', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
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
                    'title'         => 'Input Data Wisata' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'isi'           => 'v_input_datawisata'
            );
                $this->load->view('layout/v_wrapper', $data, FALSE);
            }else{
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_objek_wisata' => $this->input->post('nama_objek_wisata'),
                    'desa'              => $this->input->post('desa'),
                    'kecamatan'         => $this->input->post('kecamatan'),
                    'luas'              => $this->input->post('luas'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'gambar'            =>$upload_data['uploads']['file_name'],
                 );
        $this->M_wisata->simpan($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
        redirect('wisata/input');
            }
        }
        $data = array(
            'title'         => 'Input Data Wisata' , 
            'isi'           => 'v_input_datawisata'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }

    public function edit($id_wisata)
    {
        $this->user_login->cek_login();
        $this->form_validation->set_rules('nama_objek_wisata', 'Nama Objek Wisata', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('desa', 'Desa', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('luas', 'Luas', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('latitude', 'Latitude', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('longitude', 'Longitude', 'required',array(
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
                    'title'         => 'Edit Data Wisata' , 
                    'error_upload'  => $this->upload->display_errors(),
                    'wisata'        => $this->M_wisata->detail($id_wisata),
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
                    'id_wisata'         => $id_wisata,
                    'nama_objek_wisata' => $this->input->post('nama_objek_wisata'),
                    'desa'              => $this->input->post('desa'),
                    'kecamatan'         => $this->input->post('kecamatan'),
                    'luas'              => $this->input->post('luas'),
                    'latitude'          => $this->input->post('latitude'),
                    'longitude'         => $this->input->post('longitude'),
                    'keterangan'        => $this->input->post('keterangan'),
                    'gambar'            =>$upload_data['uploads']['file_name'],
                 );
        $this->M_wisata->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
        redirect('wisata');
            }
            // Edit Tanpa Ubah Gambar
            $data = array(
                'id_wisata'         => $id_wisata,
                'nama_objek_wisata' => $this->input->post('nama_objek_wisata'),
                'desa'              => $this->input->post('desa'),
                'kecamatan'         => $this->input->post('kecamatan'),
                'luas'              => $this->input->post('luas'),
                'latitude'          => $this->input->post('latitude'),
                'longitude'         => $this->input->post('longitude'),
                'keterangan'        => $this->input->post('keterangan'),
             );
    $this->M_wisata->edit($data);
    $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
    redirect('wisata');
        }
        $data = array(
            'title'         => 'Edit Data Wisata' , 
            'wisata'        => $this->M_wisata->detail($id_wisata),
            'isi'           => 'v_edit_datawisata'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);

    }

            public function hapus($id_wisata)
            {
                $this->user_login->cek_login();
                $data = array('id_wisata'=>$id_wisata);
                $this->M_wisata->hapus($data);
                $this->M_wisata->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
                redirect('wisata');
            }
}

/* End of file Controllername.php */
