<?
class Project extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct() 
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("project_m");
            $this->load->helper(array("url", "date"));
            $this->load->library('upload');
            $this->load->library('image_lib');
			$this->load->library("pagination");
            $this->load->library('session');    //세션 작성자
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
				$base_url = "/project/lists/page";
			else
				$base_url = "/project/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			//$base_url = "/~sale26" . $base_url;
			$config["per_page"]	 = 10;								// 페이지당 표시할 line 수
			$config["total_rows"] = $this->project_m->rowcount($text1);		// 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;						// 기본 URL
			$this->pagination->initialize($config);					// pagination 설정 적용
			$data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
			$start=$data["page"];									// n페이지 : 시작위치
			$limit=$config["per_page"];								// 페이지 당 라인수
			$data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

			$data["menu"]='project';

            $data["list"] = $this->project_m->getlist($text1, $start, $limit);
            $this->load->view("main/main_header",$data);
            $this->load->view("main/project",$data);
            $this->load->view("main/main_footer");
        }

	public function view()   // project Detail
		{
			 $uri_array=$this->uri->uri_to_assoc(3);
			 $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			 $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
			 $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;


			 $data["text1"]=$text1;
			 $data["page"]=$page;
			 $data["menu"] ='project';


			 $data["row"] = $this->project_m->getrow($no);
			 $this->load->view("main/main_header",$data);
             $this->load->view("main/project_detail",$data);
             $this->load->view("main/main_footer");       
             
             
		}

    public function add()
        {
            //$data["list"] = $this->project_m->getlist();
            $data["menu"] ='project';
            $this->load->view("main/main_header",$data);
            $this->load->view("main/project_add",$data);
            $this->load->view("main/main_footer");  

            if ($_POST)
         {

            $data=array( 
                'mamber_no' => "4",
                'kind_no' => "1",
                'date' =>  date("Ymd"),
                'title' => $this->input->post("title", true),
                'names' => $this->input->post("names", true),
                'contents' => $this->input->post("contenst", true),
                'url' => $this->input->post("url", true),
                'pic' => " "
               );

            //$picname = $this->call_upload();
            //    if($picname) $data["pic"] = $picname;
            

            $result = $this->project_m->insertrow($data);
            
            redirect("/html/project/lists");    //   목록화면으로 이동.
            }
        }
}
?>
