<?
/***********************************
타임:          Class
이름:          User
용도:          User 템플렛 클래스 ( WEB 버전 )
작성자:        전병훈
생성일자:      2017.05.16 15:11:13
업데이트일자:   
Var 1.0
************************************/
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function category ( $category_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();    
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/     
		$this->load->model('category_model');
        $result = $this->category_model->out('id',array(
            'category_id' => $category_id
        ));
        
        $this->load->model('subject_model');        
        $subject_out = $this->subject_model->out('category_id',array(
            'session_id' => $session_id,
            'category_id' => $category_id,
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'subject_out' => $subject_out,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/category', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }    
    
    function subject ( $category_id = 0, $subject_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();    
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/     
		$this->load->model('subject_model');
        $result = $this->subject_model->out('id',array(
            'subject_id' => $subject_id,
            'session_id' => $session_id
        ));
        
        $this->load->model('unit_model');        
        $unit_out = $this->unit_model->out('subject_id',array(
            'subject_id' => $subject_id,
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));
        
        if ( $result ) {
            $response['status'] = 200;                    
            if ( $result ) {
                if ( $result[0]['user_subject_purchase'] == 0 ) {
                    $this->load->helper('url');
                    redirect('/purchase/'.$subject_id, 'refresh');
                };
            };
            $response['data'] = array(
                'out' => $result,
                'unit_out' => $unit_out,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };        
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/subject', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }
    
    function unit ( $category_id = 0, $subject_id = 0, $unit_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/     
		$this->load->model('unit_model');
        $result = $this->unit_model->out('id',array(
            'unit_id' => $unit_id
        ));
        
        $this->load->model('exam_model');        
        $exam_out = $this->exam_model->out('unit_id',array(
            'unit_id' => $unit_id,
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'exam_out' => $exam_out,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };          
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/unit', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }    
    
    function exam ( $category_id = 0, $subject_id = 0, $unit_id = 0, $exam_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();                
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        ajax 통신 체크
        *******************/
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                || 
                (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['REQUEST_METHOD'] == 'GET');
        
        /*******************
        session
        *******************/
        $data['session'] = $this->session->all_userdata();  
        $data['session_id'] = 0;
        if ( isset($data['session']['logged_in']) ) {
            $session_id = $data['session']['users_id'];
        } else {
            $session_id = 0;
        };
        $data['session_id'] = $session_id;
        
        /*******************
        data query
        *******************/     
		$this->load->model('exam_model');
        $result = $this->exam_model->out('id',array(
            'exam_id' => $exam_id
        ));
        
        $this->load->model('question_model');        
        $question_out = $this->question_model->out('exam_id',array(
            'exam_id' => $exam_id,
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'question_out' => $question_out,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/exam', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }     
    
}
?>