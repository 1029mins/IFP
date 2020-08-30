

</section>

<?
	$no=$row->no;
	$tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
?>
<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">

			<div class="col-4 col-12-medium">
            <!-- Sidebar -->
            <section class="box">

				<ul class="divided">
				<li><h3>&nbsp;작성자&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></li>
				<li><?=$row->member_name?></li>
            	</ul>

                <ul class="divided">
				<li><h3>&nbsp;구성원&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3></li>
				<li><?=$row->names?></li>
            	</ul>

            </section>
            </div>

            <div class="col-8 col-12-medium imp-medium">
                <!-- Content -->
                <article class="box post">

                	<header>
						<?=$row->kind_name?><br><br>
                		<h2><?=$row->title?></h2>
                		<p><?=$row->date?></p>
                	</header>
					<hr>
					<p><b>OS  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->contents_os?></p>
					<p><b>DBMS  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->contents_db?></p>
					<p><b>TOOL  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->contents_tool?></p>
					<p><b>목 적  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->contents_goal?></p>
                	<p><b>내 용  </b>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->contents?></p>
					<hr>
                    <br><br>

					<p style="text-align: center;">
						<!--<img src="/assets/history_image/changup_2019.jpg" style="width:80%; "alt="ifp_logo"/>-->
					
					<?
						if ($row->pic) {	//이미지 O
							echo("<img src='/images/project/$row->pic'style='width:100%;' alt=''  />");
						}
						else {				//이미지X
							echo("<a href='#' class='image featured'><img src='/assets/site_image/pic02.jpg' alt='대체이미지' /></a>");
						}
					?>
					</p>
					<p style="text-align: left;">URL : <a href="<?=$row->url?>"><?=$row->url?></a></p>
                </article>

				<div style="text-align:right;">
				<? 	if ( $this -> session -> userdata('logged_in') == TRUE) {
						if($this -> session -> userdata('userno')==$row->member_no)
						{
					?>
						<a href="/project/edit/no/<?=$no?>"><button class="button alt" type="button">수정</button></a>
						<a href="/project/delete/no/<?=$no?>" onclick="return confirm('삭제할까요?');"><button class="button alt" type="button">삭제</button></a>
					<?	}
					}
				?>
				</div>
			
            </div>

		</div>
	</div>
</section>
