<div class="section">
    <div class="row">
        <div class="row">
            <div class="col s12">
                <h4>구매 내역</h4>
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>서브코스</th>
                            <th>가격</th>
                            <th>구매일</th>
                            <th>환불</th>
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
                                <?
                                if ( 0 < strlen(trim($row['purchase_name'])) ) {
                                    echo $row['purchase_name'];
                                } else { 
                                    echo '-'; 
                                }; 
                                ?>                                                                             
                            </td>
                            <td>
                                <?
                                if ( 0 < strlen(trim($row['purchase_price'])) ) {
                                    echo number_format($row['purchase_price']).'원';
                                } else { 
                                    echo '-'; 
                                }; 
                                ?>                                                                                                             
                            </td>
                            <td>
                                <?
                                echo date("Y-m-d", strtotime($row['purchase_register_date']));
                                ?>
                            </td>
                            <td>
                                <?
                                if ( $row['purchase_state'] == 1 ) {
                                    ?>
                                <a class="red-text modal-trigger" href="#modal1">환불요청</a>
                                <!-- Modal Structure -->
                                <div id="modal1" class="modal">
                                    <form action="/purchase/refund" method="post" enctype="application/x-www-form-urlencoded">
                                        <input type="hidden" name="purchase_id" value="<? echo $row['purchase_id']; ?>">
                                        <div class="modal-content">
                                            <h4>환불 신청</h4>
                                            <p>환불을 신청하시겠습니까?</p>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <textarea id="reason1" class="materialize-textarea" name="purchase_refund_reason"></textarea>
                                                    <label for="textarea1">환불 사유</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="modal-close waves-effect waves-red btn-flat">취소</button>
                                            <button type="button" class="waves-effect waves-green btn-flat" onclick="if(!$('#reason1').val()){alert('사유를 입력하세요.');}else{ submit() }">승인</button>
                                        </div>
                                    </form>
                                </div>
                                    <?
                                } elseif ( $row['purchase_state'] == 2 ) {
                                    ?>
                                <span>환불대기</span>                                
                                    <?
                                } elseif ( $row['purchase_state'] == 3 ) {                                    
                                    ?>
                                <span>환불완료</span>                                
                                    <?                                    
                                }
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