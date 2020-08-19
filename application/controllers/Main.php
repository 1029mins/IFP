<?
class Main extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model("main_m");
        $this->load->helper(array("url", "date"));
        $this->load->library('upload');
        $this->load->library("pagination");
        date_default_timezone_set("Asia/Seoul");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
		$this->lists();
    }
    public function lists()
    {
        $data['menu'] = 'none';
        $data["list"] = $this->main_m->getlist();
        $this->load->view("main/main_header",$data);
        $this->load->view("main/main",$data);
        $this->load->view("main/main_footer");
    }

}
?>
