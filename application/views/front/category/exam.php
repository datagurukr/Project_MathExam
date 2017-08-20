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
            <div class="col s12">
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
    <p class="flow-text">
        <? echo $row['exam_description']; ?>
    </p>
</div>
<div class="divider"></div>
<?
if ( $question_out ) {
    foreach ( $question_out as $out_row ) {
        ?>
<div class="section">
    <p class="flow-text">
        <!--ckEdit 영역_문제보기(이미지, 텍스트, 링크)-->
        <? echo $out_row['question_content_title']; ?>
    </p>
</div>
<div class="divider"></div>
<div class="section">
    <p class="flow-text">
        <!--ckEdit 영역_보기-->
        <? echo $out_row['question_content_article']; ?>        
    </p>
</div>
<div class="divider"></div>
<div class="section">
    <p class="flow-text">
        <!--ckEdit 영역_답안-->
        <? echo $out_row['question_content_answer']; ?>        
    </p>
</div>
<div class="divider"></div>
<div class="section">
    <p class="flow-text">
        <!--ckEdit 영역_해설-->
        <? echo $out_row['question_content_explanation']; ?>                
    </p>
</div>
        <?
    };
};
?>