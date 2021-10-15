<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Jadwal
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Jadwal extends CI_Controller
{

	var $models = 'Jadwal_model';
	public function __construct()
	{
		parent::__construct();
		$this->load->model($this->models);
		$this->load->model('Pegawai_model');
		$this->load->model('Poli_model');
	}

	public function index()
	{
		$postData = $this->input->post();
		$data = array(
			'isi' 			=> 'components/jadwal/index',
			'title'			=> 'Halaman Jadwal',
			'label'			=> 'Dashboard',
			'dokter'		=> $this->Pegawai_model->getPegawai(),
			'poli'			=> $this->Poli_model->getPoli()
		);
		$this->load->view('layout/wrapper', $data);
	}

	public function store()
	{
		$this->Jadwal_model->addJadwal();
	}
}


/* End of file Jadwal.php */
/* Location: ./application/controllers/Jadwal.php */
