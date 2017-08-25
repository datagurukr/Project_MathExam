<?
$row = FALSE;
$unit_out = FALSE;
$subject_out = FALSE;
$category_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
if ( $response['data']['unit_out'] ) {
    $unit_out = $response['data']['unit_out'];                    
};
if ( $response['data']['subject_out'] ) {
    $subject_out = $response['data']['subject_out'];                    
};
if ( $response['data']['category_out'] ) {
    $category_out = $response['data']['category_out'];                    
};
?>
<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <h4>유닛(상세)</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="exam_num" value="<? if ( isset($row['exam_num']) ) { echo $row['exam_num']; } else { echo set_value('exam_num'); }; ?>">
                    <label for="no">순번</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['exam_num']) ) {
                                        echo $response['error']['validation']['exam_num'];
                                };
                            };
                        };
                        ?>                     
                    </p>                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="category_id">
                        <option value="" selected>선택</option>
                        <?
                        if ( $category_out ) {
                            foreach ( $category_out as $category_row ) {
                                $category_id = 0;
                                if ( isset($row['category_id']) ) { 
                                    $category_id = $row['category_id']; 
                                } else { 
                                    $category_id = set_value('category_id'); }
                                ;
                                ?>
                        <option value="<? echo $category_row['category_id']; ?>" <? if ( $category_row['category_id'] == $category_id ) { echo 'selected'; }; ?> ><? echo $category_row['category_name']; ?></option>
                                <?
                            };
                        };
                        ?>
                    </select>
                    <label>코스</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['category_id']) ) {
                                        echo $response['error']['validation']['category_id'];
                                };
                            };
                        };
                        ?>                     
                    </p>                                        
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="subject_id">
                        <option value="" selected>선택</option>
                        <?
                        if ( $subject_out ) {
                            foreach ( $subject_out as $subject_row ) {
                                $subject_id = 0;
                                if ( isset($row['subject_id']) ) { 
                                    $subject_id = $row['subject_id']; 
                                } else { 
                                    $subject_id = set_value('subject_id'); 
                                };
                                ?>
                        <option value="<? echo $subject_row['subject_id']; ?>" <? if ( $subject_row['subject_id'] == $subject_id ) { echo 'selected'; }; ?> ><? echo $subject_row['subject_name']; ?></option>
                                <?
                            };
                        };
                        ?>
                    </select>
                    <label>서브코스</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['subject_id']) ) {
                                        echo $response['error']['validation']['subject_id'];
                                };
                            };
                        };
                        ?>                     
                    </p>                                                            
                </div>
            </div>
            <div class="row">
                
                <div class="input-field col s12">
                    <select name="unit_id">
                        <option value="" selected>선택</option>
                        <?
                        if ( $unit_out ) {
                            foreach ( $unit_out as $unit_row ) {
                                $unit_id = 0;
                                if ( isset($row['unit_id']) ) { 
                                    $unit_id = $row['unit_id']; 
                                } else { 
                                    $unit_id = set_value('unit_id'); }
                                ;
                                ?>
                        <option value="<? echo $unit_row['unit_id']; ?>" <? if ( $unit_row['unit_id'] == $unit_id ) { echo 'selected'; }; ?> ><? echo $unit_row['unit_name']; ?></option>
                                <?
                            };
                        };
                        ?>
                    </select>
                    <label>챕터</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['unit_id']) ) {
                                        echo $response['error']['validation']['unit_id'];
                                };
                            };
                        };
                        ?>                     
                    </p>                                        
                </div>                
                
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="exam_name" value="<? if ( isset($row['exam_name']) ) { echo $row['exam_name']; } else { echo set_value('exam_name'); }; ?>">
                    <label for="course">유닛</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['exam_name']) ) {
                                        echo $response['error']['validation']['exam_name'];
                                };
                            };
                        };
                        ?>                     
                    </p>                                        
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <h6>유닛설명</h6>
                    <textarea id="editor1" name="exam_description"><? if ( isset($row['exam_description']) ) { echo $row['exam_description']; } else { echo set_value('exam_description'); }; ?></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            extraPlugins: 'mathjax',
                            filebrowserUploadUrl: '/api/upload/ckupload',
                            mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                            height: 300
                        } );

                        if ( CKEDITOR.env.ie && CKEDITOR.env.version == 8 ) {
                            document.getElementById( 'ie8-warning' ).className = 'tip alert';
                        }
                    </script>                            
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
                            <p>유닛 정보를 변경하시겠습니까?</p>
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