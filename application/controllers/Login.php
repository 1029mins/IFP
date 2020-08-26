<?
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
    // 클래스생성할 때 초기설정
    function __construct()
    {
        parent::__construct();
        $this -> load -> model('login_m');
		$this -> load -> helper('form');
    }
    // 제일 먼저 실행되는 함수
    public function index()
    {
        $this->login();
    }
    
	public function login(){
		$this -> load -> library('form_validation'); //폼 검증 라이브러리 로드
 
        $this -> load -> helper('alert');
 
 		//폼 검증 필드와 규칙 사전 정의
        $this -> form_validation -> set_rules('id', '아이디', 'required|numeric');
        $this -> form_validation -> set_rules('pwd', '비밀번호', 'required');
 
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';

		if ($this -> form_validation -> run() == TRUE) {
            $data = array(
                'id' => $this -> input -> post('id', TRUE),
                'pwd' => $this -> input -> post('pwd', TRUE)
            );
			
			$data['pwd'] = hash("sha256",$data['pwd']); //해시 암호화
			$result = $this -> login_m -> login($data);
			$rank = $result -> rank; 

			if ($result!= null && $rank != 4) { //아이디와 비밀번호가 맞는 경우 세션을 생성하기 위해 아이디와 로그인 여부를 배열로 만듬
				$newdata = array(
					'username' => $result -> name,
					'logged_in' => TRUE
				);

				$this -> session -> set_userdata($newdata); //배열 newdata로 세션을 생성
			
				alert('로그인 되었습니다.');
				exit;
			} else if($rank == 4){
				alert('회원가입 승인 대기중입니다. 조금만 기다려주세요!');
				exit;
			}else {
				alert('아이디나 비밀번호를 확인해 주세요.');
				exit;
			}
		}else{
			alert('아이디나 비밀번호를 확인해 주세요.');
		}
	}

	public function logout(){
		$this -> load -> helper('alert');
		$this -> session -> sess_destroy();

		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		alert('로그아웃 되었습니다.');
		exit;
	}
}
?>
