<?php
$base_url = 'http://justthink.co.kr/';
	header( "Pragma: No-Cache" );
	include( "./inc/function.php" );

	/********************************************************************************
	*
	* �ٳ� �޴��� ����
	*
	* - ���� �Ϸ� ������
	*	���� Ȯ��
	*
	* ���� �ý��� ������ ���� ���ǻ����� �����ø� ���񽺰��������� ���� �ֽʽÿ�.
	* DANAL Commerce Division Technique supporting Team
	* EMail : tech@danal.co.kr
	*
	********************************************************************************/
       
	/*
	 * Get CIURL
	 */
	$URL = GetCIURL( $_POST["IsUseCI"],$_POST["CIURL"] );

	/*
	 * Get BgColor
	 */
	$BgColor = GetBgColor( $_POST["BgColor"] );
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<title>�ٳ� �޴��� ����</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, target-densitydpi=medium-dpi;" />
<link href="./css/style.css" type="text/css" rel="stylesheet"  media="screen" />
<script language="javascript" src="./js/jquery-latest.js" type="text/javascript"></script>
<script language="javascript" src="./js/jquery.mobile-1.2.0.js" type="text/javascript"></script>
<script language="JavaScript" src="./js/Common.js" type="text/javascript"></script>
<script language="javascript">
//<![CDATA[
// Run the script on DOM ready:
$(document).ready(function(){
	OrtChange();
});
//]]>
</script>
</head>
<!-- ���θ���϶� horizontal �߰� -->
<body class="">
	<!-- ������ type01 ~ type10 ������ -->
	<div class="wrap type<?=$BgColor?>">
		<div class="header">
			<p class="tit">���� ����</p>
		</div>
		<div class="content">
			<p class="message">������ ���� ó���Ǿ����ϴ�.</p>
			<p class="btn st02">
				<!--WebView ������ App���� ������ ����(�ڼ��� ������ �Ŵ��� ����)-->
				<!--<a href="Javascript:window.TeleditApp.Result('xxxxx');" class="on">Ȯ��</a>-->
				<a href="#" class="on">Ȯ��</a>
			</p>
			<div class="cs">
				<p class="text">�ٳ� ������ : 1566-3355</p>
				<span class="logo"><img src="<?=$URL?>" width="77" alt="�������ΰ�" /></span>
			</div>
		</div>
	</div>
</body>
</html>
