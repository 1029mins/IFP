
<!-- 자료실 --->
<style>
        table{
                border-top: 1px solid #444444;
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
		<div class="row">
			<div class="col-12">
				<div class="subHead"><h2><span>자료실</span></h2></div>
				<br>
<script>
    //검색
	function find_text()
	{
		if (!form1.text1.value)
			form1.action="/docs/lists/page";
		else
			form1.action="/docs/lists/text1/" + form1.text1.value +"/page";
		form1.submit();
	}

</script>
				<div class="row" align="right">
				<!-- 검색 -->
				<form method="post" name="form1" action='docs.php' width="40%">					
					<div>
					<input type="text" size="100" name="text1" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) {find_text();}" placeholder="제목검색" aria-label="Search" aria-describedby="basic-addon2">
						<div>
						<button class="btn btn-primary" type="button" onClick="find_text();">
						<i class="fas fa-search fa-sm"></i>
						</button>
						</div>
						</div>
				</form>
				</div>
               <br>
		<!---- docs ----->
<section>
	<div class="row">
		<table align = "center">
			<thead align = "center">
				<tr>
					<td width = "100" align = "center">번호</td>
					<td width = "450" align = "center">제목</td>
					<td width = "300" align = "center">작성자</td>
					<td width = "150" align = "center">날짜</td>
					<td width = "100" align = "center">조회수</td>
				</tr>
			</thead>
			<tbody>
			<div class="col-12">
				<!---<section class="box">--->
					<div class="row">
						<?
							foreach ($list as $row)
							{
								$no=$row->no;
						?>
						<tr>
							<td width = "50" align = "center"><?=$row->no; ?></td>
							<td width = "500" align = "center"><a href ="/docs/view/no/<?=$no;?>"><?=$row->title; ?></td>
							<td width = "100" align = "center"><?=$row->member_name; ?></td>
							<td width = "200" align = "center"><?=$row->regdate; ?></td>
							<td width = "70" align = "center"><?=$row->viewcount; ?></td>
						</tr>
						<?
							}
						?>
					</div>
				<!---</section>--->
			</div>
			</tbody>
        </table>
	<div class="pagination" style="justify-content: center;" align="center"><?=$pagination;?></div>
 </div>
</section>
<!--------------------  docs  ---------------------------->
			</div>
		</div>
	</div>
</section>
