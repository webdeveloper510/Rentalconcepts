<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfitlossController;
use App\Http\Controllers\RatioController;
use App\Http\Controllers\TrendsController;
use App\Http\Controllers\YtdController;
use App\Http\Controllers\ytdateController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpectController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\ITHelpController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ---------------------- ADMIN & USER LOGIN LOGOUT------------------------------
Route::get('/admin', [LoginController::class, "login"]);
Route::post('/admin', [LoginController::class, "loginvalidation"]);
Route::get('/admin/dashboard', [LoginController::class, "dashboard"]);
Route::get('/logout', [LoginController::class, "logout"]);
Route::get('/', [LoginController::class, "userlogin"]);
Route::post('/', [LoginController::class, "userdashboard"]);
Route::get('/userlogout', [LoginController::class, "userlogout"]);

// --------------------- ACCOUNTING ALL ROUTES -------------------------------------
Route::get('/accounting', [LoginController::class, "accountingLogin"]);
Route::post('/accounting', [LoginController::class, "accountingLoginValidation"]);
Route::get('/accounting/dashboard', [LoginController::class, "accountingDashboard"]);
Route::get('/accounting/logout', [LoginController::class, "accountingLogout"]);

// --------------------- IT HELP ALL ROUTES -------------------------------------
Route::get('/accounting/it-help', [ITHelpController::class, "itHelp"]);

// ---------------------- USER CHANGE & FORGET PASSWORD------------------------------
Route::get('/changepswrd/{id}', [LoginController::class, "changepswrd"]);
Route::post('/changepswrd/{id}', [LoginController::class, "updatepassword"]);
Route::post('/forgetpassword', [AdminController::class, "forgetpassword"]);
// ---------------------- ADMIN CREATE USER------------------------------
Route::get('/admin/newuser', [AdminController::class, "createuser"]);
Route::get('admin/viewusers', [AdminController::class, "siteuser"]);
Route::get('/edit/{id}', [AdminController::class, "edituser"]);
Route::post('admin/store', [AdminController::class, "saveuserdata"]);

// ---------------------- ADMIN LOCATION------------------------------
Route::get('admin/addlocation', [AdminController::class, "addlocation"]);
Route::post('admin/getcustomer', [AdminController::class, "getcustomer"]);
Route::get('admin/content', [FileController::class, "content"]);
Route::get('/admin/viewlocations', [AdminController::class, "showlocation"]);
Route::post('admin/addlocationdata', [AdminController::class, "addlocationdata"]);
Route::get('/edit-location/{id}', [AdminController::class, "editlocation"]);
Route::post('/update-location-data/{id}', [AdminController::class, "updatelocationdata"]);
Route::get('/delete-location/{id}', [AdminController::class, "deletelocationdata"]);

// ---------------------- ADMIN TIMECARD------------------------------

Route::get('admin/time-card', [AdminController::class, "timecardfile"]);
Route::post('admin/time-card', [AdminController::class, "timecard"]);


// ---------------------- ADMIN ADD DATA------------------------------

Route::get('/admin/viewdata', [AdminController::class, "showdata"]);

Route::post('/admin/revenuefile', [FileController::class, "file"]);
Route::post('/update-data/{id}', [AdminController::class, "updateuserdata"]);
Route::get('/delete-data/{id}', [AdminController::class, "deleteuserdata"]);

// Route::post('/view-location-data', [AdminController::class, "viewlocationsdata"]);
Route::post('admin/addadmindata', [FileController::class, "addadmindata"]);
Route::get('/edit-admin-data/{id}', [FileController::class, "editadmindata"]);
Route::get('/delete-admin-data/{id}', [FileController::class, "deleteadmindata"]);
Route::post('/update-admin-data/', [FileController::class, "updateadmindata"]);
Route::get('/createpassword/{email}', [AdminController::class, "createpassword"]);
Route::get('/admin/createpassword/{email}', [AdminController::class, "admincreatepassword"]);

