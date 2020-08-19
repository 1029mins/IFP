
</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">
			<div class="col-2 imp-medium"></div>
            <div class="col-8 col-12-medium imp-medium">
                <!-- Content -->
                <article class="box post">

                    <br>
                	<header>
                		<h2><?=$row->title;?></h2>
                		<p style="font-style:normal;">&nbsp;<?=$row->member_name;?> | <?=$row->regdate;?></p><hr>
                	</header>
                	<p>
                		<?=$row->contents;?>
                	</p>
                    <br><br>
                    <?
        				if ($row->picname) {	//이미지 O
        					echo("<center><div class='image featured'><img src='/images/project/$row->picname' alt='' style='width:80%;'/></div></center>");
        				}
        				else {				//이미지X
        					echo("<div class='image featured'><img src='/assets/site_image/pic01.jpg' alt='대체이미지' /></div>");
        				}
        			?>
                </article>
            </div>
			<div class="col-2  imp-medium"></div>


		</div>
	</div>
</section>
