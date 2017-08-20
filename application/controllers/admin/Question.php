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

class Question extends CI_Controller {
    
    function __construct()
	{
		parent::__construct();
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
        $config['cur_tag_open'] = '<li class="active">';
        $config['cur_tag_close'] = '</li>';		
        /*다음링크번호*/
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';    
        $this->pagination->initialize($config);
    }      
    
    function index ( $exam_id = 0 ) {        
        /*******************
        data
        *******************/
        $data = array();         
        $data['exam_id'] = $exam_id;
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
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
        
        /*******************
        data query
        *******************/             
		$this->load->model('question_model');                
        
        if ( isset($_GET['p']) ) {
            $p = $_GET['p'];
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
        
        $result = $this->question_model->out('exam_id',array(
            'exam_id' => $exam_id,
            'user_id' => $session_id,
            'p' => $p,
            'q' => $q,
            'order' => 'asc',
            'target' => $target
        ));
        $result_count = $this->question_model->out('exam_id',array(
            'exam_id' => $exam_id,            
            'user_id' => $session_id,
            'p' => $p,
            'q' => $q,
            'order' => 'asc',            
            'target' => $target,            
            'count' => TRUE
        ));    
        $pagination_count = 0;
        if ( $result_count ) {
            $pagination_count = $result_count[0]['cnt'];            
        };
        $this->global_pagination($pagination_count,'/admin/question/'.$exam_id.'/?',$pagination_url);                        
        
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
            $data['container'] = $this->load->view('/admin/question/list', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }
    
    function edit ( $exam_id = 0, $question_id = 0, $action = '' ) {        
        /*******************
        data
        *******************/
        $data = array();         
        
        /*******************
        page key
        *******************/
        $data['key'] = 'home';
        
        /*******************
        response
        *******************/
        $response = array();   
        
        /*******************
        library
        *******************/        
        $this->load->library('form_validation');           
        
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
        
        if ( $action == 'delete' ) {
            $this->load->model('question_model');                                    
            $result = $this->question_model->update('delete',array(
                'question_id' => $question_id
            ));
            if ( $result ) {
                $response['delete'] = TRUE;                
            } else {
                $response['delete'] = false;
            }
            $this->load->helper('url');
            $referer = @$_SERVER['HTTP_REFERER'];
            if ( isset($_GET['referer']) ) {
                $referer = $_GET['referer'];
            };            
            redirect($referer, 'refresh');
        } else {
            if ( isset($_POST['question_num']) && isset($_POST['question_content_title']) && isset($_POST['question_content_article']) && isset($_POST['question_content_answer']) && isset($_POST['question_content_explanation']) ) {
                
                $this->form_validation->set_rules('question_num','순번','trim|required|numeric');                                
                $this->form_validation->set_rules('question_content_title','제목','trim|required');
                $this->form_validation->set_rules('question_content_article','보기','trim|required');
                $this->form_validation->set_rules('question_content_answer','답안','trim|required');
                $this->form_validation->set_rules('question_content_explanation','해설','trim|required');
                
                /*******************
                data query
                *******************/     
                if ($this->form_validation->run() == TRUE ) {
                    $this->load->model('question_model');                        
                    if ( $question_id == 0 ) {
                        $question_id = mt_rand();                    
                        $result = $this->question_model->update('create',array(
                            'question_id' => $question_id,
                            'exam_id' => $exam_id,
                            'question_num' => $this->input->post('question_num',TRUE),
                            'question_content_title' => $this->input->post('question_content_title',TRUE),
                            'question_content_article' => $this->input->post('question_content_article',TRUE),
                            'question_content_answer' => $this->input->post('question_content_answer',TRUE),
                            'question_content_explanation' => $this->input->post('question_content_explanation',TRUE),
                            'question_state' => 1
                        ));
                        if ( $result ) {
                            $response['update'] = TRUE;
                            $this->load->helper('url');
                            redirect('/admin/question/edit/'.$exam_id.'/'.$question_id, 'refresh');                        
                        } else {
                            $response['update'] = FALSE;
                        }
                    } else {
                        $set_data = array ();
                        $set_data['question_id'] = $question_id; 
                        if ( isset($_POST['question_content_title']) ) {
                            $set_data['question_content_title'] = array (
                                'key' => 'question_content_title',
                                'type' => 'string',
                                'value' => $this->input->post('question_content_title',TRUE)
                            );
                        };                
                        if ( isset($_POST['question_content_article']) ) {
                            $set_data['question_content_article'] = array (
                                'key' => 'question_content_article',
                                'type' => 'string',
                                'value' => $this->input->post('question_content_article',TRUE)
                            );
                        };                
                        if ( isset($_POST['question_content_answer']) ) {
                            $set_data['question_content_answer'] = array (
                                'key' => 'question_content_answer',
                                'type' => 'string',
                                'value' => $this->input->post('question_content_answer',TRUE)
                            );
                        };                
                        if ( isset($_POST['question_content_explanation']) ) {
                            $set_data['question_content_explanation'] = array (
                                'key' => 'question_content_explanation',
                                'type' => 'string',
                                'value' => $this->input->post('question_content_explanation',TRUE)
                            );
                        };                
                        if ( isset($_POST['question_num']) ) {
                            $set_data['question_num'] = array (
                                'key' => 'question_num',
                                'type' => 'int',
                                'value' => $this->input->post('question_num',TRUE)
                            );
                        };      
                        if ( $this->question_model->update('update',$set_data) ) {
                            $response['update'] = TRUE;
                        } else {
                            $response['update'] = FALSE;
                        };
                    }

                    /*
                    $row = $this->user_model->out('pass',array(
                        'user_email' => $this->input->post('user_email',TRUE),           
                        'user_pass' => $this->input->post('user_pass',TRUE)
                    ));

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
                    */

                } else {
                    /*******************
                    validation
                    *******************/
                    $validation = array();
                    if ( isset($_POST['question_num']) ) {
                        if ( 0 < strlen(strip_tags(form_error('question_num'))) ) {
                            $validation['question_num'] = strip_tags(form_error('question_num'));
                        };
                    };                                
                    if ( isset($_POST['question_content_title']) ) {
                        if ( 0 < strlen(strip_tags(form_error('question_content_title'))) ) {
                            $validation['question_content_title'] = strip_tags(form_error('question_content_title'));
                        };
                    };            
                    if ( isset($_POST['question_content_article']) ) {
                        if ( 0 < strlen(strip_tags(form_error('question_content_article'))) ) {
                            $validation['question_content_article'] = strip_tags(form_error('question_content_article'));
                        };
                    };                                
                    if ( isset($_POST['question_content_answer']) ) {
                        if ( 0 < strlen(strip_tags(form_error('question_content_answer'))) ) {
                            $validation['question_content_answer'] = strip_tags(form_error('question_content_answer'));
                        };
                    };
                    if ( isset($_POST['question_content_explanation']) ) {
                        if ( 0 < strlen(strip_tags(form_error('question_content_explanation'))) ) {
                            $validation['question_content_explanation'] = strip_tags(form_error('question_content_explanation'));
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
            };            
        }
        
		$this->load->model('question_model');
        $result = $this->question_model->out('id',array(
            'question_id' => $question_id
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
            $data['container'] = $this->load->view('/admin/question/edit', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }    
    
}
?>