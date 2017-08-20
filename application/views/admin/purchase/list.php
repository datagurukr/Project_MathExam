<div class="section">
    <div class="row">
        <div class="row">
            <div class="col s12">
                <h4>구매 내역</h4>
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>구매자</th>                            
                            <th>상품명</th>
                            <th>가격</th>
                            <th>구매일</th>
                            <th>환불사유</th>
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
                            <td class="center-align" style="max-width:50px">   
                                <?
                                if ( 0 < strlen(trim($row['purchase_refund_reason'])) ) {
                                    $purchase_refund_reason = $row['purchase_refund_reason'];
                                } else { 
                                    $purchase_refund_reason = '';
                                }; 
                                ?>                                                                                                                                             
                                <a class="tooltipped truncate" data-position="bottom" data-delay="50" data-tooltip="<? echo $purchase_refund_reason; ?>">
                                    <? echo $purchase_refund_reason; ?>
                                </a>
                            </td>
                            <td>
                                <?
                                if ( $row['purchase_state'] == 2 ) {
                                    ?>
                                <a class="red-text modal-trigger" href="#modal1">환불승인</a>
                                <!-- Modal Structure -->
                                <div id="modal1" class="modal">
                                    <form action="/purchase/refund/complete" method="post" enctype="application/x-www-form-urlencoded">
                                        <input type="hidden" name="purchase_id" value="<? echo $row['purchase_id']; ?>">
                                        <div class="modal-content">
                                            <h4>환불 승인</h4>
                                            <p>환불하시겠습니까?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="modal-close waves-effect waves-red btn-flat">최소</button>
                                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">승인</button>
                                        </div>
                                    </form>    
                                </div>
                                    <?
                                } elseif ( $row['purchase_state'] == 3 ) {
                                    ?>
                                <span>환불완료</span>
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