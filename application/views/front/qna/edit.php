<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
?>
<div class="section row">
    <form class="col s12" method="post" enctype="application/x-www-form-urlencoded">    
        <nav>
            <div class="nav-wrapper">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Q&A</a>
                    <a href="#!" class="breadcrumb">질문 타이틀</a>
                </div>
            </div>
        </nav>
        <div class="section">
            <div class="input-field">
                <input type="text" class="validate" name="post_content_title" value="<? if ( isset($row['post_content_title']) ) { echo $row['post_content_title']; } else { echo set_value('post_content_title'); }; ?>">
                <label>타이틀</label>
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
            <textarea id="editor1" name="post_content_article"><? if ( isset($row['post_content_article']) ) { echo $row['post_content_article']; } else { echo set_value('post_content_article'); }; ?></textarea>
            <script>
                CKEDITOR.replace( 'editor1', {
                    extraPlugins: 'mathjax',
                    mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS_HTML',
                    height: 160
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
        <div class="section">
            <button class="btn waves-effect waves-light" type="submit" name="action">올리기
                <i class="material-icons right">send</i>
            </button>
        </div>
    </form>    
</div>