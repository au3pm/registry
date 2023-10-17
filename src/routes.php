<?php

use Au3pm\Registry\Components\PackageRows;
use Au3pm\Registry\Components\PackageTable;
use Au3pm\Registry\Components\Page;
use Au3pm\Registry\Components\Table;
use Au3pm\Registry\Components\Thead;
use Au3pm\Registry\Database;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

require_once(__DIR__ . '/../vendor/pecee/simple-router/helpers.php');

SimpleRouter::get('/', function() {
    $table = PackageTable::make();
    $table->setChildren([
        PackageRows::make()->setPage(1)
    ]);

    return Page::make()->setChildren([$table])->render();
});

SimpleRouter::get('/not-found', function() {
    response()->httpCode(404);
    return 'Not found';
});

SimpleRouter::get('/forbidden', function() {
    response()->httpCode(403);
    return 'Forbidden';
});

SimpleRouter::error(function (Request $request, \Exception $exception) {
    switch($exception->getCode()) {
        // Page not found
        case 404:
            response()->redirect('/not-found');
        // Forbidden
        case 403:
            response()->redirect('/forbidden');
    }
});
