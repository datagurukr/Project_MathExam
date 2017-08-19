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
                                <div class="input-field col s12">
                                    <input id="password" name="user_pass_re" type="password" class="validate">
                                    <label for="password">Re-Password</label>
																		<p class="light red-text">
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
																		</p>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col s12">
																	  <!-- Modal Trigger -->
																		<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

																		<!-- Modal Structure -->
																		<div id="modal1" class="modal">
																			<div class="modal-content">
																				<h4>Modal Header</h4>
																				<p>A bunch of text</p>
																			</div>
																			<div class="modal-footer">
																				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
																			<button type="submit" class="waves-effect waves-light btn">회원가입</button>

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