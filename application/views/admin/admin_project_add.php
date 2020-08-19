<!-- Page Heading -->

<!--프로젝트 등록 관리 폼-->
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
                   구성원
               </div>
               <div class="col-lg-9">
                   <input type="text" name="names" size="20" maxlength="100" value="" class="form-control form-control-sm fill-form-Box">
               </div>
           </div>
           <hr>
           <div class="form-inline">
               <div class="col-lg-3">
                   프로젝트 기간
               </div>
               <div class="col-lg-9 date">
                   <input type="text" name="date" size="20" maxlength="100" value="" class="form-control form-control-sm fill-form-Box">
               </div>
           </div>
           <hr>
           <div class="form-inline">
               <div class="col-lg-3">
                   Youtube URL
               </div>
               <div class="col-lg-9" >
                   <input type="text" name="url" value="" class="form-control form-control-sm fill-form-Box" >
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
