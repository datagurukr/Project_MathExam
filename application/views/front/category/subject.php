<?
$row = FALSE;
$unit_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
        if ( $response['data']['unit_out'] ) {
            $unit_out = $response['data']['unit_out'];                    
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
                <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>" class="breadcrumb">
                    <? echo $row['subject_name']; ?>
                </a>                
            </div>
        </div>
    </nav>
    <ul class="collection with-header">
        <?
        if ( $unit_out ) {
            foreach ( $unit_out as $out_row ) {
                ?>
        <a href="/category/<? echo $out_row['category_id']; ?>/<? echo $out_row['subject_id']; ?>/<? echo $out_row['unit_id']; ?>" class="collection-item">
            <?
            if ( 0 < strlen(trim($out_row['unit_name'])) ) {
                echo $out_row['unit_name'];
            } else { 
                echo '-'; 
            }; 
            ?>              
        </a>        
                <?
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