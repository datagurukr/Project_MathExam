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
    
    function subject ( $subject_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
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
        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/subject', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }
    
    function unit ( $subject_id = 0, $unit_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
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
        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/unit', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }    
    
    function exam ( $subject_id = 0, $unit_id = 0, $exam_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
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
        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/category/exam', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }     
    
}
?>