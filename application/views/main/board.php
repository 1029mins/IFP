
<!-- 게시판 --->
<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
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
		<div class="row">
			<div class="col-12">
				<div class="subHead"><h2><span>자유게시판</span></h2></div>	
				<br>
		<div class = "col-3" align="right">
        <?if ( $this -> session -> userdata('logged_in') == TRUE){?>
        <button><font style="cursor:hand" onClick="location.href='./write.php'">글쓰기</font></button>
        <?}?>
        </div><br>
<!-- board -->
<section>
	<div class="row">
		<table align = "center">
			<thead align = "center">
				<tr>
					<td width = "50" align = "center">번호</td>
					<td width = "500" align = "center">제목</td>
					<td width = "100" align = "center">작성자</td>
					<td width = "200" align = "center">날짜</td>
					<td width = "70" align = "center">조회수</td>

				</tr>
			</thead>
			<tbody>
			<div class="col-12">
				<!---<section class="box">--->
					<div class="row">
                         <tr>
                            <td colspan="12" align = "center"><a href="#notice" data-toggle="modal"><font style="font-weight: bold">공지사항</font></a></td>
                        </tr>
						<?
							foreach ($list as $row)
							{
								$no=$row->no;
						?>

						<tr>
							<td width = "50" align = "center"><? echo $rows['no'] ?></td>
							<td width = "500" align = "center"><a href = "board.php?no=<? echo $rows['no']?>"><? echo $rows['title']?></td>
							<td width = "100" align = "center"><? echo $rows['member_no']?></td>
							<td width = "200" align = "center"><? echo $rows['date']?></td>
							<td width = "70" align = "center"><? echo $rows['hit']?></td>
						</tr>
						<?
							}
						?>
					</div>
				<!---</section>--->
			</div>
			</tbody>
        </table>
	<div class="pagination" style="justify-content: center;"><?=$pagination;?></div>
 </div>
</section>
<!--------------------  board  ---------------------------->
			</div>
		</div>
	</div>
</section>


<!--공지 사항 -->
<div class="modal fade" id="notice" tabindex="-1" role="dialog" align="center" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">공지사항</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        IFP 회원 전용 자유 게시판 입니다.<br>
        자유롭게 이용이 가능하며 다음 수칙을 준수해 주세요.<br><br>

        1. 욕설 및 비방 금지 <br>
        2. 개인정보 업로드 금지<br>
        3. 자유로운 질문 가능<br>

        <br><font color="red">부적절한 게시글로 인한 불이익은 책임지지 않습니다.</font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
      </div>
    </div>
  </div>
</div>