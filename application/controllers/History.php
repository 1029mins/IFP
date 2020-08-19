<?
class History extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        //$this->load->database();
        //$this->load->model("history_m");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
		$data["menu"] ='aboutUs';

        $this->load->view("main/main_header",$data);
        $this->load->view("main/history");
        $this->load->view("main/main_footer");
    }

}
?>
