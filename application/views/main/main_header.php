<!DOCTYPE HTML>
<html>
   <head>
      <link href="/assets/site_image/ifp_logo.ico" rel="shortcut icon" type="image/x-icon">
      <title>I.F.P</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

      <!-- login bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <!-- bootstrap
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script> -->


      <link rel="stylesheet" href="/assets/css/main.css" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> <!-- 구글 아이콘 -->
   </head>
   <script src="http://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script> <!-- jquery 버전 추가 -->

   <script>

   <?//회원가입 성공 메시지 ?>
    <? if( !empty($this->session->flashdata('message')) ){
   ?>
      alert('<?=$this->session->flashdata('message')?>');
    <?
      }
   ?>

   /* 사용자 검색 */
   function find_text()
   {
      if (!form1.text1.value)
         form1.action="/project/lists/page";
      else
         form1.action="/project/lists/text1/" + form1.text1.value +"/page";
      form1.submit();
   }
</script>

<style>
    body {
      font-family: 'Varela Round', sans-serif;
   }
   @media screen and (min-width: 768px) {
     .modal:before {
      display: inline-block;
      vertical-align: middle;
      content: " ";
      height: 85%;
     }
   }

   .modal-dialog {
     display: inline-block;
     text-align: left;
     vertical-align: middle;
   }

   .modal-middle{
      width: 100% !important;
      float: center !important;
      margin-bottom: 1rem !important;
   }
   .modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #60c7c1;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
   }
   .modal-login .avatar img {
       width: 100%;
   }
   .modal-content {
       padding: 10px;
   }



</style>

<body class="homepage is-preload">
   <div id="page-wrapper">
      <!-- Header -->
   <section id="header">
   <div style="width:100%; height:50px; text-align:right; padding: 5px 10px 5px ;">

      <!-- login 조건 -->
      <?
         if ( $this -> session -> userdata('logged_in') == TRUE) {
            echo $this -> session -> userdata('username');?> 님 환영합니다.
            <a href="/mypage" class="button small">Mypage</a>
            <a href="/login/logout" class="button small">Logout</a>
      <?
         } else {
      ?>
            <a href="/sign_on" class="button small">회원가입</a>
            <a href="#myModal" class="button small trigger-btn" data-toggle="modal">로그인</a>
      <?
         }
      ?>

      <!-- 메뉴 선택시 색 변경 조건 -->

      <?

          if($menu == 'aboutUs' ){
      ?>
            <script>
               window.onload = function () {
                  $('.aboutUs').toggleClass('current');
               }
            </script>
      <?
         }else if($menu =='project'){
      ?>
            <script>
               window.onload = function () {
                  $('.project').toggleClass('current');
               }
            </script>
      <?
         }else if($menu =='community'){
      ?>
            <script>
               window.onload = function () {
                  $('.community').toggleClass('current');
               }
            </script>
      <?
         }else if($menu =='member'){
      ?>
            <script>
               window.onload = function () {
                  $('.member').toggleClass('current');
               }
            </script>
      <?
         }else if($menu =='notice'){
      ?>
            <script>
               window.onload = function () {
                  $('.notice').toggleClass('current');
               }
            </script>
      <?
      }else if($menu =='none'){

         }
      ?>


   </div>
      <!-- Logo -->
         <h1 style="padding-top:100px;"><a href="/main">IFP</a></h1>

      <!-- Nav -->
         <nav id="nav">
            <ul>
               <li class="aboutUs">
                  <a href="/professor_intro">About us</a>
                     <ul id="ul_id">
                        <li><a class="a_open" href="/professor_intro">교수님 소개</a></li>
                        <li><a class="a_open" href="/history">연혁</a></li>
                        <li><a class="a_open" href="/gallery">갤러리</a></li>
                     </ul>
               </li>
               <li class="project">
                  <a href="/project">Project</a>
               </li>
               <li class="community">
                  <a href="/docs">Community</a>
                     <ul>
                        <li><a class="a_open" href="/docs">자료실</a></li>
                        <li><a class="a_open" href="/board">자유게시판</a></li>
                     </ul>
               </li>
               <li class="member"><a href="/member">Member</a></li>
               <li class="notice"><a href="/notice">공지사항</a></li>
            </ul>
         </nav>

      <!-- Login Modal -->
      <div id="myModal" class="modal fade">
         <div class="modal-dialog modal-login">
            <div class="modal-content">
               <div class="modal-header">
                  <div class="avatar" align="center">
                     <img src="/assets/site_image/login.svg">
                  </div>
                  <h4 class="modal-title">Member Login</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               </div>
               <div class="modal-body">
                  <form action="/login" method="post">
                     <div class="form-group">
                        <input type="text" class="form-control modal-middle" name="id" placeholder="UserID" size="20" maxlength="9" required="required">
                     </div><br>
                     <div class="form-group">
                        <input type="password" class="form-control modal-middle" name="pwd" placeholder="Password" required="required" >
                     </div>
                     <br>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <a href="/sign_on">Sign on</a>
               </div>
            </div>
         </div>
      </div>