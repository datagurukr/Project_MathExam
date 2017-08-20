<?
$category_out = FALSE;
if ( $response['data']['category_out'] ) {
    $category_out = $response['data']['category_out'];                    
};
?>
<div class="section">
    <div class="collection">
        <?
        if ( $category_out ) {
            foreach ( $category_out as $row ) {
                ?>
        <a href="/category/<? echo $row['category_id']; ?>" class="collection-item">
            <?
            if ( 0 < strlen(trim($row['category_name'])) ) {
                echo $row['category_name'];
            } else { 
                echo '-'; 
            };
            ?>
        </a>
                <?
            }
        }
        ?>
        <!--
        <a href="subCourse.html" class="collection-item active">서브코스2</a>
        <a href="subCourse.html" class="collection-item">서브코스3</a>
        <a href="subCourse.html" class="collection-item">서브코스4</a>
        -->
    </div>
</div>
<div class="section">
	<ul class="collapsible collection with-header" data-collapsible="accordion">
        <li class="collection-item">
            <div>
                Q&A
                <a href="/qna" class="secondary-content">
                    <i class="material-icons">send</i>
                </a>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                이용문의1
            </div>
            <div class="collapsible-body">
                <span>답변1</span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                이용문의2
            </div>
            <div class="collapsible-body">
                <span>답변2</span>
            </div>
        </li>
        <li>
            <div class="collapsible-header">
                이용문의3
            </div>
            <div class="collapsible-body">
                <span>답변3</span>
            </div>
        </li>
    </ul>
</div>