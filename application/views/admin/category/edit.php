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
            <h4>코스(상세)</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="category_num" value="<? if ( isset($row['category_num']) ) { echo $row['category_num']; } else { echo set_value('category_num'); }; ?>">
                    <label for="no">순번</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['category_num']) ) {
                                        echo $response['error']['validation']['category_num'];
                                };
                            };
                        };
                        ?>                     
                    </p>                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="category_name" value="<? if ( isset($row['category_name']) ) { echo $row['category_name']; } else { echo set_value('category_name'); }; ?>">
                    <label for="course">코스</label>
                    <p class="light red-text">
                        <?
                        // validation
                        if ( isset($response) ) {
                            if ( $response['status'] == 400 || $response['status'] == 200 || $response['status'] == 401 ) {
                                if ( isset($response['error']['validation']['category_name']) ) {
                                        echo $response['error']['validation']['category_name'];
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
                            <p>코스정보를 변경하시겠습니까?</p>
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
<script>
 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>