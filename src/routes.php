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

SimpleRouter::get('/packages/', function() {
    $search = filter_input(INPUT_GET, 'search', FILTER_UNSAFE_RAW);
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    $packageRows = PackageRows::make();

    if ($page !== null) {
        $packageRows->setPage($page);
    }

    if ($search !== null) {
        $packageRows->setSearch($search);
    }

    return $packageRows->render();
});

SimpleRouter::get('/package/{package_id}/', function($packageId) {
    //
});

SimpleRouter::get('/user/{user_id}/', function($userId) {
    //
});

SimpleRouter::error(function (Request $request, \Exception $exception) {
    switch($exception->getCode()) {
        // Page not found
        case 404:
            $request->setRewriteCallback(function() {
                response()->httpCode(404);
                return Page::make()->setChildren(['<h1>Not found</h1>'])->render();
            });
        // Forbidden
        case 403:
            $request->setRewriteCallback(function() {
                response()->httpCode(403);
                return Page::make()->setChildren(['<h1>Forbidden</h1>'])->render();
            });
    }
});
