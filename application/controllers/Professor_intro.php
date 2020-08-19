<?
class Professor_intro extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        //$this->load->database();
        //$this->load->model("professor_intro_m");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $this->lists();
    }
    // 리스트
    public function lists()
    {
		$data["menu"] ='aboutUs';

        $this->load->view("main/main_header",$data);
		$this->load->view("main/main_sidebar");
        $this->load->view("main/professor_intro");
        $this->load->view("main/main_footer");
    }

}
?>
