<?
class Gallery_detail extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        //$this->load->database();
        //$this->load->model("gallery_detail_m");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        //$data["list"] = $this->gallery_detail_m->getlist();
        $this->load->view("main/main_header");
        //$this->load->view("main",$data);
        $this->load->view("main/gallery_view");
        $this->load->view("main/main_footer");
    }

}
?>
