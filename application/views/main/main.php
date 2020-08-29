<br>
<!-- Banner -->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<section id="banner" style="margin: 0 0 0 0;">
					<header>
						<h2>INFORMATION&nbsp; FOWARD&nbsp; PAGE</h2>
						<p>Induk Univ. &nbsp;Inforsec Club</p>
					</header>
				</section>
			</div>
			<div class="item">
				<img src="/assets/site_image/pic02.jpg" alt="...">
			</div>
			<div class="item">
				<img src="/assets/site_image/pic03.jpg" alt="...">
			</div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<!-- Intro -->
	<section id="intro" class="container">
		<div class="row">
			<div class="col-4 col-12-medium">
				<section class="first">
					<i class="icon solid featured fa-cog"></i>
					<header>
						<h2>Project</h2>
					</header>
					<p>창업대전, 공모전 등 프로젝트 제작 경험</p>
				</section>
			</div>
			<div class="col-4 col-12-medium">
				<section class="middle">
					<i class="icon solid featured alt fa-bolt"></i>
					<header>
						<h2>People</h2>
					</header>
					<p>다양한 분야로 진출한 IFP 회원</p>
				</section>
			</div>
			<div class="col-4 col-12-medium">
				<section class="last">
					<i href="gallery" class="icon solid featured alt2 fa-star"></i>
					<header>
						<h2><a href="gallery">Activity</a></h2>
					</header>
					<p>자체 세미나, 자격증 취득 등<br>
						다양한 활동 진행</p>
				</section>
			</div>
		</div>
		<footer>
			<ul class="actions">
				<li><a href="/sign_on" class="button large">Join us</a></li>
			</ul>
		</footer>
	</section>

</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">
	<?	if($this -> session -> userdata('logged_in') == TRUE){
	?>
			<div class="col-12">
			<!-- Blog -->
			<section>
				<header class="major">
					<h2>공지사항</h2>
					<div class="more" align="right">
						<b>▶</b> <a href="notice">more</a>
				    </div>
				</header>
				<div class="row">
					<!--공지-->
				<?
				foreach ($list_notice as $row)
				{
					$no_notice=$row->no;
				?>
					<div class="col-6 col-6-small">
						<a href="/notice/view/no/<?=$no_notice;?>" style="text-decoration: none;">
						<section class="box">
							<h4> <i class="fas fa-exclamation-circle"></i> <?=$row->title?></h4>
							<p><? if($row->duedate){
								echo("$row->duedate 까지");
							}
							?></p>
						</section>
						</a>
						<div style="background:gray; padding:5px;"> </div>
					</div>
				<?
				}
				?>
				</div>
			</section>
			<br>
			</div>
		<?
		}
		?>

			<div class="col-12">
			<!-- Portfolio -->
			<section>
				<header class="major">
					<h2>프로젝트</h2>

					<div class="more" align="right">
						<b>▶</b> <a href="project">more</a>
				    </div>
				</header>
				<section class="project">
					<div class="row">
						<!--프로젝트-->
			<?
			foreach ($list_project as $row1)
			{
				$no_project=$row1->no;
			?>
						
						<div class="col-4 col-6-medium col-12-small">
							<section class="box" style="padding-bottom:1em !important;">
								<a href="/project/view/no/<?=$no_project;?>" class="image featured">
								<?
									if ($row1->pic) {	//이미지 O
										echo("<img src='/images/project/$row1->pic' style='display:block;height:233px;' alt='' />");
									}
									else {				//이미지X
										echo("<img src='/assets/site_image/pic02.jpg' alt='대체이미지' />");
									}
								?>						
								</a>
								<h4><?=$row1->title;?></h4>
								<ul class="actions" align="right">
								<li><a href="/project/view/no/<?=$no_project;?>" class="button xsmall">Detail</a></li>
								</ul>
							</section>
						</div>
			<?
			}
			?>
					</div>						
				</section>
			</section>
			</div>
	</div>
</div>
</section>
