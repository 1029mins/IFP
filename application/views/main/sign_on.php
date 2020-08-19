</section>

<script type="text/javascript">

    $(document).ready(function(e) {
        $(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
            var self = $(this);
            var hak;

            if(self.attr("id") === "hak"){
                hak = self.val();
            }

            $.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
                "/Sign_on/checkId",
                { hak : hak },
                function(data){
                    if(data){ //만약 data값이 전송되면
                        self.parent().parent().find("div").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
                        self.parent().parent().find("div").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
                    }
                }
            );
        });
    });
    //validation
    function isBlank(obj){
        if(obj.value == "")
            return true;
    }

    function submitFrm() {
        if(checkValue()){
            document.getElementById("frm").action = "/Sign_on/signOn";
            document.getElementById("frm").submit();
        }
    }

    function checkValue(){
        var doc = document.signOnFrm;

        //이름
        var regKo = /^[가-힣]+$/;
        var regEng = /^[a-zA-Z]+$/;
        if(isBlank(doc.name)){
            alert("이름을 입력해 주세요");
            doc.name.focus();
            return false;
        }
        if(!regKo.test(doc.name.value) && !regEng.test(doc.name.value)){
            alert("이름은 한글 또는 영문자만 입력 가능합니다");
            doc.name.focus();
            return false;
        }

        //학번
        var regNumber = /^[0-9]*$/;

        if(isBlank(doc.hak)){
            alert("학번을 입력해 주세요.")
            doc.hak.focus();
            return false;
        }
        if(regNumber.test(doc.hak.value) == false){
            alert("학번은 숫자만 입력 가능합니다.");
            doc.hak.focus();
            return false;
        }
        if(doc.hak.value.length != 9){
            alert("정확한 학번을 입력해 주세요.");
            doc.hak.focus();
            return false;
        }

        //비밀번호
        var checkPw = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if(isBlank(doc.pwd)){
            alert("비밀번호를 입력해 주세요.");
            doc.pwd.focus();
            return false;
        }
        if(checkPw.test(doc.pwd.value) == false){
            alert("올바르지 않은 비밀번호 형식입니다.");
            doc.pwd.focus();
            return false;
        }

        //자기소개
        if(isBlank(doc.msg)){
            alert("자기소개를 입력해 주세요.");
            doc.msg.focus();
            return false;
        }
        return true;
    }

</script>
<style>
	.join-form input[type=text], .join-form input[type=email], .join-form input[type=password], .join-form select, .join-form textarea{
	  width: 100%;
	  float: none;
	}

	.box{
		border-bottom:none !important;
	}

	.last-tr{
		border-bottom: solid 1px #dddddd;
	}

	.subHead{
		padding: 0 0 12px 0 !important;
	}

</style>



<section id="main">

	<div class="container">

		<div class="subHead">
				<h2><span>회원 가입</span></h2>
		</div>

		<div class="col-8 col-12-medium imp-medium">
			<section class="box">
				<header>
					<h3 style="color:#444545 !important;">&nbsp; &nbsp;Welcome to join us!</h3>
				</header>
				<br>

				<form class="join-form" autocomplete="on" name="signOnFrm" id="frm" method="post" accept-charset="utf-8">

					<table>
						<tr class="first-tr">
							<th>이름 <span style="color: red; ">*</span></th>
							<td><input type="text" name="name" value=""/></td>
							<td></td>
						</tr>
						<tr>
							<th>학번 <span style="color: red; ">*</span></th>
							<td><input class="check" type="text" id ="hak" name="hak" value=""  maxlength="9"  placeholder="학번이 아이디가 됩니다."/></td>
							<td><div id="id_check">아이디를 입력해주세요</div></td>
						</tr>
						<tr>
							<th>비밀번호 <span style="color: red; ">*</span></th>
							<td><input type="password" name="pwd" value=""  maxlength="20" placeholder="8~20자리, 영문, 숫자만 가능합니다."/></td>
							<td></td>
						</tr>
						<tr class="last-tr">
							<th>한줄 소개 <span style="color: red; ">*</span></th>
							<td><input type="text" name="msg" value="" placeholder="가입 승인시 도움이 됩니다."/></td>
							<td></td>
						</tr>
					</table>

					<footer align="center">
						<button class="button alt" onclick="javascript:submitFrm();" type="button">가입하기</button>
					</footer>

				</form>

			</section>
		</div>

	</div>
</section>
