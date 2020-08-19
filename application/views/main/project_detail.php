
</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">

			<div class="col-4 col-12-medium">
            <!-- Sidebar -->
            <section class="box">

            	<header>
            		<h3>작성자&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->member_name?></h3>
            	</header>
                <ul class="divided">
            		<li>&nbsp;&nbsp;&nbsp;&nbsp;구성원&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->names?></li>
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
                	<p>
						<?=$row->contents?>
                	</p>
                    <br><br>

					<p style="text-align: center;">
						<!--<img src="/assets/history_image/changup_2019.jpg" style="width:80%; "alt="ifp_logo"/>-->
					
                    <!--<?
        				if ($row->pic) {	//이미지 O
        					echo("<center><div class='image featured'><img src='/images/project/$row->pic' alt='' /></div></center>");
        				}
        				else {				//이미지X
        					//echo("<div class='image featured'><img src='/assets/site_image/pic01.jpg' alt='대체이미지' /></div>");
        				}
        			?>-->
					</p>
					<p style="text-align: center;"><a href="#"><?=$row->url?></a></p>
                </article>
            </div>


		</div>
	</div>
</section>
