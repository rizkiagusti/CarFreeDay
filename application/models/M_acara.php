<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_acara extends CI_Model{
        
        public function tampil()
        {
             $this->db->select("*");
             $this->db->FROM("acara");
             $this->db->join("jadwal","acara.idJadwal=jadwal.idJadwal");
             $this->db->join("carfree","jadwal.idCarFree=carfree.idCarFree");
             return $this->db->get()->result();
        }
        
        public function tampilsemua()
        {
              return $this->db->get('acara');
        }
        
        public function tampilacaraaktif()
        {
             $this->db->select("*");
             $this->db->FROM("acara");
             $this->db->where('acara.status','Aktif');
             return $this->db->get();
        }
        
        public function tampilacarabelumaktif()
        {
             $this->db->select("*");
             $this->db->FROM("acara");
             $this->db->where('acara.status','Belum Aktif');
             return $this->db->get();
        }


        public function getActivasi($idacara){
            $this->db->select('*');
            $this->db->FROM('acara');
            $this->db->join('jadwal','acara.idJadwal=jadwal.idJadwal');
            $this->db->join('carfree','jadwal.idCarFree=carfree.idCarFree');
            $this->db->where('acara.idAcara',$idacara);
            return $this->db->get();
        }

        function cekLatLng($lat,$lng){
            $this->db->select('*');
            $this->db->FROM('acara');
            $this->db->where('lat',$lat);
            $this->db->where('lng',$lng);
            return $this->db->get()->row();
        }

        public function konfirmasi($idacara, $data){
            $this->db->where('idacara', $idacara);
            $this->db->update('acara', $data);
        }        

        public function hapus($idacara){
            $this->db->where('idacara', $idacara);
            $this->db->delete('acara');
        }

        function getAcara($idJadwal)
        {
            $query = ("SELECT DISTINCT * FROM jadwal,acara WHERE acara.idJadwal = '$idJadwal' and acara.idJadwal = jadwal.idJadwal and acara.status = 'Aktif'");
            return $this->db->query($query);
        }


        function tambahAcara() {
            //kode unik
            $q = $this->db->query("SELECT MAX(RIGHT(idAcara,2)) AS idmax FROM acara");
            $kd = ""; //kode awal
            if($q->num_rows()>0){ //jika data ada
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
                }
            }else{ //jika data kosong diset ke kode awal
                $kd = "01";
            }
            $kar = "E"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi

            $nama       = $this->input->post('nama');
            $deskripsi  = $this->input->post('desk');
            $lat        = $this->input->post('lat');
            $lng        = $this->input->post('lng');

            //untuk id jadwal
            $tgl   = $this->input->post('tgl');
            $jadwal  = $this->M_jadwal->selectJadwal($tgl);
            
            $this->load->library('upload');
            $config['upload_path'] = './assets/img/pamflet'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name'] = $nama; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['foto']['name'])
            {
                if ($this->upload->do_upload('foto'))
                {
                    $gbr = $this->upload->data();
                    define( 'WP_MEMORY_LIMIT', '256M' );
                    $source_url=$config['upload_path'].'/'.$gbr['file_name'];
                    $image = imagecreatefromjpeg($source_url);
                    imagejpeg($image, $config['upload_path'].'/'.$gbr['file_name'], 50);
                    $input = array(
                        'idAcara'     =>$kar.$kd,
                        'namaAcara'   =>$nama,
                        'deskripAcara'=>$deskripsi,
                        'pamflet'     =>$gbr['file_name'],
                        'status'      =>"Belum Aktif",
                        'lat'         =>$lat,
                        'lng'         =>$lng,
                        'idJadwal'    =>$jadwal->idJadwal
                    );
                }
            }
                    $this->db->insert('acara',$input);
        }

        function allAcara($id){
            $this->db->select('acara.*,jadwal.*,carfree.*,user.idCarFree');
            $this->db->from('acara');
            $this->db->join('jadwal','acara.idJadwal=jadwal.idJadwal');
            $this->db->join("carfree","jadwal.idCarFree=carfree.idCarFree");
            $this->db->join("user","user.idCarFree=carfree.idCarFree");
            $this->db->where("user.idCarFree",$id);
            $this->db->where("statusUser","Petugas");
            $this->db->order_by("jadwal.tgl","desc");
            $this->db->order_by("acara.status","desc");
            $query = $this->db->get();
            return $query;
        }

        function selectAcara($tgl){
            error_reporting(E_ALL^(E_NOTICE | E_WARNING));
            $this->load->model('m_jadwal');
            $data  = $this->m_jadwal->selectJadwal($tgl);
            
            $this->db->select('*');
            $this->db->from('acara');
            $this->db->where('idJadwal', $data->idJadwal);
            $query = $this->db->get();
            
            return $query->num_rows();
        } 
        
        function acaraKonf($id){
            $this->db->select('acara.*,jadwal.*,carfree.*,user.idCarFree');
            $this->db->from('acara');
            $this->db->join('jadwal','acara.idJadwal=jadwal.idJadwal');
            $this->db->join("carfree","jadwal.idCarFree=carfree.idCarFree");
            $this->db->join("user","user.idCarFree=carfree.idCarFree");
            $this->db->where("user.idCarFree",$id);
            $this->db->where("statusUser","Petugas");
            $this->db->where("acara.status","Aktif");
            $this->db->order_by("jadwal.tgl","desc");
            $query = $this->db->get();
            return $query;
        }

        function acaraGagal($id){
            $this->db->select('acara.*,jadwal.*,carfree.*,user.idCarFree');
            $this->db->from('acara');
            $this->db->join('jadwal','acara.idJadwal=jadwal.idJadwal');
            $this->db->join("carfree","jadwal.idCarFree=carfree.idCarFree");
            $this->db->join("user","user.idCarFree=carfree.idCarFree");
            $this->db->where("user.idCarFree",$id);
            $this->db->where("statusUser","Petugas");
            $this->db->where("acara.status","Belum Aktif");
            $this->db->order_by("jadwal.tgl","desc");
            $query = $this->db->get();
            return $query->num_rows();
        }

        function ubahAcara($idAcara) {
            
            $nama       = $this->input->post('nama');
            $deskripsi  = $this->input->post('desk');
            $lat        = $this->input->post('lat');
            $lng        = $this->input->post('lng');

            $tgl   = $this->input->post('tgl');
            $this->load->model('m_jadwal');
            $jadwal  = $this->m_jadwal->selectJadwal($tgl);
            
            $this->load->model('m_acara');
            $foto  = $this->m_acara->getActivasi($idAcara)->row();
            
            $this->load->library('upload');
            $config['upload_path'] = './assets/img/pamflet'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name'] = $nama; //nama yang terupload nantinya
            $this->upload->initialize($config);
            
            if($_FILES['foto']['name'])
            {
                unlink("./assets/img/pamflet/".$foto->pamflet);
                
                if ($this->upload->do_upload('foto'))
                {
                    $gbr = $this->upload->data();
                    
                    define( 'WP_MEMORY_LIMIT', '256M' );
                    $source_url=$config['upload_path'].'/'.$gbr['file_name'];
                    $image = imagecreatefromjpeg($source_url);
                    imagejpeg($image, $config['upload_path'].'/'.$gbr['file_name'], 50);
                    
                    $input = array(
                        'namaAcara'   =>$nama,
                        'deskripAcara'=>$deskripsi,
                        'pamflet'     =>$gbr['file_name'],
                        'lat'         =>$lat,
                        'lng'         =>$lng,
                        'idJadwal'    =>$jadwal->idJadwal
                    );
                }
            }else{
                    rename("./assets/img/pamflet/".$foto->pamflet,"./assets/img/pamflet/".$config['file_name'].'.jpg');
                    $input = array(
                        'namaAcara'   =>$nama,
                        'deskripAcara'=>$deskripsi,
                        'pamflet'     =>$config['file_name'].'.jpg',
                        'lat'         =>$lat,
                        'lng'         =>$lng,
                        'idJadwal'    =>$jadwal->idJadwal
                    );
                }
                    
          $this->db->set($input);
          $this->db->where('idacara', $idAcara);
          $this->db->update('acara');
        }

}