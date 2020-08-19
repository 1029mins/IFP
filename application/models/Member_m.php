<?
    class Member_m extends CI_Model
    {
        //목록 - 회원 활동우선, 연도순 정렬
        public function getlist($text1,$start,$limit,$sort1)
        {
            if ($text1)
				$sql="select * from member where name like '%$text1%' and act_rank not in ('2') order by act_rank desc, yearN desc limit $start,$limit ";
            elseif ($sort1=="history"){
                $sql="select * from member where position_rank like '%회장%' order by yearN, position_rank limit $start,$limit";
            }
			else
                $sql="select * from member where act_rank not in ('2') order by act_rank desc, yearN desc limit $start,$limit ";

            //$sql="select * from member order by yearN desc ,name";
            return $this->db->query($sql)->result();
        }

        public function getlistExecutive(){
            $sql="select * from member where act_rank in ('2') order by yearN";
            return $this->db->query($sql)->result();
        }


        //전체 레코드 개수
        public function rowcount($text1,$sort1)
		{
			if ($text1)
                $sql="select * from member where name like '%$text1%'";
            elseif ($sort1=="history"){
                $sql="select * from member where position_rank like '%회장%'";
            }
			else
                $sql="select * from member";

			return $this->db->query($sql)->num_rows();
		}

    }
?>