// ---------------------- ADMIN CHANGE & FORGET PASSWORD------------------------------
Route::get('/forgetemail', [AdminController::class, "forgetemail"]);
Route::post('/forgetpassword', [AdminController::class, "forgetpassword"]);
Route::post('/changepassword', [AdminController::class, "changepassword"]);
Route::get('/admin/forgetemail', [AdminController::class, "adminforgetemail"]);
Route::post('/admin/forgetpassword', [AdminController::class, "adminforgetpassword"]);
Route::post('/admin/changepassword', [AdminController::class, "adminchangepassword"]);

// ---------------------- PERMISSIONS------------------------------

Route::get('admin/permission', [AdminController::class, "permissions"]);
Route::post('admin/permission', [AdminController::class, "permissions_save"]);

Route::get('/forget', [AdminController::class, "forget"]);
Route::post('/savepermissions', [AdminController::class, "save_permissions"]);
// Route::post('update/permission', [AdminController::class, "update_permissions"]);
Route::post('checked/permission/', [AdminController::class, "checked_permissions"]);

//-----------------------ADMIN VISITOR'S LOG----------------------------

Route::get('admin/visitors', [VisitorController::class, "visitorslog"]);
// ---------------------- USER DASHBOARD------------------------------

Route::post('/user', [LoginController::class, "calculation"]);
Route::get('/user', [LoginController::class, "userdashboard"]);
Route::get('/view-directory', [LoginController::class, "viewdirectorydata"]);
Route::post('/ytdate', [LoginController::class, "ytdcalculation"]);

// ---------------------- DATABASE------------------------------

// Route::any('adminer', '\Aranyasen\LaravelAdminer\AdminerAutologinController@index');

// ---------------------- ADD DIRECTORY------------------------------
Route::get('admin/directory', [AdminController::class, "directory"]);
Route::post('admin/directory', [AdminController::class, "savedirectory"]);

Route::get('admin/viewdirectory', [AdminController::class, "viewdirectory"]);
Route::get('/edit-directory/{id}', [AdminController::class, "editdirectory"]);
Route::post('updatedirectory/{id}', [AdminController::class, "updatedirectorydata"]);
Route::get('/delete-directory/{id}', [AdminController::class, "deletedirectorydata"]);

//------------------------ PROFIT-LOSS STATEMENT------------------------
Route::get('user/profit-loss-statements', [ProfitlossController::class, "statementview"]);
Route::post('user/profit-loss-statements', [ProfitlossController::class, "profitloss"]);
//---------------------------------- RATIO -------------------------------
Route::get('user/ratio', [RatioController::class, "viewratio"]);
Route::post('user/ratio', [RatioController::class, "ytdratio"]);
// -------------------------------TRENDS----------------------------------
Route::get('user/trends', [TrendsController::class, "viewtrends"]);
Route::post('user/trends', [TrendsController::class, "gettrends"]);
// -------------------------------YTD ANALYSIS--------------------------------
Route::get('user/ytdcompare', [YtdController::class, "viewytdcomp"]);
// -----------------------------YTD DATE------------------------------------
Route::get('user/ytddate', [ytdateController::class, "index"]);
//----------------------------STATS--------------------------------------
Route::get('user/view-stats', [StatsController::class, "index"]);
Route::post('user/view-stats', [StatsController::class, "stats"]);
Route::get('user/customer_stats', [StatsController::class, "stat_customer"])->name('statscustomer');
Route::get('user/total-income', [StatsController::class, "stats_total_income"])->name('statsincome');
Route::get('user/growth', [StatsController::class, "stats_growth"])->name('statsgrowth');
Route::post('user/dateopt', [StatsController::class, "stats_opt"])->name('statsopt');
Route::post('user/custopt', [StatsController::class, "cust_opt"])->name('custopt');
Route::get('user/cogs', [StatsController::class, "stats_cogs"])->name('statscogs');
Route::get('user/grossprofit', [StatsController::class, "stats_gross"])->name('statgross');
Route::get('user/expense', [StatsController::class, "stats_exp"])->name('statexp');
Route::get('user/netincome', [StatsController::class, "stats_net"])->name('statnet');
Route::post('user/cogopt', [StatsController::class, "cog_opt"])->name('statcog');
Route::post('user/grossopt', [StatsController::class, "gross_opt"])->name('grosopt');
Route::post('user/expenseopt', [StatsController::class, "exp_opt"])->name('expopt');
Route::post('user/netincopt', [StatsController::class, "net_opt"])->name('netopt');

