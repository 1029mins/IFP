<?
class Mypage extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model("mypage_m");
        $this->load->helper(array("url", "date"));
        $this->load->library('upload');
        $this->load->library("pagination");
        $this -> load -> helper('form');
        $this -> load -> helper('alert');
        date_default_timezone_set("Asia/Seoul");
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $this->lists();
    }
    public function lists()
    {
        if(!$this->session->userdata('userno')){
            alert('로그인 후 사용가능합니다.'); 
            redirect("/main");           
        }else{
            $no = $this->session->userdata('userno');
	        $data["menu"] ='none';
            $data["row"] = $this->mypage_m->getrow($no);
            $this->load->view("main/main_header",$data);
            $this->load->view("main/mypage");
            $this->load->view("main/main_footer");
        }
    }
    public function view()
    {
        if(!$this->session->userdata('userno')){
            redirect("/main"); 
        }else{
            $no = $this->session->userdata('userno');
            $data["menu"] ='none';
            $data["row"] = $this->mypage_m->getrow($no);
            $this->load->view("main/main_header",$data);
            $this->load->view("main/mypage_view",$data);
            $this->load->view("main/main_footer");
        }
    }
    public function edit()
    {
        if(!$this->session->userdata('userno')){
            redirect("/main"); 
        }else{
            $no = $this->session->userdata('userno');
            $data["info"] = $this->input->post("info",true);
            $pic = $this->call_upload();
            if($pic) $data["pic"]=$pic;
            $this->mypage_m->updaterow($data, $no);
            redirect("/mypage/lists/");
        }    
    }

    public function call_upload()
    {
        $config['upload_path']	= './images/member';
        $config['allowed_types']	= 'gif|jpg|png|jpeg';
        $config['overwrite']	= TRUE;
        $config['max_size']	= 10000000;
        $config['max_width']	= 10000;
        $config['max_height']	= 10000;
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('pic'))
            $picname="";
        else
            $picname=$this->upload->data("file_name");
        return $picname;
    }


}
?>
