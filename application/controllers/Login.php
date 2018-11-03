<?php 
    class login extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model(array('m_login','m_user'));
            $this->load->library(array('form_validation','session'));
            $this->load->database();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('encrypt');
            date_default_timezone_set('Asia/Jakarta');
        }

        public function index(){

            if ($this->session->userdata('login_petugas')== 'berhasil') {
                redirect('petugas/home');
            }elseif($this->session->userdata('login_admin')== 'berhasil') {
                redirect('admin/beranda');
            }else{
                $this->load->view('login/v_login');
            }
        }
        
        public function login_act(){
            $email        = $this->input->post('email');
            $password     = md5($this->input->post('password'));
            $cekEmailUser = $this->m_login->getEmailUser($email,1);    
            $cekPassUser  = $this->m_login->getPassUser($password,1);    

            //validasi email dan password
            if($_POST['email']==NULL && $_POST['password']==NULL){   
                $pesan['pesan'] ='Email dan kata sandi belum dimasukkan';
            }elseif ($_POST['email']==NULL) {
                $pesan['pesan'] ='Email belum dimasukkan';
            }elseif ($_POST['password']==NULL) {
                $pesan['pesan'] ='Kata sandi belum dimasukkan';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $pesan['pesan'] ='Format email salah';
            }elseif($cekEmailUser->num_rows() == NULL) {
                $pesan['pesan'] ='Email tidak ditemukan';
            }elseif($cekPassUser->num_rows() == NULL) {
                $pesan['pesan'] ='Kata Sandi Salah';
            }elseif($cekEmailUser->num_rows()!=NULL  && $cekPassUser->num_rows()!=NULL){
                
                foreach ($cekEmailUser->result() as $c) {
                        if($c->statusUser == "Petugas") {
                            $data_user['login_petugas']        = 'berhasil';
                            $data_user['petugas_email']        = $c->email;
                            $data_user['id']                   = $c->idCarFree;
                            $data_user['ktp']                  = $c->noKtp;
                            $this->session->set_userdata($data_user);    
                            redirect('petugas/home');
                        }elseif($c->statusUser == "Admin") {
                            $data_user['login_admin']          = 'berhasil';
                            $data_user['nama_admin']           = $c->nama;
                            $data_user['email_admin']          = $c->email;
                            $data_user['id_admin']             = $c->noKTP;
                            $this->session->set_userdata($data_user);
                            redirect('admin/beranda');
                        }
                }

            }else{
                $pesan['pesan'] ='Email dan Kata Sandi Salah!!!';                
            }
            $this->load->view('login/v_login',$pesan);   
            
        }
                
        function lupaKataSandi(){
            $receiver_email = $this->input->post('to_email');          
            $cekUser   = $this->m_login->getEmailUser($receiver_email);
           
            if($_POST==NULL){
                $this->load->view('login/v_lupaKataSandi');
            }else{
            
            if ($receiver_email==NULL) {
                $this->session->set_flashdata('notifgagal', 'Email belum dimasukkan');
            }elseif(!filter_var($receiver_email, FILTER_VALIDATE_EMAIL)){
                $this->session->set_flashdata('notifgagal', 'Format email salah');
            }elseif($cekUser->num_rows() == 1 ) {

                //password anyar
                $pass="129FAasdsk25kwBjakjDlff"; 
                $panjang='8'; 
                $len=strlen($pass);
                $start=$len-$panjang; 
                $xx=rand('0',$start);
                $yy=str_shuffle($pass);
                $passwordbaru=substr($yy, $xx, $panjang);
                $website =  base_url();
                // Configure email library
                $config = Array(  
                    
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'tugaskampusunikom@gmail.com',
                    'smtp_pass' => 'fucktugas',
                    'mailtype'  => 'html', 
                    'charset'   => 'iso-8859-1'
                ); 
                // Load email library and passing configured values to email library 
                $this->load->library('email');
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                // Sender email address
                $this->email->from('mail@tugas.id', 'CFD Kota Bandung');
                // Receiver email address
                $this->email->to($receiver_email);
                // Subject of email
                $this->email->subject('Lupa Password');
                // Message in email
                $this->email->message(
                "<html>
                    <style>
                    
                    .doff{
                        color:#555;
                    }
                    </style>
                    <body>
                        <center>
                        <h3>Developer Car Free Day<br><small>Kota Bandung</small></h3>
                        </center>
                        <br>
                        Kami telah mengatur ulang password Anda, Berikut password baru Anda :<br><br>
                        <table>
                        <tr>
                            <td><b>Password Baru</b><td>: <b>".$passwordbaru."</b></td></td>
                        </tr>
                        </table>
                            <p>Anda dapat login kembali dengan password baru Anda ke <a href=\"".base_url()."\" login\" target=\"_blank\" style=\"text-decoration:none;font-weight:bold;\">Website CFD Kota Bandung</a>.</p>
                            <p><br><br>
                        Developer CFD Kota Bandung<br>
                            Provinsi Jawa Barat
                            </p>
                            <center>
                            <small>
                            <p class=\"doff\">All Rights Reserved &copy; ".date("Y")." DISKOMINFO.<br>
                            <a href=\"".base_url()."\" target=\"_blank\" style=\"text-decoration:none;\">Website Utama</a></p>
                            </small>
                            </center>
                    
                        </body>
                    </html>"
                    );

                    if($this->email->send())
                    {
                        $data['password'] = md5($passwordbaru);

                        if ($cekUser->num_rows() == 1 ) {
                         $this->m_login->ubahpasswordUser($receiver_email, $data);
                         $this->session->set_flashdata('notifsukses', 'Email terkirim');
                        }
                    }else{
                         $this->session->set_flashdata('notifgagal', 'Email gagal terkirim');
                    }
                    
                 
                }else{
                    $this->session->set_flashdata('notifgagal', 'Email tidak ditemukan');
                }
                 $this->load->view('login/v_lupaKataSandi');
            }    
        }
        
    }
?>