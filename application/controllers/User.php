<?php

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->user_login->cek_login();
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'user'  => $this->M_user->tampil(),
            'isi'   => 'v_datauser'
    );
        $this->load->view('layout/v_wrapper', $data, FALSE);
    }
    
        public function input()
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run()== FALSE) {
            $data = array(
                'title' => 'Input Data User' , 
                'isi'   => 'v_input_datauser'
        );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{
            $data = array(
                        'nama_user' => $this->input->post('nama_user'),
                        'username'  => $this->input->post('username'),
                        'password'  => $this->input->post('password')
            );
            $this->M_user->simpan($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Disimpan');
            redirect('user/input');
        }
    }

    public function edit($id_user)
    {
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));
        
        $this->form_validation->set_rules('username', 'Username', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('password', 'Username', 'required',array(
            'required' =>'%s Harus Diisi !!!'
        ));

        if ($this->form_validation->run()== FALSE) {
            $data = array(
                'title' => 'Edit Data User', 
                'user'  => $this->M_user->detail($id_user),
                'isi'   => 'v_edit_datauser'
        );
            $this->load->view('layout/v_wrapper', $data, FALSE);
        }else{
            $data = array(
                        'id_user'      => $id_user,
                        'nama_user'      => $this->input->post('nama_user'),
                        'username'       => $this->input->post('username'),
                        'password'       => $this->input->post('password'),
                     );
            $this->M_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
            redirect('user');
        }

    }

    public function hapus($id_user)
    {
        $data = array('id_user'=>$id_user);
        $this->M_user->hapus($data);
        $this->M_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
            redirect('user');
    }
}


