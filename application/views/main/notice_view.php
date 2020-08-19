
</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">

			<div class="col-4 col-12-medium">
            <!-- Sidebar -->
            <section class="box">

            	<header>
            		<h3>POST&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->regdate;?></h3>
            	</header>
                <ul class="divided">
            		<li>EDITOR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$row->member_name;?></li>
            	</ul>

            </section>
            </div>

            <div class="col-8 col-12-medium imp-medium">
                <!-- Content -->
                <article class="box post">

                    <br>
                	<header>
                		<h3><?=$row->title;?></h3>
                        <br>
                		<font color="red">
                            <p>
                            <? if($row->duedate){
                                echo("$row->duedate 까지");
                               }
                            ?>
                            </p>
                        </font>
                        <hr>

                        <?
                        $fileSize=filesize("./images/notice/".$row->filename);
                        if($fileSize < 1024){
                			$fileSize='('.number_format($fileSize * 1.024).'B)';
                		}else if(($fileSize > 1024) && ($fileSize < 1024000)){
                			$fileSize='('.number_format($fileSize * 0.001024).'KB)';
                		}else if($fileSize > 1024000){
                			$fileSize='('.number_format($fileSize * 0.000001024,2).'MB)';
                		}
                        ?>

                        <font color="#000000">
                            <a style="color:black;" href="../../file/name/<?=$row->filename?>" ><?=$row->filename?>
                            <?echo($row->filename)?$fileSize:"";?>
                            </a>
                        </font>

                	</header>
                    <hr>
                	<p>
                		<?=$row->contents;?>
                	</p>
                    <br><br>
                    <?
        				if ($row->pic) {	//이미지 O
        					echo("<center><div class='image featured'><img src='/images/notice/$row->pic' alt='' /></div></center>");
        				}
        				else {				//이미지X
        					echo("<div class='image featured'><img src='/assets/site_image/pic01.jpg' alt='대체이미지' /></div>");
        				}
        			?>
                </article>
            </div>


		</div>
	</div>
</section>
