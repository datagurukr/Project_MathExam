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
            echo '수정 했습니다.';
        } else {
            echo '수정에 실패했습니다.';            
        };
    };
    ?>
    
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="col s12">
                    <div class="card grey lighten-5">
                        <div class="card-content">
                            <span class="card-title">마이페이지</span>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input disabled value="<? echo $user_out['user_email']; ?>" id="disabled" type="text" class="validate">
                                    <label for="disabled">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="first_name" name="user_name" type="text" value="<? echo $user_out['user_name']; ?>" class="validate">
                                    <label for="first_name">이름</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="user_gender">
                                        <option value="" disabled <? if ( $user_out['user_gender'] == 0 ) { echo 'selected'; } ?>>선택</option>
                                        <option value="1" <? if ( $user_out['user_gender'] == 1 ) { echo 'selected'; } ?>>남</option>
                                        <option value="2" <? if ( $user_out['user_gender'] == 2 ) { echo 'selected'; } ?>>여</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="생년월일" name="user_birthday" type="text" value="<? echo $user_out['user_birthday']; ?>" class="datepicker">
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="textarea1" name="user_introduction" class="materialize-textarea"><? echo $user_out['user_introduction']; ?></textarea>
                                    <label for="textarea1">자기소개</label>
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
                              			<?
																		// validation
																		if ( isset($response) ) {
																				if ( $response['status'] == 400 || $response['status'] == 200 ) {
																						if ( isset($response['error']['validation']['user_pass_re']) ) {
																								echo $response['error']['validation']['user_pass_re'];
																						};
																				};
																		};
																		?>  
															</div>                                
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <button type="submit" class="waves-effect waves-light btn">적용</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
<script>
  $('.datepicker').pickadate({
            formatSubmit: 'yyyy-mm-dd',
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false // Close upon selecting a date,
        });
</script>