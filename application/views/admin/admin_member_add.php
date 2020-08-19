<!-- Page Heading -->


<!--사용자 등록 관리 폼-->
<form name="form1" method="post" enctype="multipart/form-data">

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
						이름
					</div>
					<div class="col-lg-9">
						<input type="text" name="name" size="20" maxlength="10" value="" class="form-control form-control-sm">
						<font color="red"><? if (form_error("name")==true) echo form_error("name"); ?></font>
					</div>
				</div>
				<hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
						<font color="red">*</font>
	                    학번
	                </div>
	                <div class="col-lg-9">
	                    <input type="text" name="id" size="20" maxlength="9" value="" class="form-control form-control-sm">
						<font color="red"><? if (form_error("id")==true) echo form_error("id"); ?></font>
	                </div>
	            </div>
	            <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
						<font color="red">*</font>
	                    비밀번호
	                </div>
	                <div class="col-lg-9">
	                    <input type="text" name="pwd" size="20" maxlength="50" value="1234" class="form-control form-control-sm">
						<font color="red"><? if (form_error("pwd")==true) echo form_error("pwd"); ?></font>
	                </div>
	            </div>
	            <hr>
				<div class="form-inline">
					<div class="col-lg-3">
						RANK
					</div>
					<div class="col-lg-9" >
						<label style="display: inline-block;"><input type="radio" name="rank" value="0" checked>&nbsp;회원</label>&nbsp;&nbsp;

						<label style="display: inline-block;"><input type="radio" name="rank" value="1">&nbsp;운영진</label>&nbsp;&nbsp;

						<label style="display: inline-block;"><input type="radio" name="rank" value="2">&nbsp;관리자</label>&nbsp;&nbsp;

						<label style="display: inline-block;"><input type="radio" name="rank" value="3">&nbsp;교수님</label>&nbsp;&nbsp;
					</div>
				</div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						직책   ( 2019회장 / 2019부회장 )
					</div>
					<div class="col-lg-9" >
						 <input type="text" name="position_rank" size="20" maxlength="10" value="" class="form-control form-control-sm">
					</div>
				</div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						활동자 / 졸업자
					</div>
					<div class="col-lg-9" >
						<label style="display: inline-block;"><input type="radio" name="act_rank" value="1" checked>&nbsp;활동자</label>&nbsp;&nbsp;
						<label style="display: inline-block;"><input type="radio" name="act_rank" value="0">&nbsp;졸업자</label>&nbsp;&nbsp;
					</div>
				</div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						upload
					</div>
					<div class="col-lg-9" >
						<input type="file" name="pic" value="" class="form-control form-control-sm" >
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
		<input type="submit" value="저장하기" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">&nbsp;
	</div>
</form>
<br>
