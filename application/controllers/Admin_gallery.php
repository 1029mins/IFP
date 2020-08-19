<?
    class Admin_gallery extends CI_Controller {
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model("admin_gallery_m");
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
				$base_url = "/admin_gallery/lists/page";
			else
				$base_url = "/admin_gallery/lists/text1/$text1/page";
			$page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
			//$base_url = "/~sale26" . $base_url;
			$config["per_page"]	 = 10;								// 페이지당 표시할 line 수
			$config["total_rows"] = $this->admin_gallery_m->rowcount($text1);		// 전체 레코드개수 구하기
			$config["uri_segment"] = $page_segment;					// 페이지가 있는 segment 위치
			$config["base_url"]	 = $base_url;						// 기본 URL
			$this->pagination->initialize($config);					// pagination 설정 적용
			$data["page"]=$this->uri->segment($page_segment,0);		// 시작위치, 없으면 0.
			$data["pagination"] = $this->pagination->create_links();// 페이지소스 생성
			$start=$data["page"];									// n페이지 : 시작위치
			$limit=$config["per_page"];								// 페이지 당 라인수
			$data["text1"]=$text1;                                  // text1 값 전달을 위한 처리

            $data["list"] = $this->admin_gallery_m->getlist($text1, $start, $limit);
            $this->load->view("admin/admin_header");
            $this->load->view("admin/admin_gallery_list",$data);
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
               $data["row"] = $this->admin_gallery_m->getrow($no);
               $this->load->view("admin/admin_header");
               $this->load->view("admin/admin_gallery_view",$data);
               $this->load->view("admin/admin_footer");
           }
           else
           {                                            //수정버튼 클릭 edit
               $data=array(
                   'title' => $this->input->post("title",true),
                   'contents' => $this->input->post("contents",true),
                   'onoff' => $this->input->post("onoff",true)
               );

               $pic = $this->call_upload();
               if($pic) $data["pic"]=$pic;

               $this->admin_gallery_m->updaterow($data, $no);
               $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
               redirect("/admin_gallery/view/no/" . $no . $tmp);
           }


       }
       public function add()
        {
            $this->load->library('session');    //세션 작성자

			$uri_array=$this->uri->uri_to_assoc(3);
            $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
			$page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

			$this->load->library("form_validation");
            $this->form_validation->set_rules("title","'title'","required|max_length[500]");
            $this->form_validation->set_rules("contents","'contents'","required|max_length[1000]");

            if ( $this->form_validation->run()==FALSE )
            {
                $this->load->view("admin/admin_header");
                $this->load->view("admin/admin_gallery_add");
                $this->load->view("admin/admin_footer");
            }
            else
            {   //미완성 - 작성자
                $username = $this->session->userdata('no') ? $this->session->userdata('no') : 0 ;

                $data=array(
                    'title' => $this->input->post("title",true),
                    'contents' => $this->input->post("contents",true),
                    'onoff' => $this->input->post("onoff",true),
                    'regdate' => date("Y-m-d"),
                    'member_no' => $username
                );

                $pic = $this->call_upload();
                if($pic) $data["pic"]=$pic;

                $this->admin_gallery_m->insertrow($data);
                redirect("/admin_gallery/lists". $text1 . $page);
            }

        }
        public function del()
         {
 			$uri_array=$this->uri->uri_to_assoc(3);
             $no = array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
             $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
 			 $page = array_key_exists("page",$uri_array) ?  "/page/" . urldecode($uri_array["page"]) : "" ;

             $this->admin_gallery_m->deleterow($no);
             redirect("/admin_gallery/lists" . $text1 . $page);
         }

        //파일업로드
        public function call_file_upload()
        {
            $config['upload_path']	= './images/gallery';
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
            $config['upload_path']	= './images/gallery';
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
        //다중이미지업로드-테스트중
        public function call_multi_upload()
        {
            $error=array();
            $extension=array("jpeg","jpg","png","gif");
            foreach($_FILES["pic"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["pic"]["name"][$key];
                $file_tmp=$_FILES["pic"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("./images/gallery/".$pic."/".$file_name))
                    {
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"./images/gallery/".$pic."/".$file_name);
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        move_uploaded_file($file_tmp=$_FILES["pic"]["tmp_name"][$key],"./images/gallery/".$pic."/".$newFileName);
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
        }

    }
?>
