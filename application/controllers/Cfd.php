<?php 
    class cfd extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model(array('M_user','M_cfd','M_jadwal','M_acara','M_lokasi'));
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
        }

        //cek
        public function kelolacfd(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['datacfd'] = $this->M_cfd->tampil()->result();
                $data['isi'] = 'admin/kelolacfd';

                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        //cek
        public function tambah_cfd(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            if ($data['nama_admin'] != NULL) {
                if ($this->input->post('simpan')) {
                         $namaCFD = $this->input->post('namaCFD');
                         $this->form_validation->set_rules('namaCFD', '', 'required');
                         $this->form_validation->set_rules('lat', '', 'required');
                         $this->form_validation->set_rules('lng', '', 'required');
                         $this->form_validation->set_rules('deskrip', '', 'required');
    
                            
                         if ($this->form_validation->run() === FALSE) {
                            $this->session->set_flashdata('peringatan', 'Ada field yang belum dimasukkan');
                            $kode = 'carfree';  
                            $data['kodeunik'] = $this->M_cfd->getkodeunik($kode);
                            $data['isi'] = 'admin/formtambahcfd';
                            $this->load->view('admin/home1',$data);
                         }elseif(!preg_match("/^[a-zA-Z ]*$/",$namaCFD)){
                             $this->session->set_flashdata('peringatan', 'Nama CFD hanya huruf yang diizinkan');
                             $kode = 'carfree';  
                             $data['kodeunik'] = $this->M_cfd->getkodeunik($kode);
                             $data['isi'] = 'admin/formtambahcfd';
                             $this->load->view('admin/home1',$data);
                         }
                         else {
                             $query = $this->M_cfd->tambah_cfd();

                             if ($query) {
                                $this->session->set_flashdata('info', 'Data berhasil ditambah');
                                redirect('admin/kelolacfd');
                             }
                         } 
                } 
                else {
                    $kode = 'carfree';  
                    $data['kodeunik'] = $this->M_cfd->getkodeunik($kode);

                    $data['isi'] = 'admin/formtambahcfd';
                    $this->load->view('admin/home1',$data);
                }
            }
            else{
                redirect('login');
            }
        }
        
        public function tambah_cfd_lokasi(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            if ($data['nama_admin'] != NULL) {
                if ($this->input->post('simpan')) {
                         
                         
                         $this->form_validation->set_rules('lat', '', 'required');
                         $this->form_validation->set_rules('lng', '', 'required');
                         
    
                            
                         if ($this->form_validation->run() === FALSE) {
                            $this->session->set_flashdata('peringatan', 'Ada Field yang Belum Dimasukkan');
                            $kode = 'lokasi';  
                            $data['kodeunik'] = $this->M_lokasi->getkodeunik($kode);
                            $data['data'] = $this->M_lokasi->tampilCFDLokasi()->result_object();
                            $data['dataadmin'] = $this->M_user->tampilAdmin()->result_object();
                            $data['isi'] = 'admin/formtambahcfdlokasi';
                            $this->load->view('admin/home1',$data);
                         }
                         else {
                             $query = $this->M_lokasi->tambah_lokasi();

                             if ($query) {
                                $this->session->set_flashdata('info', 'Data berhasil ditambah');
                                redirect('admin/kelolacfd');
                             }
                         } 
                } 
                else {
                    $kode = 'lokasi';  
                    $data['kodeunik'] = $this->M_lokasi->getkodeunik($kode);
                    $data['data'] = $this->M_lokasi->tampilCFDLokasi()->result_object();
                    $data['dataadmin'] = $this->M_user->tampilAdmin()->result_object();
                    $data['isi'] = 'admin/formtambahcfdlokasi';
                    $this->load->view('admin/home1',$data);
                }
            }
            else{
                redirect('login');
            }
        }

        public function ubah($idCarFree){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                if ($this->input->post('simpan')) {
                    $data1['namaCFD'] = $this->input->post('namaCFD');
                    $data1['lat'] = $this->input->post('lat');
                    $data1['lng'] = $this->input->post('lng');
                    $data1['deskrip'] = $this->input->post('deskrip');

                    $idCarFree = $this->input->post('idCarFree');
                    $this->M_cfd->ubah_cfd($idCarFree, $data1);

                    $this->session->set_flashdata('info', 'Data berhasil diubah');
                    redirect('admin/kelolacfd');
                }
                else {
                    $data['carfreeday'] = $this->M_cfd->select_by_id($idCarFree)->row();

                    $data['isi'] = 'admin/formubahcfd';
                    $this->load->view('admin/home1',$data);
                } 
            }
            else{
                redirect('login');
            }   
        }

        public function tampil($idCarFree){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                    $data['carfreeday'] = $this->M_cfd->select_by_id($idCarFree)->row();

                    $data['isi'] = 'admin/tampilcfd';
                    $this->load->view('admin/home1',$data);
        
            }
            else{
                redirect('login');
            }   
        }

        public function hapus($idCarFree){
            $this->M_cfd->hapus_cfd($idCarFree);

            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect(base_url('admin/kelolacfd'));
        }


    }

?>