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
  <h1 class="page-header">판매 승인</h1>
    <div class="well clearfix">
        <form class="form-inline" enctype="application/x-www-form-urlencoded">
            <div class="row">
            <div class="col-sm-9">
              <div class="form-group">
                  <select class="form-control" name="search_target">
                    <option value="user_name"<? if ( $search_target == 'user_name' ) { echo ' selected'; } ?>>이름</option>
                    <option value="user_tel"<? if ( $search_target == 'user_tel' ) { echo ' selected'; } ?>>전화 번호</option>
                    <option value="user_location"<? if ( $search_target == 'user_location' ) { echo ' selected'; } ?>>지역</option>
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
        $sort = $protocol.'://'.$_SERVER["HTTP_HOST"].'/admin/sales?';
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
            $sort_url = $sort."&p=".$_GET['p']."&order_target=user_name&order=".$order;
        } else {
            $sort_url = $sort."&order_target=user_name&order=".$order;
        };
        ?>                        
            <th><a href="<? echo $sort_url; ?>">이름<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>  
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=user_tel&order=".$order;
        } else {
            $sort_url = $sort."&order_target=user_tel&order=".$order;
        };
        ?>    
            <th><a href="<? echo $sort_url; ?>">전화번호<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>  
        <?
        if ( isset($_GET['p']) ) {
            $sort_url = $sort."&p=".$_GET['p']."&order_target=user_location&order=".$order;
        } else {
            $sort_url = $sort."&order_target=user_location&order=".$order;
        };
        ?>              
            <th><a href="<? echo $sort_url; ?>">지역<span class="glyphicon glyphicon-sort" aria-hidden="true"></span></a></th>  
            <th>수락</th>  
            <th>거절</th>  
        </tr>
      </thead>
      <tbody>
          
          <?
            if ( isset($out) ) {
                if ( $out ) {
                    foreach ( $out as $row ) {
                        ?>
        <tr>
          <td><? echo $row['user_name']; ?></td>
          <td><? echo $row['user_tel']; ?></td>
          <td><? echo $row['car_location']; ?></td>
          <td>
            <a href="/admin/sales/editor/<? echo $row['car_id']; ?>/approval" class="btn btn-primary btn-xs">수락</a>  
          </td>
          <td>
            <a href="/admin/sales/editor/<? echo $row['car_id']; ?>/refusal" class="btn btn-danger btn-xs">거절</a>  
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