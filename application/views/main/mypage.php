<?if(!$this -> session -> userdata('username')){ header("Location: /main"); exit();
  }else{ 
?>
</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">


            <div class="col-8 col-12-medium imp-medium">
                <!-- Content -->
                <article class="box post">
                    <header>   
                        <b style="font-size:2.0em; color:#555d6b">MYPAGE</b>
                        <hr>
                        <h3>   
                        <?
                            echo $this -> session -> userdata('username');
                        ?>
                        </h3>                  
                        <hr>
                            <?=$row->info;?>
                        <?/*
                        $fileSize=filesize("./images/notice/".$row->filename);
                        if($fileSize < 1024){
                			$fileSize='('.number_format($fileSize * 1.024).'B)';
                		}else if(($fileSize > 1024) && ($fileSize < 1024000)){
                			$fileSize='('.number_format($fileSize * 0.001024).'KB)';
                		}else if($fileSize > 1024000){
                			$fileSize='('.number_format($fileSize * 0.000001024,2).'MB)';
                		}*/
                        ?>
<!--
                        <font color="#000000">
                            <a style="color:black;" href="../../file/name/<?=$row->filename?>" ><?=$row->filename?>
                            <?/*echo($row->filename)?$fileSize:"";*/?>
                            </a>
                        </font>
                    -->
                	</header>
                   
                	<p>
                		
                	</p>
                    <br><br>
                    <?/*
        				if ($row->pic) {	//이미지 O
        					echo("<center><div class='image featured'><img src='/images/notice/$row->pic' alt='' /></div></center>");
        				}
        				else {				//이미지X
        					echo("<div class='image featured'><img src='/assets/site_image/pic01.jpg' alt='대체이미지' /></div>");
        				}*/
        			?>
                </article>
            </div>



            <div class="col-4 col-12-medium">
            <!-- Sidebar -->
            <section class="box">

            	<header>
            		<h3>Photo&nbsp;&nbsp;&nbsp;&nbsp;</h3>
            	</header>
                <ul class="divided">
            		<li>	</ul>

            </section>
            </div>


		</div>
	</div>
</section>
<?
  }
?>
