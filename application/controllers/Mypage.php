<?
class Mypage extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model("notice_m");
        $this->load->helper(array("url", "date"));
        $this->load->library('upload');
        $this->load->library("pagination");
        $this -> load -> helper('form');
        date_default_timezone_set("Asia/Seoul");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $this->view();
    }
    public function view()
    {
       $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
 
       //$this->load->library("form_validation");

       //$data["text1"]=$text1;
       //$data["page"]=$page;
		
	   $data["menu"] ='none';

       //if($pic) $data["pic"]=$pic;

       $data["row"] = $this->mypage_m->getrow($no);
       $this->load->view("main/main_header",$data);
       $this->load->view("main/mypage");
       $this->load->view("main/main_footer");
    }
    public function file()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $filename = array_key_exists("name",$uri_array) ? urldecode($uri_array["name"]) : "" ;
        $data["filename"]=$filename;
        $this->load->view("main/file",$data);
    }


}
?>
