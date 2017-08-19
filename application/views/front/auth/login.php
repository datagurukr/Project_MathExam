<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="col s12">
                    <div class="card grey lighten-5">
                        <div class="card-content">
                            <span class="card-title">로그인</span>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="user_email" class="validate" value="<? echo set_value('user_email'); ?>">
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
                                    <input id="password" type="password" name="user_pass" class="validate">
                                    <label for="password">Password</label>
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
<!--
                            <div class="row">
                                <div class="col s12">
                                    <p>
                                        <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked"/>
                                        <label for="filled-in-box">자동 로그인</label>
                                    </p>
                                </div>
                            </div>
-->
                            <div class="row">
                                <div class="col s12">
                                    <button type="submit" class="waves-effect waves-light btn">로그인</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a href="/register">회원가입</a>
                            <a href="/recover">비밀번호 찾기</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>