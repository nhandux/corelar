<?php
    use Nhanduc\Core\Controllers\CoreController;

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('', [CoreController::class, 'dashboard'])->name('dashboard');
        Route::get('login', [CoreController::class, 'login'])->name('login');

        Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
            Route::get('user', [CoreController::class, 'userIndex'])->name('user.index');
            Route::get('admin', [CoreController::class, 'adminIndex'])->name('admin.index');
        });
        
        Route::get('notice', [CoreController::class, 'noticeIndex'])->name('notice.index');
    });
