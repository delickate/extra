<?php

use Tests\Feature\ExampleTest;

Route::get('etest1', [ExampleTest::class, 'etest1'])->name('eloquent.test1');
Route::get('etest2', [ExampleTest::class, 'etest2'])->name('eloquent.test2');

?>