
<!-- 자료실 --->
<style>
        table{
                
                border-collapse: collapse;
        }
        tbody{
            background-color: #ffffff;
        }
        tr{
				
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
				
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
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
		<div class="row" >
			<div class="col-12">
				<div class="subHead"><h2><span>자료실</span></h2></div>
				<br><br>

<!-- docs -->
<section>
	<div class="row" style ="margin-right: 0px; margin-left: 0px;">
		<table align = "center" style="width:80%; margin:auto;">
					<tr>
						<td class="view_title" colspan="6"><h3><b><?= $row->title; ?></b></h3></td>
					</tr>
					<tr>
						<td class="" style="width:60px">작성자</td><td class="view_id2" style="width:100px"><?=$row->member_name?></td>
						<td style="width:60px">일자</td><td class="regdate2" style="width:100px"><?=$row->regdate?></td>
						<td style="width:60px">조회수</td><td class="view_count2" style="width:100px"><?=$row->viewcount?></td>
					</tr>
					<tr>	

					</tr>
					<tr style="background-color:lightgray;">
						<td class="filename" colspan="1" style="width:50px">첨부파일</td>
						<td class="filename2" colspan="5" align="left" style="width:150px">
							<?
								$fileSize=filesize("./images/docs/".$row->filename);
								if($fileSize < 1024){
									$fileSize='('.number_format($fileSize * 1.024).'B)';
								}else if(($fileSize > 1024) && ($fileSize < 1024000)){
									$fileSize='('.number_format($fileSize * 0.001024).'KB)';
								}else if($fileSize > 1024000){
									$fileSize='('.number_format($fileSize * 0.000001024,2).'MB)';
								}
							?>
							<font color="#000000">
								<a style="color:black;" href="../../../../images/docs/<?=$row->filename?>"  download><?=$row->filename?>
								<?echo($row->filename)?$fileSize:"";?>
								</a>
							</font>
						</td>
					</tr>
					<tr>
					
					<?
        				if ($row->pic) {	//이미지 O
        					echo("<td colspan='6'><br><br><br><center><img src='/images/docs/$row->pic' alt='' /></center></td><br>");
        				}
        				else {				//이미지X
        					echo("<td><br><br><br></td><br>");
        				}
        			?>
					</tr>
					<tr>
						<td class="view_content" colspan="6"><br><br><?=$row->contents ?><br><br><br></td>
					</tr>
				</table>
				</div>
					<div class="view_btn" align="right">
						<button class="view_btn1" onclick="history.back();">목록으로</button>
					</div>
	</div>
</section>
		<!--------------------  docs  ---------------------------->
				</div>
			</div>
		</div>
	</section>