<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController ;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route :: get('/add-student', [StudentController::class, 'addStudent']);
Route :: post('add-student', [StudentController::class, 'storeStudent'])->name('student.store');
Route :: get('/', [StudentController::class, 'sudents'])->name('students');
Route :: get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('edit.student');
Route :: post('/student-update', [StudentController::class, 'update'])->name('st.update');
Route :: get('/view-student/{id}', [StudentController::class, 'viewStudent'])->name('student.view');
Route :: get('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('student.delete');

