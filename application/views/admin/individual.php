<?
$search_target = '';
$q = '';
if ( isset($_GET['search_target']) ) {
    $search_target = $_GET['search_target'];
};

if ( isset($_GET['q']) ) {
    $q = $_GET['q'];
};        
?>

<div class="col-xs-10 col-xs-offset-2 main">
  <h1 class="page-header">개인회원</h1>

    <div class="well clearfix">
        <form class="form-inline" enctype="application/x-www-form-urlencoded">
            <div class="row">
            <div class="col-sm-9">
              <div class="form-group">
                  <select class="form-control" name="search_target">
                    <option value="user_tel"<? if ( $search_target == 'user_tel' ) { echo ' selected'; } ?>>전화 번호</option>  
                    <option value="sales_complete_locaiton"<? if ( $search_target == 'sales_complete_locaiton' ) { echo ' selected'; } ?>>판매 완료 지역</option>                
                  </select>
              </div>
              <div class="form-group">
                  <input type="text" name="q" class="form-control" value="<? echo $q; ?>">
                  <button type="submit" class="btn btn-primary">검색</button>
              </div>
            </div>
            <div class="col-sm-3 text-right">
                <div class="form-group">
                  <div class="form-control">
                    <p class="text-info">
                        조회 : <? echo number_format($out_cnt); ?> 건
                    </p>
                  </div>
                </div>
            </div>
            </div>
        </form>
    </div>					
    <table class="table table table-bordered text-center">
      <thead>
        <tr class="active text-center">
            
        <?
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $sort = $protocol.'://'.$_SERVER["HTTP_HOST"].'/admin/individual?';
        $order = '';
        if ( isset($_GET['order']) ) {
            if ( $_GET['order'] == 'asc' ) {
                $order = 'desc';                
            } else {
                $order = 'asc';                
            }
        } else {
            $order = 'asc';
        };

        if ( isset($_GET['search_target']) ) {
            $sort = $sort.'&search_target='.$_GET['search_target'];
        };

        if ( isset($_GET['q']) ) {
            $sort = $sort.'&q='.$_GET['q'];
        };        

        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=user_tel&order=".$order;
        } else {
            $sort_url = $sort."&order_target=user_tel&order=".$order;
        };
        ?>
          <th><a href="<? echo $sort_url; ?>">전화번호<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>  
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=sales_registration_cnt&order=".$order;
        } else {
            $sort_url = $sort."&order_target=sales_registration_cnt&order=".$order;
        };
        ?>            
          <th><a href="<? echo $sort_url; ?>">판매등록횟수<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=tender_cnt&order=".$order;
        } else {
            $sort_url = $sort."&order_target=tender_cnt&order=".$order;
        };
        ?>              
          <th><a href="<? echo $sort_url; ?>">총입찰횟수<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=sales_complete_cnt&order=".$order;
        } else {
            $sort_url = $sort."&order_target=sales_complete_cnt&order=".$order;
        };
        ?>             
          <th><a href="<? echo $sort_url; ?>">판매완료차량<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=sales_complete_price&order=".$order;
        } else {
            $sort_url = $sort."&order_target=sales_complete_price&order=".$order;
        };
        ?>             
          <th><a href="<? echo $sort_url; ?>">판매완료가격<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=sales_complete_locaiton&order=".$order;
        } else {
            $sort_url = $sort."&order_target=sales_complete_locaiton&order=".$order;
        };
        ?>               
          <th><a href="<? echo $sort_url; ?>">판매완료지역<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=tender_now_cnt&order=".$order;
        } else {
            $sort_url = $sort."&order_target=tender_now_cnt&order=".$order;
        };
        ?>              
          <th><a href="<? echo $sort_url; ?>">현재입찰<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=tender_falsehood_cnt&order=".$order;
        } else {
            $sort_url = $sort."&order_target=tender_falsehood_cnt&order=".$order;
        };
        ?>             
          <th><a href="<? echo $sort_url; ?>">허위입찰<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>
          <th>탈퇴처리</th>
        </tr>
      </thead>
      <tbody>
          
          <?
            if ( isset($out) ) {
                if ( $out ) {
                    foreach ( $out as $row ) {
                        ?>
        <tr>
          <td><? echo $row['user_tel']; ?></td>
          <td><? echo $row['sales_registration_cnt']; ?></td>    
          <td><? echo $row['tender_cnt']; ?></td>
          <td><? echo $row['sales_complete_cnt']; ?></td>
          <td><? echo number_format($row['sales_complete_price']); ?>만원</td>
          <td><? echo $row['user_location']; ?></td>
          <td><? echo $row['tender_now_cnt']; ?>건</td>
          <td><? echo $row['tender_falsehood_cnt']; ?></td>
          <td>
            <a href="/admin/individual/editor/<? echo $row['user_id']; ?>/leave" class="btn btn-danger btn-xs">go</a>  
          </td>            
        </tr>          
                        <?
                    }
                }
            }
          ?>
          
      </tbody>
    </table>
    <div>
      <div class="text-center">
          <? echo $this->pagination->create_links(); ?>          
          <!--
          <ul class="pagination">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
         </ul>
         -->
      </div>
    </div>
</div>