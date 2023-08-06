<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Login Admin //
$route['admin'] = 'Login_admin/index';
$route['register'] = 'Login_admin/register';
$route['logoutAdmin'] = 'Login_admin/logout';
$route['logout'] = 'Login_admin/logout';

$route['listTeacher'] = 'ControllerUser/teacherData';
$route['addTeacher'] = 'ControllerUser/addTeacher';
$route['editTeacher/(:any)'] = 'ControllerUser/editTeacher/$1';
$route['listStudent'] = 'ControllerUser/studentData';
$route['addStudent'] = 'ControllerUser/addStudent';
$route['editStudent/(:any)'] = 'ControllerUser/editStudent/$1';

$route['listClass'] = 'Master/dataKelas';
$route['addClassData'] = 'Master/addDataKelas';
$route['editClassData/(:any)'] = 'Master/editDataKelas/$1';

// materials and assignments //
$route['listSubjects'] = 'MaterialAndTask/SubjectsData';
$route['addSubjects'] = 'MaterialAndTask/addSubjects';
$route['editSubject/(:any)'] = 'MaterialAndTask/editMapel/$1';

$route['scheduleOfSubjects'] = 'MaterialAndTask/scheduleOfSubjectsData';
$route['addSchedule'] = 'MaterialAndTask/addSchedule';
$route['editSchedule/(:any)'] = 'MaterialAndTask/editSchedule/$1';
$route['previewSchedule'] = 'MaterialAndTask/scheduleOfSubjectspreview';

$route['listDiscussion'] = 'MaterialAndTask/listDiscussion';
$route['addDiscussion'] = 'MaterialAndTask/addDiscussion';
$route['editDiscussion/(:any)'] = 'MaterialAndTask/editDiscussion/$1';

$route['taskEvaluation'] = 'MaterialAndTask/taskEvaluation';
