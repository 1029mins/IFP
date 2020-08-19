<script src="https://code.jquery.com/jquery-3.5.0.js"></script>


<script>
//file uploadbox

  $(document).ready(function(){
	 $("#add").on("click",function(){
         alert('asdf');
		var addtr = '<div><div style="display:table-row;">
			<div style="display:table-cell;">
				<input type="file" name="file" id="file" value=""/>
			</div>
			<div style="display:table-cell;">&nbsp;
				<button class="btn_area" id="del" name="del" type="button" style="width:22px; height:26px;">-</button>
			</div>
		</div></div>';

		$("div#upload-box").after(addtr);

	 });

	 $(document).on("click","#del",function(){
		$(this).parents('tr').empty();
	 });

	 var responseMessage = "${result}";
	 console.log(responseMessage);
	 if(responseMessage == "success"){
		 alert("입사지원이 완료되었습니다.");
		 self.close();
	 }else if(responseMessage == "fail"){
		 alert("업로드 오류");
	 }

  });


</script>

<!--갤러리 등록 관리 폼-->
<form name="form1" method="post" enctype="multipart/form-data">

	<!--file uploadbox-->
	<div id="upload-box">
		<h3><font color="red">*</font>이력서 및 포트폴리오</h3>
		<div style="display:table-row;">
			<div style="display:table-cell;">
				<input type="file" name="file" id="file" value=""/>
			</div>
			<div style="display:table-cell;">&nbsp;
				<button class="btn_area add" id="add" type="button" style="width:22px; height:26px;">+</button>
			</div>
		</div>
	</div>

	<!-- Dropdown Card -->
	<div class="card shadow mb-4">
	  <!-- Card Header -->
	  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color:#4e73df;">
	    <h6 class="m-0 font-weight-bold text-light">추가</h6>
	    <!-- drop down -->
	    <div class="dropdown no-arrow">
	      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-</a>
	    </div>
	  </div>
	  <!-- Card Body -->
	  <div class="card-body">
	    <!--card-->
	    <div class="col-lg-8">
	      <div class="card mb-4 py-0">
	        <div class="card-body">
			<!--contents-->
            <div class="form-inline">
                <div class="col-lg-3">
                    <font color="red">*</font>
                    제목
                </div>
                <div class="col-lg-9">
                    <textarea type="text" name="title" maxlength="500" value="" class="form-control form-control-sm fill-form-Box"></textarea>
                    <font color="red"><? if (form_error("title")==true) echo form_error("title"); ?></font>
                </div>
            </div>
            <hr>
            <div class="form-inline">
                <div class="col-lg-3">
                    <font color="red">*</font>
                    내용
                </div>
                <div class="col-lg-9">
                    <textarea type="text" name="contents" maxlength="1000" value="" class="form-control form-control-sm fill-form-Box"></textarea>
                    <font color="red"><? if (form_error("contents")==true) echo form_error("contents"); ?></font>
                </div>
            </div>
            <hr>

            <div class="form-inline">
                <div class="col-lg-3">
                    image upload
                </div>
                <div class="col-lg-9" >
                    <input type="file" name="pic" value="" class="form-control form-control-sm" >
                </div>


            </div>
<!--
            <div class="form-inline">
                <div class="col-lg-3">
                    image multi upload
                </div>
                <div class="col-lg-9" >
                    <input type="file" name="pic[]" value="" class="form-control form-control-sm" multiple>
                </div>
            </div>
-->
            <hr>
            <div class="form-inline">
                <div class="col-lg-3">
                    공개여부
                </div>
                <div class="col-lg-9" >
                    <label style="display: inline-block;"><input type="radio" name="onoff" value="0" checked>&nbsp;공개</label>&nbsp;&nbsp;
                    <label style="display: inline-block;"><input type="radio" name="onoff" value="1">&nbsp;비공개</label>&nbsp;&nbsp;
                </div>
            </div>
	        </div>
	      </div>
	    </div>
		<div class="col-lg-4">

		</div>
	  </div>
	</div>




	<?
		//$tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";
	?>
	<div align="center">
		<input type="submit" value="저장하기" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm">&nbsp;
	</div>
</form>
<br>
