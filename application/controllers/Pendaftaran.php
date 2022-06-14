<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends  CI_Controller
{
	public $controller = "Pendaftaran";
	public $view       = "v_Pendaftaran";
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Pendaftaran');
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
		$data['lembaga'] = $this->M_Lembaga->gridata()->result();

		$this->load->view($this->view . '/home', $data);
	}
	function post_jurusan_byid()
	{
		$kode_lembaga = $this->input->post("kode_lembaga");
		$data = $this->M_Pendaftaran->get_jurusan_byid($kode_lembaga);
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
		$data['editdata'] = $this->M_Pendaftaran->getby_id($id);
		$this->load->view($this->view . '/edit', $data);
	}

	public function postdata()
	{
		$this->form_validation->set_rules('Pendaftaran', 'Pendaftaran', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Pendaftaran = strtoupper($this->input->post('Pendaftaran'));
			$slug     = slug($Pendaftaran);
			$check    = $this->M_Pendaftaran->check_Pendaftaran($Pendaftaran);
			if ($check > 0) {
				$msg          = "Pendaftaran already exist";
				$hasil        = "false";
				$err_Pendaftaran = "data sudah ada";
			} else {
				$rand = $this->uuid->v4();
				$uuid = str_replace('-', '', $rand);
				$data = array(
					'id_Pendaftaran'   => $uuid,
					'nm_Pendaftaran'   => $Pendaftaran,
					'slug_Pendaftaran' => $slug,
				);
				$this->M_Pendaftaran->insert($data);
				$msg          = "data successfully added";
				$hasil        = "true";
				$err_Pendaftaran = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Pendaftaran" => $err_Pendaftaran,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Pendaftaran" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function postedit()
	{
		$this->form_validation->set_rules('Pendaftaran', 'Pendaftaran', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Pendaftaran    = strtoupper($this->input->post('Pendaftaran'));
			$id = strtoupper($this->input->post('id_Pendaftaran'));
			$slug     = slug($Pendaftaran);
			$check    = $this->M_Pendaftaran->check_Pendaftaran($Pendaftaran);
			if ($check > 0) {
				$msg          = "Pendaftaran already exist";
				$hasil        = "false";
				$err_Pendaftaran = "data sudah ada";
			} else {
				$data = array(
					'nm_Pendaftaran'   => $Pendaftaran,
					'slug_Pendaftaran' => $slug,
				);
				$this->M_Pendaftaran->update($id, $data);
				$msg          = "data successfully Update";
				$hasil        = "true";
				$err_Pendaftaran = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Pendaftaran" => $err_Pendaftaran,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Pendaftaran" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$check    = $this->M_Pendaftaran->check_id($id);
		if ($check > 0) {
			$this->M_Pendaftaran->delete($id);
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
