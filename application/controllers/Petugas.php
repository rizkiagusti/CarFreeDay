<?php 
    class petugas extends CI_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model(array('m_user','m_cfd','m_jadwal','m_acara'));
            $this->load->library(array('form_validation','session','image_lib'));
            $this->load->database();
            $this->load->helper('url');
            date_default_timezone_set('Asia/Jakarta');
        }

        public function index()
        {
            $this->data['petugas'] = $this->m_user->data_petugas();
            $this->load->view('petugas/header');
            $this->load->view('petugas/index',$this->data);
            $this->load->view('petugas/footer');
        }

        public function cek()
        {
            $this->load->view('petugas/cek');
        }

        function home()
        {
            $email    = $this->session->userdata('petugas_email');
            $id       = $this->session->userdata('id');     
            
            if ($email==NULL) {
                redirect('login');        
            }else{
                $this->data['allpetugas'] = $this->m_user->data_petugas();
                $tgl = date('Y-m-d', strtotime('sunday'));
    
                $this->data['petugas'] = $this->m_user->getDeskrip($email)->row();
                $this->data['selectAcara'] = $this->m_acara->selectAcara($tgl);
                $this->data['allAcara']    = $this->m_acara->allAcara($id);
                $this->data['acaraKonf']   = $this->m_acara->acaraKonf($id);
                $this->data['acaraGagal']  = $this->m_acara->acaraGagal($id);
                
                $this->load->view('petugas/header');
                $this->load->view('petugas/v_home',$this->data);
                $this->load->view('petugas/footer');
            }
        }

        function pengaturan()
        {
            $email      = $this->session->userdata('petugas_email');                 
            if ($email==NULL) {
                redirect('login');             
            }else{

                $no_ktp     = $this->input->post('noKtp');     
                $nama       = $this->input->post('petugas_nama');     
                $kontak     = $this->input->post('petugas_kontak');     
                $cekEmail   = $this->input->post('petugas_email');     
                $sandi_lama = $this->input->post('sandi_lama');     
                $sandi_baru = $this->input->post('sandi_baru');     
                $sandi_konf = $this->input->post('sandi_konf');

                $cekPetugas  = $this->m_user->getData_Petugas($cekEmail);
                $data = $this->m_user->getDeskrip($email);
                foreach ($data->result() as $c) {

                if($_POST==NULL){
                        $this->data['petugas'] = $this->m_user->getDeskrip($email)->row();
                        $this->load->view('petugas/header');
                        $this->load->view('petugas/v_pengaturan',$this->data);
                        $this->load->view('petugas/footer');
                }elseif($sandi_lama==NULL){
                        if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
                            $this->session->set_flashdata('notifgagal', 'Nama Petugas hanya huruf dan spasi yang diizinkan');   
                        }elseif (!is_numeric($kontak)) {
                            $this->session->set_flashdata('notifgagal', 'Kontak hanya angka yang diizinkan');   
                        }elseif(!filter_var($cekEmail, FILTER_VALIDATE_EMAIL)){
                            $this->session->set_flashdata('notifgagal', 'Format email salah');   
                        }elseif($cekPetugas->num_rows() == 1 ) {
                            $this->session->set_flashdata('notifgagal', 'Email sudah ada');
                        }else{
                            $this->m_user->pengaturan($no_ktp);
                            $this->session->set_flashdata('notifsukses', 'Data berhasil diubah');
                            redirect('petugas/pengaturan');
                        }
                        redirect('petugas/pengaturan');
                    }elseif($sandi_lama!=NULL){
                        if ($c->password==md5($sandi_lama)) {
                              if ($sandi_baru == $sandi_konf) {
                                $this->m_user->pengaturan($no_ktp);
                                redirect('petugas/logout');
                              }else{
                                $this->session->set_flashdata('notifgagal', 'Kata sandi baru dan verifikasi kata sandi tidak sama');
                                redirect('petugas/pengaturan'); 
                              }                            
                        }else{
                            $this->session->set_flashdata('notifgagal', 'Kata sandi lama salah');
                            redirect('petugas/pengaturan');
                        }
                    }
                }//end foreach
            }
        }

        /*function profil()
        {   
            $email    = $this->session->userdata('petugas_email');
            if ($email==NULL) {
                redirect('login');             
            }elseif($this->session->userdata('ktp')!=NULL){
                redirect('petugas/home');
            }else{            
                if($_POST==NULL){
                $this->data['petugas'] = $this->m_user->getEmailPetugas($email)->row();
                $this->load->view('petugas/profil',$this->data);
                }
                elseif($_POST['pass'] == $_POST['konf_pass']){
                    $this->m_user->update($email);
                    redirect('petugas/home');
                }elseif($_POST['pass'] != $_POST['konf_pass']){
                    $this->session->set_flashdata('notifgagal', 'Password baru dengan Konfirmasi password berbeda');
                    redirect('petugas/profil');
                }
            }
        }*/

        function kelolapetugas(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->m_user->tampilPetugas()->result_object();

                $data['isi'] = 'admin/kelolapetugas';
                $this->load->view('admin/home',$data);
            }
            else{
                redirect('login');
            }
        }

        function form_tambahpetugas(){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            if ($data['nama_admin'] != NULL) {
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['dataadmin'] = $this->m_user->tampilAdmin()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }
            else{
                redirect('login');
            }
        }



        function sendMail() {
            $website = base_url();

            $receiver_email = $this->input->post('email');
            $noKTP          = $this->input->post('noKtp');
            $namaPetugas    = $this->input->post('namaPetugas');
            $kontak         = $this->input->post('kontak');
            $idCarFree      = $this->input->post('idCarFree');
            
            $cekPetugas   = $this->m_user->getData_Petugas($receiver_email);
            $cekID        = $this->m_user->getID_Petugas($noKTP);
            $cekCFD       = $this->m_user->data_petugas_cfd($idCarFree);
                        
            $this->form_validation->set_rules('idCarFree', '', 'required');
            $this->form_validation->set_rules('noKtp', '', 'required');
            $this->form_validation->set_rules('namaPetugas', '', 'required');
            $this->form_validation->set_rules('email', '', 'required');            
            $this->form_validation->set_rules('kontak', '', 'required');            
            
            //validasi
            if ($this->input->post('submit')==NULL) {
                redirect ('admin/kelolapetugas/tambah');   
            }elseif($this->form_validation->run() === FALSE){
                $this->session->set_flashdata('info', 'Ada field yang belum dimasukkan');   
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }elseif (!is_numeric($noKTP)) {
                $this->session->set_flashdata('info', 'No KTP hanya angka yang diizinkan');   
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }elseif($cekID->num_rows() > 0 ) {
                $this->session->set_flashdata('info', 'No. KTP sudah ada');
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);        
            }elseif (!preg_match("/^[a-zA-Z ]*$/",$namaPetugas)) {
                $this->session->set_flashdata('info', 'Nama petugas hanya huruf dan spasi yang diizinkan');   
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }elseif (!is_numeric($kontak)) {
                $this->session->set_flashdata('info', 'Kontak hanya angka yang diizinkan');   
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }elseif(!filter_var($receiver_email, FILTER_VALIDATE_EMAIL)){
                $this->session->set_flashdata('info', 'Format email salah');   
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);
            }elseif($cekPetugas->num_rows() == 1 ) {
                $this->session->set_flashdata('info', 'Email sudah ada');
                $data['data'] = $this->m_cfd->tampilPetugasCFD()->result_object();
                $data['isi'] = 'admin/formtambahpetugas';
                $this->load->view('admin/home1',$data);        
            }else{
                    //password anyar
                    $pass="129FAasdsk25kwBjakjDlff"; 
                    $panjang='8'; 
                    $len=strlen($pass);
                    $start=$len-$panjang; 
                    $xx=rand('0',$start);
                    $yy=str_shuffle($pass);
                    $passwordbaru=substr($yy, $xx, $panjang);
                    
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
                    $this->email->from('tugaskampusunikom@gmail.com', 'CFD Kota Bandung');
                    // Receiver email address
                    $this->email->to($receiver_email);
                    // Subject of email
                    $this->email->subject('Password Baru');
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
                            Kami telah membuat password Anda, Berikut password baru Anda :<br><br>
                            <table>
                            <tr>
                                <td><b>Password Baru</b><td>: <b>".$passwordbaru."</b></td></td>
                            </tr>
                            </table>
                                <p>Anda dapat login kembali dengan password baru Anda ke <a href=\"".$website."login\" target=\"_blank\" style=\"text-decoration:none;font-weight:bold;\">Website CFD Kota Bandung</a>.</p>
                                <p><br><br>
                            Developer CFD Kota Bandung<br>
                                Provinsi Jawa Barat
                                </p>
                                <center>
                                <small>
                                <p class=\"doff\">All Rights Reserved &copy; ".date("Y")." DISKOMINFO.<br>
                                <a href=\"".$website."\" target=\"_blank\" style=\"text-decoration:none;\">Website Utama</a></p>
                                </small>
                                </center>
                        </body>
                    </html>"
                    );

                       if ($this->email->send()) {
                                            
                        
                        $pass = md5($passwordbaru);

                        $object = array(
                                'noKTP'       => $noKTP,
                                'nama'        => $namaPetugas,
                                'kontak'      => $kontak,
                                'statusUser'  => 'Petugas',
                                'idCarFree'   => $idCarFree
                         );
                        $this->db->insert('user', $object);

                        $object1 = array(
                                'noKTP'    => $noKTP,
                                'email'    => $receiver_email,
                                'password' => $pass
                         );
                         $this->db->insert('login', $object1);

                         $object2 = array(
                                'petugas'   => 'Sudah'
                         );
                         $this->db->where('idCarFree', $idCarFree);
                         $this->db->update('carfree', $object2);

                           $this->session->set_flashdata('info', 'Data berhasil ditambah');
                           redirect('admin/kelolapetugas');
                        }else {
                           $this->session->set_flashdata('info', 'Email gagal Terkirim');
                           redirect('admin/kelolapetugas');
                        }
            }
        }

        function tampil($email){
            $data['nama_admin']    = $this->session->userdata('nama_admin');      
            
            if ($data['nama_admin'] != NULL) {
                $data['petugas'] = $this->m_user->getDeskrip($email)->row();

                $data['isi'] = 'admin/tampilpetugas';
                $this->load->view('admin/home1',$data);
            }
            else{
                redirect('login');
            }            
        }

        function hapus($idCarFree){
           
            $this->m_user->hapus_petugas($idCarFree);
            
            $this->session->set_flashdata('info', 'Data berhasil dihapus');
            redirect(base_url('admin/kelolapetugas'));
        }

        function logout()
        {
            $this->session->sess_destroy();         
            redirect('login','refresh');
        }
    }

?>