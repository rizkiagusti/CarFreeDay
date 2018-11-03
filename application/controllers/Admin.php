<?php 
    class admin extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('M_user');
            $this->load->model('M_cfd');
            $this->load->model('M_acara');
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
        }

        function cek(){
            $this->load->view('admin/polyline');
        }

        function index(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');
            if ($data['nama_admin'] != NULL) {
                redirect('beranda');
            }else{
                redirect('login');
            }
        }
        
        //tampilan
        public function beranda(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['dataacarabelumaktif'] = $this->M_acara->tampilacarabelumaktif()->num_rows();
                $data['dataacaraaktif'] = $this->M_acara->tampilacaraaktif()->num_rows();
                $data['dataadmin'] = $this->M_user->tampilAdmin()->num_rows();
                $data['datapetugas'] = $this->M_user->tampilPetugas()->num_rows();
                $data['dataevent'] = $this->M_acara->tampilsemua()->num_rows();
                $data['datacfd'] = $this->M_cfd->tampil()->num_rows();
                $data['isi'] = 'admin/beranda';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        //profil
        public function profil(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');   
            $idAdmin = $this->session->userdata('id_admin'); 
            
            if ($data['nama_admin'] != NULL) {
                $data['person'] = $this->M_user->tampilPerson($idAdmin);
                $data['isi'] = 'admin/profile';
                $this->load->view('admin/home1',$data);
            }
            else{
                redirect('login');
            }         
        }

        public function kelolaadmin(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');   
            
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->M_user->tampilAdmin()->result_object();
                $data['isi'] = 'admin/kelolaadmin';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }         
        }


        public function tambah()
        { 
            error_reporting(0);
            $data['nama_admin']    = $this->session->userdata('nama_admin');
            if ($data['nama_admin'] != NULL) {
                if ($this->input->post('simpan')) {
                    $email = $this->input->post('email');
                    $nama = $this->input->post('nama');
                    $idAdmin = $this->input->post('idAdmin');
                    $cekAdmin = $this->M_user->tampilPerson($idAdmin);
                    $cekEmailAdmin = $this->M_user->cekEmailAdmin($email);

                     if (($this->input->post('katasandi')) == ($this->input->post('verkatasandi'))) {
                         
                        $this->form_validation->set_rules('idAdmin', 'No KTP', 'required|trim');
                        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
                        $this->form_validation->set_rules('email', 'email', 'required|trim');
                        $this->form_validation->set_rules('katasandi', 'Kata Sandi', 'required|trim');
                        $this->form_validation->set_rules('verkatasandi', 'Verifikasi Kata Sandi', 'required|trim');

                        if ($this->form_validation->run() == FALSE) {
                            $this->session->set_flashdata('peringatan', 'Ada field yang belum dimasukkan');
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                        }elseif (!is_numeric($idAdmin)) {
                            $this->session->set_flashdata('peringatan', 'No KTP hanya angka yang diizinkan');   
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                        }elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                            $this->session->set_flashdata('peringatan', 'Nama Admin hanya huruf dan spasi yang diizinkan');   
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $this->session->set_flashdata('peringatan', 'Format email salah');
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                        }elseif($cekAdmin->noKTP == $idAdmin){
                            $this->session->set_flashdata('peringatan', 'No KTP sudah ada');
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                        }elseif($cekEmailAdmin->email == $email){
                            $this->session->set_flashdata('peringatan', 'Email sudah ada');
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);    
                        }else{
                            $this->M_user->tambah_admin();
                            $this->session->set_flashdata('info', 'Data berhasil ditambah');
                            redirect('admin/kelolaadmin','refresh');
                         } 
                     }else {
                            $this->session->set_flashdata('peringatan', 'Verifikasi Kata Sandi tidak sama');
                            $data['isi'] = 'admin/formtambahadmin';
                            $this->load->view('admin/home1',$data);
                     }
                } 
                else {
                    //$kode = 'admin';  
                    //$data['kodeunik'] = $this->M_user->getkodeunik($kode);
                    $data['isi'] = 'admin/formtambahadmin';
                    $this->load->view('admin/home1',$data);
                } 
            }else{
                redirect('login');
            }
        }

        //cek
        public function ubah($idAdmin){
            $data['nama_admin'] = $this->session->userdata('nama_admin');
            if ($data['nama_admin'] != NULL) {                
                $katasandilama = md5($this->input->post('katasandi'));
                $email = $this->input->post('emailAdmin');
                $nama  = $this->input->post('namaAdmin');
                $cekAdmin   = $this->M_user->getPassword($katasandilama);
                $cekEmailAdmin   = $this->M_user->cekEmailAdmin($email);
                
                if ($this->input->post('simpanakun')) {
                    if ($this->input->post('katasandi') == NULL) {
                        $this->session->set_flashdata('kesalahanakun', 'Isi kata sandi lama');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        $this->session->set_flashdata('kesalahanakun', 'Format Email Salah');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                    }elseif (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                        $this->session->set_flashdata('kesalahanakun', 'Nama admin hanya huruf dan spasi yang diizinkan');   
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                    }elseif($cekEmailAdmin->email == $email){
                        $this->session->set_flashdata('kesalahanakun', 'Email Sudah Ada');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');    
                    }
                    
                    if ($cekAdmin->num_rows() == 1 ) {
                        $data1['email'] = $this->input->post('emailAdmin');
                        $data2['nama'] = $this->input->post('namaAdmin');
                       
                        $idAdmin=$this->input->post('idAdmin');
                        $this->M_user->ubah_admin($idAdmin, $data1 ,$data2);

                        $this->session->set_flashdata('info', 'Data berhasil diubah');
                        redirect('admin/kelolaadmin');
                    }else
                    {
                        $this->session->set_flashdata('kesalahanakun', 'Kata sandi lama salah');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                        break;
                    }                 
                }
                else if ($this->input->post('simpankatasandi')){
                    $katasandilama = md5($this->input->post('katasandilama'));
                    $cekAdmin   = $this->M_user->getPassword($katasandilama);

                    if ($katasandilama == NULL) {
                        $this->session->set_flashdata('kesalahankatasandi', 'Isi kata sandi lama');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                    }elseif($cekAdmin->num_rows() == 1) {
                        $katasandibaru = md5($this->input->post('katasandi'));
                        $verkatasandi = md5($this->input->post('verkatasandi'));

                        if ($katasandibaru == $verkatasandi) {
                            $data1['password'] = $verkatasandi;
                            $data2['nama'] = $this->input->post('namaAdmin');

                            $idAdmin=$this->input->post('idAdmin');
                            $this->M_user->ubah_admin($idAdmin, $data1, $data2);

                            $this->session->set_flashdata('info', 'Data berhasil diubah');
                            redirect('admin/kelolaadmin');
                        }else {
                            $this->session->set_flashdata('kesalahankatasandi', 'Kata sandi baru dan verifikasi kata sandi tidak sama');
                            redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                        }

                    }else {
                        $this->session->set_flashdata('kesalahankatasandi', 'Kata sandi lama salah');
                        redirect('admin/kelolaadmin/ubah/'.$idAdmin.'');
                    }
                }   
                else{
                    $data['admin'] = $this->M_user->tampilPerson($idAdmin);

                    $data['isi'] = 'admin/formubahadmin';
                    $this->load->view('admin/home1', $data);
                }
            }
            else{
                redirect('login');
            }  
        }

        public function hapus($idAdmin){
            $this->M_user->hapus_admin($idAdmin);

            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect(base_url('admin/kelolaadmin'));
        }

        function logout()
        {
            $this->session->sess_destroy();         
            redirect('login','refresh');
        }
    }
?>