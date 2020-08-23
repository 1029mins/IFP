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

<!-- Main -->
<section id="main">

	<div class="container">

		<div class="subHead">
				<h2><span>프로젝트 수정</span></h2>
		</div>

		<div >
			<section class="box">
				<header>
					<h3 style="color:#444545 !important;">&nbsp; &nbsp;<?=$row->no?>번 프로젝트</h3>
				</header>
				<br>
				
				<section>
				<form class="form-horizontal"name="form1" method="post" action="" enctype="multipart/form-data">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">프로젝트명</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" name="title" value="<?=$row->title?>" >
					</div>
				  </div>

				  <div class="form-group">
					<label for="kind" class="col-sm-2 control-label">종류</label>
					<div class="col-sm-10">
					<input type="hidden" name="kind" value="<?=$row->kind_name;?>">
					  <select class="form-control" name="kind" value="<?=$row->kind_name;?>">

					  <option><?=$row->kind_name;?></option>

					</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="date" class="col-sm-2 control-label">프로젝트기간</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" name="date" value="<?=$row->date?>" placeholder="프로젝트 기간">
					</div>
				  </div>

				  <div class="form-group">
					<label for="member" class="col-sm-2 control-label">작성자</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control"style="float:left; width:100%;" name="member"  placeholder="<?=$row->member_name?>" disabled>
					  &nbsp;00-00-00 ~ 00-00-00 형식으로 입력하세요.
					</div>
				  </div>

				  <div class="form-group">
					<label for="names" class="col-sm-2 control-label">구성원</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" name="names" value="<?=$row->names?>" placeholder="구성원">
					</div>
				  </div>

				  <div class="form-group">
					<label for="pic" class="col-sm-2 control-label">이미지 파일 </label>
					<div class="col-sm-10">
					  <input type="file" style="float:left; width:100%;" name="pic" value="<?=$row->pic?>" placeholder="이미지 파일">
					</div>
				  </div>

				  <div class="form-group">
					<label for="url" class="col-sm-2 control-label">유튜브 링크</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" name="url" value="<?=$row->url?>" placeholder="youtude">
					</div>
				  </div>

				  <div class="form-group">
					<label for="contents" class="col-sm-2 control-label">내 용</label>
					<div class="col-sm-10">
					  <input type="textarea" style="float:left; width:100%; resize: none;" name="contents" value="<?=$row->contents?>" rows="5">
					</div>
				  </div>

				  <div align="center">
                        <input type="submit" value="수정하기" class="button alt">
						<a href="/project/detail/no/<?=$row->no?>"><input type="button" value="이전으로" class="button alt"></a>
				  </div>

				</form>
				</section>
			</section>
		</div>
	</div>
</section>
