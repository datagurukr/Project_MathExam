<?
$row = FALSE;
if ( $out ) {
    if ( is_array($out) ) {
        $row = $out[0];
    }
}

$day = -1;
if ( is_array($row) ) { 
    $date = $row['post_content'][0]['post_content_end_date']; 
    $todate = date("Y-m-d", time()); 
    $day = floor(( strtotime($date) - strtotime($todate) ) / 86400); 
    echo $day;
};
?>

<div class="col-xs-10 col-xs-offset-2 main">
  <h1 class="page-header"><? if ( 0 <= $day ) { echo '진행중'; } else { echo '종료'; }; ?></h1>
<!--                <div class="well clearfix">-->
        <form class="form">
                                <div class="form-group">
                                    <div class="text-right">
                                        <label class="text-right"><? if ( is_array($row) ) { echo $row['post_content'][0]['post_content_end_date']; }; ?> 까지</label><br>
                                        <label class="text-right"><? echo $day; ?>일 남음</label>
                                    </div>
                                    <textarea class="form-control" rows="15" readonly><? if ( is_array($row) ) { echo $row['post_content'][0]['post_content_text']; }; ?></textarea>
                                </div>
        </form>
<!--                </div>-->

    <div>
      <div class="text-center">
          <a href="/admin/notice/edit" class="btn btn-warning btn-lg">수정</a>
          <a href="" class="btn btn-danger btn-lg">삭제</a>
      </div>
    </div>
</div>