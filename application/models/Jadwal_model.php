<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Jadwal_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Jadwal_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function index()
	{
	}

	function addJadwal()
	{
		$data = array(
			'pegawai_id' 	=> $this->input->post('idPeg'),
			'jadwal_hari'	=> $this->input->post('jadHari'),
			'jadwal_jamAwal'	=> $this->input->post('jadAwal'),
			'jadwal_jamAkhir'	=> $this->input->post('jadAkhir')
		);
		// $this->db->insert('jadwal_detail', $data);
	}




	// ------------------------------------------------------------------------

}

/* End of file Jadwal_model.php */
/* Location: ./application/models/Jadwal_model.php */
