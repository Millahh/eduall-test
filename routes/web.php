<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get("/", [SearchController::class, 'products']);

Route::get("search",[SearchController::class,'search'])->name('product.search');

Route::get('/pagination/paginate-data', [SearchController::class,'pagination']);
