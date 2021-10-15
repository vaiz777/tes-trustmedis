<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Pegawai
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

class Pegawai extends CI_Controller
{
    
var $models = 'Pegawai_model';
  public function __construct()
  {
    parent::__construct();
		$this->load->model($this->models);
  }

  public function index()
  {
		$data = array(
					  'isi' 			=> 'components/pegawai/index',
					  'title'			=> 'Halaman Pegawai',
					  'label'			=> 'Dashboard',
					  'data'			=> $this->Pegawai_model->getPegawai(),
					  'nomor_pegawai'=> $this->Pegawai_model->getKodePegawai(),
					  );
		$this->load->view('layout/wrapper',$data); 
  }

	public function edit()
	{
		$id = $this->input->post('pegId');
    	$this->Pegawai_model->updateData($id,'pegawai');
	}

	public function delete($id)
	{
		$this->Pegawai_model->deleteData($id,'pegawai');
	}

	public function addId()
	{
    $this->Pegawai_model->insertData("pegawai");
	}

}


/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
