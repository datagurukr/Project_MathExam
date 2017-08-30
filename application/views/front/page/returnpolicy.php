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
                <a href="#!" class="breadcrumb">환불정책</a>
            </div>
        </div>
    </nav>		
</div>
<div class="row">
    <? if ( isset($content) ) { echo $content; } else { echo set_value('content'); }; ?>
</div>