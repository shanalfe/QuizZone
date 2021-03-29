<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('accueil');
		$this -> load -> helper('file');
	}

	public function inscription() {
		$this -> load -> helper ('url');
		$this -> load -> view ('inscription.php');
	}

	public function inscrire($identifiant, $email, $passeUn, $passeDe){
		$this -> load -> helper ('url');
		$this -> load -> view ('function.php');
	}

	public function connexion() {
		$this -> load -> helper ('url');
		$this -> load -> view ('connexion.php');
	}


	public function profacc(){
		$this -> load -> helper ('url');
		$this -> load -> view ('profacc.php');
		$this -> load -> helper('file');
	}

	public function creerq(){
		$this -> load -> helper ('url');
		$this -> load -> view ('creerq.php');
		$this -> load -> helper('file');
	}

	public function gererq (){
		$this -> load -> helper ('url');
		$this -> load -> view ('gererq.php');
	}

	
	public function noteeleve(){
		$this -> load -> helper ('url');
		$this -> load -> view ('noteeleve.php');
	}

	public function eleveinscription(){
		$this -> load -> helper('url');
		$this -> load -> view ('eleveinscription.php');
	}

	public function fairequizz(){
		$this -> load -> helper('url');
		$this -> load -> view ('fairequizz.php');
		$this -> load -> helper('file');
	}

	public function noteE(){
		$this -> load -> helper('url');
		$this -> load -> view ('noteE.php');
		$this -> load -> helper('file');
	}



	public function statistiques(){
		$this -> load -> helper('url');
		$this -> load -> view ('statistiques.php');
		$this -> load -> helper('file');
	}




}
