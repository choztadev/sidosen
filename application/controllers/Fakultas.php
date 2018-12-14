<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('model_fakultas');
		$this->load->library('session');
		$data = array(
			'konten' => 'fakultas',
			'param'=>'fakultas');
		$this->load->view('template',$data);
	}
	public function tambahfakultas()
	{
		$this->load->library('session');
		$this->load->model('model_fakultas');  //load model
		$nama = $this->input->post('nama_fakultas');  //memasukkan input data dari view
		$data = array(
			'name' => $nama                //sesuaikan nama kolom database
			);
		$this->model_fakultas->insertdb($data,'fakultas');  //jalankan ke model
		$this->session->set_flashdata("notif","<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data berhasil ditambah</div>");
		redirect('fakultas?param=fakultas');
	}

	public function hapusfakultas()
	{
		$this->load->model('model_fakultas'); 
		$this->load->library('session');
		// $data = array(
		// 	'name' => $nama
		// 	);

		$id = $this->uri->segment('3');
		// $where('id', $id);
		//print_r($where);die;
		$data = $this->db->where('id', $id);
		$this->model_fakultas->Delete('tb_fakultas',$data);
		$this->session->set_flashdata("notif","<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data berhasil dihapus</div>");
		redirect('fakultas');
	}
	public function editfakultas()
	{
		$this->load->model('model_fakultas'); 
		$this->load->library('session');
		$id=$this->input->post('id');
		$data['name']=$this->input->post('nama');
		$where=$this->db->where('id', $id);
		$this->model_fakultas->updatedb($where,$data,'tb_fakultas');
		$this->session->set_flashdata("notif","<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Data berhasil diedit</div>");
		redirect('fakultas');

	}




}
