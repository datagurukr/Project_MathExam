<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
if ( !$row ) {
    show_404();
}
?>
<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>회원정보(상세)</h4>
                        <table class="">
                        <tbody>
                            <tr>
                                <th>이름</th>
                                <td>
                                <? 
                                if ( 0 < strlen(trim($row['user_name'])) ) {
                                    echo $row['user_name'];
                                } else { 
                                    echo '입력안함'; 
                                }; 
                                ?>                                    
                                </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>
                                <?
                                if ( 0 < strlen(trim($row['user_email'])) ) {
                                    echo $row['user_email'];
                                } else { 
                                    echo '입력안함'; 
                                }; 
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <th>성별</th>
                                <td>
                                    <?
                                    if ( $row['user_gender'] == 0 ) {
                                        echo '입력안함';
                                    } elseif ( $row['user_gender'] == 1 ) { 
                                        echo '남';
                                    } elseif ( $row['user_gender'] == 2 ) {                                         
                                        echo '여'; 
                                    }; 
                                    ?>                                                                        
                                </td>
                            </tr>
                            <tr>
                                <th>생년월일</th>
                                <td>
                                    <?
                                    if ( $row['user_birthday'] != '0000-00-00' ) {
                                        echo $row['user_birthday'];
                                    } else { 
                                        echo '입력안함'; 
                                    }; 
                                    ?>                                    
                                </td>
                            </tr>
                            <tr>
                                <th>가입일</th>
                                <td>
                                    <?
                                    echo date("Y-m-d", strtotime($row['user_register_date']));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>자기소개</th>
                                <td>
                                <? 
                                if ( 0 < strlen(trim($row['user_introduction'])) ) {
                                    echo $row['user_introduction'];
                                } else { 
                                    echo '입력안함'; 
                                }; 
                                ?>                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 center-align">
                    <button type="button" class="waves-effect waves-light btn" onclick="history.go(-1);">확인</a>
                </div>
            </div>
        </form>
    </div>
</div>