

</section>



<section id="main">
	<div class="container">

		<div class="subHead">
			<h2><span>회원 소개</span></h2>
		</div>

		<div class="row">
			<div class="col-5 col-12-medium">

					<section>
						<br><br>
							<ul class="dates" style="padding-left:40px;">
								<li style="padding-bottom:30px !important;">
									<span class="date year"><strong><?echo date("Y");?>년도</strong></span>
								</li>
							</ul>

						<section align="center">
							<? 	foreach ($listExecutive as $rowExe)
								{
									if($rowExe->pic) $picPath = '/images/member/' . $rowExe->pic;  // 이미지가 있는 경우
									else  $picPath = '/assets/site_image/pic05.jpg'; // 이미지가 없는 경우
									$rank = $rowExe->position_rank;
									?>
								
								<a href="#" class="image featured imgPoint">
									<div align="center" style="padding-bottom:10px;">
									
									<img class="mobile" style="width:180px; height:240px;align:center;" src="<?=$picPath;?>" alt="" />
								</div>
								
								<b><?=substr($rank,4);?> &nbsp;  <?=$rowExe->name;?></b>
							</a>
							<?	}
							?>
						</section>

					</section>

			</div>
			<div class="right col-7 col-12-medium">
				<br>
					<ul class="actions" align="right">
						
						<li style="width:90px !important;">
							<form name="form3" method="post">
								<select class="form-control" onchange="form3.submit()" value="<?=$regdate_year;?>" name="regdate_year" style="width:100% !important">
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
							<?
								header("Pragma: no-cache");
								header("Cache-Control: no-cache,must-revalidate");
								?>
						</form>
					</li>
				</ul>
				
				<div class="white_bg">
					<br>
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

						<div class="pagination" style="justify-content: center; display: table; margin: 0 auto;">
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
		width: 45.4% !important;
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
		padding: 10px 20px;
	}
	
	.button_small {
		height: 40px !important;
		font-size: 1.2em !important;
	}
	/* div.yaer{
		padding-right:5em;
	} */
	
	@media screen and (max-width: 736px) {
		h2 {font-size: 1.1em !important;}
		.button_small {width: 300px !important;}
		h2.mobile{text-align:center !important;}
	}

	#history{
		height: 33px !important;
		width: 90px !important;
	}
	#regdate_year{
		padding-top:10px;
	}

	div.right{
		padding-left: 200px;
	}

	ul.dates .date.year{
		background-color:#00263d !important;
		padding-top:13px;
		font-size:15px;
	}
	ul.dates .date.year:after{
		border-left:solid 1.25em #00263d !important;
	}
</style>
           