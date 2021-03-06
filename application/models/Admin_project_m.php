<?
    class Admin_project_m extends CI_Model
    {
        //목록 - 번호순 정렬
        public function getlist($text1,$start,$limit)
        {
            if (!$text1)
				$sql="select project.*,member.name as member_name, project_kind.name as kind_name
                from (project left join member on project.member_no=member.no) left join project_kind on project.kind_no=project_kind.no
                order by project.no desc limit $start,$limit ";
			else
				$sql="select project.*,member.name as member_name, project_kind.name as kind_name
                from (project left join member on project.member_no=member.no) left join project_kind on project.kind_no=project_kind.no
                where title like '%$text1%' order by no desc limit $start,$limit ";

            return $this->db->query($sql)->result();
        }
        //전체 레코드 개수
        public function rowcount($text1)
		{
			if (!$text1)
				$sql="select * from project";
			else
				$sql="select * from project where title like '%$text1%'";
			return $this->db->query($sql)->num_rows();
		}
        //프로젝트 각 페이지
        function getrow($no)  {
            $sql="select project.*,member.name as member_name, project_kind.name as kind_name
            from (project left join member on project.member_no=member.no) left join project_kind on project.kind_no=project_kind.no
            where project.no=$no";
            return  $this->db->query($sql)->row();
        }
        //프로젝트 분류명 읽어오기
        function getlist_kind()
		{
			$sql="select * from project_kind order by no";
			return $this->db->query($sql)->result();
		}

        //프로젝트 추가
        function insertrow($row)
        {
             return $this->db->insert('project',$row);
        }
        //프로젝트 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('project',$row, $where);
        }
        //프로젝트 삭제
        function deleterow($no)  {
           $sql="delete from project where no=$no";
           return  $this->db->query($sql);
       }
    }
?>
