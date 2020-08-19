<style>
.box{
		height: 200px !important;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>


<style>
/*임시추가 - sj(2020.05.10 03:16)*/
.image img {
  height: 15px !important;
}
</style>


</section>
<section id="main">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="subHead">
					<h2><span>공지사항</span></h2>
				</div>
				<br><br>
<!-- Notice -->
<section>
	<div class="row">
	<?
		foreach ($list as $row)
		{
			$no=$row->no;

	?>
			<div class="col-6 col-6-medium col-12-small">

				<section class="box">

				<?
					if ($row->pic) {	//이미지 O
						echo("<a href='/notice/view/no/$no' class='image featured'><img src='/images/notice/$row->pic' alt='' /></a>");
					}
					else {				//이미지X
						echo("<a href='/notice/view/no/$no' class='image featured'><img src='/assets/site_image/pic08.jpg' alt='대체이미지' /></a>");
					}
				?>
					<a href="/notice/view/no/<?=$no;?>" style="text-decoration:none;">
					<header>
						<h4>
							<?=iconv_substr($row->title,0,15,"utf-8"); ?>
							<? if (mb_strlen($row->title) > 15){
								echo("...");}
							?>
						</h4>
                        <font color="red">
                            <p>
                            <? if($row->duedate){
                                echo("$row->duedate 까지");
                               }
                            ?>
                            </p>
                        </font>

                        <span style="color:gray;">내용 : <?=iconv_substr($row->contents,0,15,"utf-8"); ?>
						<? if (mb_strlen($row->contents) > 15){
							echo("...");}
						?>
						</span>


					</header>
					</a>
					<!--<footer>
						<ul class="actions">
                            <li><a href="/notice/view/no/<?=$no;?>" class="button icon solid fa-file-alt">More</a></li>
                        </ul>
						</footer>
					-->

				</section>

			</div>
	<?
		}
	?>
    </div>

	<div class="pagination" style="justify-content: center;">
	  <?=$pagination;?>
	</div>

</section>
<!--------------------  Notice  ---------------------------->
			</div>
		</div>
	</div>
</section>
