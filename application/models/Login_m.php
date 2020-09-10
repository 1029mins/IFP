<?
class Login_m extends CI_Model
{
   public function login($data){
         $sql = "SELECT no,name,rank FROM member WHERE id = '" . $data['id'] . "' AND pwd = '" . $data['pwd'] . "' ";
 
        $query = $this -> db -> query($sql);
 
        if ($query -> num_rows() > 0) {
            return $query -> row();
        } else {
            return FALSE;
        }
   }
}
?>
