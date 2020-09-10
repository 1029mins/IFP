<?
class Member extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model("member_m");
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
        if ( $this -> session -> userdata('logged_in') != TRUE) {
            alert('로그인 후 사용 가능 합니다.');
            redirect("/main");                            
        }
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
        $sort1 = $this->input->post("sort1",true);


        /*pagination*/
        if ($text1=="")
            $base_url = "/member/lists/page";
        else
            $base_url = "/member/lists/text1/$text1/page";
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        //$base_url = "/~sale26" . $base_url;
        $config["per_page"]	 = 5;								// 페이지당 표시할 line 수


        $data["regdate_year"] = $this->input->post("regdate_year",true);

        if ($data["regdate_year"]){
            $regdate_year = $data["regdate_year"];
        }
        else $regdate_year = date("Y");
        
        $config["total_rows"] = $this->member_m->rowcount($text1,$sort1,$regdate_year);		// 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;						// 기본 URL
        $this->pagination->initialize($config);					// pagination 설정 적용
        $data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
        $start=$data["page"];									// n페이지 : 시작위치
        $limit=$config["per_page"];								// 페이지 당 라인수
        $data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

        $data["listExecutive"] = $this->member_m->getlistExecutive();
		
        $data["menu"] ='member';
        $data["yearlist"] = $this->member_m->getlist_year();
        
        
       
        
        $data["list"] = $this->member_m->getlist($text1, $start, $limit, $sort1,$regdate_year);
        
        $this->load->view("main/main_header",$data);
        $this->load->view("main/member_list",$data);
        $this->load->view("main/main_footer");
    }

}
?>
