<style>


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
</section>
<script type="text/javascript">
	$(document).ready(function(e) {
        $(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
            var self = $(this);
            var hak;


            $.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
                "/Project/checkadd",
                { title : title },
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
            document.getElementById("frm").action = "/Project/add";
            document.getElementById("frm").submit();
        }
    }

    function checkValue(){
        var doc = document.addFrm;

        //프로젝트명
        if(isBlank(doc.title)){
            alert("프로젝트명을 입력해 주세요");
            doc.title.focus();
            return false;
        }
        if(doc.title.value.length >= 13){ //나중에 이거 12자 제한으로.
			alert("프로젝트명을 12자 이내로 입력해주세요.");
            doc.title.focus();
            return false;
        }

        //종류
        var regNumber = /^[0-9]*$/;

        if(isBlank(doc.kind_name)){
            alert("종류를 선택해 주세요.")
            doc.kind_name.focus();
            return false;
        }

        //프로젝트기간
		//var regNumber = /^[0-9]*$/;

        if(isBlank(doc.date)){
            alert("프로젝트 기간을 입력해 주세요.");
            doc.date.focus();
            return false;
        }

        //구성원
        if(isBlank(doc.names)){
            alert("구성원을 입력해 주세요.");
            doc.names.focus();
            return false;
        }

		//내용
        if(isBlank(doc.contents)){
            alert("프로젝트 내용을 입력해 주세요.");
            doc.contents.focus();
            return false;
        }
        return true;
    }

</script>

<!-- Main -->
<section id="main">

	<div class="container">

		<div class="subHead">
				<h2><span>프로젝트 추가</span></h2>
		</div>

		<div >
			<section class="box">
				<header>
					<h3 style="color:#444545 !important;">&nbsp; &nbsp;NEW 프로젝트</h3>
				</header>
				<br>
				
				<section>
				<form class="form-horizontal" autocomplete="on" name="addFrm" id="frm" method="post" accept-charset="utf-8" enctype="multipart/form-data">


				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">프로젝트명 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="title" placeholder="프로젝트명">
					</div>
				  </div>

				  <div class="form-group">
					<label for="kind" class="col-sm-2 control-label">종류 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <select class="form-control" value="<?$kind_name;?>" name="kind_name">
					  <?
						  foreach($kindlist as $row1)
						  {
							  $kind = $row1->kind_name;
							  ?>
							  <option value="<?=$row1->no?>"><?=$kind?></option>
							  <?
						  }
					  ?> 
					</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="date" class="col-sm-2 control-label">프로젝트기간 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="date" placeholder="프로젝트 기간"> 
					  &nbsp;YY-MM-DD ~ YY-MM-DD 형식으로 입력하세요.
					</div>
				  </div>

				  <div class="form-group">
					<label for="member" class="col-sm-2 control-label">작성자</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control"style="float:left; width:100%;" id="member" value="4" placeholder="작성자이름 고정" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="names" class="col-sm-2 control-label">구성원 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="names" placeholder="구성원" >
					</div>
				  </div>

				  <div class="form-group">
					<label for="pic" class="col-sm-2 control-label">이미지 파일 </label>
					<div class="col-sm-10">
					  <input type="file" style="float:left; width:100%;" id="pic" placeholder="이미지 파일">
					</div>
				  </div>

				  <div class="form-group">
					<label for="url" class="col-sm-2 control-label">유튜브 링크</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="url" placeholder="youtude">
					</div>
				  </div>

				  <div class="form-group">
					<label for="contents" class="col-sm-2 control-label">내 용 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <textarea style="float:left; width:100%; resize: none;" id="contents" placeholder="내 용" rows="5"></textarea>
					</div>
				  </div>

				  <div align="center">
				  <button class="button alt" onclick="javascript:submitFrm();" type="button">등록하기</button>
				  </div>

				</form>
				</section>
			</section>
		</div>
	</div>
</section>
