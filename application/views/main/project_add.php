
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
	

    function submitFrm() {
        if(checkValue()){
            document.getElementById("addFrm").action = "/Project/add";
            document.getElementById("addFrm").submit();
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
				<form class="form-horizontal" autocomplete="on" name="addFrm" id="addFrm" method="post" accept-charset="utf-8" enctype="multipart/form-data">


				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">프로젝트명 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input class="check"type="text" style="float:left; width:100%;" name="title" value="<?echo set_value('title')?>" placeholder="프로젝트명">
					</div>
				  </div>

				  <div class="form-group">
					<label for="kind" class="col-sm-2 control-label">종류 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <select class="form-control" value="<?=$row->kind_name?>" name="kind_name">
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
					  <input class="check" type="text" style="float:left; width:100%;" name="date" value="<?echo set_value('date')?>" placeholder="프로젝트 기간"> 
					  <span style="color: red; ">&nbsp;YY-MM-DD ~ YY-MM-DD 형식으로 입력하세요.</span>
					</div>
				  </div>

				  <div class="form-group">
					<label for="member" class="col-sm-2 control-label">작성자</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control"style="float:left; width:100%;" name="member" value="4" placeholder="작성자이름 고정" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="names" class="col-sm-2 control-label">구성원 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input class="check" type="text" style="float:left; width:100%;" name="names" value="<?echo set_value('names')?>" placeholder="구성원" >
					</div>
				  </div>

				  <div class="form-group">
					<label for="pic" class="col-sm-2 control-label">이미지 파일 </label>
					<div class="col-sm-10">
					  <input type="file" style="float:left; width:100%;" name="pic" value="<?echo set_value('pic')?>"placeholder="이미지 파일">
					  <span style="color: red; ">&nbsp;파일이름을 영어로 입력해주세요.</span>
					</div>
				  </div>

				  <div class="form-group">
					<label for="url" class="col-sm-2 control-label">유튜브 링크</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" name="url" value="<?echo set_value('url')?>" placeholder="youtude">
					</div>
				  </div>

				  <div class="form-group">
					<label for="contents" class="col-sm-2 control-label">내 용 <span style="color: red; ">*</span></label>
					<div class="col-sm-10">
					  <input type="textarea" class="check" style="float:left; width:100%; resize: none;" name="contents" value="<?echo set_value('contents')?>" placeholder="내 용" rows="5"></input>
					</div>
				  </div>

				  <div align="center">
				  <button type="submit" class="button alt">등록하기</button>
				  </div>

				</form>
				</section>
			</section>
		</div>
	</div>
</section>
