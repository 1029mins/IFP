<?
	class Sign_on_m extends CI_Model
	{
	   public function insertrow($data){
			return ($this->db->insert('member',$data)) ? $this->db->insert_id() : false;
	   }

       public function checkId($hak){
            return $this->db->get_where('member',array('id' => $hak))->row() ? 1 : 0;
       }
	}
?>
