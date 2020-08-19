<style>
.box{
		height: 300px !important;
	}
</style>


<style>
/*임시추가 - sj(2020.05.10 03:16)*/
.image img {
  height: 190px !important;
}
</style>


</section>
<section id="main">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="subHead">
					<h2><span>갤러리</span></h2>
				</div>

				<form name="form2" method="post">
					<div class="form-group">
					    <select class="form-control" onchange="form2.submit()" value="<?=$regdate_year;?>" name="regdate_year" style="width:30% !important">
							<option value=''>연도선택</option>
							<? foreach ($yearlist as $row1) {
								$year = $row1->regdate_year;
								if ($regdate_year == $year){
							?>
						    		<option value='<?=$year;?>' selected><?=$year;?></option>
							<? }
								else{
							?>
									<option value='<?=$year;?>'><?=$year;?></option>
							<?
									}
								}
							?>
					    </select>
					</div>
					<?
						header("Pragma: no-cache");
						header("Cache-Control: no-cache,must-revalidate");
					?>
				</form>
<br><br>
<!-- Gallery -->
<section>
	<div class="row">
		<?
			foreach ($list as $row)
			{
				$no=$row->no;
		?>
				<div class="col-3 col-4-medium col-6-small">
					<section class="box">
					<?
						if ($row->picname) {	//이미지 O
							echo("<a href='/gallery/view/no/$no' class='image featured'><img src='/images/project/$row->picname' alt='' /></a>");
						}
						else {				//이미지X
							echo("<a href='/gallery/view/no/$no' class='image featured'><img src='/assets/site_image/pic04.jpg' alt='대체이미지' /></a>");
						}
					?>
						<header>
							<h4><?=$row->title?></h4>
						</header>
						<!--
						<footer>
							<ul class="actions">
								<li><a href="#" class="button xsmall">더보기</a></li>
							</ul>
						</footer>
						-->
					</section>
				</div>
		<?
			}
		?>
	</div>

	<div class="pagination" style="justify-content: center;">
	  <?=$pagination;?>
	</div>

</section>
<!--------------------  Gallery  ---------------------------->
			</div>
		</div>
	</div>
</section>
