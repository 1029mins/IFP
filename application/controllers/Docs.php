<?
	class Docs extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model("docs_m");
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
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;

        /*pagination*/
        if ($text1=="")
            $base_url = "/docs/lists/page";
        else
            $base_url = "/docs/lists/text1/$text1/page";
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        //$base_url = "/~sale26" . $base_url;
        $config["per_page"]	 = 12;								// 페이지당 표시할 line 수
        $config["total_rows"] = $this->docs_m->rowcount($text1);		// 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;						// 기본 URL
        $this->pagination->initialize($config);					// pagination 설정 적용
        $data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
        $start=$data["page"];									// n페이지 : 시작위치
        $limit=$config["per_page"];								// 페이지 당 라인수
        $data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

        $data["list"] = $this->docs_m->getlist($text1, $start, $limit);

		$data["menu"] ='community'; //메인 헤더 메뉴 확인을 위해 필요한 데이터

        $this->load->view("main/main_header",$data);
        $this->load->view("main/docs",$data);
        $this->load->view("main/main_footer");
    }
    public function view()
    {
       $uri_array=$this->uri->uri_to_assoc(3);
       $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
       $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
       $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
		
	   $viewcount = "update docs set viewcount=viewcount+1 where no=$no";		//조회수 관련 쿼리
	   $this->db->query($viewcount);

       //$this->load->docs("form_validation");

       $data["text1"]=$text1;
       $data["page"]=$page;

       $data["menu"] ='docs';
       //if($pic) $data["pic"]=$pic;

       $data["row"] = $this->docs_m->getrow($no);
       $this->load->view("main/main_header",$data);
       $this->load->view("main/docs_view",$data);
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
