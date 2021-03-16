<?php


$server = new Swoole\HTTP\Server("0.0.0.0", 9501);

$server->on("start", function (Swoole\Http\Server $server) {
    echo "Swoole http server is started at http://0.0.0.0:9501\n";
});

$server->on("request", function (Swoole\Http\Request $request, Swoole\Http\Response $response) {
    print_r($request->server['path_info']);
//    print_r($request->getData());
    var_dump($request->getContent());
    $response->header("Content-Type", "text/plain");
    $response->end("Hello World\n");
});


$server->start();