<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/* Front */
$route['default_controller'] = "home/index";

// home
$route['home'] = "home/index";

// category
$route['category/(:num)'] = "category/subject/$1";
$route['category/(:num)/(:num)'] = "category/unit/$1/$2";
$route['category/(:num)/(:num)/(:num)'] = "category/exam/$1/$2/$3";

// Auth
$route['login'] = "auth/login";
$route['logout'] = "auth/logout";
$route['register'] = "auth/register";
$route['recover'] = "auth/recover";

// Mypage
$route['mypage'] = "mypage/home";
$route['mypage/purchase'] = "mypage/purchase";

// Page
$route['privacy'] = "page/privacy";
$route['terms'] = "page/terms";

// Qna
$route['qna'] = "qna/index/1";
$route['qna/(:num)'] = "qna/index/$1";
$route['qna/detail/(:num)'] = "qna/detail/$1";

/* Admin */
$route['admin'] = "admin/user/index/1";
// Admin/User
$route['admin/user'] = "admin/user/index";
$route['admin/user/(:num)'] = "admin/user/detail/$1";

// Admin/Page
$route['admin/privacy'] = "admin/page/privacy";
$route['admin/terms'] = "admin/page/terms";

// Admin/Book
$route['admin/category'] = "admin/category/index/1";
$route['admin/category/(:num)'] = "admin/category/index/$1";
$route['admin/category/edit'] = "admin/category/edit/0";
$route['admin/category/edit/(:num)'] = "admin/category/edit/$1";
$route['admin/category/(:num)/delete'] = "admin/category/edit/$1/delete";

// Admin/Subject
$route['admin/subject'] = "admin/subject/index/1";
$route['admin/subject/(:num)'] = "admin/subject/index/$1";
$route['admin/subject/edit'] = "admin/subject/edit/0";
$route['admin/subject/edit/(:num)'] = "admin/subject/edit/$1";
$route['admin/subject/(:num)/delete'] = "admin/subject/edit/$1/delete";

// Admin/Unit
$route['admin/unit'] = "admin/unit/index/1";
$route['admin/unit/(:num)'] = "admin/unit/index/$1";
$route['admin/unit/edit'] = "admin/unit/edit/0";
$route['admin/unit/edit/(:num)'] = "admin/unit/edit/$1";
$route['admin/unit/(:num)/delete'] = "admin/unit/edit/$1/delete";

// Admin/Exam
$route['admin/exam'] = "admin/exam/index/1";
$route['admin/exam/(:num)'] = "admin/exam/index/$1";
$route['admin/exam/edit'] = "admin/exam/edit/0";
$route['admin/exam/edit/(:num)'] = "admin/exam/edit/$1";
$route['admin/exam/(:num)/delete'] = "admin/exam/edit/$1/delete";


// Admin/Question
$route['admin/question/(:num)'] = "admin/question/index/$1";
$route['admin/question/(:num)/edit'] = "admin/question/edit/$1/0";
$route['admin/question/(:num)/edit/(:num)'] = "admin/question/edit/$1/$2";
$route['admin/question/(:num)/delete'] = "admin/question/edit/0/$1/delete";

// Admin/Purchase
$route['admin/purchase'] = "admin/purchase/index/1";
$route['admin/purchase/(:num)'] = "admin/purchase/index/$1";

// Admin/Qna
$route['admin/qna'] = "admin/qna/index/1";
$route['admin/qna/(:num)'] = "admin/qna/index/$1";
$route['admin/qna/edit'] = "admin/qna/edit/0";
$route['admin/qna/edit/(:num)'] = "admin/qna/edit/$1";


