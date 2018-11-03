<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_lokasi extends CI_Model{
        
        function tampilCFDLokasi()
        {
            $this->db->select('*');
            $this->db->from('carfree');
            return $this->db->get();
        }

        public function tambah_lokasi(){
            $idLok = $this->input->post('idLok');
            $idCarFree  = $this->input->post('idCarFree');
             
            $lat = $this->input->post('lat');
            $lng = $this->input->post('lng');
            
                     
            $object = array(
                        'idLok' => $idLok,
                        'idCarFree' => $idCarFree,
                        'lat' => $lat,
                        'lng' => $lng,
                        
                     );

            return $this->db->insert('lokasi', $object);
            
        }
        
        function getkodeunik($kode) { 

            $q = $this->db->query("SELECT MAX(RIGHT(idLok,2)) AS idmax FROM ".$kode);
            $kd = ""; //kode awal
            if($q->num_rows()>0){ //jika data ada
                foreach($q->result() as $k){
                    $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                    $kd = sprintf("%02s",$tmp); //kode ambil 4 karakter terakhir
                }
            }else{ //jika data kosong diset ke kode awal
                $kd = "01";
            }
            $kar = "L"; //karakter depan kodenya
            //gabungkan string dengan kode yang telah dibuat tadi
            return $kar.$kd;
        }
}