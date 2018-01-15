<?php
$base_url = 'http://justthink.co.kr/';
	header( "Pragma: No-Cache" );
	header( "Pragma: No-Cache" );
	include( "./inc/function.php" );

	/********************************************************************************
	 *
	 * 다날 휴대폰 결제
	 *
	 * - 결제 요청 페이지
	 *      CP인증 및 결제 정보 전달
	 *
	 * 결제 시스템 연동에 대한 문의사항이 있으시면 서비스개발팀으로 연락 주십시오.
	 * DANAL Commerce Division Technique supporting Team
	 * EMail : tech@danal.co.kr
	 *
	 ********************************************************************************/
?>
<html>
<head>
<title>다날 휴대폰 결제</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, target-densitydpi=medium-dpi;" />
</head>
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
        $pay_subject_name = '111';
        $pay_subject_price = $_POST['pay_subject_price'];
        $AMOUNT = $pay_subject_price;
        //$AMOUNT = 1004;
    } else {
        exit();
    };



	/********************************************************************************
	 *
	 * [ 전문 요청 데이터 ] *********************************************************
	 *
	 ********************************************************************************/

	/***[ 필수 데이터 ]************************************/
	$TransR = array();

	/******************************************************
	 ** 아래의 데이터는 고정값입니다.( 변경하지 마세요 )
	 * Command      : ITEMSEND2
	 * SERVICE      : TELEDIT
	 * ItemCount    : 1
	 * OUTPUTOPTION : DEFAULT 
	 ******************************************************/
	$TransR["Command"] = "ITEMSEND2";
	$TransR["SERVICE"] = "TELEDIT";
	$TransR["ItemCount"] = "1";
	$TransR["OUTPUTOPTION"] = "DEFAULT";

	/******************************************************
	 *  ID          : 다날에서 제공해 드린 ID( function 파일 참조 )
	 *  PWD         : 다날에서 제공해 드린 PWD( function 파일 참조 )
	 *  CPNAME      : CP 명
	 ******************************************************/
	$TransR["ID"] = $ID;
	$TransR["PWD"] = $PWD;
	$CPName = "JustThink";

	/******************************************************
	 * ItemAmt      : 결제 금액( function 파일 참조 )
	 *      - 실제 상품금액 처리시에는 Session 또는 DB를 이용하여 처리해 주십시오.
	 *      - 금액 처리 시 금액변조의 위험이 있습니다.
	 * ItemName     : 상품명
	 * ItemCode     : 다날에서 제공해 드린 ItemCode
	 ******************************************************/
	$ItemAmt = $AMOUNT;
    $mt_rand = mt_rand();
	$ItemName = $pay_subject_name; //"占쌨댐옙占쏙옙占쏙옙占쏙옙";
	$ItemCode = '1'.substr($pay_subject_id,0,5).'0000'; //$mt_rand; //"1270000000";
	$ItemInfo = MakeItemInfo( $ItemAmt,$ItemCode,$ItemName );

	$TransR["ItemInfo"] = $ItemInfo;

	/***[ 선택 사항 ]**************************************/
	/******************************************************
	 * SUBCP		: 다날에서 제공해드린 SUBCP ID
	 * USERID		: 사용자 ID
	 * ORDERID		: CP 주문번호
	 * IsPreOtbill		: AuthKey 수신 유무(Y/N) (재승인, 월자동결제를 위한 AuthKey 수신이 필요한 경우 : Y)
	 * IsSubscript		: 월 정액 가입 유무(Y/N) (월 정액 가입을 위한 첫 결제인 경우 : Y)
	 ******************************************************/
	$TransR["SUBCP"] = "";
	$TransR["USERID"] = "USERID";
	$TransR["ORDERID"] = $mt_rand;//"ORDERID";
	$TransR["IsPreOtbill"] = "N";
	$TransR["IsSubscript"] = "N";

	/********************************************************************************
	 *
	 * [ CPCGI에 HTTP POST로 전달되는 데이터 ] **************************************
	 *
	 ********************************************************************************/

	/***[ 필수 데이터 ]************************************/
	$ByPassValue = array();

	/******************************************************
	 * BgColor      : 결제 페이지 Background Color 설정
	 * TargetURL    : 최종 결제 요청 할 CP의 CPCGI FULL URL
	 * BackURL      : 에러 발생 및 취소 시 이동 할 페이지의 FULL URL
	 * IsUseCI      : CP의 CI 사용 여부( Y or N )
	 * CIURL        : CP의 CI FULL URL
	 ******************************************************/
	$ByPassValue["BgColor"] = "00";
	$ByPassValue["TargetURL"] = $base_url."/Danal/Teledit/Mobile/Script/CPCGI.php";
	$ByPassValue["BackURL"] = $base_url."/Danal/Teledit/Mobile/Script/BackURL.php";
	$ByPassValue["IsUseCI"] = "N";
	$ByPassValue["CIURL"] = $base_url."/Danal/Teledit/Mobile/Script/images/logo.png";

	/***[ 선택 사항 ]**************************************/

	/******************************************************
	 * Email	: 사용자 E-mail 주소 - 결제 화면에 표기 
	 * IsCharSet	: CP의 Webserver Character set
	 ******************************************************/
	$ByPassValue["Email"] = $pay_user_email; //"user@cp.co.kr";
	$ByPassValue["IsCharSet"] = "utf-8";

	/******************************************************
	 ** CPCGI에 POST DATA로 전달 됩니다.
	 **
	 ******************************************************/
	$ByPassValue["ByBuffer"] = "This value bypass to CPCGI Page";
	$ByPassValue["ByAnyName"] = "AnyValue";

	$Res = CallTeledit( $TransR,false );

	if( $Res["Result"] == "0" ) {
?>
<body>
<form name="Ready" action="https://ui.teledit.com/Danal/Teledit/Mobile/Start.php" method="post">
<?php
	MakeFormInput($Res,array("Result","ErrMsg"));
	MakeFormInput($ByPassValue);
?>
<input type="hidden" name="CPName"      value="<?=$CPName?>">
<input type="hidden" name="ItemName"    value="<?=$ItemName?>">
<input type="hidden" name="ItemAmt"     value="<?=$ItemAmt?>">
<input type="hidden" name="IsPreOtbill" value="<?=$TransR['IsPreOtbill']?>">
<input type="hidden" name="IsSubscript" value="<?=$TransR['IsSubscript']?>">
    
<input type="hidden" name="pay_user_id" value="<?=$pay_user_id?>">
<input type="hidden" name="pay_user_email" value="<?=$pay_user_email?>">
<input type="hidden" name="pay_subject_id" value="<?=$pay_subject_id?>">
<input type="hidden" name="pay_subject_name" value="<?=$pay_subject_name?>">
<input type="hidden" name="pay_subject_price" value="<?=$pay_subject_price?>">
    
</form>
<script Language="JavaScript">
	document.Ready.submit();
</script>
</body>
</html>
<?php
	} else {
		/**************************************************************************
		 *
		 * 결제 실패에 대한 작업
		 *
		 **************************************************************************/

		$Result		= $Res["Result"];
		$ErrMsg		= $Res["ErrMsg"];
		$AbleBack	= false;
		$BackURL	= $ByPassValue["BackURL"];
		$IsUseCI	= $ByPassValue["IsUseCI"];
		$CIURL		= $ByPassValue["CIURL"];
		$BgColor	= $ByPassValue["BgColor"];

		include( "./Error.php" );
	}
?>
