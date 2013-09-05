<?php

$handle = Config::get('placeholder::placeholder.handle');

Route::get($handle.'/{width}/{height}/{color?}', 'Cdtx\Placeholder\Controllers\PlaceholderController@generate');
