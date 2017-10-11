<!--https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML-->
<script type="text/x-mathjax-config">
MathJax.Hub.Config({
    tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
});
</script>
<script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML-full"></script>
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
    <?
    $str = $row['exam_description'];
    echo $str;
    ?>
</div>

<?
if ( $question_out ) {
    foreach ( $question_out as $out_row ) {
        ?>
        <div class="divider"></div>
        <div class="section question-section cke_reset">
            <!--ckEdit 영역_문제보기(이미지, 텍스트, 링크)-->
            <? echo $out_row['question_content_title']; ?>

            <!--ckEdit 영역_보기-->
            <? echo $out_row['question_content_article']; ?>        

            <!--ckEdit 영역_답안-->
            <?
            if ( 0 < strlen($out_row['question_content_answer1']) ) {
                ?>
            <p>
                 <input type="checkbox" class="answer_checkbox" data-toast="<? if ( $out_row['question_content_answer'] == 1 ) { echo '정답입니다.'; } else { echo '오답입니다. 다시 풀어보세요^^'; }; ?>" id="answer_checkbox_<? echo $out_row['question_id']?>_1"/>
                <label for="answer_checkbox_<? echo $out_row['question_id']?>_1">
                    1번 답안
                </label>
                <div><? echo $out_row['question_content_answer1']; ?></div>
            </p>
                <?
            }
            ?>
            <?
            if ( 0 < strlen($out_row['question_content_answer2']) ) {
                ?>
            <p>
              <input type="checkbox" class="answer_checkbox" data-toast="<? if ( $out_row['question_content_answer'] == 2 ) { echo '정답입니다.'; } else { echo '오답입니다. 다시 풀어보세요^^'; }; ?>" id="answer_checkbox_<? echo $out_row['question_id']?>_2"/>
              <label for="answer_checkbox_<? echo $out_row['question_id']?>_2">
                    2번 답안
                </label>
                <div><? echo $out_row['question_content_answer2']; ?></div>
            </p>
                <?
            }
            ?>
            <?
            if ( 0 < strlen($out_row['question_content_answer3']) ) {
                ?>
            <p>
              <input type="checkbox" class="answer_checkbox" data-toast="<? if ( $out_row['question_content_answer'] == 3 ) { echo '정답입니다.'; } else { echo '오답입니다. 다시 풀어보세요^^'; }; ?>" id="answer_checkbox_<? echo $out_row['question_id']?>_3"/>
              <label for="answer_checkbox_<? echo $out_row['question_id']?>_3">
                    3번 답안
                </label>
                <div><? echo $out_row['question_content_answer3']; ?></div>
            </p>
                <?
            }
            ?>
            <?
            if ( 0 < strlen($out_row['question_content_answer4']) ) {
                ?>
            <p>
              <input type="checkbox" class="answer_checkbox" data-toast="<? if ( $out_row['question_content_answer'] == 4 ) { echo '정답입니다.'; } else { echo '오답입니다. 다시 풀어보세요^^'; }; ?>" id="answer_checkbox_<? echo $out_row['question_id']?>_4"/>
              <label for="answer_checkbox_<? echo $out_row['question_id']?>_4">
                    4번 답안
                </label>
                <div><? echo $out_row['question_content_answer4']; ?></div>
            </p>
                <?
            }
            ?>
            <?
            if ( 0 < strlen($out_row['question_content_answer5']) ) {
                ?>
            <p>
              <input type="checkbox" class="answer_checkbox" data-toast="<? if ( $out_row['question_content_answer'] == 5 ) { echo '정답입니다.'; } else { echo '오답입니다. 다시 풀어보세요^^'; }; ?>" id="answer_checkbox_<? echo $out_row['question_id']?>_5"/>
              <label for="answer_checkbox_<? echo $out_row['question_id']?>_5">
                    5번 답안
                </label>
                <div><? echo $out_row['question_content_answer5']; ?></div>
            </p>
                <?
            }
            ?>            
            
            <!--
            <p>
              <input type="checkbox" class="filled-in modal-trigger" id="filled-in-box" checked="checked" href="#modal1"/>
              <label for="filled-in-box">
                <? echo $out_row['question_content_answer']; ?>
              </label>
            </p>
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <h4>정답 체크</h4>
                    <p>정답입니다.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-close waves-effect waves-red btn-flat">확인</button>
                </div>
            </div>
            -->
            
            <!--ckEdit 영역_해설-->
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header">
                      <i class="material-icons">priority_high</i>해설
                  </div>
                  <div class="collapsible-body">
                      <span>
                        정답 : <? echo $out_row['question_content_answer']; ?>번
                      </span>                      
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
<div id="exam-modal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>Modal Header</h4>
        <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">닫기</a>
    </div>
</div>