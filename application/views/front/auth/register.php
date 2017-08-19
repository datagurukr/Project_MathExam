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
                                </div>
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
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="user_pass" type="password" class="validate">
                                    <label for="password">Password</label>
                                </div>
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
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" name="user_pass_re" type="password" class="validate">
                                    <label for="password">Re-Password</label>
                                </div>
                                <?
                                // validation
                                if ( isset($response) ) {
                                    if ( $response['status'] == 400 ) {
                                        if ( isset($response['error']['validation']['user_pass_re']) ) {
                                            echo $response['error']['validation']['user_pass_re'];
                                        };
                                    };
                                };
                                ?>                                
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button class="waves-effect waves-light btn">회원가입</button>
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