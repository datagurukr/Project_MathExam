<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>Q&A</h4>
                    <table class="striped centered">
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
                                    <a href="/admin/qna/edit/<? echo $row['post_id']; ?>">
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
                                    <a class="red-text modal-trigger" href="#modal<? echo $row['post_id']; ?>">삭제</a>
                                    <!-- Modal Structure -->
                                    <div id="modal<? echo $row['post_id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <h4>Q&A 삭제</h4>
                                            <p>Q&A를 삭제하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="modal-close waves-effect waves-red btn-flat">최소</a>
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat" onclick="location.href='/admin/qna/<? echo $row['post_id']; ?>/delete?referer=/admin/qna?p=<? echo $p; ?>'">승인</a>
                                        </div>
                                    </div>                                    
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
                <div class="input-field col s12 right-align">
                    <a href="/admin/qna/edit" class="waves-effect waves-light btn">생성</a>
                </div>
            </div>
        </form>
    </div>
</div>