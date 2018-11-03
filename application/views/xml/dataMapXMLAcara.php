<?php
 
     // Parsing Karakter-Karakter Khusus
     function parseToXML($htmlStr)
     {
          $xmlStr=str_replace('<','<',$htmlStr);
          $xmlStr=str_replace('>','>',$xmlStr);
          $xmlStr=str_replace('"','"',$xmlStr);
          $xmlStr=str_replace("'",'"',$xmlStr);
          $xmlStr=str_replace("&",'&',$xmlStr);
          return $xmlStr;
     }
 
      
     

     // Header File XML
     header("Content-type: text/xml");
 
     // Parent node XML
     echo '<markers>';
 
     // Iterasi baris, masing-masing menghasilkan node-node XML
     foreach ($xml->result() as $x):
 
          // Menambahkan ke node dokumen XML
          echo '<marker ';
          echo 'id="' . parseToXML($x->idAcara) . '" ';
          echo 'name="' . parseToXML($x->namaAcara) . '" ';
          echo 'deskrip="' . parseToXML($x->deskripAcara) . '" ';
          echo 'pamflet="' . parseToXML($x->pamflet) . '" ';
          echo 'status="' . parseToXML($x->status) . '" ';
          echo 'lat="' . $x->lat . '" ';
          echo 'lng="' . $x->lng . '" ';
          echo 'idJadwal="' . parseToXML($x->idJadwal) . '" ';
          echo '/>';
 
     // Akhir File XML (tag penutup node)
     endforeach;     
     echo '</markers>';
 
?>