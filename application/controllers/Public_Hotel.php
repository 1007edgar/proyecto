<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_Hotel extends CI_Controller {


	public function index()
	{	
		$this->load->view('public/header_public');
		
		$this->load->view('public/mauva1');
		$this->load->view('public/footer_public');
	}	

	public function servicios()
	{
		
		$this->load->view('public/header_public');
		$this->load->view('public/servicios');
		$this->load->view('public/footer_public');
		
	}
	public function contactos()
	{
		
		$this->load->view('public/header_public');
		$this->load->view('public/contactos');
		$this->load->view('public/footer_public');
		
	}

	public function galeria()
	{
		
		$this->load->view('public/header_public');
		$this->load->view('public/galeria');
		$this->load->view('public/footer_public');
		
	}
	
}
