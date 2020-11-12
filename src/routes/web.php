<?php
    use Nhanduc\Core\Controllers\ContactController;

    Route::get('nhanduc/contact', [ContactController::class, 'index'])->name('nhanduc.contact.index');
    Route::post('nhanduc/contact', [ContactController::class, 'store'])->name('nhanduc.contact.store');
