<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="col s12">
                    <div class="card grey lighten-5">
                        <div class="card-content">
                            <span class="card-title">회원가입</span>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" name="user_email" type="email" class="validate" value="<? echo set_value('user_email'); ?>">
                                    <label for="email" data-error="wrong" data-success="right">Email</label>
                                    <p class="light red-text">
                                        <?
                                        // validation
                                        if ( isset($response) ) {
                                                if ( $response['status'] == 400 ) {
                                                        if ( isset($response['error']['validation']['user_email']) ) {
                                                                echo $response['error']['validation']['user_email'];
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
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="user_pass_re" type="password" class="validate">
                                    <label for="password">Re-Password</label>
                                    <p class="light red-text">
                                        <?
                                            // validation
                                            if ( isset($response) ) {
                                                    if ( $response['status'] == 400 ) {
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
                                    <a class="waves-effect waves-light btn modal-trigger" href="#modal1">회원가입</a>

                                    <!-- Modal Structure -->
                                    <div id="modal1" class="modal">
                                        <div class="modal-content">
                                            <h4>가입 승인</h4>
                                            <p>Just Think에 가입하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="modal-close waves-effect waves-red btn-flat">최소</button>
                                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">승인</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="/login">로그인</a>
                            <a href="/recover">비밀번호 찾기</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>