<?php  
$fp = fsockopen('smtp.gmail.com', 465, $errno, $errstr, 10);
if (!$fp){
    echo "smtp.gmail.com 465  -  $errstr   ($errno)<br>\n";
}else{
	echo "mail sukses";
}
$fp1 = fsockopen('smtp.gmail.com', 587, $errno, $errstr, 10);
if (!$fp1){
    echo "smtp.gmail.com 587  -  $errstr   ($errno)<br>\n";
}else{
	echo "mail sukses";
}

echo '<br>';


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
                    $this->email->to('angga3399@gmail.com');
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
                                Alwan Ganteng
                            </center>
                        </body>
                    </html>"
                    );

                    if($this->email->send()                                            
                    }else {
                        $this->session->set_flashdata('info', 'Email gagal Terkirim');
                        redirect('admin/kelolapetugas');
                        }

?>


