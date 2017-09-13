<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>반응형 문제풀이 웹! - Just Think</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="/assets/css/customizing.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="/assets/js/materialize.js"></script>
        <script src="/assets/js/init.js"></script> 
        <script src="http://cdn.ckeditor.com/4.7.1/full-all/ckeditor.js"></script>

    </head>
    <body>
        <ul id="dropdown1" class="dropdown-content">
          <li>
            <a href="/admin/terms">이용약관</a>
          </li>
          <li>
            <a href="/admin/privacy">개인정보</a>
          </li>
          <li>
            <a href="/admin/returnpolicy">환불정책</a>
          </li>            
        </ul>
        <ul id="dropdown2" class="dropdown-content">
          <li>
            <a href="/admin/category">코스</a>
          </li>
          <li>
            <a href="/admin/subject">서브 코스</a>
          </li>   
          <li>
            <a href="/admin/unit">챕터</a>
          </li>
          <li>
            <a href="/admin/exam">유닛</a>
          </li>
        </ul>
        
        <!-- Modal Structure -->
        <div id="logout" class="modal">
            <div class="modal-content">
                <h4>로그아웃</h4>
                <p>로그아웃 하시겠습니까?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="modal-close waves-effect waves-red btn-flat">취소</button>
                <a href="/logout" class="modal-action modal-close waves-effect waves-green btn-flat ">확인</a>
            </div>
        </div>
        
        <nav class="deep-purple lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="/admin/user" class="brand-logo">Just Think</a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="/admin/user">회원정보</a>
                    </li>
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">약관<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown2">카테고리<i class="material-icons right">arrow_drop_down</i></a>
                    </li>
                    <li>
                        <a href="/admin/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/admin/statistics">통계</a>
                    </li>
                    <li>
                        <a href="/admin/qna">Q&A</a>
                    </li>
                    <li>
                        <a href="#logout" class="modal-trigger">로그아웃</a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a href="/admin/user">회원정보</a>
                    </li>
                    <li>
                        <a href="/admin/terms">이용약관</a>
                    </li>
                    <li>
                        <a href="/admin/privacy">개인정보처리방침</a>
                    </li>
                    <li>
                        <a href="/admin/returnpolicy">환불정책</a>
                    </li>
                    <li>
                        <a href="/admin/category">코스</a>
                    </li>
                    <li>
                        <a href="/admin/subject">서브 코스</a>
                    </li>
                    <li>
                        <a href="/admin/unit">챕터</a>
                    </li>
                    <li>
                        <a href="/admin/exam">유닛</a>
                    </li>
                    <li>
                        <a href="/admin/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/admin/statistics">통계</a>
                    </li>
                    <li>
                        <a href="/admin/qna">Q&A</a>
                    </li>
                    <li>
                        <a href="#logout" class="modal-trigger">로그아웃</a>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div class="container">
            <!-- container -->
            <? echo $container; ?>            
        </div>
        <footer class="page-footer orange center-align">
            <div class="container">
                <div>
                    <a class="orange-text text-lighten-3" href="/terms">이용약관</a> | 
                    <a class="orange-text text-lighten-3" href="/privacy">개인정보 처리방침</a>
                </div>
                경기도 성남시 분당구 판교역로 192번길 14-2 | 
                사업자등록번호: 111-25-21588 | 대표자: 박준현 | 
                통신판매업신고번호: 제2017-용인기흥-00565호 | 
                대표전화: 031-283-3934 | 
                이메일: ohio1029@gmail.com | 
                Copyright 2017. ⓒ Just Think All right reserved.
            </div>
            <div class="footer-copyright">
                <div class="container">
<!--                    Made by <a class="orange-text text-lighten-3">여의도개발소</a>-->
                </div>
            </div>
        </footer>
        <script>
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
        });
        
        $(document).ready(function() {
            $('select').material_select();
        });
        </script>
    </body>
</html>