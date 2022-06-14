<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lembaga extends  CI_Controller
{
	public $controller = "Lembaga";
	public $view       = "v_Lembaga";
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Lembaga');
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
	public function grid()
	{
		$data['data'] = $this->M_Lembaga->gridata()->result();
		echo json_encode($data);
	}
	public function add()
	{
		$data['title'] = 'Create - ' . $this->controller;
		$data['url_post'] = base_url($this->controller . '/postdata');
		$data['url_index']    = base_url($this->controller);
		$this->load->view($this->view . '/form', $data);
	}
	public function edit($id)
	{
		$data['title']    = 'Edit - ' . $this->controller;
		$data['url_postedit'] = base_url($this->controller . '/postedit');
		$data['url_index']    = base_url($this->controller);
		$data['editdata'] = $this->M_Lembaga->getby_id($id);
		$this->load->view($this->view . '/edit', $data);
	}

	public function postdata()
	{
		$this->form_validation->set_rules('Lembaga', 'Lembaga', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Lembaga = strtoupper($this->input->post('Lembaga'));
			$kode_lembaga = strtoupper($this->input->post('kode_lembaga'));
			$slug     = slug($Lembaga);
			$check    = $this->M_Lembaga->check_Lembaga($Lembaga);
			if ($check > 0) {
				$msg          = "Lembaga already exist";
				$hasil        = "false";
				$err_Lembaga = "data sudah ada";
			} else {
				$rand = $this->uuid->v4();
				$uuid = str_replace('-', '', $rand);
				$data = array(
					'id_Lembaga'   => $uuid,
					'kode_lembaga' => $kode_lembaga,
					'nm_Lembaga'   => $Lembaga,
					'slug_Lembaga' => $slug,
				);
				$this->M_Lembaga->insert($data);
				$msg          = "data successfully added";
				$hasil        = "true";
				$err_Lembaga = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Lembaga" => $err_Lembaga,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Lembaga" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function postedit()
	{
		$this->form_validation->set_rules('Lembaga', 'Lembaga', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Lembaga    = strtoupper($this->input->post('Lembaga'));
			$kode_lembaga = strtoupper($this->input->post('kode_lembaga'));
			$id = strtoupper($this->input->post('id_Lembaga'));
			$slug     = slug($Lembaga);
			$check    = $this->M_Lembaga->check_Lembaga($Lembaga);
			if ($check > 0) {
				$msg          = "Lembaga already exist";
				$hasil        = "false";
				$err_Lembaga = "data sudah ada";
			} else {
				$data = array(
					'kode_lembaga'   => $kode_lembaga,
					'nm_Lembaga'   => $Lembaga,
					'slug_Lembaga' => $slug,
				);
				$this->M_Lembaga->update($id, $data);
				$msg          = "data successfully Update";
				$hasil        = "true";
				$err_Lembaga = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Lembaga" => $err_Lembaga,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Lembaga" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$check    = $this->M_Lembaga->check_id($id);
		if ($check > 0) {
			$this->M_Lembaga->delete($id);
			$jsonmsg = array(
				"msg"      => 'Delete Data Succces',
				"hasil"    => true,
				"pesan"    => $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus '),

			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"      => 'Delete Data Gagal',
				"hasil"    => false,
				"pesan"    => $this->session->set_flashdata('gagal', 'Data gagal Di Hapus '),

			);
			echo json_encode($jsonmsg);
		}
	}
}
