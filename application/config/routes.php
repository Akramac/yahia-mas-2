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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['index'] = 'welcome';
$route['student/exam'] = 'student/exam';
$route['student/pass/exam/(:any)'] = 'student/studentExam/$1';
$route['student/list/exam'] = 'student/studentListExam';
$route['student/list/exam-by-category'] = 'student/studentListExamByCategory';
$route['student/list/exam/(:any)'] = 'student/studentListExam/$1';
$route['student/list/exam-by-category/(:any)'] = 'student/studentListExamByCategory/$1';
$route['student/add-exam'] = 'student/studentaddExamToDB';
$route['teacher/teacher-exam'] = 'teacher/teacherExam';
$route['teacher/exam'] = 'teacher/exam';
$route['teacher/list/exam-by-teacher/(:any)'] = 'teacher/studentListExamByTeacher/$1';
$route['teacher/result/exam-by-teacher/(:any)/(:any)'] = 'teacher/studentResultExamByTeacher/$1/$2';
$route['teacher/affect/exam-by-teacher/(:any)'] = 'teacher/affectExamByTeacher/$1';

$route['admin/administration'] = 'admin/administration';
$route['admin/administration/(:any)'] = 'admin/administration/$1';
$route['admin/edit/exam/(:any)'] = 'admin/editExam/$1';
$route['admin/update/teachers-by-exam'] = 'admin/updateTeachersByExam';

$route['admin/add-category'] = 'admin/addCategory';

$route['register'] = 'security/register';
$route['login'] = 'security/login';
$route['change-password'] = 'security/changePassword/pageChangePassword';
$route['change-password-treatment'] = 'security/changePassword/changePassword';
$route['register/validation'] = 'security/register/validation';

$route['login/validation'] = 'security/login/validation';
$route['logout'] = 'welcome/logout';

$route['teacher/add-exam'] = 'teacher/addExam';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
