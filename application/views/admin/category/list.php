<div class="section">
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4>코스</h4>
                    <table class="striped centered">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>코스명</th>
                                <th>삭제</th>
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
                                <td>
                                    <?
                                        echo $row['category_num'];
                                    ?>
                                </td>
                                <td>
                                    <a href="/admin/category/edit/<? echo $row['category_id']; ?>">
                                        <?
                                        if ( 0 < strlen(trim($row['category_name'])) ) {
                                            echo $row['category_name'];
                                        } else { 
                                            echo '-'; 
                                        }; 
                                        ?>                                         
                                    </a>
                                </td>
                                <td>
                                    <a href="#" class="red-text" onclick="if (confirm('삭제하시겠습니까?') == true){ location.href='/admin/category/<? echo $row['category_id']; ?>/delete?referer=/admin/category?p=<? echo $p; ?>' }">삭제</a>
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
                    <a href="/admin/category/edit" class="waves-effect waves-light btn">생성</a>
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