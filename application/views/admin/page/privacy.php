<?
$row = FALSE;
$content = '';
if ( $response['status'] == 200 ) {
    $content = $response['data']['out'];
};
?>
<div class="section">
    <div class="row">
        <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">
            <h4>개인정보취급방침</h4>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="editor1" name="content"><? if ( isset($content) ) { echo $content; } else { echo set_value('content'); }; ?></textarea>
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