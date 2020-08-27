<?
    class Mypage_m extends CI_Model
    {
        //멤버 각 페이지
        function getrow($no)  {
            $sql="select info,pic from member where notice.no=$no";
            return  $this->db->query($sql)->row();
        }

    }
?>
