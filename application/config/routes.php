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

/* MAIN ROUTES */
$route['default_controller'] = 'homepage/Homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/**
 * ==========================
 *
 * LANDING PAGE ROUTES
 *
 * ==========================
 */

/*FE ROUTES*/
$route['homepage'] 							= 'homepage/Homepage';
$route['submit-email-fed']					= 'homepage/Homepage/emailSubmit';
$route['about'] 							= 'homepage/AboutUs';
$route['gallery'] 							= 'homepage/Gallery';
$route['courses'] 							= 'homepage/Course';
$route['course/detail/(:any)'] 				= 'homepage/Course/show/$1';
$route['course/register/(:any)']			= 'homepage/Course/Register/$1';
$route['course/register-save']				= 'homepage/Course/save';
$route['course/register-success-feedback']	= 'homepage/Course/registerFeedback';
$route['broker'] 							= 'homepage/Broker';
$route['article'] 							= 'homepage/Article';
$route['articles/(:num)'] 					= 'homepage/Article';
$route['article/search']					= 'homepage/Article/search';
$route['article/search/(:any)']				= 'homepage/Article/search/$1';
$route['article/search/(:any)/(:num)']		= 'homepage/Article/search/$1/$2';
$route['article/read/(:any)']				= 'homepage/Article/details/$1';
$route['contact'] 							= 'homepage/ContactUs';
$route['mitra']								= 'homepage/MitraFeducation';
$route['presensi']							= 'homepage/presensiIntern';
$route['presensi/save']						= 'homepage/presensiIntern/save';
$route['presensi/(:any)']					= 'homepage/presensiIntern/saveFeedback/$1';

/**
 * ==========================
 *
 * AUTHENTICATION ROUTES
 *
 * ==========================
 */

// Admin Auth
// $route['admin/login']							= 'authentication/AdminAuth/login';
// $route['admin/authentication']					= 'authentication/AdminAuth/authentication';
// $route['admin/verify']							= 'authentication/AdminAuth/verify';
// $route['admin/logout']							= 'authentication/AdminAuth/logout';
// $route['admin/profile/password']				= 'authentication/AdminAuth/password';
// $route['admin/profile/password/update']			= 'authentication/AdminAuth/passwordUpdate';
// $route['admin/notification/setStatus/(:num)'] 	= 'authentication/AdminAuth/setNotificationOpened/$1';


// Member Auth
// new
$route['member/login']				= 'authentication/MemberAuth/login';
$route['member/authentication']		= 'authentication/MemberAuth/authentication';
$route['member/register']			= 'authentication/MemberAuth/register';
$route['member/verify']				= 'authentication/MemberAuth/verify';
$route['member/logout']				= 'authentication/MemberAuth/logout';
$route['member/password/reset'] 	= 'authentication/MemberAuth/memberForgotPassword';
// $route['member/notification/setStatus/(:num)'] 	= 'authentication/MemberAuth/setNotificationOpened/$1';

// old
// $route['member/register'] 		= 'authentication/MemberRegistration';
// $route['member/verify'] 			= 'authentication/MemberRegistration/memberVerify';

/**
 * =================================================================
 *
 *                            ADMIN ROUTES
 *
 * =================================================================
 */

/* Admin */
$route['admin'] 		= 'admin/Admin';
$route['admin/login'] 	= 'admin/AdminLogin';

// Admin Member
$route['admin/member']			    = 'admin/operasional/AdminMember';
$route['admin/member/edit/(:num)']	= 'admin/operasional/AdminMember/edit/$1';
$route['admin/member/update']	    = 'admin/operasional/AdminMember/update';

/**
 * 
 *  ADMIN COURSE ROUTES
 * 
*/

// Admin Courses
$route['admin/courses'] 				    = 'admin/operasional/AdminCourse';
$route['admin/course/create']		    	= 'admin/operasional/AdminCourse/create';
$route['admin/course/save']				    = 'admin/operasional/AdminCourse/save';
$route['admin/course/edit/(:num)']	    	= 'admin/operasional/AdminCourse/edit/$1';
$route['admin/course/update']		    	= 'admin/operasional/AdminCourse/update';
$route['admin/course/delete/(:num)']	    = 'admin/operasional/AdminCourse/delete/$1';

// Admin Course Intakes
$route['admin/course/(:num)/moduls'] 		        = 'admin/operasional/AdminCourseModul/moduls/$1/$2';
$route['admin/course/(:num)/modul/add']		        = 'admin/operasional/AdminCourseModul/create/$1';
$route['admin/course/modul/save']				    = 'admin/operasional/AdminCourseModul/save';
$route['admin/course/(:num)/modul/(:num)/edit']	    = 'admin/operasional/AdminCourseModul/edit/$1/$2';
$route['admin/course/modul/update']                 = 'admin/operasional/AdminCourseModul/update';
$route['admin/course/(:num)/modul/(:num)/delete']	= 'admin/operasional/AdminCourseModul/delete/$1/$2';

