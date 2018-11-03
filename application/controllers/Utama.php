<?php
class Utama extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model(array('M_xml','M_cfd','M_acara'));
  	 	$this->load->database();
        $this->load->helper(array('url', 'download'));
        date_default_timezone_set('Asia/Jakarta');
  	 	
  	 	
	}
	
	public function index()
	{
		$this->load->model('M_cfd');
		$data['evn'] = $this->M_cfd->kegiatanMen();
		$this->load->view('index', $data);
	}
	
	public function cari()
	{
		$this->load->model('M_cfd');
		$data['evn'] = $this->M_cfd->cari();
		$this->load->view('cari', $data);
	}

	public function detailCFD($idCarFree)
	{
		$this->load->model('M_cfd');
		$data['no'] = $this->M_cfd->select($idCarFree);
		$data['jdw'] = $this->M_cfd->getJadwal($idCarFree);
		$data['pmf'] = $this->M_cfd->getPamflet($idCarFree);
		$this->load->view('detailCFD', $data);
	}

	public function listAcara($idJadwal)
	{
		$this->load->model('M_acara');
		$data['evn'] = $this->M_acara->getAcara($idJadwal);
		$this->load->view('listAcara', $data);
	}
	
	public function daftar()
	{
		$this->load->view('petugas/header');
		$this->load->view('petugas/daftar');
		$this->load->view('petugas/footer');
	}

	public function unduh(){				
		force_download('assets/file/surat.docx',NULL);
	}	

	public function tampilXML()
	{
		$this->load->model('M_xml');
        $xml['xml'] = $this->M_xml->tampilXML();

		$this->load->view('xml/dataMapXML', $xml);
	}
	
	public function tampilXMLcontoh($idCarFree)
	{
		$this->load->model('M_xml');
        $xml['xml'] = $this->M_xml->tampilXMLcontoh($idCarFree);

		$this->load->view('xml/dataMapXMLcontoh', $xml);
	}


}
