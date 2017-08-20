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

class Exam extends CI_Controller {
    
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
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';		
        /*다음링크번호*/
        $config['num_tag_open'] = '<li class="waves-effect">';
        $config['num_tag_close'] = '</li>';    
        $this->pagination->initialize($config);
    }      
    
    function index ( $p = 0 ) {        
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
		$this->load->model('exam_model');                
        
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
        
        $result = $this->exam_model->out('all',array(
            'user_id' => $session_id,
            'p' => $p,
            'q' => $q,
            'order' => 'asc',
            'target' => $target
        ));
        $result_count = $this->exam_model->out('all',array(
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
        $this->global_pagination($pagination_count,'/admin/exam/?',$pagination_url);                        
        
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
            $data['container'] = $this->load->view('/admin/exam/list', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    } 
    
    function edit ( $exam_id = 0, $action = '' ) {        
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
            $this->load->model('exam_model');                                    
            $result = $this->exam_model->update('delete',array(
                'exam_id' => $exam_id
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
            if ( isset($_POST['unit_id']) && isset($_POST['category_id']) && isset($_POST['subject_id']) && isset($_POST['exam_name']) && isset($_POST['exam_num']) ) {
                
                $this->form_validation->set_rules('category_id','코스','trim|required|numeric');                                
                $this->form_validation->set_rules('subject_id','서브코스','trim|required|numeric');                
                $this->form_validation->set_rules('unit_id','챕터','trim|required|numeric');                                                
                $this->form_validation->set_rules('exam_name','유닛','trim|required');
                $this->form_validation->set_rules('exam_num','순번','trim|required|numeric');                
                
                if ( isset($_POST['exam_description']) ) {
                    $exam_description = $this->input->post('exam_description',TRUE);
                } else {
                    $exam_description = '';
                }
                
                /*******************
                data query
                *******************/     
                if ($this->form_validation->run() == TRUE ) {
                    $this->load->model('exam_model');                        
                    if ( $exam_id == 0 ) {
                        $exam_id = mt_rand();                    
                        $result = $this->exam_model->update('create',array(
                            'exam_id' => $exam_id,                            
                            'unit_id' => $this->input->post('unit_id',TRUE),                           
                            'exam_name' => $this->input->post('exam_name',TRUE),
                            'exam_num' => $this->input->post('exam_num',TRUE),                            
                            'exam_description' => $exam_description,
                            'exam_state' => 1
                        ));
                        if ( $result ) {
                            $response['update'] = TRUE;
                            $this->load->helper('url');
                            redirect('/admin/exam/edit/'.$exam_id, 'refresh');                        
                        } else {
                            $response['update'] = FALSE;
                        }
                    } else {
                        $set_data = array ();
                        $set_data['exam_id'] = $exam_id; 
                        if ( isset($_POST['unit_id']) ) {
                            $set_data['unit_id'] = array (
                                'key' => 'unit_id',
                                'type' => 'int',
                                'value' => $this->input->post('unit_id',TRUE)
                            );
                        };                                        
                        if ( isset($_POST['exam_name']) ) {
                            $set_data['exam_name'] = array (
                                'key' => 'exam_name',
                                'type' => 'string',
                                'value' => $this->input->post('exam_name',TRUE)
                            );
                        };                
                        if ( isset($_POST['exam_description']) ) {
                            $set_data['exam_description'] = array (
                                'key' => 'exam_description',
                                'type' => 'string',
                                'value' => $this->input->post('exam_description',TRUE)
                            );
                        };                
                        if ( isset($_POST['exam_num']) ) {
                            $set_data['exam_num'] = array (
                                'key' => 'exam_num',
                                'type' => 'int',
                                'value' => $this->input->post('exam_num',TRUE)
                            );
                        };      
                        if ( $this->exam_model->update('update',$set_data) ) {
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
                    if ( isset($_POST['category_id']) ) {
                        if ( 0 < strlen(strip_tags(form_error('category_id'))) ) {
                            $validation['category_id'] = strip_tags(form_error('category_id'));
                        };
                    };                                
                    if ( isset($_POST['subject_id']) ) {
                        if ( 0 < strlen(strip_tags(form_error('subject_id'))) ) {
                            $validation['subject_id'] = strip_tags(form_error('subject_id'));
                        };
                    };            
                    if ( isset($_POST['unit_id']) ) {
                        if ( 0 < strlen(strip_tags(form_error('unit_id'))) ) {
                            $validation['unit_id'] = strip_tags(form_error('unit_id'));
                        };
                    };                                
                    if ( isset($_POST['exam_name']) ) {
                        if ( 0 < strlen(strip_tags(form_error('exam_name'))) ) {
                            $validation['exam_name'] = strip_tags(form_error('exam_name'));
                        };
                    };
                    if ( isset($_POST['exam_description']) ) {
                        if ( 0 < strlen(strip_tags(form_error('exam_description'))) ) {
                            $validation['exam_description'] = strip_tags(form_error('exam_description'));
                        };
                    };                    
                    if ( isset($_POST['exam_num']) ) {
                        if ( 0 < strlen(strip_tags(form_error('exam_num'))) ) {
                            $validation['exam_num'] = strip_tags(form_error('exam_num'));
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

        
		$this->load->model('exam_model');
        $result = $this->exam_model->out('id',array(
            'exam_id' => $exam_id
        ));
		$this->load->model('unit_model');
        $unit_out = $this->unit_model->out('all',array(
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));                
		$this->load->model('subject_model');        
        $subject_out = $this->subject_model->out('all',array(
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));        
		$this->load->model('category_model');        
        $category_out = $this->category_model->out('all',array(
            'p' => 0,
            'limit' => 1000,
            'order' => 'asc'
        ));
        
        if ( $result ) {
            $response['status'] = 200;                    
            $response['data'] = array(
                'out' => $result,
                'unit_out' => $unit_out,
                'subject_out' => $subject_out,
                'category_out' => $category_out,
                'count' => count($result)
            );        
        } else {
            $response['status'] = 401;
            $response['data'] = array(
                'unit_out' => $unit_out,                
                'subject_out' => $subject_out,
                'category_out' => $category_out                
            );                    
        };        
        
        $data['response'] = $response;        
        if ( $ajax ) {
        } else {
            $data['container'] = $this->load->view('/admin/exam/edit', $data, TRUE);
            $this->load->view('/admin/body', $data, FALSE);            
        };
    }    
    
}
?>