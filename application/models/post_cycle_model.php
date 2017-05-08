<?php

Class post_cycle_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getpost_cycle() {
        $query = $this->db->select('*')->from('post_cycle')->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

	public function getsell_cycle() {
        $query = $this->db->select('*')->from('posturcycle')->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

	public function getsell_cyclebyid($id) {
        $query = $this->db->select('*')->from('posturcycle')->where('id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

	public function gettry_cyclebyid($id) {
        $query = $this->db->select('*')->from('try_cycle')->where('id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

	function updateRequestDetails()
	{
		if(isset($_POST['btn_approve']))
		{
			$data = array(
				'active' => 1
			);

			$this->db->where('id', $_POST['id']);
			$this->db->update('posturcycle',$data);
		}

		if(isset($_POST['btn_reject']))
		{
			$data = array(
				'active' => 2,
				'remark' => $_POST['remark']
			);

			$this->db->where('id', $_POST['id']);
			$this->db->update('posturcycle',$data);
		}
	}

	function updatetrycycleRequestDetails()
	{
		if(isset($_POST['btn_approve']))
		{
			$data = array(
				'active' => 1
			);

			$this->db->where('id', $_POST['id']);
			$this->db->update('try_cycle',$data);
		}

		if(isset($_POST['btn_reject']))
		{
			$data = array(
				'active' => 2,
				'remark' => $_POST['remark']
			);

			$this->db->where('id', $_POST['id']);
			$this->db->update('try_cycle',$data);
		}
	}

    public function gettry_cycle() {
        $query = $this->db->select('*')->from('try_cycle')->order_by('id','asc')->get();

		//echo $this->db->last_query();
		//die;
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getbrand() {
        $query = $this->db->select('*')->from('brand')->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getbrandname($id) {
        $query = $this->db->select('brand_name')->from('brand')->where('brand_id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['brand_name'];
        } else {
            return array();
        }
    }
        public function getuser() {
        $query = $this->db->select('*')->from('users_front')->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    public function getusername($id) {
        $query = $this->db->select('firstname')->from('users_front')->where('id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['firstname'];
        } else {
            return array();
        }
    }

	public function getuseremail($id) {
        $query = $this->db->select('email')->from('users_front')->where('id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['email'];
        } else {
            return array();
        }
    }

    public function getmodelname($id) {
        $query = $this->db->select('name')->from('model')->where('model_id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['name'];
        } else {
            return array();
        }
    }
    public function getcityname($id) {
        $query = $this->db->select('name')->from('cities')->where('id', $id)->get();
        $result = $query->result_array();
        if (count($result) > 0) {
            return $result[0]['name'];
        } else {
            return array();
        }
    }


    public function edit($id) {
        $this->db->select('*')->from('post_cycle');
        $this->db->where('post_cycle_id', $id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function update($data, $where) {
        $this->db->where('post_cycle_id', $where);
        $result = $this->db->update('post_cycle', $data);
        return $result;
    }

    public function getcountry() {
        $query = $this->db->select('*')->from('countries')->get();
        $result = $query->result();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    
    public function getstateById($id) {
        $query = $this->db->select('id,name')->from('states')->where('country_id', $id)->get();
        return $query->result();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getcityById($id) {
        $query = $this->db->select('id,name')->from('cities')->where('state_id', $id)->get();
        return $query->result();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function getmodel($id) {
        $array=array('brand_id'=>$id);
        $query = $this->db->select('*')->from('model')->where($array)->get();
        return $query->result();
      //  print_r($query); exit; 
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getstate() {
        $query = $this->db->select('*')->from('states')->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

    public function getcity() {
        $query = $this->db->select('*')->from('cities')->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }
    
    public function getwhatsapp() {
        $query = $this->db->select('*')->from('post_cycle')->get();
        $result = $query->result_array();

        if (count($result) > 0) {
            return $result;
        } else {
            return array();
        }
    }

	function delete($id){

		$Q = $this->db->QUERY('SELECT cycle_pic FROM post_cycle WHERE post_cycle_id="'.$id.'"');
		$data = $Q->row_array();

		if($data['cycle_pic']!="" || $data['cycle_pic']!=NULL){
			unlink(FCPATH.'/upload/post_cycle/'.$data['cycle_pic']);
		}

		$this->db->WHERE('post_cycle_id',$id);
		$this->db->DELETE('post_cycle');
	}

}

?>