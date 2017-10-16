<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>
                        <?
                        if ( isset($response['data']['exam_out'][0]['exam_name']) ) { echo $response['data']['exam_out'][0]['exam_name']; };
                        ?>
                    </h4>
                    <table class="striped centered">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>문제</th>
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
                                        $question_content_title = strip_tags($row['question_content_title']);
                                        ?>
                            <tr>
                                <td>
                                    <?
                                        echo $row['question_num'];
                                    ?>                                    
                                </td>
                                <td class="center-align" style="max-width:100px">   
                                    <a href="/admin/question/<? echo $row['exam_id']; ?>/edit/<? echo $row['question_id']; ?>?referer=/admin/question?p=<? echo $p; ?>" class="tooltipped truncate" data-position="bottom" data-delay="50" data-tooltip="<? echo $question_content_title; ?>">
                                        <? echo $question_content_title; ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="red-text modal-trigger" href="#modal<? echo $row['question_id']; ?>">삭제</a>
                                    <!-- Modal Structure -->
                                    <div id="modal<? echo $row['question_id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <h4>문제 삭제</h4>
                                            <p>문제를 삭제하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="modal-close waves-effect waves-red btn-flat">취소</a>
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat" onclick="location.href='/admin/question/<? echo $row['question_id']; ?>/delete?referer=/admin/question/<? echo $row['exam_id']; ?>?p=<? echo $p; ?>'">승인</a>
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
                    <a href="/admin/question/<? echo $exam_id; ?>/edit?referer=/admin/question?p=<? echo $p; ?>" class="waves-effect waves-light btn">생성</a>
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