/* api/1.0 
$route['api/app/code'] = "api/app/code";
$route['api/auth/register'] = "api/auth/register";
$route['api/auth/login'] = "api/auth/login";
$route['api/user/out/id'] = "api/user/out/id";
$route['api/user/edit'] = "api/user/edit";
$route['api/post/add'] = "api/post/update/create";
$route['api/post/edit'] = "api/post/update/update";
$route['api/post/delete'] = "api/post/update/delete";
$route['api/post/out/notice'] = "api/post/out/notice";

$route['api/brand/add'] = "api/brand/update/create";
$route['api/brand/edit'] = "api/brand/update/edit";
$route['api/brand/delete'] = "api/brand/update/delete";
$route['api/brand/out/all'] = "api/brand/out/all";
$route['api/brand/out/brand'] = "api/brand/out/brand";

$route['api/model/add'] = "api/model/update/create";
$route['api/model/edit'] = "api/model/update/edit";
$route['api/model/delete'] = "api/model/update/delete";
$route['api/model/out/all'] = "api/model/out/all";
$route['api/model/out/brand'] = "api/model/out/brand";
$route['api/model/out/model'] = "api/model/out/model";

$route['api/grade/add'] = "api/grade/update/create";
$route['api/grade/edit'] = "api/grade/update/edit";
$route['api/grade/delete'] = "api/grade/update/delete";
$route['api/grade/out/all'] = "api/grade/out/all";
$route['api/grade/out/grade'] = "api/grade/out/grade";
$route['api/grade/out/gradename'] = "api/grade/out/gradename";

$route['api/option/add'] = "api/option/update/create";
$route['api/option/edit'] = "api/option/update/edit";
$route['api/option/delete'] = "api/option/update/delete";
$route['api/option/out/all'] = "api/option/out/all";

$route['api/color/add'] = "api/color/update/create";
$route['api/color/edit'] = "api/color/update/edit";
$route['api/color/delete'] = "api/color/update/delete";
$route['api/color/out/all'] = "api/color/out/all";

$route['api/zipcode/add'] = "api/zipcode/update/create";
$route['api/zipcode/edit'] = "api/zipcode/update/edit";
$route['api/zipcode/delete'] = "api/zipcode/update/delete";
$route['api/zipcode/out/all'] = "api/zipcode/out/all";
$route['api/zipcode/out/sido'] = "api/zipcode/out/sido";
$route['api/zipcode/out/sidoname'] = "api/zipcode/out/sidoname";

$route['api/car/add'] = "api/car/update/create";
$route['api/car/edit'] = "api/car/update/edit";
$route['api/car/edit/auction'] = "api/car/auctionupdate";
$route['api/car/delete'] = "api/car/update/delete";
$route['api/car/state'] = "api/car/update/state";
$route['api/car/delete'] = "api/car/update/delete";
$route['api/car/out/all'] = "api/car/out/all";
$route['api/car/out/id'] = "api/car/out/id";
$route['api/car/out/user'] = "api/car/out/user";
$route['api/car/out/standby'] = "api/car/out/standby";
$route['api/car/out/approval'] = "api/car/out/approval";
$route['api/car/out/refusal'] = "api/car/out/refusal";
$route['api/car/out/temp'] = "api/car/out/temp";
$route['api/car/out/complete'] = "api/car/out/complete";

$route['api/car/out/userstandby'] = "api/car/out/userstandby";
$route['api/car/out/userapproval'] = "api/car/out/userapproval";
$route['api/car/out/userrefusal'] = "api/car/out/userrefusal";
$route['api/car/out/usertemp'] = "api/car/out/usertemp";
$route['api/car/out/usercar'] = "api/car/out/usercar";
$route['api/car/out/usercomplete'] = "api/car/out/usercomplete";


$route['api/car/out/auctioncomplete'] = "api/car/out/auctioncomplete";
$route['api/car/out/userauctioncomplete'] = "api/car/out/userauctioncomplete";
$route['api/car/out/carauctioncomplete'] = "api/car/out/carauctioncomplete";


$route['api/auction/add'] = "api/auction/update/create";    
$route['api/auction/sale'] = "api/auction/update/sale";    
$route['api/auction/out/individual'] = "api/auction/out/individual";    
$route['api/auction/out/dealer'] = "api/auction/out/dealer";
$route['api/auction/out/user/individual'] = "api/auction/out/individualuser";    
$route['api/auction/out/user/dealer'] = "api/auction/out/dealeruser";
$route['api/auction/out/user'] = "api/auction/out/user";
$route['api/auction/out/car/individual'] = "api/auction/out/individualcar";    
$route['api/auction/out/car/dealer'] = "api/auction/out/dealercar";
$route['api/auction/out/car/auctionindividual'] = "api/auction/out/auctionindividual";    
$route['api/auction/out/car/auctiondealer'] = "api/auction/out/auctiondealer";
$route['api/auction/out/car'] = "api/auction/out/car";
$route['api/auction/out/car/usersale'] = "api/auction/out/car/usersale";

$route['api/auction/out/user/progressindividual'] = "api/auction/out/progressindividualuser";    
$route['api/auction/out/user/progressindividualdealer'] = "api/auction/out/progressindividualdealer";    
$route['api/auction/out/user/progressdealer'] = "api/auction/out/progressdealeruser";
$route['api/auction/out/progressuser'] = "api/auction/out/progressuser";
$route['api/auction/out/user/completeindividual'] = "api/auction/out/completeindividualuser";    
$route['api/auction/out/user/completeindividualdealer'] = "api/auction/out/completeindividualdealer";    
$route['api/auction/out/user/completedealer'] = "api/auction/out/completedealeruser";


$route['api/auction/out/completeuser'] = "api/auction/out/completeuser";

$route['api/conciliation/add'] = "api/conciliation/update/create";        
$route['api/conciliation/out/user'] = "api/conciliation/out/user";    
$route['api/conciliation/out/car'] = "api/conciliation/out/car";    

$route['api/notice/ping'] = "api/notice/ping";    

$route['api/auction/out/conciliation'] = "api/auction/out/conciliation";

$route['api/conciliation/add'] = "api/conciliation/update/create";    
$route['api/conciliation/out'] = "api/conciliation/out/auctionid";    
$route['api/conciliation/state'] = "api/conciliation/update/state";    
$route['api/conciliation/out/dealer/approval'] = "api/conciliation/out/dealerapproval";    
*/