// Admin Course Categories
$route['admin/course/category']		    = 'admin/operasional/AdminCourseCategories';
$route['admin/course/category/save']	= 'admin/operasional/AdminCourseCategories/save';
$route['admin/course/category/update']	= 'admin/operasional/AdminCourseCategories/update';

// Admin Course Types
$route['admin/course/types']		    = 'admin/operasional/AdminCourseTypes';
$route['admin/course/types/save']	    = 'admin/operasional/AdminCourseTypes/save';
$route['admin/course/types/update']	    = 'admin/operasional/AdminCourseTypes/update';

// Admin Course Tutor
$route['admin/course/tutor']				    = 'admin/operasional/AdminCourseTutors';
$route['admin/course/tutor/create']			    = 'admin/operasional/AdminCourseTutors/create';
$route['admin/course/tutor/save']				= 'admin/operasional/AdminCourseTutors/save';
$route['admin/course/tutor/edit/(:num)']		= 'admin/operasional/AdminCourseTutors/edit/$1';
$route['admin/course/tutor/update']			    = 'admin/operasional/AdminCourseTutors/update';
$route['admin/course/tutor/delete/(:num)']		= 'admin/operasional/AdminCourseTutors/delete/$1';

// Admi Highlighted Course
$route['admin/course/highlight']                 = 'admin/operasional/AdminHighlightedCourse';
$route['admin/course/highlight/create']          = 'admin/operasional/AdminHighlightedCourse/create';
$route['admin/course/highlight/save']            = 'admin/operasional/AdminHighlightedCourse/save';
$route['admin/course/highlight/edit/(:num)']     = 'admin/operasional/AdminHighlightedCourse/edit/$1';
$route['admin/course/highlight/update']          = 'admin/operasional/AdminHighlightedCourse/update';
$route['admin/course/highlight/delete/(:num)']   = 'admin/operasional/AdminHighlightedCourse/delete/$1';

// Admin Course Registration
$route['admin/course/registration']				    = 'admin/operasional/AdminCourseRegistration';
$route['admin/course/registration/edit/(:num)']	    = 'admin/operasional/AdminCourseRegistration/edit/$1';
$route['admin/course/registration/update']		    = 'admin/operasional/AdminCourseRegistration/update';

/**
 * 
 *  ADMIN ARTICLE ROUTES
 * 
*/

// Admin article
$route['admin/article'] 				= 'admin/operasional/AdminArticle';
$route['admin/article/create'] 			= 'admin/operasional/AdminArticle/create';
$route['admin/article/save'] 			= 'admin/operasional/AdminArticle/save';
$route['admin/article/edit/(:num)'] 	= 'admin/operasional/AdminArticle/edit/$1';
$route['admin/article/update'] 			= 'admin/operasional/AdminArticle/update';
$route['admin/article/delete/(:num)'] 	= 'admin/operasional/AdminArticle/delete/$1';

// Admin Article Categories
$route['admin/article/category']		= 'admin/operasional/AdminArticleCategories';
$route['admin/article/category/save']	= 'admin/operasional/AdminArticleCategories/save';
$route['admin/article/category/update']	= 'admin/operasional/AdminArticleCategories/update';

// Admin Featured Article
$route['admin/featuredArticle'] 				= 'admin/operasional/AdminFeaturedArticle';
$route['admin/featuredArticle/create'] 			= 'admin/operasional/AdminFeaturedArticle/create';
$route['admin/featuredArticle/save'] 			= 'admin/operasional/AdminFeaturedArticle/save';
$route['admin/featuredArticle/edit/(:num)'] 	= 'admin/operasional/AdminFeaturedArticle/edit/$1';
$route['admin/featuredArticle/update'] 			= 'admin/operasional/AdminFeaturedArticle/update';
$route['admin/featuredArticle/delete/(:num)'] 	= 'admin/operasional/AdminFeaturedArticle/delete/$1';

/**
 * 
 *  ADMIN PUBLIC RELATIONS ROUTES
 * 
*/

// Admin Fast Respons Feedback
$route['visitors-feedback'] 	            = 'admin/operasional/AdminFeedbacks';

// Admin Public relation Intern
$route['admin/pr/intern/list']				= 'admin/operasional/AdminIntern';
$route['admin/pr/intern/create']			= 'admin/operasional/AdminIntern/create';
$route['admin/pr/intern/save']				= 'admin/operasional/AdminIntern/save';
$route['admin/pr/intern/edit/(:num)']		= 'admin/operasional/AdminIntern/edit/$1';
$route['admin/pr/intern/update']			= 'admin/operasional/AdminIntern/update';
$route['admin/pr/intern/delete/(:num)']		= 'admin/operasional/AdminIntern/delete/$1';
$route['admin/pr/intern/presensi']			= 'admin/operasional/AdminIntern/presensi';

