<?
$row = FALSE;
$returnpolicy = '';
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
        $returnpolicy = $response['data']['returnpolicy'];
    };
};
?>
<div class="section">
    <div class="row">
        <form action="/Danal/Teledit/Mobile/Script/Ready.php" class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <input type="hidden" name="pay_user_id" value="<? if ( isset($session_id) ) { echo $session_id; } else { echo '0'; }; ?>">
            <input type="hidden" name="pay_user_email" value="<? if ( isset($session_email) ) { echo $session_email; } else { echo ''; }; ?>">            
            <input type="hidden" name="pay_subject_id" value="<? if ( isset($row['subject_id']) ) { echo $row['subject_id']; } else { echo '-'; }; ?>">     
            <input type="hidden" name="pay_subject_name" value="<? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?>">
            <input type="hidden" name="pay_subject_price" value="<? if ( isset($row['subject_price']) ) { echo $row['subject_price']; } else { echo '-'; }; ?>">
            
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
                <div class="input-field col s12">
                    <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                      <div class="collapsible-header active"><i class="material-icons">info_outline</i>상품설명</div>
                      <div class="collapsible-body"><span><? if ( isset($row['subject_description']) ) { echo $row['subject_description']; } else { echo '-'; }; ?></span></div>
                    </li>
                    <li>
                      <div class="collapsible-header"><i class="material-icons">payment</i>환불정책</div>
                      <div class="collapsible-body"><span><? if ( isset($returnpolicy) ) { echo $returnpolicy; } else { echo '-'; }; ?></span></div>
                    </li>
                  </ul>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 right-align">                    
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">구매</a>

                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>상품구매</h4>
                            <p><b><? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo '-'; }; ?></b>을 <b><? if ( isset($row['subject_price']) ) { echo number_format($row['subject_price']).'원'; } else { echo '-'; }; ?></b>에 구매 하시겠습니까?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-close waves-effect waves-red btn-flat">취소</button>
                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">승인</button>
                        </div>
                    </div>                    
                </div>
                <div class="input-field col s6 center-left">
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