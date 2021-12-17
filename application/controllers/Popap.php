<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Popap extends CI_Controller {
  public function __construct()
  {
    parent::__construct();

    $this->load->model('clientes_model');
    $this->load->model('inicio');
    $this->load->model('reservas_model');
  }