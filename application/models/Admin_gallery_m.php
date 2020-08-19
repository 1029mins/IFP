<?
    class Admin_gallery_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select gallery.*,member.name as member_name
                from gallery left join member on gallery.member_no=member.no
                order by no desc limit $start,$limit ";
			else
				$sql="select gallery.*,member.name as member_name
                from gallery left join member on gallery.member_no=member.no
                where title like '%$text1%' order by no desc limit $start,$limit ";

            return $this->db->query($sql)->result();
        }
        //전체 레코드 개수
        public function rowcount($text1)
		{
			if (!$text1)
				$sql="select * from gallery";
			else
				$sql="select * from gallery where title like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
        //갤러리 각 페이지
        function getrow($no)  {
            $sql="select gallery.*,member.name as member_name, gallery_pic.name as picname
            from (gallery left join member on gallery.member_no=member.no)
            left join gallery_pic on gallery.no = gallery_pic.gallery_no
            where gallery.no=$no";
            return  $this->db->query($sql)->row();
        }
        //갤러리 추가
        function insertrow($row)
        {
             return $this->db->insert('gallery',$row);
        }
        //갤러리 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('gallery',$row, $where);
        }
        //갤러리 삭제
        function deleterow($no)  {
           $sql="delete from gallery where no=$no";
           return  $this->db->query($sql);
       }
    }
?>
