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
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="subject_id" value="<? if ( isset($row['subject_id']) ) { echo $row['subject_id']; } else { echo '-'; }; ?>">            
            <input type="hidden" name="subject_name" value="<? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?>">
            <input type="hidden" name="subject_price" value="<? if ( isset($row['subject_price']) ) { echo $row['subject_price']; } else { echo '-'; }; ?>">            
            
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="<? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?>" type="text" class="validate">
                    <label for="no">상품명</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="<? if ( isset($row['subject_price']) ) { echo number_format($row['subject_price']).'원'; } else { echo '-'; }; ?>" type="text" class="validate">
                    <label for="no">구매가격</label>
                </div>
            </div>
            <div class="row">
<<<<<<< HEAD
                <div class="input-field col s6 right-align">                    
=======
                <div class="input-field col s6 center-right">                    
>>>>>>> 9c74d75a9df7c1c75e0dbfff11ef3a064aa106ba
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">구매</a>

                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>상품구매</h4>
                            <p><b><? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?></b>을 <b><? if ( isset($row['subject_price']) ) { echo number_format($row['subject_price']).'원'; } else { echo '-'; }; ?></b>에 구매 하시겠습니까?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-close waves-effect waves-red btn-flat">최소</button>
                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">승인</button>
                        </div>
                    </div>                    
                </div>
<<<<<<< HEAD
                <div class="input-field col s6 left-align">
=======
                <div class="input-field col s6 center-left">
>>>>>>> 9c74d75a9df7c1c75e0dbfff11ef3a064aa106ba
                    <?
                    $referer = @$_SERVER['HTTP_REFERER'];
                    if ( isset($_GET['referer']) ) {
                        $referer = $_GET['referer'];
                    };
                    ?>
                    <button type="button" class="waves-effect waves-light btn" onclick="location.replace('<? echo $referer; ?>');">취소</button>
                    
                </div>
            </div>
        </form>
    </div>
</div>