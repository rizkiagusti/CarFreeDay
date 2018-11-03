<?php 
    class acara extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model(array('M_user','M_acara','M_cfd','M_jadwal'));
            $this->load->library(array('form_validation','session','image_lib'));
            $this->load->database();
            $this->load->helper('url');
             date_default_timezone_set('Asia/Jakarta');
        }

        public function kelolaacara(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->M_acara->tampil();

                $data['isi'] = 'admin/aktivasiacara';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        public function dataacaraaktif(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->M_acara->tampil();

                $data['isi'] = 'admin/dataacaraaktif';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        public function dataacarabelumaktif(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->M_acara->tampil();

                $data['isi'] = 'admin/dataacarabelumaktif';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        public function tampil($idacara){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['acara'] = $this->M_acara->getActivasi($idacara)->row();

                $data['isi'] = 'admin/tampilaktivasiacara';
                $this->load->view('admin/home1',$data);
            }
            else{
                redirect('login');
            }            
        }

        public function konfirmasi(){
            $idAcara = $this->input->post('idAcara');
            if ($this->input->post('konfirmasi')) {
                $data['status'] = "Aktif";
                $query = $this->M_acara->konfirmasi($idAcara, $data);
                $this->session->set_flashdata('info', 'Data acara berhasil dikonfirmasi');
                redirect('admin/aktivasiacara');
            }
            else{
                $data['status'] = "Ditolak";
                $query = $this->M_acara->konfirmasi($idAcara, $data);
                $this->session->set_flashdata('salah', 'Data acara ditolak');
                redirect('admin/aktivasiacara');
            }
        }

        public function hapus($idacara){
            $this->M_acara->hapus($idacara);
            
            //hapus foto acara
            $foto = $this->M_acara->getActivasi($idacara)->row();
            unlink("./assets/img/pamflet/".$foto->pamflet);

            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect(base_url('admin/aktivasiacara'));
        }


        function tambahAcara()
        {
            error_reporting(E_ALL^(E_NOTICE | E_WARNING));
            $email    = $this->session->userdata('petugas_email');
            if ($email==NULL) {
                redirect('login');             
            }else{
                if($_POST==NULL){
                    $this->load->view('petugas/header');
                    $this->load->view('petugas/v_tambahAcara');
                    $this->load->view('petugas/footer');
                }else{
                    $nama = $this->input->post('nama');
                    $lat  = $this->input->post('lat');
                    $lng  = $this->input->post('lng');
                    $foto = $_FILES['foto']['name'];
                    
                    $cekLatLng = $this->M_acara->cekLatLng($lat,$lng);
                    
                    $this->form_validation->set_rules('nama', '', 'required');
                    $this->form_validation->set_rules('lat' , '', 'required');
                    $this->form_validation->set_rules('lng' , '', 'required');
                    $this->form_validation->set_rules('desk', '', 'required');
                    
                    if($this->form_validation->run() == FALSE){
                        $this->session->set_flashdata('info', 'Ada field yang belum dimasukkan');   
                    }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                        $this->session->set_flashdata('info', 'Nama acara hanya huruf dan spasi yang diizinkan');   
                    }elseif (!is_numeric($lat)){
                        $this->session->set_flashdata('info', 'Latitude hanya angka pecahan yang diizinkan');
                    }elseif (!is_numeric($lng)){
                        $this->session->set_flashdata('info', 'Longitude hanya angka pecahan yang diizinkan');
                    }elseif ($cekLatLng->lat == $lat && $cekLatLng->lng == $lng){
                        $this->session->set_flashdata('info', 'Latitude longitude sudah ada');
                    }elseif ($foto==NULL) {
                        $this->session->set_flashdata('info', 'Pamflet belum dimasukkan');
                    }else{
                        $petugas = $this->M_user->getEmailPetugas($email)->row();
                        $tanggal = $this->input->post('tgl');
                        $data = $this->M_jadwal->selectJadwal($tanggal);
                        if ($data->tgl==$tanggal && $data->idCarFree==$petugas->idCarFree) {
                             $this->M_acara->tambahAcara();
                        }else{
                             $this->M_jadwal->inputJadwal();
                             $this->M_acara->tambahAcara();
                        }
                        $this->session->set_flashdata('notifsukses', '<br><div class="alert alert-success"><a class="close" data-dismiss="alert" aria-label="close">×</a><center> Data berhasil ditambah</center></div>');
                        redirect('petugas/home','refresh');
                    }
                    $this->load->view('petugas/header');
                    $this->load->view('petugas/v_tambahAcara');
                    $this->load->view('petugas/footer');
                }
            }
        }

        public function ubahAcara($idAcara)
        {
           error_reporting(E_ALL^(E_NOTICE | E_WARNING));
           $email    = $this->session->userdata('petugas_email');
            if ($email==NULL) {
                redirect('login');             
            }else{       
                $this->data['acara'] = $this->M_acara->getActivasi($idAcara)->row();
                if($_POST==NULL){
                $this->load->view('petugas/header');
                $this->load->view('petugas/v_ubah',$this->data);
                $this->load->view('petugas/footer');
                }else{
                    $nama = $this->input->post('nama');
                    $lat  = $this->input->post('lat');
                    $lng  = $this->input->post('lng');
                    
                    $cekLatLng = $this->M_acara->cekLatLng($lat,$lng);
                    
                    $this->form_validation->set_rules('nama', '', 'required');
                    $this->form_validation->set_rules('lat' , '', 'required');
                    $this->form_validation->set_rules('lng' , '', 'required');
                    $this->form_validation->set_rules('desk', '', 'required');
                    
                    if($this->form_validation->run() == FALSE){
                        $this->session->set_flashdata('info', 'Ada field yang belum dimasukkan');   
                    }elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                        $this->session->set_flashdata('info', 'Nama acara hanya huruf dan spasi yang diizinkan');   
                    }elseif (!is_numeric($lat)){
                        $this->session->set_flashdata('info', 'Latitude hanya angka pecahan yang diizinkan');
                    }elseif (!is_numeric($lng)){
                        $this->session->set_flashdata('info', 'Longitude hanya angka pecahan yang diizinkan');
                    }elseif ($cekLatLng->lat == $lat && $cekLatLng->lng == $lng){
                        $this->session->set_flashdata('info', 'Latitude longitude sudah ada');
                    }else{

                        $tanggal = $this->input->post('tgl');
                        $data = $this->M_jadwal->selectJadwal($tanggal);
                        if ($data->tgl==$tanggal && $data->idCarFree==$this->data['acara']->idCarFree) {
                             $this->M_acara->ubahAcara($idAcara);
                        }else{
                             $this->M_jadwal->inputJadwal();
                             $this->M_acara->ubahAcara($idAcara);
                        }
                        $this->session->set_flashdata('notifsukses', '<br><div class="alert alert-success"><a class="close" data-dismiss="alert" aria-label="close">×</a><center> Data berhasil diubah</center></div>');
                       redirect('petugas/home','refresh');
                }
                       redirect('petugas/acara/ubah/'.$idAcara,'refresh');
                }
            }
        }
        
    public function tampilXMLAcara()
    {
        $this->load->model('M_acara');
        $xml['xml'] = $this->M_acara->tampilsemua();

        $this->load->view('xml/dataMapXMLAcara', $xml);
    }
}
    
?>