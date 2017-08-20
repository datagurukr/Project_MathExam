<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
?>
<div class="section">
    <div class="row">
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="구매완료" type="text" class="validate">
                <label for="no">결과</label>
            </div>
        </div>        
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<? if ( isset($row['purchase_name']) ) { echo $row['purchase_name']; } else { echo '-'; }; ?>" type="text" class="validate">
                <label for="no">상품명</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<? if ( isset($row['subject_price']) ) { echo number_format($row['subject_price']).'원'; } else { echo '-'; }; ?>" type="text" class="validate">
                <label for="no">상품가격</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<? if ( isset($row['purchase_price']) ) { echo number_format($row['purchase_price']).'원'; } else { echo '-'; }; ?>" type="text" class="validate">
                <label for="no">구매가격</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<? if ( isset($row['purchase_register_date']) ) { echo $row['purchase_register_date']; } else { echo '-'; }; ?>" type="text" class="validate">
                <label for="no">구매날짜</label>
            </div>
        </div>        
        <div class="row">
            <div class="input-field col s6">                    
                <a href="/mypage/purchase" class="waves-effect waves-light btn modal-trigger right">확인</a>
            </div>
        </div>
    </div>
</div>