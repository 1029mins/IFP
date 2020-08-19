<!-- Page Heading -->


<!--사용자 등록 관리 폼-->
<form name="form1" method="post" enctype="multipart/form-data">

<?
	$no=$row->no;
    $rank=$row->rank;
    $act_rank=$row->act_rank;
    switch ($rank) {
        case 0:$rank="회원"; break;
        case 1:$rank="운영진"; break;
        case 2:$rank="관리자"; break;
        case 3:$rank="교수님"; break;
		case 4:$rank="회원대기"; break;
    }
	switch ($act_rank) {
		case 0:$act_rank="졸업자"; break;
		case 1:$act_rank="활동부원"; break;
		case 2:$act_rank="활동임원"; break;
	}

	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>

	<!-- Dropdown Card -->
	<div class="card shadow mb-4">
	  <!-- Card Header -->
	  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color:#4e73df;">
	    <h6 class="m-0 font-weight-bold text-light">No.<?=$row->no ;?></h6>
	    <!-- drop down -->
	    <div class="dropdown no-arrow">
	      <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	      </a>
	      <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	        <a class="dropdown-item" href="/admin_member/del/no/<?=$no;?><?=$tmp;?>" onClick="return confirm('삭제할까요 ?');" style="color:red;">Delete</a>
	      </div>
	    </div>
	  </div>
	  <!-- Card Body -->
	  <div class="card-body row">
	    <!--card-->
	    <div class="col-lg-8 col-md-8">
	      <div class="card mb-4 py-0">
	        <div class="card-body">
			<!--contents-->
				<div class="form-inline">
					<div class="col-lg-3">
						<font color="red">*</font>
						이름
					</div>
					<div class="col-lg-9">
						<input type="text" name="name" size="20" maxlength="10" value="<?=$row->name ;?>" class="form-control form-control-sm">
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
	                    <input type="text" name="id" size="20" maxlength="9" value="<?=$row->id ;?>" class="form-control form-control-sm">
						<font color="red"><? if (form_error("id")==true) echo form_error("id"); ?></font>
	                </div>
	            </div>
	            <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
	                    소개
	                </div>
	                <div class="col-lg-9">
	                    <textarea type="text" name="info"  maxlength="500" value="<?=$row->info ;?>" class="form-control form-control-sm" ><?=$row->info ;?></textarea>
	                </div>
	            </div>
	            <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
	                    가입신청글
	                </div>
	                <div class="col-lg-9">
	                    <textarea type="text" name="msg" maxlength="500" value="<?=$row->msg ;?>" class="form-control form-control-sm"><?=$row->msg ;?></textarea>
	                </div>
	            </div>
				<hr>
			    <div class="form-inline">
				    <div class="col-lg-3">
					    신청일
				    </div>
				    <div class="col-lg-9">
					    <input type="text" maxlength="500" value="<?=$row->regdate ;?>" class="form-control form-control-sm" readonly>
				    </div>
			    </div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						RANK
					</div>
					<div class="col-lg-9" >
						<? if ($rank == '회원'){ ?>
							<label style="display: inline-block;"><input type="radio" name="rank" value="4" >&nbsp;회원대기</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="0" checked>&nbsp;회원</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="1">&nbsp;운영진</label>
					  	<? } ?>
						<? if ($rank == '운영진'){ ?>
							<label style="display: inline-block;"><input type="radio" name="rank" value="4" >&nbsp;회원대기</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="0" >&nbsp;회원</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="1" checked>&nbsp;운영진</label>
					  	<? } ?>
						<? if ($rank == '관리자'){ ?>
							<label style="display: inline-block;"><input type="radio" name="rank" value="2" checked>&nbsp;관리자</label>&nbsp;&nbsp;
					  	<? } ?>
						<? if ($rank == '교수님'){ ?>
							<label style="display: inline-block;"><input type="radio" name="rank" value="3" checked>&nbsp;교수님</label>&nbsp;&nbsp;
					  	<? } ?>
						<? if ($rank == '회원대기'){ ?>
							<label style="display: inline-block;"><input type="radio" name="rank" value="4" checked>&nbsp;회원대기</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="0" >&nbsp;회원</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="rank" value="1">&nbsp;운영진</label>
					  	<? } ?>
					</div>
				</div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						활동자/졸업자
					</div>
					<div class="col-lg-9" >
						<? if ($act_rank == '졸업자'){ ?>
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="0" checked>&nbsp;졸업자</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="1">&nbsp;활동부원</label>&nbsp;&nbsp;
					  	<? } ?>
						<? if ($act_rank == '활동부원'){ ?>
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="0" >&nbsp;졸업자</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="1" checked>&nbsp;활동부원</label>&nbsp;&nbsp;
					  	<? } ?>
						<? if ($act_rank == '활동임원'){ ?>
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="0" >&nbsp;졸업자</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="1" >&nbsp;활동부원</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="act_rank" value="2" checked>&nbsp;활동임원</label>&nbsp;&nbsp;
					  	<? } ?>

					</div>
				</div>
				<hr>
				<div class="form-inline">
					<div class="col-lg-3">
						upload
					</div>
					<div class="col-lg-9" >
						<input type="file" name="pic" value="<?=$row->pic ;?>" class="form-control form-control-sm" >
					</div>
				</div>
	        </div>
	      </div>
	    </div>
		<div class="col-lg-4 col-md-4">
		<?
		    if ($row->pic) // 이미지가 있는 경우
			{
				echo("<center><b>파일명</b> : $row->pic <br><br></center>");
		        echo("<center><img src='/images/member/$row->pic' width='200' ></center>");
			}
			else {          // 이미지가 없는 경우
		        echo("<img src='' width='200'>");
			}
		?>

		</div>
	  </div>
	</div>





	<div align="center">
		<!--<a href="/~sale/member/edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">수정하기</a>&nbsp;-->
		<a href="/admin_member/lists<?=$tmp;?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">목록</a>&nbsp;
		<input type="submit" value="수정" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">&nbsp;
		<!--<input type="button" value="이전" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
		onclick="history.back();">-->
	</div>
</form>
<br>
