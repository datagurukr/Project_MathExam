<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>챕터</h4>
                    <table class="striped centered">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>코스</th>
                                <th>서브코스</th>
                                <th>챕터</th>
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
                                <td>
                                    <?
                                        echo $row['unit_num'];
                                    ?>
                                </td>
                                <td>
                                    <?
                                    if ( 0 < strlen(trim($row['category_name'])) ) {
                                        echo $row['category_name'];
                                    } else { 
                                        echo '-'; 
                                    }; 
                                    ?>                                                                             
                                </td>
                                <td>
                                    <?
                                    if ( 0 < strlen(trim($row['subject_name'])) ) {
                                        echo $row['subject_name'];
                                    } else { 
                                        echo '-'; 
                                    }; 
                                    ?>                                                                             
                                </td>
                                <td>
                                    <a href="/admin/unit/edit/<? echo $row['unit_id']; ?>">
                                        <?
                                        if ( 0 < strlen(trim($row['unit_name'])) ) {
                                            echo $row['unit_name'];
                                        } else { 
                                            echo '-'; 
                                        }; 
                                        ?>                                                                             
                                    </a>
                                </td>
                                <td>
                                    
                                    <a class="red-text modal-trigger" href="#modal<? echo $row['unit_id']; ?>">삭제</a>
                                    <!-- Modal Structure -->
                                    <div id="modal<? echo $row['unit_id']; ?>" class="modal">
                                        <div class="modal-content">
                                            <h4>챕터 삭제</h4>
                                            <p>하위 메뉴들도 함께 삭제됩니다.<br> 삭제하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="modal-close waves-effect waves-red btn-flat">최소</a>
                                            <a class="modal-action modal-close waves-effect waves-green btn-flat" onclick="location.href='/admin/unit/<? echo $row['unit_id']; ?>/delete?referer=/admin/unit?p=<? echo $p; ?>'">승인</a>
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
                    <a href="/admin/unit/edit" class="waves-effect waves-light btn">생성</a>
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