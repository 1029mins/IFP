<?if(!$this -> session -> userdata('userno')){ header("Location: /main"); exit();
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
                        <?
        				if ($row->info) {	//이미지 O
        					echo("$row->info");
        				}
        				else {				//이미지X
        					echo("소개글이 없습니다.");
        				}
        			    ?> 
            
                	</header>
                   
                	<p>
                		
                	</p>
                    <br><br>
                 
                </article>
            </div>



            <div class="col-4 col-12-medium">
            <!-- Sidebar -->
            <section class="box">

            <ul class="divided">
            	<li>   
                	<h3>Photo &emsp;
                    <a href="/mypage/view"><button class="button alt" type="button">수정</button></a>
                    </h3>
            	</li>
                <li><br><center>
                    <?
        				if ($row->pic) {	//이미지 O
        					echo("<img src='/images/member/$row->pic' alt='회원사진' width='100%'/>");
        				}
        				else {				//이미지X
        					echo("<img src='/assets/site_image/pic02.jpg' alt='대체이미지' width='100%'/>");
        				}
        			?></center>
                </li>   	
            </ul>

            </section>
            </div>


		</div>
	</div>
</section>
<?
  }
?>
