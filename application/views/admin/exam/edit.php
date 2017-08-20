<?
$row = FALSE;
$subject_out = FALSE;
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
                        <option value="<? echo $category_row['category_id']; ?>" <? if ( $category_row['category_id'] == $category_id ) { echo 'selected'; }; ?> >
                            <? echo $category_row['category_name']; ?>
                        </option>
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
                        <option value="<? echo $subject_row['subject_id']; ?>" <? if ( $subject_row['subject_id'] == $subject_id ) { echo 'selected'; }; ?> >
                            <? echo $subject_row['subject_name']; ?>
                        </option>
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
                        <option value="<? echo $unit_row['unit_id']; ?>" <? if ( $unit_row['unit_id'] == $unit_id ) { echo 'selected'; }; ?> >
                            <? echo $unit_row['unit_name']; ?>
                        </option>
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
                    <textarea id="editor1" name="editor1"></textarea>
                    <script>
                        CKEDITOR.replace( 'editor1', {
                            extraPlugins: 'mathjax',
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
<script>
$(document).ready(function() {
    $('select').material_select();
});
</script>