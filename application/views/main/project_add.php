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
				<h2><span>프로젝트 추가</span></h2>
		</div>

		<div >
			<section class="box">
				<header>
					<h3 style="color:#444545 !important;">&nbsp; &nbsp;NEW 프로젝트</h3>
				</header>
				<br>
				
				<section>
				<form class="form-horizontal"name="form1" method="post" action="" enctype="multipart/form-data">

				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">프로젝트명</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="title" placeholder="프로젝트명">
					</div>
				  </div>

				  <div class="form-group">
					<label for="kind" class="col-sm-2 control-label">종류</label>
					<div class="col-sm-10">
					  <select class="form-control">
					  <option>개별</option>
					  <option>개인</option>
					  <option>3</option>
					  <option>4</option>
					  <option>5</option>
					</select>
					</div>
				  </div>

				  <div class="form-group">
					<label for="date" class="col-sm-2 control-label">프로젝트기간</label>
					<div class="col-sm-10">
					  <input type="date" style="float:left; width:100%;" id="date" placeholder="프로젝트 기간">
					</div>
				  </div>

				  <div class="form-group">
					<label for="member" class="col-sm-2 control-label">작성자</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control"style="float:left; width:100%;" id="member" placeholder="작성자이름 고정" disabled>
					</div>
				  </div>

				  <div class="form-group">
					<label for="names" class="col-sm-2 control-label">구성원</label>
					<div class="col-sm-10">
					  <input type="text" style="float:left; width:100%;" id="names" placeholder="구성원">
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
					<label for="contents" class="col-sm-2 control-label">내 용</label>
					<div class="col-sm-10">
					  <textarea style="float:left; width:100%; resize: none;" id="contents" placeholder="내 용" rows="5"></textarea>
					</div>
				  </div>

				  <div align="center">
                        <input type="submit" value="등록하기" class="button alt">
				  </div>

				</form>
				</section>
			</section>
		</div>
	</div>
</section>
