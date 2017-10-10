<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/notice" class="breadcrumb">공지사항</a>
            </div>
        </div>
    </nav>		
</div>
<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <table class="responsive-table striped centered">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>작성자</th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            if ( $response['status'] == 200 ) {
                                if ( 0 < $response['data']['count'] ) {
                                    $temp = ((($p * 2) * 10) - 20 ); 
                                    $num = $response['data']['out_cnt'] - $temp; 
                                    foreach ( $response['data']['out'] as $row ) {
                                        ?>                            
                            <tr>
                                <td><? echo $num; $num--; ?></td>
                                <td>
                                    <a href="/notice/detail/<? echo $row['post_id']; ?>">
                                        <?
                                        if ( 0 < strlen(trim($row['post_content_title'])) ) {
                                            echo $row['post_content_title'];
                                        } else { 
                                            echo '-'; 
                                        }; 
                                        ?>                                                                             
                                    </a>
                                </td>
                                <td>
                                    <?
                                    if ( 0 < strlen(trim($row['user_name'])) ) {
                                        echo $row['user_name'];
                                    } else { 
                                        echo '-'; 
                                    }; 
                                    ?>                                                                             
                                </td>
                                <td>
                                    <?
                                    echo date("Y-m-d", strtotime($row['post_register_date']));
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
                    <button type="submit" class="waves-effect waves-light btn validate">검색</button>
                </div>
            </div>
        </form>
    </div>
</div>