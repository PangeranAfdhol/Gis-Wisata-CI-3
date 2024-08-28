<?php

class Webgis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_wisata');
        $this->load->model('M_berita');
        $this->load->model('M_budaya');
        
    }

    public function index()
    {
        $data = array(
            'title' => 'Web Gis Wisata', 
            'wisata'=> $this->M_wisata->tampil(),
            'isi'   => 'v_webgis'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function list_wisata()
    {
        $data = array(
            'title' => 'Web Gis Wisata', 
            'wisata'=> $this->M_wisata->tampil(),
            'isi'   => 'v_list_wisata'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function list_budaya()
    {
        $data = array(
            'title' => 'Web Gis Wisata', 
            'budaya'=> $this->M_budaya->tampil(),
            'isi'   => 'v_list_budaya'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function berita()
    {
        $data = array(
            'title' => 'Web Gis Wisata', 
            'berita'=> $this->M_berita->tampil(),
            'isi'   => 'v_berita'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function about()
    {
        $data = array(
            'title' => 'Web Gis Wisata', 
            'isi'   => 'v_about'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function detail($id_wisata){
        $data = array(
            'title' => 'Detail Wisata', 
            'wisata'=>$this->M_wisata->detail($id_wisata),
            'isi'   => 'v_detail'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);
    }

    public function detailbudaya($id_budaya){
        $data = array(
            'title' => 'Detail Budaya', 
            'budaya'=>$this->M_budaya->detailbudaya($id_budaya),
            'isi'   => 'v_detailbudaya'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);

    }

    public function detailberita($id_berita){
        $data = array(
            'title' => 'Detail Berita', 
            'berita'=>$this->M_berita->detailberita($id_berita),
            'isi'   => 'v_detailberita'
    );
        $this->load->view('front-end/v_wrapper', $data, FALSE);

    }
}


/* End of file Webgis.php */
