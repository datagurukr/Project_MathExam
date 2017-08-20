<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/qna" class="breadcrumb">Q&A</a>
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
                                <th>답변유무</th>
                                <th>삭제</th>
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
                                    <a href="/qna/detail/<? echo $row['post_id']; ?>">
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
                                <td>
                                    <?
                                    if ( 0 < strlen(trim($row['post_content_reply'])) ) {
                                        echo 'Y';
                                    } else { 
                                        echo 'N'; 
                                    }; 
                                    ?>
                                </td>
                                <td>
                                    <?
                                    if ( $session_id == $row['user_id'] ) {
                                        ?>
                                    <a class="red-text modal-trigger" href="#modal<? echo $row['post_id']; ?>">삭제</a>
                                    <!-- Modal Structure -->
                                    <div id="modal<? echo $row['post_id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <h4>Q&A 삭제</h4>
                                            <p>Q&A를 삭제하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="modal-close waves-effect waves-red btn-flat">최소</a>
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat" onclick="location.href='/qna/<? echo $row['post_id']; ?>/delete?referer=/qna?p=<? echo $p; ?>'">승인</a>
                                        </div>
                                    </div>                                    
                                        <?
                                    };
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
                    <button type="submit" class="waves-effect waves-light btn">검색</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 right-align">
                    <a href="/qna/edit" class="waves-effect waves-teal btn">작성</a>
                </div>
            </div>
        </form>
    </div>
</div>