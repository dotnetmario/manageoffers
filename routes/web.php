<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\OffersController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});



require __DIR__.'/auth.php';


// logged in routes
Route::middleware(['auth'])->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'show'])
			->name('dashboard');
	// offers routes
	Route::prefix('offers')->group(function () {
		
		// show the html add form
		Route::get('/create', [OffersController::class, 'create'])
				->name('offers-create');

				// show an offer
		Route::get('/{id}', [OffersController::class, 'show'])
		->name('offer');
		// action add offer to database
		Route::post('/create-action', [OffersController::class, 'createAction'])
				->name('offers-create-action');

		// show the edit form
		Route::get('/edit/{id}', [OffersController::class, 'edit'])
				->name('offers-edit');
		// action edit offer in database
		Route::post('/edit-action/{id}', [OffersController::class, 'editAction'])
				->name('offers-edit-action');

		// delete offer from database
		Route::get('/delete/{id}', [OffersController::class, 'delete'])
				->name('offers-delete-action');


		
	});

	Route::prefix('offer')->group(function () {
		// documents routes
		Route::prefix('{offer}/documents')->group(function () {
			// show the html add form
			Route::get('/create', [DocumentsController::class, 'create'])
					->name('documents-create');
			// action add document to database
			Route::post('/create-action', [DocumentsController::class, 'createAction'])
					->name('documents-create-action');

			// show the edit form
			Route::get('/edit/{id}', [DocumentsController::class, 'edit'])
					->name('documents-edit');
			// action edit document in database
			Route::post('/edit-action/{id}', [DocumentsController::class, 'editAction'])
					->name('documents-edit-action');

			// delete document from database
			Route::get('/delete/{id}', [DocumentsController::class, 'delete'])
					->name('documents-delete-action');
		});

		// task routes
		Route::prefix('{offer}/task')->group(function () {
			// show the html add form
			Route::get('/create', [TasksController::class, 'create'])
					->name('task-create');
			// action add document to database
			Route::post('/create-action', [TasksController::class, 'createAction'])
					->name('task-create-action');

			// show the edit form
			Route::get('/edit/{id}', [TasksController::class, 'edit'])
					->name('task-edit');
			// action edit document in database
			Route::post('/edit-action/{id}', [TasksController::class, 'editAction'])
					->name('task-edit-action');

			// delete document from database
			Route::get('/delete/{id}', [TasksController::class, 'delete'])
					->name('task-delete-action');
		});
	});

    
});
