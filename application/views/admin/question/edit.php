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
                    <h6>답안1</h6>
                    <textarea id="editor3-1" name="question_content_answer1"><? if ( isset($row['question_content_answer1']) ) { echo $row['question_content_answer1']; } else { echo set_value('question_content_answer1'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3-1', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 100
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
                                if ( isset($response['error']['validation']['question_content_answer1']) ) {
                                        echo $response['error']['validation']['question_content_answer1'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
                
                <div class="input-field col s12">
                    <h6>답안2</h6>
                    <textarea id="editor3-2" name="question_content_answer2"><? if ( isset($row['question_content_answer2']) ) { echo $row['question_content_answer2']; } else { echo set_value('question_content_answer2'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3-2', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 100
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
                                if ( isset($response['error']['validation']['question_content_answer2']) ) {
                                        echo $response['error']['validation']['question_content_answer2'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
                
                <div class="input-field col s12">
                    <h6>답안3</h6>
                    <textarea id="editor3-3" name="question_content_answer3"><? if ( isset($row['question_content_answer3']) ) { echo $row['question_content_answer3']; } else { echo set_value('question_content_answer3'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3-3', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 100
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
                                if ( isset($response['error']['validation']['question_content_answer3']) ) {
                                        echo $response['error']['validation']['question_content_answer3'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
                
                <div class="input-field col s12">
                    <h6>답안4</h6>
                    <textarea id="editor3-4" name="question_content_answer4"><? if ( isset($row['question_content_answer4']) ) { echo $row['question_content_answer4']; } else { echo set_value('question_content_answer4'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3-4', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 100
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
                                if ( isset($response['error']['validation']['question_content_answer4']) ) {
                                        echo $response['error']['validation']['question_content_answer4'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>
                
                <div class="input-field col s12">
                    <h6>답안5</h6>
                    <textarea id="editor3-5" name="question_content_answer5"><? if ( isset($row['question_content_answer5']) ) { echo $row['question_content_answer5']; } else { echo set_value('question_content_answer5'); }; ?></textarea>
                    <script>
                    CKEDITOR.replace( 'editor3-5', {
                        extraPlugins: 'mathjax',
                        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                        height: 100
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
                                if ( isset($response['error']['validation']['question_content_answer5']) ) {
                                        echo $response['error']['validation']['question_content_answer5'];
                                };
                            };
                        };
                        ?>                                         
                    </p>    
                </div>

                <div class="input-field col s12">
                    <input type="text" class="validate" name="question_content_answer" value="<? if ( isset($row['question_content_answer']) ) { echo $row['question_content_answer']; } else { echo set_value('question_content_answer'); }; ?>">
                    <label for="no">정답</label>
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
                    <!-- Modal Trigger -->
                    <a class="waves-effect waves-light btn modal-trigger right" href="#modal1">적용</a>

                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>수정 검토</h4>
                            <p>문제 정보를 변경하시겠습니까?</p>
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