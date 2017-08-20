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
            <h4>문제 등록</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="question_num" value="<? if ( isset($row['question_num']) ) { echo $row['question_num']; } else { echo set_value('question_num'); }; ?>">
                    <label for="no">순번</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['question_num']) ) {
                                        echo $response['error']['validation']['question_num'];
                                };
                            };
                        };
                        ?>                     
                    </p>                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>문제</h6>
                    <textarea id="editor1" name="question_content_title"><? if ( isset($row['question_content_title']) ) { echo $row['question_content_title']; } else { echo set_value('question_content_title'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor1', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 150
                    } );

                    if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                        document.getElementById( 'ie8-warning' ).className = 'tip alert';
                    }
                    </script>
                    <p class="light red-text">                    
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['question_content_title']) ) {
                                        echo $response['error']['validation']['question_content_title'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>보기</h6>
                    <textarea id="editor2" name="question_content_article"><? if ( isset($row['question_content_article']) ) { echo $row['question_content_article']; } else { echo set_value('question_content_article'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor2', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 150
                    } );

                    if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                        document.getElementById( 'ie8-warning' ).className = 'tip alert';
                    }
                    </script>
                    <p class="light red-text">                    
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['question_content_article']) ) {
                                        echo $response['error']['validation']['question_content_article'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>답안</h6>
                    <textarea id="editor3" name="question_content_answer"><? if ( isset($row['question_content_answer']) ) { echo $row['question_content_answer']; } else { echo set_value('question_content_answer'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 150
                    } );

                    if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                        document.getElementById( 'ie8-warning' ).className = 'tip alert';
                    }
                    </script>
                    <p class="light red-text">                    
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['question_content_answer']) ) {
                                        echo $response['error']['validation']['question_content_answer'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>해설</h6>
                    <textarea id="editor4" name="question_content_explanation"><? if ( isset($row['question_content_explanation']) ) { echo $row['question_content_explanation']; } else { echo set_value('question_content_explanation'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor4', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 150
                    } );

                    if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                        document.getElementById( 'ie8-warning' ).className = 'tip alert';
                    }
                    </script>
                    <p class="light red-text">                    
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['question_content_explanation']) ) {
                                        echo $response['error']['validation']['question_content_explanation'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <button type="submit" class="waves-effect waves-light btn right">적용</a>
                </div>
                <div class="input-field col s6">
                    <?
                    $referer = @$_SERVER['HTTP_REFERER'];
                    if ( isset($_GET['referer']) ) {
                        $referer = $_GET['referer'];
                    };
                    ?>
                    <button type="button" class="waves-effect waves-light btn left" onclick="location.replace('<? echo $referer; ?>');">취소</a>
                    
                </div>
            </div>
        </form>
    </div>
</div>    