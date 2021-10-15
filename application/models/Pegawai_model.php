<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Pegawai_model
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

class Pegawai_model extends CI_Model {

  // ------------------------------------------------------------------------
	var $master_dokter = 'master_dokter';

  public function __construct()
  {
    parent::__construct();
		$this->data = array(
            'db' => 'master_dokter'
    );
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getPegawai()
  {
		$data = $this->data;
		$hasil = $this->db->get($data['db']);
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}
	}

	public function getId($id)
	{
			$data = $this->data;
			$result = $this->db->select('*')
												 ->from($data['db'])
												 ->where('pegawai_id',$id)
												 ->get();
			if ($result->num_rows() > 0) {
				$des = $result->result();
				return $des->row();
			}
	}

	public function updateData($id, $request)
	{
		if ($request == 'pegawai') 
		{
				$data = array(
										'pegawai_id' 				=> $this->input->post('editPegId'),
										'pegawai_nama'			=> $this->input->post('editPegNama'),
										'pegawai_nomor' 		=> $this->input->post('editPegNomor'),
										'pegawai_jenis_kelamin' => $this->input->post('editPegGender'),
										'pegawai_sip' 					=> $this->input->post('editPegSIP'), 
									);
				$this->db->where('pegawai_id', $id)
				 	 			 ->update('master_dokter',$data);
				redirect('Pegawai');
		}
	}

	public function deleteData($id, $request)
	{
		if ($request == 'pegawai') {
			$this->db->where('pegawai_id',$id)
					     ->delete('master_dokter');
			redirect('Pegawai');
		}
	}

	public function insertData($response)
	{
		if ($response == "pegawai") {
			$data = array(
										'pegawai_id' 				=> $this->Pegawai_model->getIdPegawai(),
										'pegawai_nama'			=> $this->input->post('pegNama'),
										'pegawai_nomor' 		=> $this->input->post('pegNomor'),
										'pegawai_jenis_kelamin' => $this->input->post('pegGender'),
										'pegawai_sip' 					=> $this->input->post('pegSIP'), 
									);
			$this->db->insert('master_dokter', $data);
			redirect('Pegawai');
		}
	}
	
	public function getKodePegawai(){
		$q = $this->db->query("select MAX(RIGHT(pegawai_nomor,4)) as kd_max from master_dokter");
    $kd = "";
    if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }
        else
        {
            $kd = "0001";
        }
        return $kd;
	}

	public function getIdPegawai(){
		$q = $this->db->query("select MAX(RIGHT(pegawai_id,3)) as kd_max from master_dokter");
    $kd = "";
    if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%s", $tmp);
            }
        }
        else
        {
            $kd = "1";
        }
        return $kd;
	}



	

  // ------------------------------------------------------------------------

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */
