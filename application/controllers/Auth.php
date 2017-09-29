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

class Auth extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
	}
    
    function loggedin ( $user_id = 0, $user_status = 0 ) {
        if ( 0 < $user_id ) {
            // 로그인 세션 처리 시작
            if ( $user_status == 9 ) {
                // 관리자
                $session_data = array(
                    'users_id'  => $user_id,
                    'logged_in' => TRUE,
                    'admin'  => TRUE
                );
            } else {
                // 일반회원
                $session_data = array(
                    'users_id'  => $user_id,
                    'logged_in' => TRUE
                );                
            };
            $this->session->set_userdata($session_data);   
        } else {
            $this->session->sess_destroy();            
        }
        
        /*******************
        HTTP_REFERER
        *******************/
        $http_referer = @$_SERVER['HTTP_REFERER'];
        
        /*******************
        library load
        *******************/
		$this->load->helper('url');
        if ( strpos( $http_referer, 'logout' ) !== false ) {  
            redirect('/', 'refresh');
        } else {
            if ( strpos( $http_referer, 'login' ) ) {
                redirect('/', 'refresh');
            } else {
                redirect('/', 'refresh');                
                //redirect($http_referer, 'refresh');                
            }
        };  
    }
    
    function login () {        
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
        $data['key'] = 'login';
        
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
        if ( $session_id != 0 ) {
            $this->load->helper('url');
            redirect('/', 'refresh');
        }
        
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email|callback_user_email_check');
        $this->form_validation->set_rules('user_pass','Password','trim|required|callback_user_pass_check');        
        
        /*******************
        data query
        *******************/     
        if ($this->form_validation->run() == TRUE ) {
            
            $row = $this->user_model->out('pass',array(
                'user_email' => $this->input->post('user_email',TRUE),           
                'user_pass' => $this->input->post('user_pass',TRUE)
            ));
            
            /*******************
            Log write
            *******************/
            
            if ( $row ) {
                $this->loggedin($row[0]['user_id'],$row[0]['user_status']);
                $response['status'] = 200;
                $response['data'] = array(
                    'out' => $row,
                    'count' => count($row)
                );
            } else {
                $response['status'] = 500;
                $response['error'] = array (
                    'message' => '재시도 해주세요.'
                );
            };
            
        } else {
            /*******************
            validation
            *******************/
            $validation = array();
            if ( isset($_POST['user_email']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_email'))) ) {
                    $validation['user_email'] = strip_tags(form_error('user_email'));
                };
            };            
            if ( isset($_POST['user_pass']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_pass'))) ) {
                    $validation['user_pass'] = strip_tags(form_error('user_pass'));
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
        };
        
        $data['response'] = $response;
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/auth/login', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }  
    
    function register () {        
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
        $data['key'] = 'register';
        
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
        if ( $session_id != 0 ) {
            $this->load->helper('url');            
            redirect('/', 'refresh');
        }        
        
        $this->form_validation->set_rules('user_email','Email','trim|required|valid_email|callback_user_email_overlap_check');
        $this->form_validation->set_rules('user_birthday','Birthday','trim|required');        
        $this->form_validation->set_rules('user_name','Name','trim|required');                
        $this->form_validation->set_rules('user_pass','Password','trim|required|alpha_numeric');        
        $this->form_validation->set_rules('user_pass_re', 'Re-Password', 'required|alpha_numeric|matches[user_pass]');        
        
        /*******************
        data query
        *******************/     
        if ($this->form_validation->run() == TRUE ) {
            
            $this->load->model('user_model');        
            $row = $this->user_model->update('create',array(
                'user_id' => mt_rand(),
                'user_email' => $this->input->post('user_email',TRUE),
                'user_name' => $this->input->post('user_name',TRUE),
                'user_birthday' => $this->input->post('user_birthday',TRUE),                
                'user_pass' => $this->input->post('user_pass',TRUE),
                'user_state' => 1
            ));
            
            if ( $row ) {
                $row = $this->user_model->out('pass',array(
                    'user_email' => $this->input->post('user_email',TRUE),           
                    'user_pass' => $this->input->post('user_pass',TRUE)
                ));
            };
            
            /*******************
            Log write
            *******************/
            
            if ( $row ) {
                $this->loggedin($row[0]['user_id'],$row[0]['user_status']);
                $response['status'] = 200;
                $response['data'] = array(
                    'out' => $row,
                    'count' => count($row)
                );
            } else {
                $response['status'] = 500;
                $response['error'] = array (
                    'message' => '재시도 해주세요.'
                );
            };
            
        } else {
            /*******************
            validation
            *******************/
            $validation = array();
            if ( isset($_POST['user_email']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_email'))) ) {
                    $validation['user_email'] = strip_tags(form_error('user_email'));
                };
            };            
            if ( isset($_POST['user_birthday']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_birthday'))) ) {
                    $validation['user_birthday'] = strip_tags(form_error('user_birthday'));
                };
            };            
            if ( isset($_POST['user_name']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_name'))) ) {
                    $validation['user_name'] = strip_tags(form_error('user_name'));
                };
            };            
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
        };
        
        $data['response'] = $response;                
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/auth/register', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }  
    
    function logout () {        
        $this->loggedin(0);                        
    }
    
    function recover () {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        page key
        *******************/
        $data['key'] = 'register';
        
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
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/front/auth/recover', $data, TRUE);
            $this->load->view('/front/body', $data, FALSE);            
        };
    }   
    
    /* Validation Functions */    
    function user_email_overlap_check ( $user_email ) {
		$this->load->model('user_model');                
        if( $row = $this->user_model->out('email',array(
            'user_email' => $user_email            
        )) ) {
            echo $user_email;
            print_r($row);
            
            $this->form_validation->set_message('user_email_overlap_check', '이미 등록된 %s 입니다.');
            return FALSE;
        } else {
            return TRUE;
        };        
    }
    
    function user_email_check ( $user_email ) {
		$this->load->model('user_model');                
        if( $row = $this->user_model->out('email',array(
            'user_email' => $user_email            
        )) ) {
            return TRUE;
        } else {
            $this->form_validation->set_message('user_email_check', '존재하지 않는 %s 입니다.');
            return FALSE;
        };        
    }    
    
    function user_pass_check ( $user_pass ) {
		$this->load->model('user_model');                
        if( $row = $this->user_model->out('pass',array(
            'user_email' => $this->input->post('user_email',TRUE),           
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
    }    
}
?>