<?
    class Admin_docs_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select docs.*,member.name as member_name
                from docs left join member on docs.member_no=member.no
                order by no desc limit $start,$limit ";
			else
				$sql="select docs.*,member.name as member_name
                from docs left join member on docs.member_no=member.no
                where title like '%$text1%' order by no desc limit $start,$limit ";

            return $this->db->query($sql)->result();
        }
        //전체 레코드 개수
        public function rowcount($text1)
		{
			if (!$text1)
				$sql="select * from docs";
			else
				$sql="select * from docs where title like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
        //자료실 각 페이지
        function getrow($no)  {
            $sql="select docs.*,member.name as member_name
            from docs left join member on docs.member_no=member.no
            where docs.no=$no";
            return  $this->db->query($sql)->row();
        }
        //자료실 추가
        function insertrow($row)
        {
             return $this->db->insert('docs',$row);
        }
        //자료실 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('docs',$row, $where);
        }
        //자료실 삭제
        function deleterow($no)  {
           $sql="delete from docs where no=$no";
           return  $this->db->query($sql);
       }
    }
?>
