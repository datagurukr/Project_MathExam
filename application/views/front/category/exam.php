<?
$row = FALSE;
$question_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
        if ( $response['data']['question_out'] ) {
            $question_out = $response['data']['question_out'];                    
        };
    };
};
if ( !$row ) {
    show_404();
}
?>
<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12 truncate">
                <a href="/category/<? echo $row['category_id']; ?>" class="breadcrumb">
                    <? echo $row['category_name']; ?>
                </a>
                <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>" class="breadcrumb">
                    <? echo $row['subject_name']; ?>
                </a>                
                <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>/<? echo $row['unit_id']; ?>" class="breadcrumb">
                    <? echo $row['unit_name']; ?>
                </a>                                
                <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>/<? echo $row['unit_id']; ?>/<? echo $row['exam_id']; ?>" class="breadcrumb">
                    <? echo $row['exam_name']; ?>
                </a>                                                
            </div>
        </div>
    </nav>
</div>
<div class="section">
        <? echo $row['exam_description']; ?>
</div>

<?
if ( $question_out ) {
    foreach ( $question_out as $out_row ) {
        ?>
        <div class="divider"></div>
        <div class="section">
            <!--ckEdit 영역_문제보기(이미지, 텍스트, 링크)-->
            <? echo $out_row['question_content_title']; ?>

            <!--ckEdit 영역_보기-->
            <? echo $out_row['question_content_article']; ?>        

            <!--ckEdit 영역_답안-->
            <p>
              <input type="checkbox" class="filled-in modal-trigger" id="filled-in-box" checked="checked" href="#modal1"/>
              <label for="filled-in-box">
                <? echo $out_row['question_content_answer']; ?>
              </label>
            </p>
            <!-- Modal Trigger -->

            <!-- Modal Structure -->
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>정답 체크</h4>
                    <p>정답입니다.</p>
<!--                <p>오답입니다. 다시 풀어보세요^^</p>    -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-close waves-effect waves-red btn-flat">확인</button>
                </div>
            </div>
                    
            <!--ckEdit 영역_해설-->
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">priority_high</i>해설
                  </div>
                  <div class="collapsible-body">
                      <span>
                        <? echo $out_row['question_content_explanation']; ?>
                      </span>
                  </div>
                </li>

              </ul>           
        </div>
        <?
    };
};
?>