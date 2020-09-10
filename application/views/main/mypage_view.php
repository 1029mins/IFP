<?if(!$this -> session -> userdata('userno')){ header("Location: /main"); exit();
  }else{ 
?>
</section>

<!-- Main -->
<section id="main">
	<div class="container">
		<div class="row">

        <form name="form1" method="post" enctype="multipart/form-data" action="/mypage/edit">
            <div class="col-2 col-12-medium imp-medium">
                <!-- Content -->              
                <article class="box post custom">
                    <header>   
                        <h3>   
                        <?
                            echo $this -> session -> userdata('username');
                        ?> - EDIT
                        </h3>
                    </header>                      
                    <hr>
                    <div class="form-inline">
                        <div class="col-lg-5">
                            본인 소개글
                        </div>
                        <div class="col-lg-7">
                          <textarea type="text" name="info"  maxlength="500" value="<?=$row->info ;?>" class="form-control form-control-sm" ><?=$row->info ;?></textarea>
	                    </div>
                    </div>
                    <hr>               	
                    <div class="form-inline">
                        <div class="col-lg-5">
                            사진 (영어파일명)
                        </div>
                        <div class="col-lg-7">
                            <input type="file" name="pic" value="<?=$row->pic ;?>" class="form-control form-control-sm" >                   
                        </div>
                    </div>
                    <hr>
                    <br>
                    <p style="text-align: center;">
                       <button class="button alt" type="submit">저장</button>
                	</p>
                    <br>
                </article>
            </div>
        </form>

		</div>
	</div>
</section>
<?
  }
?>
