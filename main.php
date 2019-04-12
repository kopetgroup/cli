<?php
require 'vendor/autoload.php';

use Pimple\Container;

// load env
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$container = new Container();

$container['redis'] = function ($c) {
    return new Predis\Client($_ENV['REDIS']);
};

$container['cekfollowers'] = function ($c) {
    return new App\CekFollowers($c['redis']);
};

if (isset($argv['1'])) {
    $a = $argv['1'];
    try {
        $u = $container[$a];
        $u->main();
    } catch (\Throwable $th) {
        echo "no command 0\n";
    }
} else {
    echo "no command 1\n";
}
