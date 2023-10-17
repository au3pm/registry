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

SimpleRouter::get('/hello', function() {
    $database = Database::getInstance();
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("LinkedList", "genius257", "1.0.0", "genius257/au3LinkedList", "ee3944d31a6771c46e170a0634bce7eb5bf0a1be")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("StringRegExpSplit", "genius257", "1.0.0", "genius257/StringRegExpSplit", "d4e816dbb16a750855b3de33bc93e5df25a3fe60")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("LinkedList", "seadoggie01", "1.0.2", "seadoggie01/Acro.au3", "3d2920994c39fe1ed191cb3ca23743b18f9f50d6")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3class", "genius257", "1.0.0", "genius257/au3class", "8b8e241d16735f7aba589ba19bb578acc40102da")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3class", "genius257", "1.0.1", "genius257/au3class", "cbb2e96d748bd2b7b2093cef197ead0e59ab4d3f")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3class", "genius257", "1.0.2", "genius257/au3class", "c35a6f16126db6d3770a3df102a6ed8744a442ac")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3class", "genius257", "1.0.3", "genius257/au3class", "5e219ce84d33cd02a330883244128409b2710969")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3json", "genius257", "1.0.0", "genius257/au3json", "42a571060e3856d6b4fc3a9a80677d267f610b88")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3json", "genius257", "1.1.0", "genius257/au3json", "723ce2430e00c037453b7cb92fe5465f610e13b6")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3json", "genius257", "1.1.1", "genius257/au3json", "cd900e8edad9b64ae80645e8a6242a4e8c09cde2")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3obj", "genius257", "1.0.0", "genius257/AutoItObject-Internal", "b07ee98cae4d535f45379f322a0d9e2e464b972b")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3obj", "genius257", "3.0.0", "genius257/AutoItObject-Internal", "be0c0c28350d5fc66cdeb25208d68dda448a74ef")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3unit", "genius257", "1.0.0", "genius257/au3unit", "6bbab30f974fb535dbe1c67bb45e7b722867b2ee")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3unit", "genius257", "1.0.1", "genius257/au3unit", "193aedca9a3d5483d2a91fad6c1b1319bde03bd0")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("au3unit", "genius257", "1.1.0", "genius257/au3unit", "d42f77092db47b4f5193d71b73c77983ce9957dc")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("semver", "genius257", "1.0.0", "genius257/au3-semver", "833b0cbe450c76cdaafd41bc5807d4a99be59593")');
    $database->exec('INSERT INTO packages (name, author, version, repo, sha) VALUES ("semver", "genius257", "1.1.0", "genius257/au3-semver", "b6c863783d7e131663f9bf3744d2392744d7edaf")');
    return $database->getPackages(1);
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