// Admin Public relation Mitra
$route['admin/pr/mitra/bisnis']				= 'admin/operasional/AdminMitra';
$route['admin/pr/mitra/bisnis/create']		= 'admin/operasional/AdminMitra/create';
$route['admin/pr/mitra/bisnis/save']		= 'admin/operasional/AdminMitra/save';
$route['admin/pr/mitra/bisnis/edit/(:num)']	= 'admin/operasional/AdminMitra/edit/$1';
$route['admin/pr/mitra/bisnis/update']		= 'admin/operasional/AdminMitra/update';

/**
 * 
 *  ADMIN FINANCES ROUTES
 * 
*/

// Admin Finance
$route['admin/commission']				= 'admin/operasional/AdminFinance/allCommission';
$route['admin/royalty']					= 'admin/operasional/AdminFinance/allRoyalty';
$route['admin/withdrawal']				= 'admin/operasional/AdminFinance/allWithdarwal';
$route['admin/withdrawal/edit/(:num)']	= 'admin/operasional/AdminFinance/withdrawalEdit/$1';
$route['admin/withdrawal/update']		= 'admin/operasional/AdminFinance/withdrawalUpdate';

// Admin Benefits
$route['admin/benefits']				= 'admin/setting/AdminBenefits';
$route['admin/benefits/create']			= 'admin/setting/AdminBenefits/create';
$route['admin/benefits/save']			= 'admin/setting/AdminBenefits/save';
$route['admin/benefits/edit/(:num)']	= 'admin/setting/AdminBenefits/edit/$1';
$route['admin/benefits/update']			= 'admin/setting/AdminBenefits/update';
$route['admin/benefits/delete/(:num)']	= 'admin/setting/AdminBenefits/delete/$1';

// Admin Bank Account
$route['admin/bankAccount']					= 'admin/setting/AdminBankAccount';
$route['admin/bankAccount/create']			= 'admin/setting/AdminBankAccount/create';
$route['admin/bankAccount/save']			= 'admin/setting/AdminBankAccount/save';
$route['admin/bankAccount/edit/(:num)']		= 'admin/setting/AdminBankAccount/edit/$1';
$route['admin/bankAccount/update']			= 'admin/setting/AdminBankAccount/update';
$route['admin/bankAccount/delete/(:num)']	= 'admin/setting/AdminBankAccount/delete/$1';

/* ./end of Admin routes */


/**
 * =================================================================
 *
 *                            MEMBER ROUTES
 *
 * =================================================================
 */

/* Member */
$route['member']    = 'member/operasional/Member/index';
/**
 *  
 *  MEMBER COURSES ROUTES
 * 
*/

// Courses
$route['member/course/view']    = 'member/operasional/MemberCourseOverview';
$route['member/course/watch']   = 'member/operasional/MemberCourseWatch';
$route['member/tutor/view']     = 'member/operasional/MemberTutorOverview';

// My courses
$route['member/course/playlists']       = 'member/operasional/MemberCoursePlaylists';
$route['member/courses/registration']   = 'member/operasional/MemberCoursesRegistration';



/**
 *  
 *  MEMBER AFILIATION ROUTES
 * 
*/

// Referal
$route['member/referal'] 	        = 'member/operasional/MemberReferal';
$route['member/referal/structure'] 	= 'member/operasional/MemberReferalStructure';
$route['member/referal/comission'] 	= 'member/operasional/MemberComission';
$route['member/royalty'] 		    = 'member/operasional/MemberRoyalty';
$route['member/withdrawal'] 	    = 'member/operasional/MemberWithdrawal';
$route['member/withdrawal/save']    = 'member/operasional/MemberWithdrawal/save';

/**
 *  
 *  MEMBER ACCOUNTS ROUTES
 * 
*/

// Member Profile
$route['member/profile'] 			= 'member/setting/MemberProfile';
$route['member/profile/update'] 	= 'member/setting/MemberProfile/update';

// Member Bank Account
$route['member/bank/account']               = 'member/setting/MemberBankAccount';
$route['member/bank/account/save']          = 'member/setting/MemberBankAccount/save';
$route['member/bank/account/update']        = 'member/setting/MemberBankAccount/update';
$route['member/bank/account/delete/(:num)'] = 'member/setting/MemberBankAccount/delete/$1';

// Member Password
$route['member/password']           = 'member/setting/MemberPassword';
$route['member/password/update']    = 'member/setting/MemberPassword/update';

/* ./end OF Member */
