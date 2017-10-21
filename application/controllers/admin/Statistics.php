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

class Statistics extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function index ( $type ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        page key
        *******************/
        $data['key'] = 'statistics';
        $data['sub_key'] = $type;
        
        /*******************
        response
        *******************/
        $response = array();                
        
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
        if ( isset($data['session']['logged_in']) && isset($data['session']['admin']) ) {
            if ( $data['session']['admin'] ) {
                $session_id = $data['session']['users_id'];                
            } else {
                $session_id = 0;
            };
        } else {
            $session_id = 0;
        };
        if ( $session_id == 0 ) {
            show_404();
        };
        $data['session_id'] = $session_id;
        
        if ( $type == 'day' || $type == 'month' ) {
        } else {
            exit();            
        };
        
		$this->load->model('purchase_model');
        
        if ( isset($_GET['date']) ) {
            $date = date('Y-m-d',strtotime($_GET['date']));
        } else {
            $date = date('Y-m-d');            
        }
        $data['date'] = $date;

        $result = $this->purchase_model->out($type,array(
            'date' => $date
        ));        
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };        
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/admin/statistics/home', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }
}
?>