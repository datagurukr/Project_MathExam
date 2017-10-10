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
                    <input value="<? if ( isset($row['post_content_title']) ) { echo $row['post_content_title']; }; ?>" type="text" name="post_content_title" class="validate">
                    <label for="no">제목</label>
                </div>
                <?
                // validation
                if ( isset($response) ) {
                    if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                        if ( isset($response['error']['validation']['post_content_title']) ) {
                            ?>
                                <p class="light red-text">
                                <? echo $response['error']['validation']['post_content_title']; ?>
                                </p>                                                                
                            <?
                        };
                    };
                };
                ?>                 
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>본문</h6>
                    <textarea id="editor1" name="post_content_article"><? if ( isset($row['post_content_article']) ) { echo $row['post_content_article']; } else { echo set_value('post_content_article'); }; ?></textarea>
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
                            if ( isset($response['error']['validation']['post_content_article']) ) {
                                ?>
                                    <p class="light red-text">
                                    <? echo $response['error']['validation']['post_content_article']; ?>
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
                            <h4>공지사항 검토</h4>
                            <p>공지사항을 작성 하시겠습니까?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="modal-close waves-effect waves-red btn-flat">취소</button>
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