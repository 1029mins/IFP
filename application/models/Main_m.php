<?
    class Main_m extends CI_Model
    {
        //공지 목록 - 번호순 정렬
        public function getlist_notice()
        {
	        $sql="select * from notice order by no desc limit 0, 4";

            return $this->db->query($sql)->result();
        }
        //프로젝트 목록 - 번호순 정렬, best 6개 컬럼
        public function getlist_project()
        {
	        $sql="select * from project where best=1 order by no desc limit 0, 6";

            return $this->db->query($sql)->result();
        }
    }
?>
