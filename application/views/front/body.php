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
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                
                <a id="logo-container" href="/" class="brand-logo">Just Think</a>
                <ul class="right hide-on-med-and-down">
                    <?
                    	if ( 0 < $session_id ) {
										?>
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                            마이페이지
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>                    
                        <ul id="dropdown1" class="dropdown-content">
                            <li>
                                <a href="/mypage">프로필</a>
                            </li>
                            <li>
                                <a href="/mypage/password">비밀번호 변경</a>
                            </li>
                        </ul>    
                    </li>
                    <li>
                        <a href="/mypage/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/logout">로그아웃</a>
                    </li>                    
                        <?
                        if ( isset($session['admin']) ) {
                            ?>
                    <li>
                        <a href="/admin">관리자</a>
                    </li>                                        
                            <?
                        };
                    } else {
                        ?>
                    <li>
                        <a href="/login">로그인</a>
                    </li>
                    <li>
                        <a href="/register">회원가입</a>
                    </li>
                        <?                        
                    };
                    ?>
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <?
                    if ( 0 < $session_id ) {
                        ?>
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown2">
                            마이페이지
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>                    
                        <ul id="dropdown2" class="dropdown-content">
                            <li>
                                <a href="/mypage">프로필</a>
                            </li>
                            <li>
                                <a href="/mypage/password">비밀번호 변경</a>
                            </li>
                        </ul>    
                    </li>
                    <li>
                        <a href="/mypage/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/logout">로그아웃</a>
                    </li>                    
                        <?
                        if ( isset($session['admin']) ) {
                            ?>
                    <li>
                        <a href="/admin">관리자</a>
                    </li>                                        
                            <?
                        };
                    } else {
                        ?>
                    <li>
                        <a href="/login">로그인</a>
                    </li>
                    <li>
                        <a href="/register">회원가입</a>
                    </li>
                        <?                        
                    };
                    ?>
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
                사업자등록번호: 111-25-21588 | 상호명: JustThink | 대표자: 박준현 | 
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
    </body>
    <script>
        $(document).ready(function(){
            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
            $('.answer_checkbox').each(function( index, element ) {
                $(element).on('change', function () {
                    var chk = $(this);
                    if ( chk.is(":checked") ) {
                        chk.parents('.question-section').find('.answer_checkbox').prop('checked', false);
                        chk.prop('checked', true);
                        Materialize.toast(chk.attr('data-toast'), 4000);
                    } else {
                    }
                });
            });
            $('.btn-modal').on('click', function () {
                var btn = $(this);
                $('#exam-modal').modal('open');
                $('#exam-modal .modal-content h4').html(btn.attr('title'));
                $('#exam-modal .modal-content p').html(btn.attr('type'));
            });
            $('.btn-fold').on('click', function () {
                var btn = $(this);
                btn.attr('title')
                if ( $('#'+btn.attr('title')).css('display') == 'none' ) { 
                } else {
                };
                $('#'+btn.attr('title')).fadeToggle();             
                $('#exam-modal .modal-content h4').html(btn.attr('title'));
                $('#exam-modal .modal-content p').html(btn.attr('type'));
            });            
        });
        
        $(document).ready(function() {
            $('select').material_select();
        });
        $(document).ready(function(){
        $('.collapsible').collapsible();
        });
        $('.datepicker').pickadate({
            format: 'yyyy-mm-dd',
            formatSubmit: 'yyyy-mm-dd',
            selectMonths: false, // Creates a dropdown to control month
            selectYears: 100, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
        
    </script>    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-101238348-1', 'auto');
      ga('send', 'pageview');
    </script>    
</html>