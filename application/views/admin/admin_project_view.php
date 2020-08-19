<!-- Page Heading -->

<script>/*
  $(function() {
    $("#datePicker1") .datetimepicker({
      locale: "ko",
      format: "YYYY-MM",
      defaultDate: moment()
    });
  });
  */
</script>



<!--프로젝트 등록 관리 폼-->
<form name="form1" method="post" enctype="multipart/form-data">


<?
	$no=$row->no;

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
	        <a class="dropdown-item" href="/admin_project/del/no/<?=$no;?><?=$tmp;?>" onClick="return confirm('삭제할까요 ?');" style="color:red;">Delete</a>
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
                        분류
                    </div>
                    <div class="col-lg-9">
                        <select name="kind_no" class="form-control form-control-sm" value="<?=$row->kind_name;?>">

            			<?
            				foreach ($list as $row1){
            					if($row->kind_no==$row1->no)
            						echo("<option value='$row1->no' selected>$row1->name</option>");
            					else
            						echo("<option value='$row1->no'>$row1->name</option>");
            				}
            			?>
                        </select>
                    </div>
				</div>
                <hr>
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
                       구성원
                   </div>
                   <div class="col-lg-9">
                       <input type="text" name="names" size="20" maxlength="100" value="<?=$row->names ;?>" class="form-control form-control-sm fill-form-Box">
                   </div>
               </div>
                <hr>
	            <div class="form-inline">
	                <div class="col-lg-3">
	                    프로젝트 기간
	                </div>
	                <div class="col-lg-9 date">
	                    <input type="text" name="date" size="20" maxlength="100" value="<?=$row->date ;?>" class="form-control form-control-sm fill-form-Box">
	                </div>
	            </div>
                <hr>
				<div class="form-inline">
					<div class="col-lg-3">
						Youtube URL
					</div>
					<div class="col-lg-9" >
						<input type="text" name="url" value="<?=$row->url ;?>" class="form-control form-control-sm fill-form-Box" >
					</div>
				</div>
                <hr>
                <div class="form-inline">
                    <div class="col-lg-3">
                        image upload
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
				echo("<center><b>사진명</b> : $row->pic <br><br></center>");
		        echo("<center><img src='/images/project/$row->pic' width='200' ></center><br>");
			}
			else {          // 이미지가 없는 경우
		        echo("<center><b>이미지없음</b></center><br><br><br><img src='' width='200'><br>");
			}

            if ($row->url)  // url이 있는 경우
			{
                if(preg_match('/\bwww.youtube.com/', $row->url)){
                    parse_str( parse_url( $row->url, PHP_URL_QUERY ), $my_array_of_vars );
                    $url_v = $my_array_of_vars['v'];
    		        echo("<center><iframe width='200' src='https://www.youtube.com/embed/$url_v' frameborder='0'></iframe></center>");
                }
                else {
                    echo("<center><b>유효하지 않은 URL</b></center>");
                }
			}
			else {          // url이 없는 경우
		        echo("<center><b>URL 없음</b></center><br><br><br><img src='' width='200'>");
			}
		?>

		</div>
	  </div>
	</div>





	<div align="center">
		<!--<a href="/~sale/project/edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">수정하기</a>&nbsp;-->
		<a href="/admin_project/lists<?=$tmp;?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">목록</a>&nbsp;
		<input type="submit" value="수정" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">&nbsp;
		<!--<input type="button" value="이전" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
		onclick="history.back();">-->
	</div>
</form>
<br>
