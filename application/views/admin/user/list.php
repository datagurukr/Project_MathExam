<div class="section">
    <div class="row">
        <form class="col s12" method="get" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="col s12">
                    <h4>회원정보</h4>
                    <table class="responsive-table striped centered">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>유저명</th>
                                <th>Email</th>
                                <th>성별</th>
                                <th>생년월일</th>
                                <th>가입일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            if ( $response['status'] == 200 ) {
                                if ( 0 < $response['data']['count'] ) {
                                    $num = $response['data']['out_cnt'] - $p; 
                                    foreach ( $response['data']['out'] as $row ) {
                                        ?>
                            <tr>
                                <td><? echo $num; $num--; ?></td>
                                <td>
                                    <a href="/admin/user/<? echo $row['user_id']; ?>">
                                        <? 
                                        if ( 0 < strlen(trim($row['user_name'])) ) {
                                            echo $row['user_name'];
                                        } else { 
                                            echo '-'; 
                                        }; 
                                        ?>
                                    </a>
                                </td>
                                <td>
                                    <?
                                    if ( 0 < strlen(trim($row['user_email'])) ) {
                                        echo $row['user_email'];
                                    } else { 
                                        echo '-'; 
                                    }; 
                                    ?>                                    
                                </td>
                                <td>
                                    <?
                                    if ( $row['user_gender'] == 0 ) {
                                        echo '-';
                                    } elseif ( $row['user_gender'] == 1 ) { 
                                        echo '남';
                                    } elseif ( $row['user_gender'] == 2 ) {                                         
                                        echo '여'; 
                                    }; 
                                    ?>                                                                        
                                </td>
                                <td>
                                    <?
                                    if ( $row['user_birthday'] != '0000-00-00' ) {
                                        echo $row['user_birthday'];
                                    } else { 
                                        echo '-'; 
                                    }; 
                                    ?>                                    
                                </td>
                                <td>
                                    <?
                                    echo date("Y-m-d", strtotime($row['user_register_date']));
                                    ?>
                                </td>
                            </tr>
                                        <?
                                    };
                                };
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <select name="target">
                        <option value="" <? if ( $target == '' ) { echo 'selected'; }; ?> disabled selected>전체</option>
                        <option value="name" <? if ( $target == 'name' ) { echo 'selected'; }; ?>>이름</option>
                        <option value="email" <? if ( $target == 'email' ) { echo 'selected'; }; ?>>이메일</option>
                    </select>
                </div>
                <div class="input-field col s6">
                    <input id="" type="text" class="validate" name="q" value="<? echo $q; ?>">
                    <label for="keyword">검색어를 입력하세요.</label>
                </div>
                <div class="input-field col s4 right-align">
                    <button type="submit" class="waves-effect waves-light btn">검색</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <? echo $this->pagination->create_links(); ?>
        <!--
        <ul class="pagination center">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
        -->
    </div>
</div>
<script>
$(document).ready(function() {
    $('select').material_select();
});
</script>