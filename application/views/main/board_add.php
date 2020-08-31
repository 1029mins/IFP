<style>


    .box{
        border-bottom:none !important;
    }

    .last-tr{
        border-bottom: solid 1px #dddddd;
    }

    .subHead{
        padding: 0 0 12px 0 !important;
    }


</style>
</section>

<!-- Main -->
<section id="main">

    <div class="container">

        <div class="subHead">
                <h2><span>게시글 추가</span></h2>
        </div>

        <div >
            <section class="box">
                <header>
                    <h3 style="color:#444545 !important;">&nbsp; &nbsp;NEW 게시글</h3>
                </header>
                <br>
                
                <section>
                <form class="form-horizontal"name="form1" method="post" action="" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">제목</label>
                    <div class="col-sm-10">
                      <input type="text" style="float:left; width:100%;" id="title" placeholder="글 제목">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kind" class="col-sm-2 control-label">카테고리</label>
                    <div class="col-sm-10">
                      <select class="form-control">
                          <option>질문</option>
                          <option>잡담</option>
                    </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="member" class="col-sm-2 control-label">작성자</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"style="float:left; width:100%;" id="member" value="<?echo $this -> session -> userdata('username');?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="member" class="col-sm-2 control-label">작성일</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"style="float:left; width:100%;" id="date" value="<?echo date("Y-m-d H:i:s"); ?>" disabled>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="contents" class="col-sm-2 control-label">내 용</label>
                    <div class="col-sm-10">
                      <textarea style="float:left; width:100%; resize: none;" id="contents" placeholder="내 용" rows="5"></textarea>
                    </div>
                  </div>

                  <div align="center">
                        <input type="submit" value="등록하기" class="button alt">
                  </div>

                </form>
                </section>
            </section>
        </div>
    </div>
</section>
