<?
$row = FALSE;
$subject_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
        if ( $response['data']['subject_out'] ) {
            $subject_out = $response['data']['subject_out'];                    
        };
    };
};
if ( !$row ) {
    show_404();
}
?>
<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/category/<? echo $row['category_id']; ?>" class="breadcrumb">
                    <? echo $row['category_name']; ?>
                </a>
            </div>
        </div>
    </nav>
    <ul class="collection with-header">
        <?
        if ( $subject_out ) {
            foreach ( $subject_out as $out_row ) {
                ?>
        <a href="/category/<? echo $out_row['category_id']; ?>/<? echo $out_row['subject_id']; ?>" class="collection-item">
            <?
            if ( 0 < strlen(trim($out_row['subject_name'])) ) {
                echo $out_row['subject_name'];
            } else { 
                echo '-'; 
            }; 
            ?>   
        </a>
            <?
                if ( $out_row['user_subject_purchase'] == 0 ) {
                ?>
        <a href="/purchase/<? echo $out_row['subject_id']; ?>">구매하기</a>        
                <?
                };
            };
        };
        ?>
        <!--
        <a href="chapter.html" class="collection-item active">챕터1</a>
        <a href="chapter.html" class="collection-item">챕터2</a>
        <a href="chapter.html" class="collection-item">챕터3</a>
        <a href="chapter.html" class="collection-item">챕터4</a>
        -->
    </ul>		
</div>