<?
class Admin_main extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("admin_main_m");
        $this->load->helper(array("url", "date"));
        $this->load->library("pagination");
        $this->load->helper('alert');
        date_default_timezone_set("Asia/Seoul");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $this->lists();
    }
    // 리스트
    public function lists()
    {
        if($this -> session -> userdata('logged_in') != TRUE){
            alert('로그인 후 사용가능합니다.');
            redirect("/main");                                   
        }
        
        $data["list"] = $this->admin_main_m->getNoticeList();
        $this->load->view("admin/admin_header");
        $this->load->view("admin/admin_main",$data);
        $this->load->view("admin/admin_footer");
    }

}
?>
