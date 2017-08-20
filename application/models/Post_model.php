<?php
/***********************************
타임:          Class
이름:          All_model
용도:          메인 데이터베이스 클래스
작성자:        전병훈
생성일자:      2014.10.13 23:36:13
업데이트일자:   

함수명명규칙
-> 앞에 클래스 명을 붙이지 않는다. (함수명)
************************************/
class Post_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
    }
    
    function update ($type, $data) {
        
        $sql = FALSE;

        if ( !array_key_exists('category_name',$data) ) {
            $data['post_state'] = 0;
        };        
            
        if ( !array_key_exists('category_num',$data) ) {
            $data['post_status'] = 1;
        };        

        if ( $type == 'create' ) {
            $sql = "
                INSERT INTO  post (                
                    post_id,
                    user_id,
                    post_state,
                    post_status,
                    post_content_title,
                    post_content_article,
                    post_content_reply,                    
                    post_register_date,
                    post_update_date,
                    post_reply_register_date
                )
                VALUES (
                    ".$data['post_id'].",
                    ".$data['user_id'].",                    
                    ".$data['post_state'].",                                        
                    ".$data['post_status'].",                                                            
                    '".$data['post_content_title']."',
                    '".$data['post_content_article']."',
                    '".$data['post_content_reply']."',                    
                    now(),                    
                    now(),
                    now()
                );            
            ";
        } elseif ( $type == 'update' ) {
            $add = FALSE;
            foreach ( $data as $row ) {
                if ( is_array($row) ) {
                    if ( $row['type'] == 'int' ) {
                        $query_string = $row['key']."=".$row['value'];
                    } elseif ( $row['type'] == 'string' ) {
                        if ( $row['key'] == 'user_pass' ) {
                            $query_string = $row['key']."='".sha1($row['value'])."'";
                        } else {
                            $query_string = $row['key']."='".$row['value']."'";
                        };
                    };
                    $add = $add.$query_string.',';
                };
            };
            if ( $add ) {
                $sql = "
                update post
                set
                    ".$add."
                    post_update_date = now(),
                    post_reply_register_date = now()                    
                where
                    post_id = ".$data['post_id']."
                ";
            };
        } elseif ( $type == 'delete' ) {            
            $sql = "
            delete from post where post_id = ".$data['post_id']."
            ";            
        };
        
        if ( $sql ) {
            $this->db->trans_begin();
            $this->db->query($sql);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            };
        } else {
            return FALSE;
        };
    }
    
    function out ($type, $data) {
        
        $sql = FALSE;
        
        if ( !array_key_exists('post_id',$data) ) {
            $data['post_id'] = 0;
        };            
        if ( !array_key_exists('user_id',$data) ) {
            $data['user_id'] = 0;
        };
        if ( !array_key_exists('session_id',$data) ) {
            $data['session_id'] = 0;
        };
        if ( !array_key_exists('limit',$data) ) {
            $data['limit'] = 20;
        };
        if ( !array_key_exists('p',$data) ) {
            $data['p'] = 0;
        };
        if ( !array_key_exists('count',$data) ) {
            $data['count'] = FALSE;
        };
        if ( !array_key_exists('order',$data) ) {
            $data['order'] = 'desc';
        };
        if ( !array_key_exists('q',$data) ) {
            $data['q'] = '';
        };        
        if ( !array_key_exists('target',$data) ) {
            $data['target'] = '';
        };                
        if ( !$data['count'] ) {
            $limit = "limit ".$data['p']." , ".$data['limit']."";
        } else {
            $limit = "";
        };        
        
        if ( $data['count'] ) {
            $select = "
            count(*) as cnt
            ";
        } else {
            /*
            판매등록횟수 : sales_registration_cnt
            총입찰횟수 : tender_cnt
            판매완료차량 : sales_complete_cnt
            판매완료가격 : sales_complete_price
            판매완료지역 : sales_complete_locaiton
            현재입찰 : tender_now_cnt
            허위입찰 : tender_falsehood_cnt
            허위알선 : tender_mediation_cnt
            매입횟수 : purchase_cnt
            총입찰횟수 : bidding_cnt
            현재입찰차량 : bidding_now_cnt
            알선입찰횟수 : bidding_mediation_cnt
            현재알선입찰 : bidding_mediation_now_cnt
            */
            
            
            $select = "          
            post.post_id as post_id,
            post.user_id as user_id,
            user.user_name as user_name,            
            post.post_state as post_state,
            post.post_status as post_status,
            post.post_content_title as post_content_title,
            post.post_content_article as post_content_article,
            post.post_content_reply as post_content_reply,                    
            post.post_register_date as post_register_date,
            post.post_update_date as post_update_date,
            post.post_reply_register_date as post_reply_register_date
            ";
        };        
        
        if ( $type == 'id' ) {
            $sql = "
            select
                ".$select."
            FROM
                post AS post
                left outer join user as user
                on
                (post.user_id = user.user_id)
            WHERE
                post.post_id = ".$data['post_id']."
            ".$limit."
            ";  
        } elseif ( $type == 'answer' ) {
            $sql = "
            select
                ".$select."
            FROM
                post AS post
                left outer join user as user
                on
                (post.user_id = user.user_id)                
            where
                post.post_content_reply != ''
            order by post.post_register_date ".$data['order']."        
            ".$limit."
            ";  
        } elseif ( $type == 'all' ) {            
            $where = '';
            if ( strlen(trim($data['q'])) != 0 ) {
                if ( $data['target'] == 'name' ) {
                    $where = "and user.user_name like '%".$data['q']."%'";
                } elseif ( $data['target'] == 'email' ) {
                    $where = "and user.user_email like '%".$data['q']."%'";
                } else {
                    $where = "and ( user.user_name like '%".$data['q']."%' or user.user_email like '%".$data['q']."%' )";
                }
            };
            $sql = "
            select
                ".$select."
            FROM
                post AS post
                left outer join user as user
                on
                (post.user_id = user.user_id)  
            where
                0 <= post.post_state
                ".$where."                
            order by post.post_register_date ".$data['order']."        
            ".$limit."
            ";              
        } else {
            $sql = "
            select
                ".$select."
            FROM
                post AS post
                left outer join user as user
                on
                (post.user_id = user.user_id)                
            order by post.post_register_date ".$data['order']."        
            ".$limit."
            ";              
        }
        
        if ( $sql ) {
            $query = $this->db->query($sql);
            if( 0 < $query->num_rows() ){
                if ( $data['count'] ) {
                    $post_data = $query->result_array();
                    $temp_data = $post_data;
                } else {                                
                    $i = 0;
                    $user_data = $query->result_array();
                    $temp_data = array();                    
                    foreach ( $user_data as $row ) {
                        
                        if ( array_key_exists('user_picture',$row) ) {
                            $filename = $row['user_picture'];
                            $ext = substr(strrchr($filename,"."),1);
                            $ext = strtolower($ext);
                            $allowed_images =  array('jpg','png','jpeg','JPG','JPEG');
                            $allowed_video =  array('mp4');
                            if ( in_array($ext,$allowed_images) ) {
                                $folder_name = 'photo';
                            } elseif ( in_array($ext,$allowed_video) ) {
                                $folder_name = 'video';
                            } else {
                                $folder_name = FALSE;
                            };
                            if ( $folder_name ) {
                                //$user_data[$i]['user_picture'] = '/upload/'.$folder_name.'/720/'.$filename;
                                $user_data[$i]['user_picture'] = '/api/load/file?file_name='.$filename;
                            } else {
                                $user_data[$i]['user_picture'] = '/api/load/file?file_name=user.jpg';
                            };
                        };
                        
                        array_push($temp_data,$user_data[$i]);
                        $i++;                        
                    };
                };
                return $temp_data;
            } else {
                return FALSE;
            };
        } else {
			return FALSE;
        };                            
    }
};
?>