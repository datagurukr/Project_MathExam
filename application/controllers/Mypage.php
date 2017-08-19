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

class Mypage extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function home () {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        response
        *******************/
        $response = array();        
        
        /*******************
        library
        *******************/        
        $this->load->library('form_validation');                        
        
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
        
        // 로그인 화면으로 이동
        if ( $session_id == 0 ) {
            $this->load->helper('url');
            redirect('/login', 'refresh');
        }
        
        $data['session_id'] = $session_id;
        
        $this->form_validation->set_rules('user_pass','Password','trim|required|callback_user_pass_check');        
        $this->form_validation->set_rules('user_pass_re', 'Re-Password', 'required|matches[user_pass]');        
        
        /*******************
        data query
        *******************/   
        if ($this->form_validation->run() == TRUE ) {
            
            $set_data = array ();
            $set_data['user_id'] = $session_id;        
            
            if ( isset($_POST['user_name']) ) {
                $set_data['user_name'] = array (
                    'key' => 'user_name',
                    'type' => 'string',
                    'value' => $this->input->post('user_name',TRUE)
                );
            };                
            
            if ( isset($_POST['user_gender']) ) {
                $set_data['user_gender'] = array (
                    'key' => 'user_gender',
                    'type' => 'int',
                    'value' => $this->input->post('user_gender',TRUE)
                );
            };                

            if ( isset($_POST['user_birthday']) ) {
                $set_data['user_birthday'] = array (
                    'key' => 'user_birthday',
                    'type' => 'string',
                    'value' => $this->input->post('user_birthday_submit',TRUE)
                );
            };    
            
            if ( isset($_POST['user_introduction']) ) {
                $set_data['user_introduction'] = array (
                    'key' => 'user_introduction',
                    'type' => 'string',
                    'value' => $this->input->post('user_introduction',TRUE)
                );
            };   
            
            if ( $this->user_model->update('update',$set_data) ) {
                $response['update'] = TRUE;
            } else {
                $response['update'] = FALSE;
            };
            
        } else {
            /*******************
            validation
            *******************/
            $validation = array();
            if ( isset($_POST['user_pass']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_pass'))) ) {
                    $validation['user_pass'] = strip_tags(form_error('user_pass'));
                };
            };            
            if ( isset($_POST['user_pass_re']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_pass_re'))) ) {
                    $validation['user_pass_re'] = strip_tags(form_error('user_pass_re'));
                };
            };                        
            
            if ( count($validation) ) {
                $response['status'] = 400;
                $response['error'] = array (
                    'validation' => $validation
                );
            } else {
                $response['status'] = 500;
                $response['error'] = array (
                    'message' => '재시도 해주세요.'
                );
            }            
        }
        
		$this->load->model('user_model');                
        $row = $this->user_model->out('id',array(
            'user_id' => $session_id            
            
        ));
        if ( $row ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $row,
                'count' => count($row)
            );        
        } else {
            $response['status'] = 401;
        }
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/mypage/home', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }
    
    function purchase () {        
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
        
        // 로그인 화면으로 이동
        if ( $session_id == 0 ) {
            $this->load->helper('url');
            redirect('/login', 'refresh');
        }        
        
        $data['session_id'] = $session_id;
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/mypage/purchase', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }    
    
    /* Validation Functions */        
    function user_pass_check ( $user_pass ) {
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
		$this->load->model('user_model');                
        if( $row = $this->user_model->out('id',array(
            'user_id' => $session_id                        
        )) ) {
            $user_email = $row[0]['user_email'];
            if( $row = $this->user_model->out('pass',array(
                'user_email' => $user_email,           
                'user_pass' => $user_pass                        
            )) ) {            
                if ( $row[0]['user_state'] == 9 ) {
                    $this->form_validation->set_message('user_pass_check', '탈퇴 처리된 계정입니다.');
                    return FALSE;
                } elseif ( $row[0]['user_state'] == 8 ) {                
                    $this->form_validation->set_message('user_pass_check', '일시정지된 계정입니다.');                                                        
                    return FALSE;
                } elseif ( $row[0]['user_state'] == 0 ) {                                
                    $this->form_validation->set_message('user_pass_check', '승인안된 계정입니다.');                                                        
                    return FALSE;
                } else {
                    return TRUE;                
                }
            } else {
                $this->form_validation->set_message('user_pass_check', '비밀번호가 올바르지 않습니다.');
                return FALSE;
            };                    
            
        } else {
            $this->form_validation->set_message('user_pass_check', '비밀번호가 올바르지 않습니다.');
            return FALSE;            
        }
    }       
    
}
?>