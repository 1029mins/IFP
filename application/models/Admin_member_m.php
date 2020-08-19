<?
    class Admin_member_m extends CI_Model
    {
        //목록 -  활동중 학번 연도 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select * from member order by act_rank desc, yearN desc limit $start,$limit ";
			else
				$sql="select * from member where name like '%$text1%' order by act_rank desc, yearN desc limit $start,$limit ";

            //$sql="select * from member order by yearN desc ,name";
            return $this->db->query($sql)->result();
        }
        //전체 레코드 개수
        public function rowcount($text1)
		{
			if (!$text1)
				$sql="select * from member";
			else
				$sql="select * from member where name like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
        //회원 각 페이지
        function getrow($no)  {
            $sql="select * from member where no=$no";
            return  $this->db->query($sql)->row();
        }
        //회원 추가
        function insertrow($row)
        {
             return $this->db->insert('member',$row);
        }
        //회원 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('member',$row, $where);
        }
        //회원 삭제
        function deleterow($no)  {
           $sql="delete from member where no=$no";
           return  $this->db->query($sql);
       }
    }
?>