//------------------------VIDEO UPLOAD -----------------------------------
Route::get('/video-upload', [UploadController::class, "index"]);
Route::post('/video-upload', [UploadController::class, "upload"]);

Route::get('/user/sales-training', [UploadController::class, "viewtraining"]);

// ---------------------- ADMIN DETAILS------------------------------
Route::get('/admin/details', [DetailsController::class, "index"]);
Route::post('/admin/details', [DetailsController::class, "selectedlocation"]);

// ---------------------- USER DETAILS------------------------------
Route::get('user/view-details', [DetailsController::class, "details"]);
// Route::post('/admin/getloc', [DetailsController::class, "gtlocation"]);
Route::get('{$file}', [DetailsController::class, "download_file"])->name('download');
Route::post('user/getdetail', [DetailsController::class, "getdetails"]);
Route::get('/admin/admindetail', [DetailsController::class, "viewadmindetail"]);
Route::get('/delete-detail/{id}', [DetailsController::class, "deleteadmindetails"]);
Route::post('user/default_loc', [DetailsController::class, "defaultloc"]);


// ---------------------- USER CURRENTDATA------------------------------
Route::get('user/view-currentdata', [CustomerController::class, "index"]);
// Route::post('user/view-currentdata',[CustomerController::class,"showdata"]);
Route::post('user/crrentdata', [CustomerController::class, "showcurrdata"]);

// Route::post('admin/showgraphs',[AdminController::class,'showgrphs']);
Route::post('/admin/dashboard', [AdminController::class, "showgrphs"]);

// --------------------------EXPECTATIONS-----------------------------
Route::get('admin/expectations', [ExpectController::class, 'index']);
Route::post('admin/expectations', [ExpectController::class, 'insertdata'])->name('expect_data');
Route::get('/delete-expectation/{id}', [ExpectController::class, "deletedata"]);
Route::get('user/view-expectations', [ExpectController::class, 'view_exp']);
Route::post('user/view-expectations', [ExpectController::class, 'get_exp']);

//-----------------------------PRINTOUT--------------------------------

Route::get('admin/printout_packets', [PrintController::class, 'index']);
Route::post('admin/printout_packets', [PrintController::class, 'getlocat']);
Route::get('/admin/downloadpdf/{fileName}', [PrintController::class, 'downloadpdf']);
Route::get('/admin/downloadexcel/{xlsfileName}', [PrintController::class, 'downloadexcel']);

//--------------------------------REGIONS-------------------------------------
Route::get('admin/regions', [RegionController::class, 'north_index']);
Route::post('admin/regions', [RegionController::class, 'data']);
Route::get('user/regions', [RegionController::class, 'user_index']);

Route::get('user/region-new', [RegionController::class, 'user_region_new']);

//-------------------------COMPANY------------------------------------
Route::get('users/company', [CompanyController::class, 'index']);
Route::post('user/getoptions', [CompanyController::class, 'data'])->name('getoption');

//------------------------PAGE-ACCESS---------------------------------

Route::get('admin/access', [AccessController::class, 'index']);
Route::post('checked/users/', [AccessController::class, "checked_users"]);
Route::get('user/presentation', [AccessController::class, "presentation_view"]);
Route::get('admin/company-access', [AccessController::class, 'company_access']);
Route::post('admin/company-access-resp', [AccessController::class, 'give_company_access']);
Route::post('admin/manager-company-access', [AccessController::class, 'give_company_access_manager']);



Route::get('user/bonus', [AccessController::class, 'user_bonus']);
Route::post('/customer_count', [AccessController::class, 'customer_count']);
Route::post('user/bonus', [AccessController::class, "bonus_calculation"]);

Route::get('/highlights', [AccessController::class, "highlight"]);
Route::post('/highlights', [LoginController::class, "calculation_highlight"]);

Route::get('/daily-stats', [AccessController::class, "daily_stats"]);


// ROUTES FOR DAILY REPORT 
Route::get('/admin/add-daily-report', [DailyReportController::class, "index"]);
Route::post('/admin/upload-daily-report', [DailyReportController::class, "uploadDailyReport"]);
Route::get('/admin/view-daily-report', [DailyReportController::class, "viewDailyReport"]);
