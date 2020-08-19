<?
    class Admin_notice_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select notice.*,member.name as member_name
                from notice left join member on notice.member_no=member.no
                order by no desc limit $start,$limit ";
			else
				$sql="select notice.*,member.name as member_name
                from notice left join member on notice.member_no=member.no
                where title like '%$text1%' order by no desc limit $start,$limit ";

            return $this->db->query($sql)->result();
        }
        //전체 레코드 개수
        public function rowcount($text1)
		{
			if (!$text1)
				$sql="select * from notice";
			else
				$sql="select * from notice where title like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
        //공지 각 페이지
        function getrow($no)  {
            $sql="select notice.*,member.name as member_name
            from notice left join member on notice.member_no=member.no
            where notice.no=$no";
            return  $this->db->query($sql)->row();
        }
        //공지 추가
        function insertrow($row)
        {
             return $this->db->insert('notice',$row);
        }
        //공지 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('notice',$row, $where);
        }
        //공지 삭제
        function deleterow($no)  {
           $sql="delete from notice where no=$no";
           return  $this->db->query($sql);
       }
    }
?>
