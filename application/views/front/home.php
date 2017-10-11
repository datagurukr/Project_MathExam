<?
$category_out = FALSE;
$post_out = FALSE;
$notice_out = FALSE;
if ( $response['data']['category_out'] ) {
    $category_out = $response['data']['category_out'];
    $post_out = $response['data']['post_out'];
    $notice_out = $response['data']['notice_out'];    
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
        <li>
            <div class="collapsible-header">
                공지사항                
            </div>
            <div class="collapsible-body">
            <?
            if ( $notice_out ) {
                $num = 1;
                foreach ( $notice_out as $row ) {
                    ?>
                <p>
                    <a href="/notice/detail/<? echo $row['post_id']; ?>">
                        <?
                        echo $num.'. ';
                        if ( 0 < strlen(trim($row['post_content_title'])) ) {
                            echo $row['post_content_title'];
                        } else { 
                            echo '-'; 
                        };
                        ?>
                    </a>
                </p>    
                    <?
                }
            } else {
                ?>
                <p>공지사항이 없습니다.</p>
                <?
            }
            ?>                 
            </div>
        </li>     
        
        <li>
            <div class="collapsible-header">
                QA                
            </div>
            <div class="collapsible-body">
                
            <?
            if ( $post_out ) {
                $num = 1;                
                foreach ( $post_out as $row ) {
                    ?>
                <p>                
                    <a href="/qna/detail/<? echo $row['post_id']; ?>">
                        <?
                        echo $num.'. ';
                        if ( 0 < strlen(trim($row['post_content_title'])) ) {
                            echo $row['post_content_title'];
                        } else { 
                            echo '-'; 
                        };
                        ?>
                    </a>
                </p>                        
                    <?
                }
            } else {
                ?>
                <p>Q&A 없습니다.</p>
                <?
            }
            ?>                 
            </div>
        </li>          
        
        <?
        /*
        if ( $post_out ) {
            foreach ( $post_out as $row ) {
                ?>
        
        <li>
            <div class="collapsible-header">
                <a href="/qna/detail/<? echo $row['post_id']; ?>">
                    <?
                    if ( 0 < strlen(trim($row['post_content_title'])) ) {
                        echo $row['post_content_title'];
                    } else { 
                        echo '-'; 
                    };
                    ?>
                </a>
            </div>
            <div class="collapsible-body">
                <div>
                <?
                if ( 0 < strlen(trim($row['post_content_article'])) ) {
                    echo $row['post_content_article'];
                } else { 
                    echo '-'; 
                };
                ?>                    
                </div>
                <div class="divider"></div>
                <div>
                <?
                if ( 0 < strlen(trim($row['post_content_reply'])) ) {
                    echo $row['post_content_reply'];
                } else { 
                    echo '-'; 
                };
                ?>                    
                </div>
            </div>
        </li>
                <?
            }
        }
        */
        ?>        
    </ul>
    <!--
	<ul class="collapsible collection with-header" data-collapsible="accordion">
        <li class="collection-item">
            <div>
                QA
                <a href="/qna" class="secondary-content">
                    <i class="material-icons">send</i>
                </a>
            </div>
        </li>
        <?
        if ( $post_out ) {
            foreach ( $post_out as $row ) {
                ?>
        
        <li>
            <div class="collapsible-header">
                <a href="/qna/detail/<? echo $row['post_id']; ?>">
                    <?
                    if ( 0 < strlen(trim($row['post_content_title'])) ) {
                        echo $row['post_content_title'];
                    } else { 
                        echo '-'; 
                    };
                    ?>
                </a>
            </div>
            <div class="collapsible-body">
                <div>
                <?
                if ( 0 < strlen(trim($row['post_content_article'])) ) {
                    echo $row['post_content_article'];
                } else { 
                    echo '-'; 
                };
                ?>                    
                </div>
                <div class="divider"></div>
                <div>
                <?
                if ( 0 < strlen(trim($row['post_content_reply'])) ) {
                    echo $row['post_content_reply'];
                } else { 
                    echo '-'; 
                };
                ?>                    
                </div>
            </div>
        </li>
                <?
            }
        }
        ?>        
    </ul>
	<ul class="collapsible collection with-header" data-collapsible="accordion">
        <li class="collection-item">
            <div>
                공지사항
                <a href="/qna" class="secondary-content">
                    <i class="material-icons">send</i>
                </a>
            </div>
        </li>
        <?
        if ( $notice_out ) {
            foreach ( $notice_out as $row ) {
                ?>
        
        <li>
            <div class="collapsible-header">
                <a href="/notice/detail/<? echo $row['post_id']; ?>">
                    <?
                    if ( 0 < strlen(trim($row['post_content_title'])) ) {
                        echo $row['post_content_title'];
                    } else { 
                        echo '-'; 
                    };
                    ?>
                </a>
            </div>
            <div class="collapsible-body">
                <div>
                <?
                if ( 0 < strlen(trim($row['post_content_article'])) ) {
                    echo $row['post_content_article'];
                } else { 
                    echo '-'; 
                };
                ?>                    
                </div>
            </div>
        </li>
                <?
            }
        }
        ?>        
    </ul>  
    -->
</div>