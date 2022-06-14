<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends  CI_Controller
{
	public $controller = "Jurusan";
	public $view       = "v_Jurusan";
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Jurusan');
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
		$data['data'] = $this->M_Jurusan->gridata()->result();
		echo json_encode($data);
	}
	public function add()
	{
		$data['title']     = 'Create - ' . $this->controller;
		$data['Lembaga']   = $this->M_Lembaga->gridata()->result();
		$data['url_post']  = base_url($this->controller . '/postdata');
		$data['url_index'] = base_url($this->controller);
		$this->load->view($this->view . '/form', $data);
	}
	public function edit($id)
	{
		$data['title']    = 'Edit - ' . $this->controller;
		$data['url_postedit'] = base_url($this->controller . '/postedit');
		$data['url_index']    = base_url($this->controller);
		$data['editdata'] = $this->M_Jurusan->getby_id($id);
		$this->load->view($this->view . '/edit', $data);
	}

	public function postdata()
	{
		$this->form_validation->set_rules('Jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('Lembaga', 'Lembaga', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Jurusan = strtoupper($this->input->post('Jurusan'));
			$kode_lembaga = strtoupper($this->input->post('Lembaga'));
			$kd_jurusan = strtoupper($this->input->post('kd_jurusan'));
			$slug     = slug($Jurusan);
			$check    = $this->M_Jurusan->check_Jurusan($Jurusan);
			if ($check > 0) {
				$msg          = "Jurusan already exist";
				$hasil        = "false";
				$err_Jurusan = "data sudah ada";
			} else {
				$rand = $this->uuid->v4();
				$uuid = str_replace('-', '', $rand);
				$data = array(
					'id_Jurusan'   => $uuid,
					'nm_Jurusan'   => $Jurusan,
					'kode_lembaga'   => $kode_lembaga,
					'kode_jurusan'   => $kd_jurusan,
					'slug_Jurusan' => $slug,
				);
				$this->M_Jurusan->insert($data);
				$msg          = "data successfully added";
				$hasil        = "true";
				$err_Jurusan = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Jurusan" => $err_Jurusan,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Jurusan" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function postedit()
	{
		$this->form_validation->set_rules('Jurusan', 'Jurusan', 'required');
		if ($this->form_validation->run() == TRUE) {
			$Jurusan    = strtoupper($this->input->post('Jurusan'));
			$id = strtoupper($this->input->post('id_Jurusan'));
			$slug     = slug($Jurusan);
			$check    = $this->M_Jurusan->check_Jurusan($Jurusan);
			if ($check > 0) {
				$msg          = "Jurusan already exist";
				$hasil        = "false";
				$err_Jurusan = "data sudah ada";
			} else {
				$data = array(
					'nm_Jurusan'   => $Jurusan,
					'slug_Jurusan' => $slug,
				);
				$this->M_Jurusan->update($id, $data);
				$msg          = "data successfully Update";
				$hasil        = "true";
				$err_Jurusan = null;
			}
			$jsonmsg = array(
				"msg"          => $msg,
				"hasil"        => $hasil,
				"err_Jurusan" => $err_Jurusan,
			);
			echo json_encode($jsonmsg);
		} else {
			$jsonmsg = array(
				"msg"          => 'Insert Data failed',
				"hasil"        => 'false',
				"err_Jurusan" => null,
			);
			echo json_encode($jsonmsg);
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$check    = $this->M_Jurusan->check_id($id);
		if ($check > 0) {
			$this->M_Jurusan->delete($id);
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
