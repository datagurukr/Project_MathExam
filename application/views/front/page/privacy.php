<?
$row = FALSE;
$content = '';
if ( $response['status'] == 200 ) {
    $content = $response['data']['out'];
};
?>
<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="#!" class="breadcrumb">개인정보취급방침</a>
            </div>
        </div>
    </nav>		
</div>
<div class="section">
    <p class="flow-text">
        <? if ( isset($content) ) { echo $content; } else { echo set_value('content'); }; ?>
    </p>
</div>