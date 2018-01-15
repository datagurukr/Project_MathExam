<? $base_url = 'http://justthink.co.kr/'; ?>
<html>
<head>
<title>다날 휴대폰 결제</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, target-densitydpi=medium-dpi;" />
</head>
<body>
<?php
/*
 * 특정 URL 지정
 */
//$nextURL = "http://www.danal.co.kr";

/*
 * 창 닫기 Script
 * - Javascript:self.close(); 사용시에는 다날 결제창을 팝업으로 띄워주시기 바랍니다.
 */
//$nextURL = "Javascript:self.close();";

/*
 * 웹뷰 닫기 Script
 * - 테스트 앱 소스 참고
 */
	$nextURL = "Javascript:window.TeleditApp.BestClose();";
?>
<?php
$pay_user_id = '';
$pay_user_email = '';
$pay_subject_id = '';
$pay_subject_name = '';
$pay_subject_price = 0;

if (
    isset($_POST['pay_user_id']) &&
    isset($_POST['pay_subject_id']) &&
    isset($_POST['pay_subject_name']) &&
    isset($_POST['pay_subject_price']) &&
    isset($_POST['pay_user_email'])
   ) {
    $pay_user_id = $_POST['pay_user_id'];
    $pay_user_email = $_POST['pay_user_email'];
    $pay_subject_id = $_POST['pay_subject_id'];
    $pay_subject_name = $_POST['pay_subject_name'];
    $pay_subject_price = $_POST['pay_subject_price'];
} else {
    exit();
};    
?>    
<form name="BackURL" action="<?=$nextURL?>" method="post">
    <input type="hidden" name="pay_user_id" value="<?=$pay_user_id?>">
    <input type="hidden" name="pay_user_email" value="<?=$pay_user_email?>">
    <input type="hidden" name="pay_subject_id" value="<?=$pay_subject_id?>">
    <input type="hidden" name="pay_subject_name" value="<?=$pay_subject_name?>">
    <input type="hidden" name="pay_subject_price" value="<?=$pay_subject_price?>">    
</form>
<script Language="Javascript">
	document.BackURL.submit();
</script>
</body>
</html>
