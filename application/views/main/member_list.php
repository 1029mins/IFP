

</section>



<section id="main">
	<div class="container">

		<div class="subHead">
			<h2><span>회원 소개</span></h2>

		</div>
		<br><br>

		<div class="row">
			<div class="col-lg-5 col-5-medium col-md-4 col-sm-4" style="padding-left:10px !important;">

					<section>

						<header><br>
							<h2 style="color:#00263D !important;"><?echo date("Y");?> 회장 & 부회장</h2><br>
						</header>

						<section>
					<? 	foreach ($listExecutive as $rowExe)
						{
							if($rowExe->pic) $picPath = '/images/member/' . $rowExe->pic;  // 이미지가 있는 경우
							else  $picPath = '/assets/site_image/pic05.jpg'; // 이미지가 없는 경우
					?>
							<a href="#" class="image featured imfgPoint"><img style="width:180px; height:240px;" src="<?=$picPath;?>" alt="" />
								<br><b><?=$rowExe->name;?> / <?=$rowExe->position_rank;?></b>
							</a>
					<?	}
					?>
						</section>

						<div style="text-align: center;">
							<ul class="actions" >
								<form name="form2" method="post">
									<input type="hidden" name="sort1" value="history">
									<li><input type="submit" class="button" value="History"></li>
								</form><br>
								<form name="form3" method="post">
									<input type="hidden" name="sort1" value="">
									<li><input type="submit" class="button" value="ALL"></li>
								</form>
							</ul>
						</div>

					</section>

			</div>
			<div class="col-lg-7 col-12-medium col-md-8 col-sm-8">
				<div class="white_bg">
					<section>
						<header>
							<h2></h2>
						</header>
						<ul class="dates">
					<?
						foreach ($list as $row)
						{
							$no=$row->no;
							$act_rank=$row->act_rank;
							switch ($act_rank) {
			                    case 0:$act_rank="졸업자";
									$color_class="act_n_color act_n_color:after";
			                        break;
			                    case 1:$act_rank="활동중";
									$color_class="act_color act_color:after";
			                        break;
			                    case 2:$act_rank="활동임원";
			                        break;
							}
							$yearN = substr($row->yearN,2);

					?>
							<li>
								<span class="date <?=$color_class;?>"><?=$act_rank; ?><strong><?=$yearN; ?></strong></span>
								<div>
									<h3><a href="#">
										<?=$row->name;?>
										<?if($row->position_rank){echo("/");}?>
										<?=$row->position_rank;?>
									</a></h3>
									<p><?=$row->info; ?></p>
								</div>

					<?
								echo("<div>");
									if ($row->pic) // 이미지가 있는 경우
								    {
									    echo("<img src='/images/member/$row->pic'  class='right'>");
								    }
								    else {          // 이미지가 없는 경우
									    echo("<img src='' class='right'>");
								    }
							echo("</div>
						    </li>");
			            }
			        ?>


						</ul>

						<div class="pagination" style="justify-content: center;">
						  <?=$pagination;?>
						</div>

					</section>
				</div>
			</div>


		</div>
	</div>
</section>

<style>

	.act_n_color:after {
		border-left: solid 1.25em #23527c !important;
	}
	.act_n_color {
		background-color: #23527c !important;
	}
	.act_color:after {
		border-left: solid 1.25em #33899c !important;
	}
	.act_color {
		background-color: #33899c !important;
	}
	ul.dates .date strong, ul.dates .date b{
		color: white !important;
	}
	ul.dates li {
	    padding: 1.3em 0 3em 6.75em !important;
	}
	img.right {
		width: 50px;
	    float: right;
	}
	.image.featured {
		display: inline-block !important;
		width: 43.3% !important;
	}
	.imgPoint {
		/*pointer-events: none;*/
		text-decoration: none;
		color: black;
	}
	.imgPoint img {
		box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19) ;
	}
	.pagination a {
		text-decoration: none;
		color: black;
	}
	.white_bg {
		background-color: white;
		padding: 5px 20px;
	}
	@media screen and (max-width: 736px) {
		h2 {font-size: 1.1em !important;}
	}
	@media screen and (min-width: 736px) {
		.button {width: 200px;}
	}
	.button {
		height: 30px;
	}
</style>