/*
$route['api/review/add'] = "api/review/update/create"; 
$route['api/review/edit'] = "api/review/update/edit"; 
$route['api/review/delete'] = "api/review/update/delete"; 
$route['api/review/out/all'] = "api/review/out/all"; 
$route['api/review/out/id'] = "api/review/out/id"; 
$route['api/review/out/car'] = "api/review/out/car"; 
$route['api/review/out/user'] = "api/review/out/user"; 
$route['api/review/out/dealer'] = "api/review/out/dealer"; 

$route['api/admin/out/statistics'] = "api/admin/out/statistics"; 

$route['api/testform'] = "api/testform";
*/

/* admin
$route['admin'] = "admin/individual";
$route['admin/individual'] = "admin/individual";
$route['admin/individual/editor/(:num)/(:any)'] = "admin/individual/editor/$1/$2";
$route['admin/dealer'] = "admin/dealer";
$route['admin/dealer/editor/(:num)/(:any)'] = "admin/dealer/editor/$1/$2";
$route['admin/join'] = "admin/join";
$route['admin/join/editor/(:num)/(:any)'] = "admin/join/editor/$1/$2";
$route['admin/sales'] = "admin/sales";
$route['admin/sales/editor/(:num)/(:any)'] = "admin/sales/editor/$1/$2";
$route['admin/salesapproval'] = "admin/salesapproval";
$route['admin/salesapproval/editor/(:num)/(:any)'] = "admin/salesapproval/editor/$1/$2";
$route['admin/salescomplete'] = "admin/salescomplete";
$route['admin/salescomplete/editor/(:num)/(:any)'] = "admin/salescomplete/editor/$1/$2";
$route['admin/auctioncomplete'] = "admin/auctioncomplete";
$route['admin/auctioncomplete/editor/(:num)/(:any)'] = "admin/auctioncomplete/editor/$1/$2";
$route['admin/auctionfailure'] = "admin/auctionfailure";
$route['admin/auctionfailure/editor/(:num)/(:any)'] = "admin/auctionfailure/editor/$1/$2";

$route['admin/notice'] = "admin/notice";
$route['admin/notice/edit'] = "admin/notice/edit";
*/

/* file */
$route['api/upload'] = "api/upload";

/* 
**********************
*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* End of file routes.php */
/* Location: ./application/config/routes.php */