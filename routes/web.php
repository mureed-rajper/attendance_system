<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashController as AdmindashController;
use App\Http\Controllers\Admin\AttendanceController as AdminAttendanceController;
use App\Http\Controllers\Admin\GradeController as AdminGradeController;
use App\Http\Controllers\Admin\LeaveController as AdminLeaveController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\User\DashController as UserdashController;
use App\Http\Controllers\User\ProfileController as ProfileController;
use App\Http\Controllers\User\AttendanceController as AttendanceController;
use App\Http\Controllers\User\StuReportController as StuReportController;
use App\Http\Controllers\User\UpgradController as UpgradController;
use App\Http\Controllers\User\LeaveController as LeaveController;
use App\Http\Middleware\Admin;

// user can access these files without login
Route::group(['middleware' => 'guest'], function(){

    Route::get('/register', [UserController::class, 'signpage'])->name('register');
    Route::post('/signuping', [UserController::class, 'sign'])->name('signup');

    Route::get('/login',[UserController::class, 'loginpage'])->name('login');
    Route::post('/signin',[UserController::class, 'signin'])->name('signin');
});

// authenticate user also access these files
Route::group(['middleware' => 'auth'], function(){

     // these routes for admin 
    Route::group(['middleware' => 'admin'], function(){
        
        Route::get('/', [AdmindashController::class, 'admindash'])->name('admindash');
         //admin profile 
        Route::get('/adminprofile', [AdmindashController::class, 'adminprofile'])->name('adminprofile');
        Route::get('/adminaddprofile', [AdmindashController::class, 'adminaddprofile'])->name('adminsetprofile');
        Route::post('/admingetprofile', [AdmindashController::class, 'admingetprofile'])->name('admingetprofile');
         //show all students 
        Route::get('/allstudents', [AdmindashController::class, 'allstudents'])->name('allstudents');
        //attendance 
        Route::get('/adminattendancess/{id}', [AdminAttendanceController::class, 'adminattendance'])->name('adminattend');
        Route::post('/adminmarkattend/{id}', [AdminAttendanceController::class, 'adminmarkattend'])->name('adminmarkattend');
        Route::get('/allattendan', [AdminAttendanceController::class, 'allattends'])->name('allattend');
        Route::get('/editattendance/{id}', [AdminAttendanceController::class, 'editattendance'])->name('editattendance');
        Route::post('/updateattendance/{id}', [AdminAttendanceController::class, 'updateattendance'])->name('updateattendance');
        Route::delete('/deleteattendance/{id}', [AdminAttendanceController::class, 'deleteattendance'])->name('deleteattendance');
        // all leaves
        Route::get('/allleaves',[AdminLeaveController::class, 'allleaves'])->name('allleaves');
        Route::get('/editleave/{id}',[AdminLeaveController::class, 'editleave'])->name('editleave');
        Route::post('/updateleave/{id}',[AdminLeaveController::class, 'updateleave'])->name('updateleave');
        
        // reports
        // these routes for absent students
        Route::get('/reports',[AdminReportController::class, 'reports'])->name('reports');
        Route::post('/getreport',[AdminReportController::class, 'getreport'])->name('getreport');
        Route::get('/allreports',[AdminReportController::class, 'allreports'])->name('allreports');
        Route::get('/editreport/{id}',[AdminReportController::class, 'editreport'])->name('editreport');
        Route::post('/updatereport/{id}',[AdminReportController::class, 'updatereport'])->name('updatereport');
        Route::delete('/deletereport/{id}',[AdminReportController::class, 'deletereport'])->name('deletereport');
        
        // this route for upgrading
        Route::get('/adminupgrading',[AdminGradeController::class, 'adminupgrad'])->name('adminupgrad');
        Route::post('/givegrades',[AdminGradeController::class, 'grades'])->name('grades');
        Route::get('/allgrades',[AdminGradeController::class, 'allgrades'])->name('allgrades');
        Route::get('/studentgrade/{id}',[AdminGradeController::class, 'studentgrade'])->name('studentgrade');
       
    });

     //these routes for student 
    Route::group(['middleware' => 'user'], function(){

         //students dashboard 
        Route::get('/userdash', [UserdashController::class, 'userdash'])->name('userdash');
         
         // students attendance routes  
        Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
        Route::post('/markattendance', [AttendanceController::class, 'markattendance'])->name('markattendance');
        Route::get('/allattendance', [AttendanceController::class, 'allattendance'])->name('allattendance');

         //students leaves routes 
        Route::get('/leave', [LeaveController::class, 'leave'])->name('leave');
        Route::post('/getleave', [LeaveController::class, 'getleave'])->name('getleave');
        Route::get('/leaves', [LeaveController::class, 'leaves'])->name('viewleave');
        Route::delete('/deleteleave/{id}', [LeaveController::class, 'deleteleave'])->name('deleteleave');
        
         //students profile
        Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('/getprofile', [ProfileController::class, 'getprofile'])->name('getprofile');
        Route::post('/setprofile', [ProfileController::class, 'setprofile'])->name('setprofile');

         // these route for student that are absent
         Route::get('/absentreport/{id}',[StuReportController::class, 'absentreport'])->name('absentreport');
         
         // this route for upgrading
         Route::get('/upgrading',[UpgradController::class, 'upgrading'])->name('upgrading');
    });

    // logout
    Route::get('/signout', [UserController::class, 'signout'])->name('signout');

});



?>
