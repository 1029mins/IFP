<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Member</h1>
  <!--검색-->
  <form name="form1" method="post" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" name="text1" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) {find_text();}" class="form-control bg-white border-1 small" placeholder="이름검색" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button" onClick="find_text();">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>

  <?
      $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
  ?>

  <!--추가-->
  <a href="/admin_member/add<?=$tmp ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> 추가</a>
</div>

<script>
    //사용자 검색
	function find_text()
	{
		if (!form1.text1.value)
			form1.action="/admin_member/lists/page";
		else
			form1.action="/admin_member/lists/text1/" + form1.text1.value +"/page";
		form1.submit();
	}

</script>


<div class="table-responsive-lg">
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr style="text-align:center;">
        <th scope="col">이름</th>
        <th scope="col">학번</th>
        <th scope="col">신청일</th>
        <th scope="col">사진</th>
        <th scope="col">랭크</th>
      </tr>
    </thead>
    <tbody>
        <?
            foreach ($list as $row)
            {
                $no=$row->no;
                $rank=$row->rank;
                $act_rank=$row->act_rank;
                switch ($rank) {
                    case 0:$rank="회원"; break;
                    case 1:$rank="운영진"; break;
                    case 2:$rank="관리자"; break;
                    case 3:$rank="교수님"; break;
                    case 4:$rank="회원대기"; break;
                }
                switch ($act_rank) {
                    case 0:$act_rank="졸업자"; break;
                    case 1:$act_rank="활동부원"; break;
                    case 2:$act_rank="활동임원"; break;
                }


                $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
        ?>

        <tr style="text-align:center; background:white;">
            <!--<th scope="row"></th>-->
            <td><a href="/admin_member/view/no/<?=$no;?><?=$tmp ?>"><?=$row->name; ?></a></td>
            <td><?=$row->id; ?></td>
            <td><?=$row->regdate; ?></td>
            <td><?=$row->pic; ?></td>
            <td>
                <?if ($rank == "회원대기"){
                    echo("<font color='#c95236'>$rank</font>");
                 } else {
                     echo("$rank");
                 } ?>
                 ( <span style="font-size: 0.7em;"><?=$act_rank; ?></span> )

            </td>
        </tr>
        <?
            }
        ?>

    </tbody>
  </table>
<div class="pagination " style="justify-content: center;">
  <?=$pagination;?>
</div>
</div>
