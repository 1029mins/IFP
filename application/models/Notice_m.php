<?
    class Notice_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select notice.*,member.name as member_name
                from notice left join member on notice.member_no=member.no
                where onoff=0
                order by no desc limit $start,$limit ";
			else
				$sql="select notice.*,member.name as member_name
                from notice left join member on notice.member_no=member.no
                where title like '%$text1%' and onoff=0
                order by no desc limit $start,$limit ";

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
        //갤러리 각 페이지
        function getrow($no)  {
            $sql="select notice.*,member.name as member_name
            from notice left join member on notice.member_no=member.no
            where notice.no=$no";
            return  $this->db->query($sql)->row();
        }

    }
?>
