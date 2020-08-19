<?
    class Admin_project extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_project_m");
            $this->load->helper(array("url", "date"));
            $this->load->library('upload');
            $this->load->library('image_lib');
			$this->load->library("pagination");
            $this->load->library('session');    //세션 작성자
            date_default_timezone_set("Asia/Seoul");
        }
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
				$base_url = "/admin_project/lists/page";
			else
				$base_url = "/admin_project/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			//$base_url = "/~sale26" . $base_url;
			$config["per_page"]	 = 10;								// 페이지당 표시할 line 수
			$config["total_rows"] = $this->admin_project_m->rowcount($text1);		// 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;						// 기본 URL
			$this->pagination->initialize($config);					// pagination 설정 적용
			$data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
			$start=$data["page"];									// n페이지 : 시작위치
			$limit=$config["per_page"];								// 페이지 당 라인수
			$data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

            $data["list"] = $this->admin_project_m->getlist($text1, $start, $limit);
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_project_list",$data);
            $this->load->view("admin/admin_footer");
        }
        public function view()
        {

           $uri_array=$this->uri->uri_to_assoc(3);
           $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
           $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
           $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

           $this->load->library("form_validation");
           $this->form_validation->set_rules("title","'title'","required|max_length[500]");
           $this->form_validation->set_rules("contents","'contents'","required|max_length[1000]");

           $data["text1"]=$text1;
           $data["page"]=$page;

           if ( $this->form_validation->run()==FALSE )  //뷰
           {
               $data["list"] = $this->admin_project_m->getlist_kind();
               $data["row"] = $this->admin_project_m->getrow($no);
               $this->load->view("admin/admin_header");
               $this->load->view("admin/admin_project_view",$data);
               $this->load->view("admin/admin_footer");
           }
           else
           {                                            //수정버튼 클릭 edit
               $data=array(
                    'kind_no' => $this->input->post("kind_no",true),
                    'title' => $this->input->post("title",true),
                    'contents' => $this->input->post("contents",true),
                    'names' => $this->input->post("names",true),
                    'date' => $this->input->post("date",true),
                    'url' => $this->input->post("url",true)
               );
               $pic = $this->call_upload();
               if($pic) $data["pic"]=$pic;

               $this->admin_project_m->updaterow($data, $no);
               $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
               redirect("/admin_project/view/no/" . $no . $tmp);
           }


       }
       public function add()
        {


			$uri_array=$this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
            $this->form_validation->set_rules("title","'title'","required|max_length[500]");
            $this->form_validation->set_rules("contents","'contents'","required|max_length[1000]");

            if ( $this->form_validation->run()==FALSE )
            {
                $data["list"] = $this->admin_project_m->getlist_kind();
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_project_add",$data);
                $this->load->view("admin/admin_footer");
            }
            else
            {   //미완성 - 작성자
                $username = $this->session->userdata('no') ? $this->session->userdata('no') : 0 ;

                $data=array(
                    'kind_no' => $this->input->post("kind_no",true),
                    'member_no' => $username,
                    'date' => $this->input->post("date",true),
                    'title' => $this->input->post("title",true),
                    'contents' => $this->input->post("contents",true),
                    'url' => $this->input->post("url",true),
                    'names' => $this->input->post("names",true)
                );

                $pic = $this->call_upload();
                if($pic) $data["pic"]=$pic;

                $this->admin_project_m->insertrow($data);
                redirect("/admin_project/lists". $text1 . $page);
            }

        }
        public function del()
         {
 			$uri_array=$this->uri->uri_to_assoc(3);
             $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
             $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
 			 $page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

             $this->admin_project_m->deleterow($no);
             redirect("/admin_project/lists" . $text1 . $page);
         }

        //파일업로드
        public function call_file_upload()
        {
            $config['upload_path']	= './images/project';
            $config['allowed_types']	= 'hwp|xls|doc|xlsx|docx|pdf|jpg|gif|png|jpeg|txt|ppt|pptx';
            $config['overwrite']	= TRUE;
            $config['max_size']	= 10000000;
            $config['max_width']	= 10000;
            $config['max_height']	= 10000;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('filename'))
                $picname="";
            else
                $picname=$this->upload->data("file_name");  //upload 파일명
            return $picname;
        }

        //이미지업로드
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
                $picname=$this->upload->data("file_name");  //upload 파일명
            return $picname;
        }

    }
?>
