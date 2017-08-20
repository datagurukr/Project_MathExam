<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
?>
<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="#!" class="breadcrumb">Q&A</a>
                <a href="#!" class="breadcrumb">
                    <? 
                    if ( isset($row['post_content_title']) ) { 
                        echo $row['post_content_title']; 
                    } else { 
                        echo '-'; 
                    }; 
                    ?>
                </a>
            </div>
        </div>
    </nav>		
</div>
<div class="section">
    <p class="flow-text">
        <? if ( isset($row['post_content_article']) ) { echo $row['post_content_article']; } else { echo '-'; }; ?>
    </p>    
</div>
<div class="divider"></div>
<div class="section">
    <p class="flow-text">
        <? 
        if ( isset($row['post_content_reply']) ) {
            if ( strlen(trim($row['post_content_reply'])) != 0 ) { 
                echo $row['post_content_reply']; 
            } else { 
                echo '답변 대기중입니다.'; 
            };
        }; 
        ?>
    </p>
</div>
<div class="divider"></div>
<div class="section">

    <?
    $referer = @$_SERVER['HTTP_REFERER'];
    if ( isset($_GET['referer']) ) {
        $referer = $_GET['referer'];
    };
    ?>
    <button type="button" class="waves-effect waves-light btn left" onclick="location.replace('<? echo $referer; ?>');">확인</button>    

</div>