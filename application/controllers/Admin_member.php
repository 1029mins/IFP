<?
    class Admin_member extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_member_m");
            $this->load->helper(array("url", "date"));
            $this->load->library('upload');
            $this->load->library('image_lib');
			$this->load->library("pagination");
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
				$base_url = "/admin_member/lists/page";
			else
				$base_url = "/admin_member/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			//$base_url = "/~sale26" . $base_url;
			$config["per_page"]	 = 10;								// 페이지당 표시할 line 수
			$config["total_rows"] = $this->admin_member_m->rowcount($text1);		// 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;						// 기본 URL
			$this->pagination->initialize($config);					// pagination 설정 적용
			$data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
			$start=$data["page"];									// n페이지 : 시작위치
			$limit=$config["per_page"];								// 페이지 당 라인수
			$data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

            $data["list"] = $this->admin_member_m->getlist($text1, $start, $limit);
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_member_list",$data);
            $this->load->view("admin/admin_footer");
        }
        public function view()
        {

           $uri_array=$this->uri->uri_to_assoc(3);
           $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
           $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
           $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

           $this->load->library("form_validation");
           $this->form_validation->set_rules("name","'name'","required|max_length[40]");
           $this->form_validation->set_rules("id","'Id'","required|max_length[10]");

           $data["text1"]=$text1;
           $data["page"]=$page;

           if ( $this->form_validation->run()==FALSE )  //뷰
           {
               $data["row"] = $this->admin_member_m->getrow($no);
               $this->load->view("admin/admin_header");
               $this->load->view("admin/admin_member_view",$data);
               $this->load->view("admin/admin_footer");
           }
           else
           {                                            //수정버튼 클릭 edit
               $data=array(
                   'name' => $this->input->post("name",true),
                   'id' => $this->input->post("id",true),
                   'msg' => $this->input->post("msg",true),
                   'info' => $this->input->post("info",true),
                   'yearN' => substr($this->input->post("id",true),0,4),
                   'rank' => $this->input->post("rank",true),
                   'act_rank' =>  $this->input->post("act_rank",true)
               );

               $pic = $this->call_upload();
               if($pic) $data["pic"]=$pic;

               $this->admin_member_m->updaterow($data, $no);
               $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
               redirect("/admin_member/view/no/" . $no . $tmp);
           }


       }
       public function add()
        {
			$uri_array=$this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
			$this->form_validation->set_rules("name","'name'","required|max_length[40]");
			$this->form_validation->set_rules("id","'Id'","required|max_length[10]");
			$this->form_validation->set_rules("pwd","'password'","required|max_length[40]");

            if ( $this->form_validation->run()==FALSE )
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_member_add");
                $this->load->view("admin/admin_footer");
            }
            else
            {
                $position_rank = $this->input->post("position_rank",true);
                $act_rank = $this->input->post("act_rank",true);
                if (strpos($position_rank,"회장") !== false and $act_rank!=0) {
                    $act_rank = 2;
                }

                $data=array(
                    'name' => $this->input->post("name",true),
                    'id' => $this->input->post("id",true),
                    'pwd' => $this->input->post("pwd",true),
                    'regdate' => date("Y-m-d"),
                    'yearN' => substr($this->input->post("id",true),0,4),
                    'rank' => $this->input->post("rank",true),
                    'position_rank' => $position_rank,
                    'act_rank' => $act_rank
                );

                $pic = $this->call_upload();
                if($pic) $data["pic"]=$pic;

                $this->admin_member_m->insertrow($data);
                redirect("/admin_member/lists". $text1 . $page);
            }

        }
        public function del()
         {
 			$uri_array=$this->uri->uri_to_assoc(3);
             $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
             $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
 			 $page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

             $this->admin_member_m->deleterow($no);
             redirect("/admin_member/lists" . $text1 . $page);
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
