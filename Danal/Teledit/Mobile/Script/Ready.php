<?php
$base_url = 'http://justthink.co.kr/';
	header( "Pragma: No-Cache" );
	header( "Pragma: No-Cache" );
	include( "./inc/function.php" );

	/********************************************************************************
	 *
	 * �ٳ� �޴��� ����
	 *
	 * - ���� ��û ������
	 *      CP���� �� ���� ���� ����
	 *
	 * ���� �ý��� ������ ���� ���ǻ����� �����ø� ���񽺰��������� ���� �ֽʽÿ�.
	 * DANAL Commerce Division Technique supporting Team
	 * EMail : tech@danal.co.kr
	 *
	 ********************************************************************************/
?>
<html>
<head>
<title>�ٳ� �޴��� ����</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
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
        //$AMOUNT = $pay_subject_price;
        $AMOUNT = 1004;
    } else {
        exit();
    };
    

    
	/********************************************************************************
	 *
	 * [ ���� ��û ������ ] *********************************************************
	 *
	 ********************************************************************************/

	/***[ �ʼ� ������ ]************************************/
	$TransR = array();

	/******************************************************
	 ** �Ʒ��� �����ʹ� �������Դϴ�.( �������� ������ )
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
	 *  ID          : �ٳ����� ������ �帰 ID( function ���� ���� )
	 *  PWD         : �ٳ����� ������ �帰 PWD( function ���� ���� )
	 *  CPNAME      : CP ��
	 ******************************************************/
	$TransR["ID"] = $ID;
	$TransR["PWD"] = $PWD;
	$CPName = "JustThink";

	/******************************************************
	 * ItemAmt      : ���� �ݾ�( function ���� ���� )
	 *      - ���� ��ǰ�ݾ� ó���ÿ��� Session �Ǵ� DB�� �̿��Ͽ� ó���� �ֽʽÿ�.
	 *      - �ݾ� ó�� �� �ݾ׺����� ������ �ֽ��ϴ�.
	 * ItemName     : ��ǰ��
	 * ItemCode     : �ٳ����� ������ �帰 ItemCode
	 ******************************************************/
	$ItemAmt = $AMOUNT;
    $mt_rand = mt_rand();
	$ItemName = $pay_subject_name; //"�޴�������";
	$ItemCode = $mt_rand; //"1270000000";
	$ItemInfo = MakeItemInfo( $ItemAmt,$ItemCode,$ItemName );

	$TransR["ItemInfo"] = $ItemInfo;

	/***[ ���� ���� ]**************************************/
	/******************************************************
	 * SUBCP		: �ٳ����� �����ص帰 SUBCP ID
	 * USERID		: ����� ID
	 * ORDERID		: CP �ֹ���ȣ
	 * IsPreOtbill		: AuthKey ���� ����(Y/N) (�����, ���ڵ������� ���� AuthKey ������ �ʿ��� ��� : Y)
	 * IsSubscript		: �� ���� ���� ����(Y/N) (�� ���� ������ ���� ù ������ ��� : Y)
	 ******************************************************/
	$TransR["SUBCP"] = "";
	$TransR["USERID"] = "USERID";
	$TransR["ORDERID"] = $mt_rand;//"ORDERID";
	$TransR["IsPreOtbill"] = "N";
	$TransR["IsSubscript"] = "N";

	/********************************************************************************
	 *
	 * [ CPCGI�� HTTP POST�� ���޵Ǵ� ������ ] **************************************
	 *
	 ********************************************************************************/

	/***[ �ʼ� ������ ]************************************/
	$ByPassValue = array();
	
	/******************************************************
	 * BgColor      : ���� ������ Background Color ����
	 * TargetURL    : ���� ���� ��û �� CP�� CPCGI FULL URL
	 * BackURL      : ���� �߻� �� ��� �� �̵� �� �������� FULL URL
	 * IsUseCI      : CP�� CI ��� ����( Y or N )
	 * CIURL        : CP�� CI FULL URL
	 ******************************************************/
	$ByPassValue["BgColor"] = "00";
	$ByPassValue["TargetURL"] = $base_url."/Danal/Teledit/Mobile/Script/CPCGI.php";
	$ByPassValue["BackURL"] = $base_url."/Danal/Teledit/Mobile/Script/BackURL.php";
	$ByPassValue["IsUseCI"] = "N";
	$ByPassValue["CIURL"] = $base_url."/Danal/Teledit/Mobile/Script/images/logo.png";

	/***[ ���� ���� ]**************************************/

	/******************************************************
	 * Email	: ����� E-mail �ּ� - ���� ȭ�鿡 ǥ�� 
	 * IsCharSet	: CP�� Webserver Character set
	 ******************************************************/
	$ByPassValue["Email"] = $pay_user_email; //"user@cp.co.kr";
	$ByPassValue["IsCharSet"] = "utf8";

	/******************************************************
	 ** CPCGI�� POST DATA�� ���� �˴ϴ�.
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
		 * ���� ���п� ���� �۾�
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
