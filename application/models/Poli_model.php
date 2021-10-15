<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Poli_model
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

class Poli_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
		$this->data = array(
            'db' => 'master_unit');
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
	public function getPoli()
		{
				$data = $this->data;
				$hasil = $this->db->get($data['db']);
				if($hasil->num_rows() > 0){
					return $hasil->result();
				}
		}

		public function getKodePoli()
		{
					$q = $this->db->query("select MAX(RIGHT(unit_id,1)) as kd_max from master_unit");
					$kd = "";
					if($q->num_rows()>0)
							{
									foreach($q->result() as $k)
									{
											$tmp = ((int)$k->kd_max)+1;
											$kd = sprintf("%01s", $tmp);
									}
							}
							else
							{
									$kd = "1";
							}
							return $kd;
		}

	
		public function insertData($response)
		{
			if ($response == "poli") {
				$data = array(
												'unit_id'			=> $this->Poli_model->getKodePoli(),
												'unit_kode'		=> $this->input->post('polKode'),
												'unit_nama'		=> $this->input->post('polNama'),
										);
				$this->db->insert('master_unit', $data);
				redirect('Poli');
			}
		}

		public function updateData($id, $request)
		{
			if ($request == 'poli') 
			{
					$data = array(
												'unit_id'			=> $id,
												'unit_kode'		=> $this->input->post('editPolKode'),
												'unit_nama'		=> $this->input->post('editPolNama'),
										);				
					$this->db->where('unit_id', $id)
									 ->update('master_unit',$data);
					redirect('Poli');
			}
		}

		public function deleteData($id, $request)
		{
			if ($request == 'poli') {
				$this->db->where('unit_id',$id)
								->delete('master_unit');
				redirect('Poli');
			}
		}


  // ------------------------------------------------------------------------

}

/* End of file Poli_model.php */
/* Location: ./application/models/Poli_model.php */
