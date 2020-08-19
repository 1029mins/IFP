<?
class Sign_on extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model("Sign_on_m");
        $this->load->helper(array("url", "date"));
        $this->load->library('session');
        date_default_timezone_set("Asia/Seoul");

    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $data["menu"] ='none';
        $this->load->view("main/main_header",$data);
        $this->load->view("main/sign_on");
        $this->load->view("main/main_footer");
    }

    public function signOn(){
        $data = array(
            'id' => $this->input->post("hak",true),
            'name' => $this->input->post("name",true),
            'pwd' => $this->input->post("pwd",true),
            'msg' => $this->input->post("msg",true),
            'regdate' => date("Ymd"),
            'yearN' => "0000",
            'rank' => "4",

        );

        if (!($this->checkVar($data))) {        //잘못된 방법으로 값을 입력 하려 했을경우.
            echo "<script>alert(\"정상적 입력이 아닙니다.\");</script>";
            redirect('/Sign_on');

        }else{
            $data['pwd'] = hash("sha256",$data['pwd']);
            $data['yearN'] = substr($data['id'],0,4);

            if($this->checkId($data['id'])){
                $temp = $this->Sign_on_m->insertrow($data);
                if($temp != false ){
                    $this->session->set_flashdata('message','회원가입에 성공했습니다. 가입승인을 기다려 주세요~^^');

                    echo "<script>history.go(-2);</script>";
                }
            }else{
                echo "<script>alert(\"아이디가 중복되었습니다.\");</script>";
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    public function checkId($id = null){

        if(empty($id)){
            $hak = $this->input->post("hak",true);

            $temp = $this->Sign_on_m->checkId($hak);

            if($temp >= 1 || strlen($hak) !== 9 || !(preg_match("/^[0-9]/i",$hak))){
                echo "사용 불가능한 아이디입니다.";

            } else {
                echo " 사용 가능한 아이디입니다.";

            }
        }else{
            $hak = $id;
            $temp = $this->Sign_on_m->checkId($hak);

            if($temp >= 1 || strlen($hak) !== 9 || !(preg_match("/^[0-9]/i",$hak))){
                return false;

            } else {
                return true;

            }
        }
    }


    public function checkVar($data){

        foreach($data as $d => $v){
            //값을 입력하지 않은 경우
            if($v===null){
                echo "<script>alert(\"입력오류\");</script>";

                return false;
            }

            //키값이 pwd가 아닌데 특수문자가 들어가있는 경우   : sql injection 방지
            if($d != 'pwd' && preg_match("/[#\&\\+\-%@=\/\\\:;,\.\'\"\^`~\_|\!\/\?\*$#<>()\[\]\{\}]/i", $v)){
                echo "<script>alert(\"입력오류\");</script>";

                return false;
            }
        }

        //학번이 9자리가 아니거나 숫자가 아니면 false
        if(strlen($data['id']) !== 9 || !(preg_match("/^[0-9]/i",$data['id']))){
            $temp = $data['id'];
            echo "<script>alert(\"$입력오류 \");</script>";

            return false;
        }

        //비밀번호 8~20자, 영문, 숫자, 특수문자 필수
        $pattern = '/^.*(?=^.{8,20}$)(?=.*\d)(?=.*[a-zA-Z]).*$/';
        if(!(preg_match($pattern ,$data['pwd']))){
            echo "<script>alert(\"입력오류.\");</script>";

            return false;
        }

        return true;
    }
}
?>
