<?
    class Mypage_m extends CI_Model
    {
        //멤버 각 페이지
        function getrow($no)  {
            $sql="select info,pic from member where member.no=$no";
            return  $this->db->query($sql)->row();
        }
        //멤버 수정
        function updaterow($row, $no)
        {
            $where=array("no"=>$no);
            return $this->db->update('member',$row, $where);
        }

    }
?>
