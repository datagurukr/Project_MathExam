<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
?>
<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="<? if ( isset($row['post_id']) ) { echo $row['post_id']; } else { echo '-'; }; ?>" type="text" class="validate">
                    <label for="no">문의번호</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="<? if ( isset($row['user_name']) ) { echo $row['user_name']; } else { echo '-'; }; ?>" type="text" class="validate">
                    <label for="no">작성자</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="2017-05-21" type="text" class="validate">
                    <label for="no">작성일</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input disabled value="<? if ( isset($row['post_content_title']) ) { echo $row['post_content_title']; } else { echo '-'; }; ?>" type="text" class="validate">
                    <label for="no">제목</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <div><? if ( isset($row['post_content_article']) ) { echo $row['post_content_article']; } else { echo '-'; }; ?></div>
                    <!--<textarea disabled id="textarea1" class="materialize-textarea"></textarea>-->
                    <label for="textarea1">내용</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>답글</h6>
                    <textarea id="editor1" name="post_content_reply"><? if ( isset($row['post_content_reply']) ) { echo $row['post_content_reply']; } else { echo set_value('post_content_reply'); }; ?></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            extraPlugins: 'mathjax',
                            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                            height: 100
                        } );

                        if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                            document.getElementById( 'ie8-warning' ).className = 'tip alert';
                        }
                    </script>     

                    <?
                    // validation
                    if ( isset($response) ) {
                        if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                            if ( isset($response['error']['validation']['post_content_reply']) ) {
                                ?>
                                    <p class="light red-text">
                                    <? echo $response['error']['validation']['post_content_reply']; ?>
                                    </p>                                                                
                                <?
                            };
                        };
                    };
                    ?>                     
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">                    
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger right" href="#modal1">적용</a>

                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>수정 검토</h4>
                            <p>답변을 하시겠습니까?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-close waves-effect waves-red btn-flat">최소</button>
                            <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat ">승인</button>
                        </div>
                    </div>                    
                </div>
                <div class="input-field col s6">
                    <?
                    $referer = @$_SERVER['HTTP_REFERER'];
                    if ( isset($_GET['referer']) ) {
                        $referer = $_GET['referer'];
                    };
                    ?>
                    <button type="button" class="waves-effect waves-light btn left" onclick="location.replace('<? echo $referer; ?>');">취소</button>
                    
                </div>
            </div>
        </form>
    </div>
</div>