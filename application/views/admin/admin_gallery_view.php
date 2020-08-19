<!-- Page Heading -->


<!--갤러리 등록 관리 폼-->
<form name="form1" method="post" enctype="multipart/form-data">

<?
	$no=$row->no;
    $onoff=$row->onoff;
    switch ($onoff) {
        case 0:$onoff="공개"; break;
        case 1:$onoff="비공개"; break;
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
	        <a class="dropdown-item" href="/admin_gallery/del/no/<?=$no;?><?=$tmp;?>" onClick="return confirm('삭제할까요 ?');" style="color:red;">Delete</a>
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
						제목
					</div>
					<div class="col-lg-9">
						<textarea type="text" name="title" maxlength="500" value="<?=$row->title ;?>" class="form-control form-control-sm fill-form-Box"><?=$row->title ;?></textarea>
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
	                    <textarea type="text" name="contents" maxlength="1000" value="<?=$row->contents ;?>" class="form-control form-control-sm fill-form-Box"><?=$row->contents ;?></textarea>
						<font color="red"><? if (form_error("contents")==true) echo form_error("contents"); ?></font>
	                </div>
	            </div>
	            <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
	                    작성자
	                </div>
	                <div class="col-lg-9">
	                    <input type="text" name="member_no" size="20" maxlength="40" value="<?=$row->member_name;?>" class="form-control form-control-sm" readonly>
	                </div>
	            </div>
	            <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
	                    작성일
	                </div>
	                <div class="col-lg-9">
	                    <input type="text" name="info" size="20" maxlength="20" value="<?=$row->regdate ;?>" class="form-control form-control-sm" readonly>
	                </div>
	            </div>
                <hr>
                <div class="form-inline">
                    <div class="col-lg-3">
                        image upload
                    </div>
                    <div class="col-lg-9" >
                        <input type="file" name="picname" value="<?=$row->picname ;?>" class="form-control form-control-sm" >
                    </div>
                </div>
	            <hr>
				<div class="form-inline">
					<div class="col-lg-3">
						공개여부
					</div>
					<div class="col-lg-9" >
						<? if ($onoff == '공개'){ ?>
							<label style="display: inline-block;"><input type="radio" name="onoff" value="0" checked>&nbsp;공개</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="onoff" value="1">&nbsp;비공개</label>
					  	<? } ?>
						<? if ($onoff == '비공개'){ ?>
							<label style="display: inline-block;"><input type="radio" name="onoff" value="0" >&nbsp;공개</label>&nbsp;&nbsp;
							<label style="display: inline-block;"><input type="radio" name="onoff" value="1" checked>&nbsp;비공개</label>
					  	<? } ?>


					</div>
				</div>

	        </div>
	      </div>
	    </div>
		<div class="col-lg-4 col-md-4">
		<?
		    if ($row->picname) // 이미지가 있는 경우
			{
				echo("<center><b>사진명</b> : $row->picname <br><br></center>");
		        echo("<center><img src='/images/gallery/$row->picname' width='200' ></center>");
			}
			else {          // 이미지가 없는 경우
		        echo("<center><b>이미지없음</b></center><br><br><br><img src='' width='200'>");
			}
		?>

		</div>
	  </div>
	</div>





	<div align="center">
		<!--<a href="/~sale/gallery/edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">수정하기</a>&nbsp;-->
		<a href="/admin_gallery/lists<?=$tmp;?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">목록</a>&nbsp;
		<input type="submit" value="수정" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">&nbsp;
		<!--<input type="button" value="이전" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
		onclick="history.back();">-->
	</div>
</form>
<br>
