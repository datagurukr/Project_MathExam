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
    
    function global_pagination ($count,$url,$query_url = false, $details = false) {
        /*******************
        library load
        *******************/
        $this->load->library('pagination');
        $config['base_url'] = $url.$query_url;
        $config['total_rows'] = $count;
        if ( $details ) {
            $config['uri_segment'] = 5;
        } elseif ( $query_url ) {
            $config['uri_segment'] = 6;
        } else {
            $config['uri_segment'] = 4;
        };
        $config['per_page'] = 20;
        $config['num_links'] = 5;
        $config['use_page_numbers'] = TRUE; /*페이지개수 x 인덱스로 지정*/ 
        $config['page_query_string'] = TRUE; /*페이지개수 x 인덱스로 지정*/         
        $config['query_string_segment'] = 'p';
        /*pagination Customizing*/
        /*pagination ul tag*/
        $config['full_tag_open'] = '<ul class="pagination center">';
        $config['full_tag_close'] = '</ul>';
        /*처음으로
        $config['first_tag_open'] = '<li class="disabled">';
        $config['first_tag_close'] = '</li>';
        */
        /*끝으로
        $config['last_tag_open'] = '<li class="nation-list last">';
        $config['last_tag_close'] = '</li>';
        */
        /*다음*/
        $config['next_link'] = '<i class="material-icons">chevron_right</i>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        /*이전*/
        
        $config['prev_link'] = '<i class="material-icons">chevron_left</i>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';		
        /*현제페이지*/
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';		
        /*다음링크번호*/
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';    
        $this->pagination->initialize($config);
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
    
    function password () {        
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
        
        $this->form_validation->set_rules('user_new_pass','New Password','trim|required');        
        $this->form_validation->set_rules('user_new_pass_re', 'New Re-Password', 'required|matches[user_new_pass]');        
        $this->form_validation->set_rules('user_pass','Password','trim|required|callback_user_pass_check');
        
        /*******************
        data query
        *******************/   
        if ($this->form_validation->run() == TRUE ) {
            
            $set_data = array ();
            $set_data['user_id'] = $session_id;        
            
            if ( isset($_POST['user_new_pass']) ) {
                $set_data['user_new_pass'] = array (
                    'key' => 'user_pass',
                    'type' => 'string',
                    'value' => $this->input->post('user_new_pass',TRUE)
                );
            };                
            
            if ( $this->user_model->update('update',$set_data) ) {
                $response['update'] = TRUE;
                $this->loggedin(0);
            } else {
                $response['update'] = FALSE;
            };
            
        } else {
            /*******************
            validation
            *******************/
            $validation = array();
            if ( isset($_POST['user_new_pass']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_new_pass'))) ) {
                    $validation['user_new_pass'] = strip_tags(form_error('user_new_pass'));
                };
            };                        
            if ( isset($_POST['user_new_pass_re']) ) {
                if ( 0 < strlen(strip_tags(form_error('user_new_pass_re'))) ) {
                    $validation['user_new_pass_re'] = strip_tags(form_error('user_new_pass_re'));
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
            $data['container'] = $this->load->view('/front/mypage/password', $data, TRUE);
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
        
        /*******************
        data query
        *******************/             
		$this->load->model('purchase_model');                
        
        if ( isset($_GET['p']) ) {
            $p = (int)$_GET['p'];
            if ( $p <= 0 ) {
                $p = 1;
            };
        } else {
            $p = 1;
        };
        $data['p'] = $p;        
        $p = (($p * 2) * 10) - 20;  
        $pagination_url = '';        
        if ( isset($_GET['q']) ) {
            $q = $_GET['q'];
            $pagination_url = $pagination_url.'&q='.$q;
        } else {
            $q = '';
        };        
        $data['q'] = $q;
        
        if ( isset($_GET['target']) ) {
            $target = $_GET['target'];
            $pagination_url = $pagination_url.'&target='.$target;            
        } else {
            $target = '';
        };        
        $data['target'] = $target;
        
        $result = $this->purchase_model->out('user_id',array(
            'user_id' => $session_id,
            'p' => $p,
            'q' => $q,
            'order' => 'desc',
            'target' => $target
        ));
        $result_count = $this->purchase_model->out('user_id',array(
            'user_id' => $session_id,
            'p' => $p,
            'q' => $q,
            'order' => 'desc',            
            'target' => $target,            
            'count' => TRUE
        ));    
        $pagination_count = 0;
        if ( $result_count ) {
            $pagination_count = $result_count[0]['cnt'];            
        };
        $this->global_pagination($pagination_count,'/mypage/purchase/?',$pagination_url);                        
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'out_cnt' => $pagination_count,               
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
        };                
        
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