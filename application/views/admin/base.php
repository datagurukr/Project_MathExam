<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--      반응형 제거-->
        <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
        <!-- 위 3개의 메타 태그는 *반드시* head 태그의 처음에 와야합니다; 어떤 다른 콘텐츠들은 반드시 이 태그들 *다음에* 와야 합니다 -->
        <title>파라카 관리자</title>
			
        <!-- 부트스트랩 -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet">
        <link href="/assets/css/non-responsive.css" rel="stylesheet">
        <link href="/assets/css/dashboard.css" rel="stylesheet">
        <!-- IE8 에서 HTML5 요소와 미디어 쿼리를 위한 HTML5 shim 와 Respond.js -->
        <!-- WARNING: Respond.js 는 당신이 file:// 을 통해 페이지를 볼 때는 동작하지 않습니다. -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->  
		</head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="dashboard.html">파라카 관리자</a>
            </div>
            <div class="navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="">###님 안녕하세요.</a></li>
                <li><a href="">로그아웃</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container-fluid">
          <div class="row" style="min-width:1170px">
            <div class="col-xs-2 sidebar">
              <ul class="nav nav-sidebar">
                <li>
                    <span>
                        유저
                    </span>                
                </li>
                <li><a href="/admin/individual">개인회원</a></li>
                <li><a href="/admin/dealer">딜러회원</a></li>
                <li><a href="/admin/join">가입승인</a></li>
                <li>
                    <span>
                        차량관리
                    </span>                
                </li>
                <li><a href="/admin/sales">판매승인</a></li>
                <li><a href="/admin/salesapproval">판매중인 차량</a></li>
                <li><a href="/admin/auctioncomplete">경매완료 차량</a></li>
                <li><a href="/admin/auctionfailure">경매실패 차량</a></li>                  
                <li><a href="/admin/salescomplete">판매완료 차량</a></li>                  
                <li>
                    <span>
                        기타
                    </span>                
                </li>
                <li><a href="/admin/notice">공지사항</a></li>
              </ul>
            </div>
            <!--col-md-10 col-md-offset-2-->
              
              <?
                echo $container;
              ?>
              
          </div>
        </div>
        <!-- jQuery (부트스트랩의 자바스크립트 플러그인을 위해 필요합니다) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- 모든 컴파일된 플러그인을 포함합니다 (아래), 원하지 않는다면 필요한 각각의 파일을 포함하세요 -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>