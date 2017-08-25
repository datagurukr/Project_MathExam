<?
if ( $response['status'] == 200 || $response['status'] == 400 ) {
    if ( isset($response['data']['out']) ) {
        $out = $response['data']['out'];
        $user_out = $out[0];
    } else {
        show_404();            
    };
} else {
    show_404();    
}
?>
<div class="section">
    
    <?
    if ( isset($response['update']) ) {
        if ( $response['update'] ) {
            //echo '수정 했습니다.';
        } else {
            //echo '수정에 실패했습니다.';            
        };
    };
    ?>
    
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="col s12">
                    <div class="card grey lighten-5">
                        <div class="card-content">
                            <span class="card-title">비밀번호 변경</span>
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="new_password" name="user_new_pass" type="password" class="validate">
                                    <label for="new_password">New Password</label>
                                    <p class="light red-text">
                                    <?
                                    // validation
                                    if ( isset($response) ) {
                                            if ( $response['status'] == 400 || $response['status'] == 200 ) {
                                                    if ( isset($response['error']['validation']['user_new_pass']) ) {
                                                            echo $response['error']['validation']['user_new_pass'];
                                                    };
                                            };
                                    };
                                    ?>
                                    </p>                                    
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="new_password_re" name="user_new_pass_re" type="password" class="validate">
                                    <label for="new_password_re">New Re-Password</label>
                                    <p class="light red-text">
                                    <?
                                    // validation
                                    if ( isset($response) ) {
                                            if ( $response['status'] == 400 || $response['status'] == 200 ) {
                                                    if ( isset($response['error']['validation']['user_new_pass_re']) ) {
                                                            echo $response['error']['validation']['user_new_pass_re'];
                                                    };
                                            };
                                    };
                                    ?>
                                    </p>                                    
                                </div>                                
                            </div>
                            
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="user_pass" type="password" class="validate">
                                    <label for="password">Password</label>
                                    <p class="light red-text">
                                    <?
                                    // validation
                                    if ( isset($response) ) {
                                            if ( $response['status'] == 400 || $response['status'] == 200 ) {
                                                    if ( isset($response['error']['validation']['user_pass']) ) {
                                                            echo $response['error']['validation']['user_pass'];
                                                    };
                                            };
                                    };
                                    ?>
                                    </p>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <!-- Modal Trigger -->
                                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">적용</a>
                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <h4>프로필 수정</h4>
                                            <p>프로필을 수정하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="modal-action modal-close waves-effect waves-red btn-flat">취소</button>
                                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">승인</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>