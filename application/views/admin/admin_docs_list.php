<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Docs</h1>
  <!--검색-->
  <form name="form1" method="post" class="d-none my-d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" name="text1" value="<?=$text1; ?>" onKeydown="if (event.keyCode == 13) {find_text();}" class="form-control bg-white border-1 small" placeholder="제목검색" aria-label="Search" aria-describedby="basic-addon2">
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
  <a href="/admin_docs/add<?=$tmp ?>" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
      <i class="fas fa-download fa-sm text-white-50"></i> 추가</a>
</div>

<script>
    //사용자 검색
	function find_text()
	{
		if (!form1.text1.value)
			form1.action="/admin_docs/lists/page";
		else
			form1.action="/admin_docs/lists/text1/" + form1.text1.value +"/page";
		form1.submit();
	}

</script>


<div class="table-responsive-lg">
  <table class="table table-bordered">
    <thead class="table-primary">
      <tr style="text-align:center;">
        <th scope="col">제목</th>
        <th scope="col">내용요약</th>
        <th scope="col">작성일</th>
        <th scope="col">작성자</th>
        <th scope="col">공개여부</th>
      </tr>
    </thead>
    <tbody>
        <?
            foreach ($list as $row)
            {
                $no=$row->no;
                $onoff=$row->onoff;
                switch ($onoff) {
                    case 0:$onoff="공개"; break;
                    case 1:$onoff="비공개"; break;
                }

                $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";
        ?>

        <tr style="text-align:center; background:white;">
            <!--<th scope="row"></th>-->
            <td><a href="/admin_docs/view/no/<?=$no;?><?=$tmp ?>"><?=iconv_substr($row->title,0,15,"utf-8"); ?></a></td>
            <td><?=iconv_substr($row->contents,0,15,"utf-8"); ?> ...</td>
            <td><?=$row->regdate; ?></td>
            <td><?=$row->member_name; ?></td>
            <td><?=$onoff; ?></td>
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
