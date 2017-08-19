<?
$row = FALSE;
$category_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
if ( $response['data']['category_out'] ) {
    $category_out = $response['data']['category_out'];                    
};
?>
<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <h4>서브코스(상세)</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="subject_num" value="<? if ( isset($row['subject_num']) ) { echo $row['subject_num']; } else { echo set_value('subject_num'); }; ?>">
                    <label for="no">순번</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['subject_num']) ) {
                                        echo $response['error']['validation']['subject_num'];
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
                    <input type="text" class="validate" name="subject_name" value="<? if ( isset($row['subject_name']) ) { echo $row['subject_name']; } else { echo set_value('subject_name'); }; ?>">
                    <label for="course">서브코스</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['subject_name']) ) {
                                        echo $response['error']['validation']['subject_name'];
                                };
                            };
                        };
                        ?>                     
                    </p>                                        
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="subject_price" value="<? if ( isset($row['subject_price']) ) { echo $row['subject_price']; } else { echo set_value('subject_price'); }; ?>">
                    <label for="price">상품가격</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['subject_price']) ) {
                                        echo $response['error']['validation']['subject_price'];
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
<script>
$(document).ready(function() {
    $('select').material_select();
});
</script>