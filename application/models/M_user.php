<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_user extends CI_Model{

        function data_petugas(){
            $this->db->select('user.*, login.email, login.password, carfree.*');
            $this->db->from('user');
            $this->db->join('login','user.noKTP=login.noKTP');
            $this->db->join("carfree","user.idCarFree=carfree.idCarFree");
            $this->db->where('statusUser','Petugas');
            return $this->db->get()->result();
        }

        function data_petugas_cfd($idCarFree){
            $this->db->select('user.*, login.email, login.password, carfree.*');
            $this->db->from('user');
            $this->db->join('login','user.noKTP=login.noKTP');
            $this->db->join("carfree","user.idCarFree=carfree.idCarFree");
            $this->db->where('statusUser','Petugas');
            $this->db->where('user.idCarFree',$idCarFree);
            return $this->db->get()->row();
        }

        function getData_Petugas($email){
            $this->db->select('*');
            $this->db->from('login');
            $this->db->where('email', $email);
            $query = $this->db->get();
            return $query;
        }

        function getID_Petugas($id){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('noKTP', $id);
            return $this->db->get();
        }
        
       /* function update($id)
        {
            $no_ktp     = $this->input->post('no_ktp');
            $nama       = $this->input->post('nama');
            $tgl_lahir  = date('Y/m/d',strtotime($this->input->post('tgl')));
            $alamat     = $this->input->post('alamat');
            $kontak     = $this->input->post('kontak');
            $email      = $this->input->post('email');
            $pass       = $this->input->post('pass');
            $konf_pass  = $this->input->post('konf_pass');

            $data_user['ktp'] = $no_ktp;                
            $this->session->set_userdata($data_user);
                 
            $this->load->library('upload');
            $config['upload_path'] = './assets/img/petugas'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name'] = $no_ktp; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['foto']['name'])
            {
                if ($this->upload->do_upload('foto'))
                {
                    $gbr = $this->upload->data();
                    define( 'WP_MEMORY_LIMIT', '256M' );
                    $source_url=$config['upload_path'].'/'.$gbr['file_name'];
                    $image = imagecreatefromjpeg($source_url);
                    imagejpeg($image, $config['upload_path'].'/'.$gbr['file_name'], 75);
                    $data = array(
                        'noKtp'       =>$no_ktp,
                        'namaPetugas' =>$nama,
                        'tgl'         =>$tgl_lahir,
                        'alamat'      =>$alamat,
                        'kontak'      =>$kontak,
                        'password'    =>md5($pass),
                        'foto'        =>$gbr['file_name']
                    );
                }
            }
          $this->db->set($data);
          $this->db->where('emailPetugas', $id);
          $this->db->update('petugas');
       }*/

       function pengaturan($noKTP)
        {
            $nama           = $this->input->post('petugas_nama');
            $kontak         = $this->input->post('petugas_kontak');
            $alamat         = $this->input->post('petugas_alamat');
            $email          = $this->input->post('petugas_email');
            $sandi_baru     = $this->input->post('sandi_baru');
        
            if($sandi_baru==NULL && $nama!=NULL){
                    $data = array(
                        'nama'   =>$nama,
                        'kontak'        =>$kontak
                    );
                    $data1 = array(
                        'email'  =>$email
                    );

                    $this->session->set_userdata('petugas_email',$email);

            }elseif($sandi_baru!=NULL){
                    $data = array(
                        'nama'   => $nama
                    );
                    $data1 = array(
                        'password'   =>md5($sandi_baru)
                    );
            }

          $this->db->set($data);
          $this->db->where('noKTP', $noKTP);
          $this->db->update('user');
          
          $this->db->set($data1);
          $this->db->where('noKTP', $noKTP);
          $this->db->update('login');
            
       }

        //MAS
        public function tampilPetugas()
        {
             $this->db->select('user.*, login.email, login.password, carfree.*');
             $this->db->from('user');
             $this->db->join('login','user.noKTP=login.noKTP');
             $this->db->join('carfree','user.idCarFree=carfree.idCarFree');
             $this->db->where('statusUser','Petugas');
             return $this->db->get();
        }        

        function getEmailPetugas($email){
             $this->db->select('user.*, login.email, login.password');
             $this->db->from('user');
             $this->db->join('login','user.noKTP=login.noKTP');
             $this->db->where('statusUser','Petugas');
             $this->db->where('email',$email);
            return $this->db->get();
        }

        function getDeskrip($email){
            $this->db->select('*');
            $this->db->FROM('user');
            $this->db->join('carfree','user.idCarFree=carfree.idCarFree');
            $this->db->join('login','user.noKTP=login.noKTP');
            $this->db->where('email',$email);
            return $this->db->get();
        }

        function hapus_petugas($idCarFree){
            $this->db->where('idCarFree', $idCarFree);
            $this->db->where('statusUser', 'Petugas');
            $this->db->delete('user');
            
            $object2 = array(
                'petugas'   => 'Belum'
            );
            $this->db->where('idCarFree', $idCarFree);
            $this->db->update('carfree', $object2);
        }

        function getkodeunik($kode) { 
            $q = $this->db->query("SELECT MAX(RIGHT(noKtp,2)) AS idmax FROM ".$kode);
            $kd = ""; //kode awal
            if($q->num_rows()>0){ //jika data ada
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
                }
            }else{ //jika data kosong diset ke kode awal
                $kd = "01";
            }
            $kar = "P"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi
            return $kar.$kd;
        }
        
        //-----------------------------------------------------------------------------------------------------//
        //-------------------------------------------ADMIN----------------------------------------------------//
        //---------------------------------------------------------------------------------------------------//
        
        public function tampilAdmin()
        {
             $this->db->select('user.*, login.email, login.password');
             $this->db->from('user');
             $this->db->join('login','user.noKTP=login.noKTP');
             $this->db->where('user.statusUser','Admin');
             return $this->db->get();
        }

        public function tambah_admin(){
             $idAdmin  = $this->input->post('idAdmin');
             $namaAdmin = $this->input->post('nama');
             $email = $this->input->post('email');
             $password = $this->input->post('katasandi');
                     
                    $object = array(
                                    'noKTP' => $idAdmin,
                                    'nama' => $namaAdmin,
                                    'statusUser' => 'Admin',
                                    'idCarFree' => 'C01',
                            );

                    
                    $object1 = array(
                                    'noKTP' => $idAdmin,
                                    'email' => $email,
                                    'password' => md5($password),
                            );

                    $this->db->insert('user', $object);
                    return $this->db->insert('login', $object1);
        }

        function select_all(){
            $this->db->select('*');
            $this->db->from('admin');
            $this->db->order_by('date_modified', 'desc');
            return $this->db->get();
        }

        function getPassword($katasandi){
            $this->db->select('user.*, login.email, login.password');
            $this->db->from('user');
            $this->db->join('login','user.noKTP=login.noKTP');
            $this->db->where('statusUser','Admin');
            $this->db->where('password', $katasandi);
            $query = $this->db->get();
            return $query;
        }

        function tampilPerson($idAdmin){
            $this->db->select('user.*, login.email, login.password');
            $this->db->from('user');
            $this->db->join('login','user.noKTP=login.noKTP');
            $this->db->where('statusUser','Admin');
            $this->db->where('user.noKTP', $idAdmin);
            $query = $this->db->get();
            return $query->row();
        }
        
        function cekAdmin($idAdmin){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('user.noKTP', $idAdmin);
            $query = $this->db->get();
            return $query->row();
        }
        function cekEmailAdmin($email){
             $this->db->select('*');
             $this->db->from('login');
             $this->db->where('email',$email);
             $query = $this->db->get();
             return $query->row();
        }
        
        function ubah_admin($idAdmin, $data, $data1){
            $this->db->where('noKTP', $idAdmin);
            $this->db->update('login', $data);

            $this->db->where('noKTP', $idAdmin);
            $this->db->update('user', $data1);

        }

        function hapus_admin($idAdmin){
            $this->db->where('noKTP', $idAdmin);
            $this->db->delete('user');
        }

        // function getkodeunik($kode) { 

        //     $q = $this->db->query("SELECT MAX(RIGHT(idAdmin,2)) AS idmax FROM ".$kode);
        //     $kd = ""; //kode awal
        //     if($q->num_rows()>0){ //jika data ada
        //         foreach($q->result() as $k){
        //             $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
        //             $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
        //         }
        //     }else{ //jika data kosong diset ke kode awal
        //         $kd = "01";
        //     }
        //     $kar = "A"; //karakter depan kodenya
        //     //gabungkan string dengan kode yang telah dibuat tadi
        //     return $kar.$kd;
        // }
        
        
}