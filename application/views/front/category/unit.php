<?
$row = FALSE;
$exam_out = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
        if ( $response['data']['exam_out'] ) {
            $exam_out = $response['data']['exam_out'];                    
        };
    };
};
if ( !$row ) {
    show_404();
}
?>
<div class="section row">
    <div class="nav-wrapper">
        <div class="col s12 truncate tabs" style="background-color: #ee6e73;">
            <a href="/category/<? echo $row['category_id']; ?>" class="breadcrumb tab">
                <? echo $row['category_name']; ?>
            </a>
            <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>" class="breadcrumb tab">
                <? echo $row['subject_name']; ?>
            </a>                
            <a href="/category/<? echo $row['category_id']; ?>/<? echo $row['subject_id']; ?>/<? echo $row['unit_id']; ?>" class="breadcrumb tab">
                <? echo $row['unit_name']; ?>
            </a>                                
        </div>
    </div>
    <ul class="collection with-header">
        <?
        if ( $exam_out ) {
            foreach ( $exam_out as $out_row ) {
                ?>
        <a href="/category/<? echo $out_row['category_id']; ?>/<? echo $out_row['subject_id']; ?>/<? echo $out_row['unit_id']; ?>/<? echo $out_row['exam_id']; ?>" class="collection-item">
            <?
            if ( 0 < strlen(trim($out_row['exam_name'])) ) {
                echo $out_row['exam_name'];
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