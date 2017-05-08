<?php 
  class which_cycle_model extends CI_Model{
    
     public function __construct() {
        parent::__construct();
    }
    
    public function getwhich_cycle(){
      $query = $this->db->select('*')->from('model')->get();
      $result = $query->result_array();
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
    
    
//    if(isset($_POST['submit_range']))
//{
//	$price1=$_POST['amount1'];
//	$price2=$_POST['amount2'];
//	
//	mysql_connect('localhost','root','');
//    mysql_select_db('demo');
//
//    $select = mysql_query("select * from sample_items where price BETWEEN '$price1' AND '$price2'");
//	echo mysql_num_rows($select);
//}
    
    public function getbranddata(){
      $query = $this->db->select('*')->from('brand')->get();
      $result = $query->result_array();
      if(count($result)){
        return $result;
      }
      else{
        return array();
      }
    }
}?>