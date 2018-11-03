<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_cfd extends CI_Model{
        
        function tampil()
        {
             return $this->db->get('carfree');
        }

        function tampilPetugasCFD()
        {
            $this->db->select('*');
            $this->db->from('carfree');
            $this->db->where('petugas','Belum');
            return $this->db->get();
        }

        function getPanitia($email){
            $this->db->select('*');
            $this->db->from('panitia');
            $this->db->where('email', $email);
            $query = $this->db->get();
            return $query;
        }

        public function tambah_cfd(){
             $idCarFree  = $this->input->post('idCarFree');
             $namaCFD = $this->input->post('namaCFD');
             $lat = $this->input->post('lat');
             $lng = $this->input->post('lng');
             $deskrip = $this->input->post('deskrip');
                     
            $object = array(
                        'idCarFree' => $idCarFree,
                        'namaCFD' => $namaCFD,
                        'lat' => $lat,
                        'lng' => $lng,
                        'deskrip' => $deskrip,
                     );

            return $this->db->insert('carfree', $object);
            
        }



        function ubah_cfd($idCarFree, $data){
            $this->db->where('idCarFree', $idCarFree);
            $this->db->update('carfree', $data);
        }

        function hapus_cfd($idCarFree){
            $this->db->where('idCarFree', $idCarFree);
            $this->db->delete('carfree');
        }


        function select_by_id($idCarFree){
            $this->db->select('*');
            $this->db->from('carfree');
            $this->db->where('idCarFree', $idCarFree);
            return $this->db->get();
        }

       function kegiatanMen()
       {
            $query = ("SELECT DISTINCT *,datediff(jadwal.tgl,current_date()) as selisih FROM jadwal,acara,carfree WHERE acara.idJadwal = jadwal.idJadwal and jadwal.idCarFree = carfree.idCarFree and acara.status = 'Aktif'");
            return $this->db->query($query);

       }
       
       function cari()
       {
           $cari     = $this->input->post('cari');
            
            $query = ("SELECT * FROM jadwal,acara,carfree WHERE acara.idJadwal = jadwal.idJadwal and jadwal.idCarFree = carfree.idCarFree and acara.namaacara LIKE '%$cari%'");
            return $this->db->query($query);
       }

       function select($idCarFree)
       {
            return $this->db->get_where('carfree', array('idCarFree'=>$idCarFree))->row();
       }

       function getJadwal($idCarFree)
       {
            $query = ("SELECT DISTINCT * FROM jadwal WHERE idCarFree = '$idCarFree'");
            return $this->db->query($query);
       }

       function getPamflet($idCarFree)
       {
            $query = ("SELECT DISTINCT * FROM acara,jadwal WHERE acara.idJadwal = jadwal.idJadwal and jadwal.idCarFree = '$idCarFree'");
            return $this->db->query($query);    
       }

        function getkodeunik($kode) { 

            $q = $this->db->query("SELECT MAX(RIGHT(idCarFree,2)) AS idmax FROM ".$kode);
            $kd = ""; //kode awal
            if($q->num_rows()>0){ //jika data ada
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
                }
            }else{ //jika data kosong diset ke kode awal
                $kd = "01";
            }
            $kar = "C"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi
            return $kar.$kd;
        }
        
}