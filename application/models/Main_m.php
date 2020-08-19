<?
    class Main_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist()
        {
	        $sql="select * from notice order by no desc limit 0, 4";

            return $this->db->query($sql)->result();
        }
    }
?>
