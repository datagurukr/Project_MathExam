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
class Unit_model extends CI_Model{
	
	function __construct() {
        parent::__construct();
    }
    
    function update ($type, $data) {
        
        $sql = FALSE;
        
        if ( !array_key_exists('unit_name',$data) ) {
            $data['unit_name'] = 0;
        };        

        if ( !array_key_exists('unit_state',$data) ) {
            $data['unit_state'] = 0;
        };        
        
        if ( $type == 'create' ) {
            $sql = "
                INSERT INTO unit (                
                    unit_id,
                    subject_id,
                    unit_num,
                    unit_name,
                    unit_state,
                    unit_register_date,
                    unit_update_date
                )
                VALUES (
                    ".$data['unit_id'].",
                    ".$data['subject_id'].",    
                    ".$data['unit_num'].",                                                            
                    '".$this->db->escape_str($data['unit_name'])."',                                        
                    ".$data['unit_state'].",
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
                            $query_string = $row['key']."='".$this->db->escape_str($row['value'])."'";
                        };
                    };
                    $add = $add.$query_string.',';
                };
            };
            if ( $add ) {
                $sql = "
                update unit
                set
                    ".$add."
                    unit_update_date = now()
                where
                    unit_id = ".$data['unit_id']."
                ";
            };
        } elseif ( $type == 'delete' ) {            
            $sql = "
            delete from unit where unit_id = ".$data['unit_id']."
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
        
        if ( !array_key_exists('unit_id',$data) ) {
            $data['unit_id'] = 0;
        };                        
        if ( !array_key_exists('subject_id',$data) ) {
            $data['subject_id'] = 0;
        };                        
        if ( !array_key_exists('category_id',$data) ) {
            $data['category_id'] = 0;
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
            
            unit.unit_id as unit_id,
            unit.subject_id as subject_id,
            subject.subject_name as subject_name,
            category.category_id as category_id,                        
            category.category_name as category_name,            
            unit.unit_num as unit_num,
            unit.unit_name as unit_name,
            unit.unit_state as unit_state,
            unit.unit_register_date as unit_register_date,
            unit.unit_update_date as unit_update_date            
            ";
        };        
        
        if ( $type == 'id' ) {
            $sql = "
            select
                ".$select."
            FROM
                unit AS unit
                left outer join subject as subject
                on
                (unit.subject_id = subject.subject_id)                
                left outer join category as category
                on
                (subject.category_id = category.category_id)                                
            WHERE
                unit.unit_id = ".$data['unit_id']."
            ".$limit."
            ";  
        } elseif ( $type == 'subject_id' ) {            
            $sql = "
            select
                ".$select."
            FROM
                unit AS unit
                left outer join subject as subject
                on
                (unit.subject_id = subject.subject_id)                
                left outer join category as category
                on
                (subject.category_id = category.category_id)    
            where
                unit.subject_id = ".$data['subject_id']."
            order by unit.unit_num ".$data['order'].", unit.unit_register_date ".$data['order']."        
            ".$limit."
            ";              
        } else {
            $sql = "
            select
                ".$select."
            FROM
                unit AS unit
                left outer join subject as subject
                on
                (unit.subject_id = subject.subject_id)                
                left outer join category as category
                on
                (subject.category_id = category.category_id)                                
            order by unit.unit_num ".$data['order'].", unit.unit_register_date ".$data['order']."        
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