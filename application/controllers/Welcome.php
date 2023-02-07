<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model("servicio");
		 $this->load->model("galeria");
		 $this->load->model("contacto");
		 $this->load->model("noticia");
		 $this->load->model("mision");
		 $this->load->model("vision");
		 $this->load->model("carrusel");
	}

	public function index()
	{
		$data["servicios"]=$this->servicio->consultarTodos();
		$data["galerias"]=$this->galeria->consultarTodos();
		$data["contactos"]=$this->contacto->consultarTodos();
		$data["noticias"]=$this->noticia->consultarTodos();
		$data["misiones"]=$this->mision->consultarTodos();
		$data["visiones"]=$this->vision->consultarTodos();
		$data["carruseles"]=$this->carrusel->consultarTodos();
/*
		//validando si alguien esta conectado
		if ($this->session->userdata("c0nectadoUTC")) {
			// si esta conectado
		} else {
			redirect("seguridades/formularioLogin");
		}
*/
		$this->load->view("publica/header");
		$this->load->view('welcome_message',$data);
		$this->load->view("publica/footer");
	}
}
