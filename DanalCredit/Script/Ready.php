<?php
	header("Pragma: No-Cache");
	include("./inc/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="./css/style.css" type="text/css" rel="stylesheet"  media="all" />
<title>*** 다날 신용카드 결제 ***</title>
</head>
<body>
<?php
    
    $pay_user_id = '';
    $pay_user_email = '';
    $pay_subject_id = '';
    $pay_subject_name = '';
    $pay_subject_price = 0;
    $pay_useragent = 'WM';

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
        $pay_subject_name = '111';
        $pay_subject_price = $_POST['pay_subject_price'];
        
        $pay_orderid = '1'.substr($pay_subject_id,0,5).'0000';
        $TEST_AMOUNT = $pay_subject_price;
    } else {
        exit();
    };
    
    
	/*[ 필수 데이터 ]***************************************/
	$REQ_DATA = array();

	/******************************************************
	 *  RETURNURL 	: CPCGI페이지의 Full URL을 넣어주세요
	 *  CANCELURL 	: BackURL페이지의 Full URL을 넣어주세요
	 ******************************************************/
	$RETURNURL = "http://justthink.co.kr/DanalCredit/Script/CPCGI.php"; 
	$CANCELURL = "http://justthink.co.kr/DanalCredit/Script/Cancel.php";
	
	/**************************************************
	 *Sub CP 정보
	**************************************************/
	$REQ_DATA["SUBCPID"] = "";
	
	/**************************************************
	 * 결제 정보
	**************************************************/
	$REQ_DATA["AMOUNT"] = $TEST_AMOUNT;
	$REQ_DATA["CURRENCY"] = "410";
	$REQ_DATA["ITEMNAME"] = $pay_subject_name;
	$REQ_DATA["USERAGENT"] = $pay_useragent;
	$REQ_DATA["ORDERID"] = $pay_orderid;
	$REQ_DATA["OFFERPERIOD"] = "";
	
	/**************************************************
	 * 고객 정보
	**************************************************/
	$REQ_DATA["USERNAME"] =$pay_user_id; // 구매자 이름
	$REQ_DATA["USERID"] =$pay_user_id; // 사용자 ID
	$REQ_DATA["USEREMAIL"] =$pay_user_email; // 소보법 email수신처
	
	/**************************************************
	 * URL 정보
	**************************************************/
	$REQ_DATA["CANCELURL"] = $CANCELURL;
	$REQ_DATA["RETURNURL"] = $RETURNURL;
	
	/**************************************************
	 * 기본 정보
	**************************************************/
	$REQ_DATA["TXTYPE"] = "AUTH";
	$REQ_DATA["SERVICETYPE"] = "DANALCARD";
	$REQ_DATA["ISNOTI"] = "N";
	$REQ_DATA["BYPASSVALUE"] = "this=is;a=test;bypass=value"; // BILL응답 또는 Noti에서 돌려받을 값. '&'를 사용할 경우 값이 잘리게되므로 유의.
	
	$RES_DATA = CallCredit($REQ_DATA, false);
	//$RES_DATA = CallCreditExec($REQ_DATA, false); //curl_init() 함수 이용이 불가능할때, curl 바이너리를 호출(curl 설치 필요)
	
	if ( $RES_DATA['RETURNCODE'] == "0000" ) {
?>
<form name="form" ACTION="<?= $RES_DATA["STARTURL"] ?>" METHOD="POST" >
<input TYPE="HIDDEN" NAME="STARTPARAMS"  	VALUE="<?= $RES_DATA["STARTPARAMS"] ?>">
</form>
<script>
	document.form.submit();
</script>
<?php
	} else {
		$RETURNCODE = $RES_DATA['RETURNCODE'];
		$RETURNMSG = $RES_DATA['RETURNMSG'];
		$BackURL = "Javascript:self.close()";

		include("Error.php");
	}
?>
</form>
</body>
</html>

