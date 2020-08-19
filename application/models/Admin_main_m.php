<?
    class Admin_main_m extends CI_Model
    {
        //함수 설명을 한줄로 해줍시다.
        public function getNoticeList()
        {
            $sql="select * from notice order by no desc limit 3";
            return $this->db->query($sql)->result();
        }
    }
?>
