<style>
	table th{
		padding-left: 10px !important;
		padding-right: 0px !important;
	}

	table td {
		padding-left: 0px !important;
	}

	.image img {
		display: block;
		/* max-width: 330px !important; */
		height:230px !important;
	}

	.box{
		height: 100% !important;
	}
</style>

</section>


<!-- Main -->
				<section id="main">
					<div class="container">
						<div class="subHead">
							<h2><span>프로젝트</span></h2>
						</div>

				<!--검색
				  <form name="form1" method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
					<div class="input-group">
					  <input type="text" name="text1" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) {find_text();}" class="form-control bg-white border-1 small" placeholder="제목검색" aria-label="Search" aria-describedby="basic-addon2">
					  <div class="input-group-append">
						<button class="btn btn-primary" type="button" onClick="find_text();">
						  <i class="fas fa-search fa-sm"></i>
						</button>
					  </div>
					</div>
				  </form>-->
				
	<?
      $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
	?>

		<br><br>
			<div class="col-4 col-12-medium">
<!--portfolio-->
	<section>
		<div class="row">
		<div class="col-12" style="text-align:right;">
			<a href="/project/add"><button class="button alt" type="button">글쓰기</button></a>
		</div>
		<?
			foreach ($list as $row)
			{
				$no=$row->no;

				$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
		?>
			<div class="col-4 col-6-medium col-12-small">
				<section class="box" style="height: 100% ">
					<?
						if ($row->pic) {	//이미지 O
							echo("<a href='/project/view/no/$no' class='image featured'><img src='/images/project/$row->pic' alt='' /></a>");
						}
						else {				//이미지X
							echo("<a href='/project/view/no/$no' class='image featured'><img src='/assets/site_image/pic02.jpg' alt='대체이미지' /></a>");
						}
					?>
					<header>
						<h4><?=$row->title?></h4>
						
					</header>
					<table border="1px">
						<tr>
							<th width="35%">제작 &nbsp;기간</th>
							<td><?=$row->date; ?></td>
							
						</tr>
						<tr>
							<th>제 &nbsp; 작 &nbsp;자</th>
							<td><?=$row->names; ?></td>
						</tr>
						<tr>
							<th>내  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;용</th>
							<td>
							<? if (strlen($row->contents)>25)
								{
									echo(mb_substr($row->contents, 0, 20, 'utf-8').'. . .');
								}
								else
								{
									echo(mb_substr($row->contents, 0, 24, 'utf-8'));
								}
							?></td>
						</tr>
						<tr>
							<th></th>
							<td>
							<!--Detail 버튼
								<ul class="actions" align="right">
								<li><a href="/project/view/no/?=$no;?" class="button xsmall">Detail</a></li>
							</ul>-->
							</td>
						</tr>
					</table>
				</section>
			</div>
		<?
			}
		?>
		</div>
	</section>

	</div>

	<div class="pagination " style="justify-content: center;">
	  <?=$pagination;?>
	</div>

</section>
