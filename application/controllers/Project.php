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
    //프로젝트 추가(수정중임) 웨 값이 안들으가징 값 넘겨야됨
    public function add()
        {
            

            $uri_array=$this->uri->uri_to_assoc(3);
			//$text1 = array_key_exists("text1",$uri_array) ? "/text1/" .urldecode($uri_array["text1"]) : "" ;
            //$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
            $data["menu"] ='project';
            $data["kindlist"] = $this->project_m->getlist_kind();
    


            $this->load->library("form_validation"); //form_validation 선언
            $this->form_validation->set_rules('date', '프로젝트기간', 'required|min_length[1]|max_length[20]');
            $this->form_validation->set_rules('title', '프로젝트명', 'required|min_length[1]|max_length[12]');
            $this->form_validation->set_rules('names', '구성원', 'required|max_length[100]');
            $this->form_validation->set_rules('contents', '내용', 'required|max_length[255]');
            $this->form_validation->set_rules('url', 'url', 'required|max_length[255]');
            
            
			if ( $this->form_validation->run()==FALSE )     // 실패
			{
				$data["menu"] ='project';
                $data["kindlist"] = $this->project_m->getlist_kind();
    
                $this->load->view("main/main_header",$data);
                $this->load->view("main/project_add");
                $this->load->view("main/main_footer");  
                
                
            }
			else              //성공
			{
				$data=array( 
                    //'mamber_no' => $this->session->userdata('userno'),
                    'kind_no' => $this->input->post("kind_name", true),
                    'date' =>  $this->input->post("date", true),
                    'title' => $this->input->post("title", true),
                    'names' => $this->input->post("names", true),
                    'contents' => $this->input->post("contents", true),
                    'url' => $this->input->post("url", true),
                    'pic' => $this->input->post("pic",true)
                    );

                    $picname = $this->call_upload();
                        if($picname) $data["pic"] = $picname;
        
                $result = $this->project_m->insertrow($data); 

                
                
                redirect("/project");    //   목록화면으로 이동.
                
			}
        }

        public function call_upload()
        {
            $config['upload_path']	= './images/project';
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
    
    
        
    //project 수정
    public function edit()
		{
            $uri_array=$this->uri->uri_to_assoc(3);
            $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
            $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
            $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;


            $data["text1"]=$text1;
            $data["page"]=$page;
            $data["menu"] ='project';


            $data["row"] = $this->project_m->getrow($no);

			$this->load->library("form_validation");
			//$this->form_validation->set_rules("name","이름","required|max_length[20]");
			//$this->form_validation->set_rules("genre_no","장르번호","required|max_length[20]");

			if ( $this->form_validation->run()==FALSE )     // 수정버튼 클릭한 경우
			{
				$data["row"]=$this->project_m->getrow($no);
                $data["menu"] ='project';
                $this->load->view("main/main_header",$data);
                $this->load->view("main/project_edit",$data);
                $this->load->view("main/main_footer"); 
			}
			else
			{		

				$data=array( 
					'name' => $this->input->post("name", true),
					'genre_no' => $this->input->post("genre_no", true),
					'director' => $this->input->post("director", true),
					'actor' =>  $this->input->post("actor", true),
					'rating_no' => $this->input->post("rating_no", true), 
					'add_audience' => $this->input->post("add_audience", true),
					'release_date' => $this->input->post("release_date", true),
					'running_time' => $this->input->post("running_time", true),
					'poster' => $this->input->post("poster", true),
					'summary' => $this->input->post("summary", true),
					'trailer' => $this->input->post("trailer", true)
					);
				$poster = $this->call_upload();
         if($poster) $data["poster"] = $poster;

				 $trailer = $this->call_upload2();
         if($trailer) $data["trailer"] = $trailer;

         $result = $this->project_m->updaterow($data, $no);
       
         redirect("/html/project/lists" . $text1 . $page); 
      
			}
        }
        
    //프로젝트 삭제
    public function delete()
		{
			$uri_array=$this->uri->uri_to_assoc(3);
			$no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
			//$text1 = array_key_exists("text1",$uri_array) ? "/text1/" .urldecode($uri_array["text1"]) : "" ;
			//$page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;

			//$no=$this->uri->segment(4);        // URI: /admin_schedule/del/no/1
			$this->project_m->deleterow($no);
            redirect("project/lists" . $text1 . $page);              // 목록화면으로 돌아가기
		}
}
?>
