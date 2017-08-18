<?
$row = FALSE;
if ( $out ) {
    if ( is_array($out) ) {
        $row = $out[0];
    }
}

$day = -1;
if ( is_array($row) ) { 
    $date = $row['post_content'][0]['post_content_start_date']; 
    $todate = date("Y-m-d", time()); 
    $day = ( strtotime($date) - strtotime($todate) ) / 86400; 
    echo $day;
};
?>

<div class="col-xs-10 col-xs-offset-2 main">
  <h1 class="page-header"></h1>
<!--                <div class="well clearfix">-->
        <form class="form" method="post" enctype="application/x-www-form-urlencoded">
            <div class="form-group">
                <div class="text-right">
                <textarea class="form-control" name="post_content_text" rows="15"><? if ( is_array($row) ) { echo $row['post_content'][0]['post_content_text']; }; ?></textarea>
            </div>
                
            <div class="form-group">
                <div class="text-right">
                    <label class="text-right">
                        유형 :
                        <select name="post_status">
                            <option value="9">공지(9)</option>
                        </select>                        
                    </label><br>                    
                    <label class="text-right">
                        시작 날짜 : <input type="text" name="post_content_start_date" placeholder="yyyy-mm-dd" value="<? if ( is_array($row) ) { echo $row['post_content'][0]['post_content_start_date']; }; ?>">
                    </label><br>
                    <label class="text-right">
                        종료 날짜 : <input type="text" name="post_content_end_date" placeholder="yyyy-mm-dd" value="<? if ( is_array($row) ) { echo $row['post_content'][0]['post_content_end_date']; }; ?>">
                    </label>
                </div>
            </div>                
                
        </form>
<!--                </div>-->

    <div>
      <div class="text-center">
          <button class="btn btn-primary btn-lg">등록</button>
      </div>
    </div>
</div>