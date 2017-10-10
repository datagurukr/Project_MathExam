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
                <input disabled value="구매실패" type="text" class="validate">
                <label for="no">결과</label>
            </div>
        </div>            
        <div class="row">
            <div class="input-field col s12">
                <input disabled value="<? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?>" type="text" class="validate">
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
                <input disabled value="시간초과" type="text" class="validate">
                <label for="no">실패사유</label>
            </div>
        </div>                
        <div class="row">
            <div class="input-field col s12 center-align">
                <a href="/mypage/purchase" class="waves-effect waves-light btn modal-trigger">확인</a>
            </div>
        </div>
    </div>
</div>