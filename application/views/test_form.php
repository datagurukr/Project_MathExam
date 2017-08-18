<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
        
    form label { 
        display: block;
    }
        
	</style>
</head>
<body>
    
    <?
    /*
    $google_api_key = 'AAAAr2hAraA:APA91bHgxcrudChuaOEgvEj7GmETl-27-Dn3FD2lFIVl1wr1cFObbi9afHS3WFGDJxfJmfr8XqPr3_nNnJegnZpTBovT1kHWv13v7jAMBsL70DGdbmUp9crKGlndNA_EwKnSkJtY7jxA';                                        
    //$message = "auction, 1000000";
    $message = "파라카 hi";
    $registrationIds = array();

    $sql = "
    select * from user;
    ";

    if ( $sql ) {
        $query = $this->db->query($sql);
        if( 0 < $query->num_rows() ){
            $result = $query->result_array();
            foreach ( $result as $row ) {
                $user_gcm_id = $row['user_gcm_id'];
                if ( strlen($user_gcm_id) ) {
                    array_push($registrationIds,$user_gcm_id);
                };                
            }
        }
    }

    print_r($registrationIds);

    if ( is_array($registrationIds) ) {

        $url = 'https://fcm.googleapis.com/fcm/send';
        $fields = array(
            'registration_ids' => $registrationIds,
            'data' => array("message" =>$message)
        );

        $headers = array(
            'Authorization:key =' . $google_api_key,
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);           
        if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);        
        
        echo $result;

    };
    */
    ?>
    
    
    <div>
        <h1>1. 파일 업로드</h1>
        <form method="post" action="/api/upload" enctype="multipart/form-data">
            <label>
                파일(upload_file)
                <input type="file" name="upload_file" placeholder="user_tel">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>            
        </form>        
    </div>    
    
    <div>
        <h1>2. 개인 회원가입</h1>
        <form method="post" action="/api/auth/register/" enctype="application/x-www-form-urlencoded">
            <label>
                회원유형(user_status)
                <select name="user_status">
                    <option value="1">개인(1)</option>
                </select>
            </label>
            <label>
                전화번호(user_tel)
                <input type="text" name="user_tel" placeholder="user_tel">
            </label>
            <label>
                유심번호(user_usim_number)
                <input type="text" name="user_usim_number" placeholder="user_name">
            </label>

            <label>
                Option:국가코드(user_country)
                <select name="user_country">
                    <option value="KR">한국(KR)</option>
                </select>                
            </label>            
            <label>
                Option:소프트웨어 버전(user_app_ver)
                <input type="text" name="user_app_ver" placeholder="user_app_ver">
            </label>
            <label>
                Option:단말기 종류(user_phone_name)
                <input type="text" name="user_phone_name" placeholder="user_phone_name">
            </label>            
            <label>
                Option:Google GCM(user_gcm_id)
                <input type="text" name="user_gcm_id" placeholder="user_gcm_id">
            </label>
            <label>
                Option:Apple APNS(user_apns_id)
                <input type="text" name="user_apns_id" placeholder="user_apns_id">
            </label>
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>            
        </form>        
    </div>
    
    <div>
        <h1>3. 딜러(슈퍼,알선,매입) 회원가입</h1>
        <form method="post" action="/api/auth/register/" enctype="application/x-www-form-urlencoded">
            <label>
                회원유형(user_status)
                <select name="user_status">
                    <option value="2">슈퍼 딜러(2)</option>                    
                    <option value="3">알선 딜러(3)</option>
                    <option value="4">매입 딜러(4)</option>                    
                </select>
            </label>
            <label>
                전화번호(user_tel)
                <input type="text" name="user_tel" placeholder="user_tel">
            </label>
            <label>
                유심번호(user_usim_number)
                <input type="text" name="user_usim_number" placeholder="user_name">
            </label>            
            <label>
                이름(user_name)
                <input type="text" name="user_name" placeholder="user_name">
            </label>        
            <label>
                소속(user_affiliation)
                <input type="text" name="user_affiliation" placeholder="user_affiliation">
            </label>          
            <label>
                지역(user_location)
                <input type="text" name="user_location" placeholder="user_location">
            </label>                
            <label>
                소개(user_introduction)
                <input type="text" name="user_introduction" placeholder="user_introduction">
            </label>                            
            <label>
                회원 프로필 사진(user_picture)
                <input type="text" name="user_picture" placeholder="user_picture">
            </label>                
            <label>
                딜러증_앞(user_license_front_picture)
                <input type="text" name="user_license_front_picture" placeholder="user_license_front_picture">
            </label>                
            <label>
                딜러증_뒤(user_license_back_picture)
                <input type="text" name="user_license_back_picture" placeholder="user_license_back_picture">
            </label>      
            <label>
                Option:국가코드(user_country)
                <select name="user_country">
                    <option value="KR">한국(KR)</option>
                </select>                
            </label>            
            <label>
                Option:소프트웨어 버전(user_app_ver)
                <input type="text" name="user_app_ver" placeholder="user_app_ver">
            </label>
            <label>
                Option:단말기 종류(user_phone_name)
                <input type="text" name="user_phone_name" placeholder="user_phone_name">
            </label>            
            <label>
                Option:Google GCM(user_gcm_id)
                <input type="text" name="user_gcm_id" placeholder="user_gcm_id">
            </label>
            <label>
                Option:Apple APNS(user_apns_id)
                <input type="text" name="user_apns_id" placeholder="user_apns_id">
            </label>        

            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>4. 개인 or 딜러 회원 로그인</h1>
        <form method="post" action="/api/auth/login">
            <label>
                회원유형(user_status)
                <select name="user_status">
                    <option value="1">개인(1)</option>                    
                    <option value="2">슈퍼 딜러(2)</option>
                    <option value="3">알선 딜러(3)</option>
                    <option value="4">매입 딜러(4)</option>                    
                </select>
            </label>
            <label>
                전화번호(user_tel)
                <input type="text" name="user_tel" placeholder="user_tel">
            </label>  
            <label>
                유심번호(user_usim_number)
                <input type="text" name="user_usim_number" placeholder="user_usim_number">
            </label>            
            <label>
                아이디(user_logindid)
                <input type="text" name="user_loginid" placeholder="user_loginid">
            </label>
            <label>
                비밀번호(user_pass)
                <input type="text" name="user_pass" placeholder="user_pass" value="password">
            </label>            
            <label>
                Option:국가코드(user_country)
                <select name="user_country">
                    <option value="KR">한국(KR)</option>
                </select>                
            </label>            
            <label>
                Option:소프트웨어 버전(user_app_ver)
                <input type="text" name="user_app_ver" placeholder="user_app_ver">
            </label>
            <label>
                Option:단말기 종류(user_phone_name)
                <input type="text" name="user_phone_name" placeholder="user_phone_name">
            </label>            
            <label>
                Option:Google GCM(user_gcm_id)
                <input type="text" name="user_gcm_id" placeholder="user_gcm_id">
            </label>
            <label>
                Option:Apple APNS(user_apns_id)
                <input type="text" name="user_apns_id" placeholder="user_apns_id">
            </label>        

            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>6. 회원 조회 ( 식별자 )</h1>
        <form method="get" action="/api/user/out/id">
            <label>
                식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>        
    
    <div>
        <h1>7. 개인 회원 조회</h1>
        <form method="get" action="/api/user/out/individual">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>            
    <div>
        <h1>8. 딜러 회원 조회</h1>
        <form method="get" action="/api/user/out/dealer">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    <div>
        <h1>9. 가입 승인 회원 조회</h1>
        <form method="get" action="/api/user/out/join">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>            
    <div>
        <h1>10. 판매 승인 회원 조회</h1>
        <form method="get" action="/api/user/out/sales">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1>11. 회원 이름 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 이름
                <input type="text" name="user_name" placeholder="user_name">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    <div>
        <h1>12. 회원 상태 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 상태(user_state)
                <select name="user_state">
                    <option value="1">승인(1)</option>
                    <option value="9">탈퇴(9)</option>
                    <option value="8">거절(8)</option>
                </select>
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1>12.1. 회원 알림상태 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 상태(user_notice_state : 1(알림받음), 0(알림받지않음))
                <select name="user_notice_state">
                    <option value="1">알림받음(1)</option>
                    <option value="0">알림받지않음(0)</option>
                </select>
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>13. 회원 유형 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 유형(user_status)
                <select name="user_status">
                    <option value="1">개인(1)</option>
                    <option value="2">슈퍼 딜러(2)</option>                    
                    <option value="3">알선 딜러(3)</option>
                    <option value="4">매입 딜러(4)</option>                    
                </select>
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    <div>
        <h1>14. 회원 지역 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 지역(user_location)
                <input type="text" name="user_location" placeholder="0">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    <div>
        <h1>15. 회원 소속 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 소속(user_affiliation)
                <input type="text" name="user_affiliation" placeholder="0">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>16. 회원 소속 상사 수정</h1>
        <form method="post" action="/api/user/edit">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>  
            <label>
                회원 소속 상사(user_affiliation_boss)
                <input type="text" name="user_affiliation_boss" placeholder="0">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>       
    
    <div>
        <h1>17. 공지사항 등록</h1>
        <form method="post" action="/api/post/add">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                게시물 유형(post_status)
                <select name="post_status">
                    <option value="9">공지(9)</option>
                </select>
            </label>            
            <label>
                시작 날짜(post_start_date)
                <input type="text" name="post_content_start_date" placeholder="yyyy-mm-dd">
            </label>  
            <label>
                종료 날짜(post_end_date)
                <input type="text" name="post_content_end_date" placeholder="yyyy-mm-dd">
            </label>  
            <label>
                공지 내용(post_end_date)
                <textarea name="post_content_text" placeholder="내용"></textarea>
            </label>              
            <label>
                Option:회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="user_id">
            </label>            
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1>17.1. 공지사항 삭제</h1>
        <form method="post" action="/api/post/delete">
            <label>
                소식 식별자(post_id)
                <input type="text" name="post_id" placeholder="0">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>17.2. 공지사항 수정</h1>
        <form method="post" action="/api/post/edit">
            <label>
                소식 식별자(post_id)
                <input type="text" name="post_id" placeholder="0">
            </label>
            <label>
                시작 날짜(post_start_date)
                <input type="text" name="post_content_start_date" placeholder="yyyy-mm-dd">
            </label>  
            <label>
                종료 날짜(post_end_date)
                <input type="text" name="post_content_end_date" placeholder="yyyy-mm-dd">
            </label>  
            <label>
                공지 내용(post_end_date)
                <textarea name="post_content_text" placeholder="내용"></textarea>
            </label>              
            <label>
                Option:회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="user_id">
            </label>            
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    
    <div>
        <h1>18. 공지사항 조회</h1>
        <form method="get" action="/api/post/out/notice">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>       
    
    <div>
        <h1>19. 브랜드 입력</h1>
        <form method="post" action="/api/brand/add">
            <label>
                브랜드명(brand_name)
                <input type="text" name="brand_name" placeholder="brand_name">
            </label>  
            <label>
                국가(brand_country)
                <select name="brand_country">
                    <option value="KR">대한민국(KR)</option>                    
                </select>
            </label>  
            <label>
                사진(brand_picture)
                <input type="text" name="brand_picture" placeholder="brand_picture">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>           
    
    <div>
        <h1>20. 브랜드 조회</h1>
        <form method="get" action="/api/brand/out/all">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>                          
            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>  
    
    <div>
        <h1>21. 브랜드 삭제</h1>
        <form method="post" action="/api/brand/delete">
            <label>
                식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>22. 브랜드 수정</h1>
        <form method="post" action="/api/brand/edit">
            <label>
                식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label>  
            <label>
                브랜드명(brand_name)
                <input type="text" name="brand_name" placeholder="brand_name">
            </label>  
            <label>
                국가(brand_country)
                <select name="brand_country">
                    <option value="KR">대한민국(KR)</option>                    
                </select>
            </label>  
            <label>
                사진(brand_picture)
                <input type="text" name="brand_picture" placeholder="brand_picture">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>  
    
    <div>
        <h1>23. 차종 입력</h1>
        <form method="post" action="/api/model/add">
            
            <label>
                브랜드 식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label>  
            
            <label>
                모델명(model_name)
                <input type="text" name="model_name" placeholder="model_name">
            </label>  
            <label>
                모델명_서브(model_sub_name)
                <input type="text" name="model_sub_name" placeholder="model_sub_name">
            </label>  
            <label>
                사진(model_picture)
                <input type="text" name="model_picture" placeholder="model_picture">
            </label>  
            <label>
                차량년도_시작(model_start_year)
                <input type="text" name="model_start_year" placeholder="model_start_year">
            </label>  
            <label>
                차량년도_종료(model_end_year)
                <input type="text" name="model_end_year" placeholder="model_end_year">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>24. 차종 조회</h1>
        <form method="get" action="/api/model/out/all">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>              
            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>25. 브랜드별 차종 조회</h1>
        <form method="get" action="/api/model/out/brand">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                브랜드 식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label> 
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>                          
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1>26. 차종 삭제</h1>
        <form method="post" action="/api/model/delete">
            <label>
                식별자(brand_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>27. 차종 수정</h1>
        <form method="post" action="/api/model/edit">
            
            <label>
                식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>  
            
            <label>
                모델명(model_name)
                <input type="text" name="model_name" placeholder="model_name">
            </label>  
            <label>
                모델명_서브(model_sub_name)
                <input type="text" name="model_sub_name" placeholder="model_sub_name">
            </label>  
            <label>
                사진(model_picture)
                <input type="text" name="model_picture" placeholder="model_picture">
            </label>  
            <label>
                차량년도_시작(model_start_year)
                <input type="text" name="model_start_year" placeholder="model_start_year">
            </label>  
            <label>
                차량년도_종료(model_end_year)
                <input type="text" name="model_end_year" placeholder="model_end_year">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>28. 브랜드별 차종_모델 조회</h1>
        <form method="get" action="/api/model/out/model">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                브랜드 식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label> 
            <label>
                모델 식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label> 
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>                          
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>29. 등급 입력</h1>
        <form method="post" action="/api/grade/add">
            <label>
                모델식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>              
            <label>
                등급명(grade_name)
                <input type="text" name="grade_name" placeholder="grade_name">
            </label>  
            <label>
                등급명_서브(grade_sub_name)
                <input type="text" name="grade_sub_name" placeholder="grade_sub_name">
            </label>  
            <label>
                연료명(grade_fuel)
                <input type="text" name="grade_fuel" placeholder="grade_fuel">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>30. 등급 조회</h1>
        <form method="get" action="/api/grade/out/grade">
            <label>
                모델식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>                                      
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>                          
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>31. 세부 등급 조회</h1>
        <form method="get" action="/api/grade/out/gradename">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                등급명(grade_name)
                <input type="text" name="grade_name" placeholder="grade_name">
            </label>              
            <label>
                순서(order)
                <select name="order">
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>            
            </label>                          
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>        
    
    <div>
        <h1>32. 등급 수정</h1>
        <form method="post" action="/api/grade/edit">
            <label>
                식별자(grade_id)
                <input type="text" name="grade_id" placeholder="grade_id">
            </label>              
            <label>
                모델식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>                                      
            <label>
                등급명(grade_name)
                <input type="text" name="grade_name" placeholder="grade_name">
            </label>  
            <label>
                등급명_서브(grade_sub_name)
                <input type="text" name="grade_sub_name" placeholder="grade_sub_name">
            </label>  
            <label>
                연료명(grade_fuel)
                <input type="text" name="grade_fuel" placeholder="grade_fuel">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>33. 등급 삭제</h1>
        <form method="post" action="/api/grade/delete">
            <label>
                식별자(grade_id)
                <input type="text" name="grade_id" placeholder="grade_id">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1><del>34. 옵션 입력</del></h1>
        <form method="post" action="/api/option/add">
            <label>
                옵션명(option_name)
                <input type="text" name="option_name" placeholder="option_name">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1><del>35. 옵션 수정</del></h1>
        <form method="post" action="/api/option/edit">
            <label>
                식별자(option_id)
                <input type="text" name="option_id" placeholder="option_id">
            </label>
            <label>
                옵션명(option_name)
                <input type="text" name="option_name" placeholder="option_name">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1><del>36. 옵션 삭제</del></h1>
        <form method="post" action="/api/option/delete">
            <label>
                식별자(option_id)
                <input type="text" name="option_id" placeholder="option_id">
            </label>
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1><del>37. 옵션 조회</del></h1>
        <form method="get" action="/api/option/out/all">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1<del>>38. 색상 입력</del></h1>
        <form method="post" action="/api/color/add">
            <label>
                컬러명 (color_name)
                <input type="text" name="color_name" placeholder="color_name">
            </label>  
            <label>
                Hex Code(color_hex)
                <input type="text" name="color_hex" placeholder="color_hex">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1><del>39. 색상 수정</del></h1>
        <form method="post" action="/api/color/edit">
            <label>
                식별자(color_id)
                <input type="text" name="color_id" placeholder="color_id">
            </label>
            <label>
                컬러명 (color_name)
                <input type="text" name="color_name" placeholder="color_name">
            </label>  
            <label>
                Hex Code(color_hex)
                <input type="text" name="color_hex" placeholder="color_hex">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1><del>40. 색상 삭제</del></h1>
        <form method="post" action="/api/color/delete">
            <label>
                식별자(option_id)
                <input type="text" name="color_id" placeholder="color_id">
            </label>
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1><del>41. 색상 조회</del></h1>
        <form method="get" action="/api/color/out/all">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>       
    
    <div>
        <h1>42. 지역 입력</h1>
        <form method="post" action="/api/zipcode/add">
            <label>
                시도(zipcode_sido)
                <input type="text" name="zipcode_sido" placeholder="zipcode_sido">
            </label>  
            <label>
                시군구(zipcode_sigungu)
                <input type="text" name="zipcode_sigungu" placeholder="zipcode_sigungu">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1>43. 지역 수정</h1>
        <form method="post" action="/api/zipcode/edit">
            <label>
                식별자(zipcode_id)
                <input type="text" name="zipcode_id" placeholder="zipcode_id">
            </label>
            <label>
                시도(zipcode_sido)
                <input type="text" name="zipcode_sido" placeholder="zipcode_sido">
            </label>  
            <label>
                시군구(zipcode_sigungu)
                <input type="text" name="zipcode_sigungu" placeholder="zipcode_sigungu">
            </label>              
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>44. 지역 삭제</h1>
        <form method="post" action="/api/zipcode/delete">
            <label>
                식별자(option_id)
                <input type="text" name="zipcode_id" placeholder="zipcode_id">
            </label>
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1>45. 지역(시도) 조회</h1>
        <form method="get" action="/api/zipcode/out/sido">
            <!--
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="0">
            </label>
            -->
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>           
    
    <div>
        <h1>46. 지역(시군구) 조회</h1>
        <form method="get" action="/api/zipcode/out/sigungu">
            <label>
                시도(zipcode_sido)
                <input type="text" name="zipcode_sido" placeholder="zipcode_sido">
            </label>              
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>               
    
    <div>
        <h1>47. 차량 등록</h1>
        <form method="post" action="/api/car/add" enctype="application/x-www-form-urlencoded">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="user_id">
            </label>   
            <label>
                차량 상태(car_state)
                <select name="car_state">
                    <option value="0">임시저장(0)</option>
                    <option value="1">승인(1)</option>
                    <option value="8">대기(8)</option>
                    <option value="9">거절(9)</option>                    
                </select>
            </label>                          
            <label>
                등급 실별자(grade_id)
                <input type="text" name="grade_id" placeholder="grade_id">
            </label>              
            <label>
                모델 식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>              
            <label>
                브랜드 식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label>              
            <label>
                차량 색상(car_color)
                <input type="text" name="car_color" placeholder="color">
            </label>              
            <label>
                차량 옵션(car_option)
                <input type="text" name="car_option" placeholder="option,option,option">
            </label>                          
            <label>
                차량 참고사항(car_description)
                <input type="text" name="car_description" placeholder="car_description">
            </label>                          
            <label>
                차량 번호(car_number)
                <input type="text" name="car_number" placeholder="car_number">
            </label>   
            <label>
                차량 연식(car_year)
                <input type="text" name="car_year" placeholder="car_year">
            </label>               
            <label>
                차량 사진_1(car_pictrue_1)
                <input type="text" name="car_pictrue_1" placeholder="car_pictrue_1">
            </label>                          
            <label>
                차량 사진_2(car_pictrue_2)
                <input type="text" name="car_pictrue_2" placeholder="car_pictrue_2">
            </label>                          
            <label>
                차량 사진_3(car_pictrue_3)
                <input type="text" name="car_pictrue_3" placeholder="car_pictrue_3">
            </label>                          
            <label>
                차량 사진_4(car_pictrue_4)
                <input type="text" name="car_pictrue_4" placeholder="car_pictrue_4">
            </label>                          
            <label>
                차량 사진_5(car_pictrue_5)
                <input type="text" name="car_pictrue_5" placeholder="car_pictrue_5">
            </label>                                      
            <label>
                차량 사진_6(car_pictrue_6) : 옵션
                <input type="text" name="car_pictrue_6" placeholder="car_pictrue_6">
            </label>                                                  
            <label>
                판매지역(car_location)
                <input type="text" name="car_location" placeholder="car_location">
            </label>              
            <label>
                주행거리(car_vehicle_mile)
                <input type="text" name="car_vehicle_mile" placeholder="car_vehicle_mile">
            </label>              
            <label>
                금융 상태(car_finance_state)
                <input type="text" name="car_finance_state" placeholder="car_finance_state">                
                <!--
                <select name="car_finance_state">
                    <option value="1">현금(1)</option>
                    <option value="2">할부(2)</option>
                    <option value="3">리스(3)</option>                    
                </select>
                -->
            </label>              
            <label>
                변속기(car_transmission_state )
                <input type="text" name="car_transmission_state" placeholder="car_transmission_state">                
                <!--
                <select name="car_transmission_state ">
                    <option value="1">오토(1)</option>
                    <option value="2">수동(2)</option>
                    <option value="3">세미오토(3)</option>                    
                    <option value="4">cvt(4)</option>                                        
                </select>    
                -->
            </label>                          
            <label>
                사고여부(car_accident_state)
                <input type="text" name="car_accident_state" placeholder="car_accident_state">                                
                <!--
                <select name="car_accident_state">
                    <option value="1">무사고(1)</option>
                    <option value="2">유사고(2)</option>
                    <option value="3">기타(3)</option>                    
                </select>                
                -->
            </label>                                      
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1>48. 차량 수정</h1>
        <form method="post" action="/api/car/edit" enctype="application/x-www-form-urlencoded">
            <label>
                식별자(car_id)
                <input type="text" name="car_id" placeholder="car_id">
            </label>       
            <label>
                차량 상태(car_state)
                <select name="car_state">
                    <option value="0">임시저장(0)</option>
                    <option value="1">승인(1)</option>
                    <option value="7">판매완료(7)</option>                    
                    <option value="8">대기(8)</option>
                    <option value="9">거절(9)</option>                    
                </select>
            </label>                                      
            <label>
                등급 실별자(grade_id)
                <input type="text" name="grade_id" placeholder="grade_id">
            </label>              
            <label>
                모델 식별자(model_id)
                <input type="text" name="model_id" placeholder="model_id">
            </label>              
            <label>
                브랜드 식별자(brand_id)
                <input type="text" name="brand_id" placeholder="brand_id">
            </label>              
            <label>
                차량 색상(car_color)
                <input type="text" name="car_color" placeholder="color">
            </label>              
            <label>
                차량 옵션(car_option)
                <input type="text" name="car_option" placeholder="option,option,option">
            </label>
            <label>
                차량 참고사항(car_description)
                <input type="text" name="car_description" placeholder="car_description">
            </label>                          
            <label>
                차량 번호(car_number)
                <input type="text" name="car_number" placeholder="car_number">
            </label>
            <label>
                차량 연식(car_year)
                <input type="text" name="car_year" placeholder="car_year">
            </label>
            <label>
                차량 사진_1(car_pictrue_1)
                <input type="text" name="car_pictrue_1" placeholder="car_pictrue_1">
            </label>                          
            <label>
                차량 사진_2(car_pictrue_2)
                <input type="text" name="car_pictrue_2" placeholder="car_pictrue_2">
            </label>                          
            <label>
                차량 사진_3(car_pictrue_3)
                <input type="text" name="car_pictrue_3" placeholder="car_pictrue_3">
            </label>                          
            <label>
                차량 사진_4(car_pictrue_4)
                <input type="text" name="car_pictrue_4" placeholder="car_pictrue_4">
            </label>                          
            <label>
                차량 사진_5(car_pictrue_5)
                <input type="text" name="car_pictrue_5" placeholder="car_pictrue_5">
            </label> 
            <label>
                차량 사진_6(car_pictrue_6) : 옵션
                <input type="text" name="car_pictrue_6" placeholder="car_pictrue_6">
            </label>                                                              
            <label>
                판매지역(car_location)
                <input type="text" name="car_location" placeholder="car_location">
            </label>              
            <label>
                주행거리(car_vehicle_mile)
                <input type="text" name="car_vehicle_mile" placeholder="car_vehicle_mile">
            </label>              
            <label>
                금융 상태(car_finance_state)
                <input type="text" name="car_finance_state" placeholder="car_finance_state">                
                <!--
                <select name="car_finance_state">
                    <option value="1">현금(1)</option>
                    <option value="2">할부(2)</option>
                    <option value="3">리스(3)</option>                    
                </select>
                -->
            </label>              
            <label>
                변속기(car_transmission_state)
                <input type="text" name="car_transmission_state" placeholder="car_transmission_state">                
                <!--
                <select name="car_transmission">
                    <option value="1">오토(1)</option>
                    <option value="2">수동(2)</option>
                    <option value="3">세미오토(3)</option>                    
                    <option value="4">cvt(4)</option>                                        
                </select>    
                -->
            </label>                          
            <label>
                사고여부(car_accident_state)
                <input type="text" name="car_accident_state" placeholder="car_accident_state">                                
                <!--
                <select name="car_accident_state">
                    <option value="1">무사고(1)</option>
                    <option value="2">유사고(2)</option>
                    <option value="3">기타(3)</option>                    
                </select>                
                -->
            </label>                                      
            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1>49. 차량 상태</h1>
        <form method="post" action="/api/car/state" enctype="application/x-www-form-urlencoded">
            <label>
                식별자(car_id)
                <input type="text" name="car_id" placeholder="car_id">
            </label>                          
            <label>
                차량 상태(car_state)
                <select name="car_state">
                    <option value="0">임시저장(0)</option>
                    <option value="1">승인(1)</option>
                    <option value="7">판매완료(7)</option>                    
                    <option value="8">대기(8)</option>
                    <option value="9">거절(9)</option>                    
                </select>
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>50. 차량 조회</h1>
        <form method="get" action="/api/car/out/all">

            <!--
            입찰자순	알선 딜러가 수수료 입찰을 진행한 횟수가 가장 작은 차량부터 많은 차량 순으로 정렬
            시간순	수수료 입찰 마감 시간이 가장 짧게 남은 차량부터 많은 차량 순으로 정렬
            지역순	차량 판매 지역 가나다 순으로 정렬
            공통	수수료 입찰 정원(10명)이 마감된 차량은 리스트에서 보이지 않도록 제작
            수수료 입찰 시간이 마감된 차량은 리스트에서 보이지 않도록 제작     
            -->
            
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>   
            
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                          
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   

    <div>
        <h1>50.1. 차량 조회 ( 식별자 )</h1>
        <form method="get" action="/api/car/out/id">

            <!--
            입찰자순	알선 딜러가 수수료 입찰을 진행한 횟수가 가장 작은 차량부터 많은 차량 순으로 정렬
            시간순	수수료 입찰 마감 시간이 가장 짧게 남은 차량부터 많은 차량 순으로 정렬
            지역순	차량 판매 지역 가나다 순으로 정렬
            공통	수수료 입찰 정원(10명)이 마감된 차량은 리스트에서 보이지 않도록 제작
            수수료 입찰 시간이 마감된 차량은 리스트에서 보이지 않도록 제작     
            -->
            <label>
                차량식별자(car_id)
                <input type="text" name="car_id" placeholder="car_id">
            </label>                                      
            
            <label>
                회원식별자(user_id)
                <input type="text" name="user_id" placeholder="user_id">
            </label>
            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                          
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>  
    
    <div>
        <h1>51. 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/user">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>                          
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>51.1 차량(회원) 조회 _ 임시저장제외</h1>
        <form method="get" action="/api/car/out/usercar">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>                                      
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>52. 대기 차량 조회</h1>
        <form method="get" action="/api/car/out/standby">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>   
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>         
    
    <div>
        <h1>53. 승인 차량 조회</h1>
        <form method="get" action="/api/car/out/approval">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>   
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>   
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                검색 타겟(search_target)
                <select name="search_target">
                    <option value="brand_name">브랜드명(brand_name)</option>                    
                    <option value="model_name">모델명(model_name)</option>
                </select>
            </label>     
            <label>
                검색어(p)
                <input type="text" name="q" placeholder="검색어">
            </label>   
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1>53.1 매입딜러 승인 차량 조회</h1>
        <form method="get" action="/api/car/out/dealerapproval">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>   
            <label>
                API요청을하는 회원의 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>   
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label> 
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                검색 타겟(search_target)
                <select name="search_target">
                    <option value="brand_name">브랜드명(brand_name)</option>                    
                    <option value="model_name">모델명(model_name)</option>
                </select>
            </label>     
            <label>
                검색어(p)
                <input type="text" name="q" placeholder="검색어">
            </label>   
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>       
    
    <div>
        <h1>54. 거절 차량 조회</h1>
        <form method="get" action="/api/car/out/refusal">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>   
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>             
    
    <div>
        <h1>55. 임시저장 차량 조회</h1>
        <form method="get" action="/api/car/out/temp">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>  
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>          
    
    <div>
        <h1>56. 대기 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/userstandby">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>                                      
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label> 
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>         
    
    <div>
        <h1>57. 승인 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/userapproval">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>                                      
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>    
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>         
    
    <div>
        <h1>58. 거절 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/userrefusal">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>               
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>    
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>             
    
    <div>
        <h1>59. 임시저장 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/usertemp">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>     
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>    
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>60. 차량 삭제</h1>
        <form method="post" action="/api/car/delete" enctype="application/x-www-form-urlencoded">
            <label>
                식별자(car_id)
                <input type="text" name="car_id" placeholder="car_id">
            </label>                          
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>61. 판매완료 차량 조회</h1>
        <form method="get" action="/api/car/out/complete">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>61.1. 경매완료(종료) 차량 조회_구분 없이 전체</h1>
        <p>개인 ( 48시간 ~ 72시간 ) or 딜러 ( 15명 입찰 or 72시간 ~ 192시간 )</p>
        <form method="get" action="/api/car/out/auctioncomplete" enctype="application/x-www-form-urlencoded">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1>61.2. 경매완료(종료) 차량(회원) 조회_구분 없이 전체</h1>
        <p>개인 ( 48시간 ~ 72시간 ) or 딜러 ( 15명 입찰 or 72시간 ~ 192시간 )</p>
        <form method="get" action="/api/car/out/userauctioncomplete" enctype="application/x-www-form-urlencoded">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>                   
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>61.3. 경매완료(종료) 차량(차량_식별자) 조회_구분 없이 전체</h1>
        <p>개인 ( 48시간 ~ 72시간 ) or 딜러 ( 15명 입찰 or 72시간 ~ 192시간 )</p>
        <form method="get" action="/api/car/out/carauctioncomplete" enctype="application/x-www-form-urlencoded">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>                   
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1>61.4. 차량 입찰자 리스트 ( 전체 )</h1>
        <p>개인 ( 48시간 ~ 72시간 ) or 딜러 ( 15명 입찰 or 72시간 ~ 192시간 )</p>
        <form method="get" action="/api/car/out/auctioncompletealluser" enctype="application/x-www-form-urlencoded">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>                   
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>61.5. 차량 입찰자 리스트 ( 개인 )</h1>
        <p>개인 ( 48시간 ~ 72시간 )</p>
        <form method="get" action="/api/auction/out/car/auctionindividual">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>         
    </div>   
    
    <div>
        <h1>61.6. 차량 입찰자 리스트 ( 딜러 )</h1>
        <p>딜러 ( 15명 입찰 or 72시간 ~ 192시간 )</p>
        <form method="get" action="/api/auction/out/car/auctiondealer">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>         
    </div>
    
    <div>
        <h1>61.7. 차량 입찰자 팬매신청</h1>
        <p>판매자가 딜러에게 판매신청</p>
        <form method="post" action="/api/auction/sale" enctype="application/x-www-form-urlencoded">
            <p>61.5, 61.6 조회시 응답되는 data중 relation_id 사용</p>            
            <label>
                식별자 ( relation_id )
                <input type="text" name="relation_id" placeholder="1">
            </label>
            <label>
                판매단계 ( relation_sale )
                <select name="relation_sale">
                    <option value="0">상태 or 판매취소(0)</option>
                    <option value="1">판매신청(1)</option>
                    <option value="2">판매완료(2)</option>
                </select>
            </label>     
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>         
    </div>
    
    <div>
        <h1>61.8. 판매요청 받은 차량리스트 ( 사용자 입장 (개인 or 딜러) )</h1>
        <p>구매자 입장에서 경매에 참여하고 판매자가 판매 요청을 했을경우</p>
        <form method="get" action="/api/auction/out/usersale">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>         
    </div>    
    
    <div>
        <h1>62. 판매완료 차량(회원) 조회</h1>
        <form method="get" action="/api/car/out/usercomplete">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>       
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="">등록순()</option>                                        
                    <option value="auction_user_count">입찰자순(auction_user_count)</option>                    
                    <option value="auction_date">시간순(auction_date)</option>
                    <option value="car_location">지역순(car_location)</option>
                </select>
            </label>     
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                                  
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>   
    
    <div>
        <h1>63. 경매신청</h1>
        <form method="post" action="/api/auction/add" enctype="application/x-www-form-urlencoded">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>
            <label>
                Option:회원 식별자(알선딜러) 식별자(dealer_user_id)
                <input type="text" name="dealer_user_id" placeholder="1">
            </label>            
            <label>
                Option:관계 식별자(알선딜러) 식별자(conciliation_relation_id)
                <input type="text" name="conciliation_relation_id" placeholder="1">
            </label>                        
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>                                      
            <label>
                경매 유형(relation_type)
                <select name="relation_type">
                    <option value="0">개인&딜러:경매 참여(0)</option>                    
                    <option value="1">개인:공개 경매(1)</option>
                    <option value="2">딜러:비공개 경매(2)</option>
                </select>
            </label>     
            <label>
                가격 (relation_price)
                <input type="relation_price" name="relation_price" placeholder="1">
            </label>
            <label>
                <del>Option:수수료 (relation_commission_price)</del>
                <input type="relation_commission_price" name="relation_commission_price" placeholder="1">
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>64. 경매신청 조회 (개인)</h1>
        <form method="get" action="/api/auction/out/individual">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>65. 경매신청 조회 (딜러)</h1>
        <form method="get" action="/api/auction/out/dealer">
            <label>
                순서 타켓(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                           
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>66. 회원별 경매신청 조회 (개인)</h1>
        <form method="get" action="/api/auction/out/user/individual">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>67. 회원별 경매신청 조회 (딜러)</h1>
        <form method="get" action="/api/auction/out/user/dealer">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>68. 회원별 경매신청 조회 (모두)</h1>
        <form method="get" action="/api/auction/out/user">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1>69. 차량 경매 시간 업데이트</h1>
        <form method="post" action="/api/car/edit/auction" enctype="application/x-www-form-urlencoded">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>                                                  
            <label>
                경매 업데이트 시간(car_auction_date)
                <input type="text" name="car_auction_date" placeholder="2017-05-30 11:11:11">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>70. 차량별 경매신청 조회 (개인)</h1>
        <form method="get" action="/api/auction/out/car/individual">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>71. 차량별 경매신청 조회 (딜러)</h1>
        <form method="get" action="/api/auction/out/car/dealer">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>72. 차량별 경매신청 조회 (모두)</h1>
        <form method="get" action="/api/auction/out/car">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>73. 회원별 진행중인_경매 조회 (개인)</h1>
        <form method="get" action="/api/auction/out/user/progressindividual">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>73.1. 회원별 진행중인_경매 조회 (개인_딜러)</h1>
        <form method="get" action="/api/auction/out/user/progressindividualdealer">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     


    <div>
        <h1>74. 회원별 진행중인_경매 조회 (딜러)</h1>
        <form method="get" action="/api/auction/out/user/progressdealer">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>75. 회원별 진행중인_경매 조회 (모두)</h1>
        <form method="get" action="/api/auction/out/progressuser">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    <div>
        <h1>76. 회원별 완료중인_경매 조회 (개인)</h1>
        <form method="get" action="/api/auction/out/user/completeindividual">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>76.1. 회원별 완료중인_경매 조회 (개인_알선딜러)</h1>
        <form method="get" action="/api/auction/out/user/completeindividualdealer">
            <label>
                회원(알선딜러) 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 

    <div>
        <h1>77. 회원별 완료중인_경매 조회 (딜러)</h1>
        <form method="get" action="/api/auction/out/user/completedealer">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>78. 회원별 완료중인_경매 조회 (모두)</h1>
        <form method="get" action="/api/auction/out/completeuser">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>             
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    
    
    
    
    <div>
        <h1>79. 슈퍼 딜러 회원 조회</h1>
        <form method="get" action="/api/user/out/superdealer">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    <div>
        <h1>80. 알선 딜러 회원 조회</h1>
        <form method="get" action="/api/user/out/conciliationdealer">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    <div>
        <h1>81. 매입 딜러 회원 조회</h1>
        <form method="get" action="/api/user/out/purchasedealer">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    
    <div>
        <h1>82. 슈퍼 딜러 회원 조회</h1>
        <form method="get" action="/api/user/out/superdealer">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>  
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    

    
    <div>
        <h1><del>83. 알선신청 회원_조회(개인 회원이 차량 입찰을 신청 했을댸)</del></h1>
        <form method="get" action="/api/auction/out/conciliation">
            <label>
                순서 타겟(order_target)
                <select name="order_target">
                    <option value="0">날짜(0)</option>
                    <option value="1">가격순(1)</option>
                </select>
            </label>                          
            <label>
                순서(order)
                <select name="order">
                    <option value="desc">desc(desc)</option>
                    <option value="asc">asc(asc)</option>
                </select>
            </label>                                      
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    
    <div>
        <h1><del>84. 알선신청(83.알선신청 회원_조회(relation_id) > 알선딜러들이 알선 신청"84.알선신청" (relation_id > auction_relation_id))</del></h1>
        <form method="post" action="/api/conciliation/add" enctype="application/x-www-form-urlencoded">
            <label>
                경매 관계 식별자 ( tender_relation_id 값을 파라미터네임을 auction_relation_id 하여 전송 )
                <input type="text" name="auction_relation_id" placeholder="1">
            </label>            
            <label>
                회원(딜러) 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>
            <label>
                Option:수수료 (relation_commission_price)
                <input type="relation_commission_price" name="relation_commission_price" placeholder="1">
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1><del>85. 경매별 회원 알선딜러조회(차량입찰을 신청한 회원에게 알선신청한 딜러들을 볼수 있는 API)</del></h1>
        <form method="get" action="/api/conciliation/out/auctionid">
            <label>
                경매 관계 식별자 (서버에서 받아온 : tender_relation_id , 서버에 보낼 파라미터 이름 : auction_relation_id)
                <input type="text" name="auction_relation_id" placeholder="1">
            </label>            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1><del>86. 알선신청 승인(84. 알선신청 user_car_auction_relation 테이블 relation_id 사용 = 85. 경매별 회원 알선딜러조회의 relation_id )</del></h1>
        <form method="post" action="/api/conciliation/state" enctype="application/x-www-form-urlencoded">
            <label>
                알선 식별자 (relation_id)
                <input type="text" name="relation_id" placeholder="1">
            </label>            
            <label>
                알선 상태(relation_state)
                <select name="relation_state">
                    <option value="0">대기(0)</option>
                    <option value="1">승인(1)</option>                    
                </select>
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1><del>87. 딜러_알선 승인 리스트</del></h1>
        <form method="get" action="/api/conciliation/out/dealer/approval">
            <label>
                (딜러)회원 식별자 (user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>            
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>                                      
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    

    
    <div>
        <h1>88. 차량 리뷰 ( 입력 )</h1>
        <form method="post" action="/api/review/add" enctype="application/x-www-form-urlencoded">
            <label>
                회원 식별자 (user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>            
            <label>
                알선딜러 회원 식별자 (dealer_user_id)
                <input type="text" name="dealer_user_id" placeholder="1">
            </label>            
            <label>
                차량 식별자 (car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>            
            
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>            
            
            <label>
                거래 후기 (review_content)
                <input type="text" name="review_content" placeholder="1">
            </label>            
            <label>
                거래 평점 (review_score)
                <input type="text" name="review_score" placeholder="최대 10점">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      
    
    <div>
        <h1>89. 차량 리뷰 ( 수정 )</h1>
        <form method="post" action="/api/review/edit" enctype="application/x-www-form-urlencoded">
            <label>
                식별자 (review_id)
                <input type="text" name="review_id" placeholder="1">
            </label>
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>                        
            <label>
                거래 후기 (review_content)
                <input type="text" name="review_content" placeholder="1">
            </label>            
            <label>
                거래 평점 (review_score)
                <input type="text" name="review_score" placeholder="최대 10점">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>90. 차량 리뷰 ( 삭제 )</h1>
        <form method="post" action="/api/review/delete" enctype="application/x-www-form-urlencoded">
            <label>
                식별자 (review_id)
                <input type="text" name="review_id" placeholder="1">
            </label>            
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>      

    <div>
        <h1>91. 전체 차량 리뷰 조회</h1>
        <form method="get" action="/api/review/out/all">
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>                        
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>  
    
    <div>
        <h1>92. 차량 리뷰 리뷰별 조회 ( 식별자 )</h1>
        <form method="get" action="/api/review/out/id">
            <label>
                식별자 (review_id)
                <input type="text" name="review_id" placeholder="1">
            </label>   
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>93. 차량 리뷰 차량별 조회 ( 차량 식별자 )</h1>
        <form method="get" action="/api/review/out/car">
            <label>
                식별자 (car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>    
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>                        
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>  
    
    <div>
        <h1>94. 차량 리뷰 회원별 조회 ( 회원 식별자 )</h1>
        <form method="get" action="/api/review/out/user">
            <label>
                식별자 (user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>   
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>                        
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>    
    
    <div>
        <h1>95. 차량 리뷰 회원별 조회 ( 딜러회원 식별자 )</h1>
        <form method="get" action="/api/review/out/dealer">
            <label>
                식별자 (user_id)
                <input type="text" name="dealer_user_id" placeholder="1">
            </label>   
            <label>
                후기유형(review_type )
                <select name="review_type">
                    <option value="1">개인 > 딜러 : 판매완료(1)</option>
                    <option value="2">구매자 > 개인 or 딜러 : 거래완료(2)</option>                    
                </select>
            </label>                        
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div> 
    
    <div>
        <h1>96. 관리자 통계</h1>
        <form method="get" action="/api/admin/out/statistics">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>              
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     

    <div>
        <h1>97. 차량 알선 신청</h1>
        <form method="post" action="/api/conciliation/add" enctype="application/x-www-form-urlencoded">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>            
            <label>
                가격 (relation_price)
                <input type="relation_price" name="relation_price" placeholder="1">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>     
    
    <div>
        <h1>98. 차량 알선 조회 ( 전체 )</h1>
        <form method="get" action="/api/conciliation/out/all">
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    <div>
        <h1>99. 차량 알선 조회 ( 딜러회원 식별자 )</h1>
        <p>딜러 입장에서 알선 신청한 차량을 보고 싶을때</p>
        <form method="get" action="/api/conciliation/out/user">
            <label>
                회원 식별자(user_id)
                <input type="text" name="user_id" placeholder="1">
            </label>
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>

    <div>
        <h1>100. 차량 알선 조회 ( 차량 식별자 )</h1>
        <p>차량을 등록한 개인 사용자 입장에서 알선 신청한 딜러를 보고 싶을때</p>        
        <form method="get" action="/api/conciliation/out/car">
            <label>
                차량 식별자(car_id)
                <input type="text" name="car_id" placeholder="1">
            </label>             
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>


    <div>
        <h1>101. 차량 갱신</h1>
        <p>전체 차량 갱신 API</p>        
        <form method="post" action="/api/notice/ping" enctype="application/x-www-form-urlencoded">             
            <label>
                페이지(p)
                <input type="text" name="p" placeholder="1">
            </label>
            <button type="submit">전송</button>
            <button type="reset">취소</button>                        
        </form>        
    </div>
    
    
</body>
</html>