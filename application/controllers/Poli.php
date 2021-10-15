<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Poli
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

class Poli extends CI_Controller
{
  
  var $models = 'Poli_model';
  public function __construct()
  {
    parent::__construct();
		$this->load->model($this->models);
		
  }

  public function index()
  {
				$data = array(
					  'isi' 			=> 'components/poli/index',
					  'title'			=> 'Halaman Poli',
					  'label'			=> 'Dashboard',
						'data'			=> $this->Poli_model->getPoli()
					  );
			$this->load->view('layout/wrapper',$data); 
  }

	public function add()
	{
    $this->Poli_model->insertData("poli");
	}
	public function edit()
	{
		$id = $this->input->post('editPolId');
    $this->Poli_model->updateData($id,'poli');
	}

	public function delete($id)
	{
		$this->Poli_model->deleteData($id,'poli');
	}

}


/* End of file Poli.php */
/* Location: ./application/controllers/Poli.php */
