<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends  CI_Controller
{
	public $controller = "Dashboard";
	public $view       = "v_dashboard";
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']        = $this->controller;
		$data['url_index']    = base_url($this->controller);
		$data['url_grid']     = base_url($this->controller . '/grid');
		$data['url_add']      = base_url($this->controller . '/add');
		$data['url_edit']     = base_url($this->controller . '/edit');
		$data['url_delete']   = base_url($this->controller . '/delete');
		$data['url_post']     = base_url($this->controller . '/postdata');
		$this->load->view($this->view . '/home', $data);
	}
}
