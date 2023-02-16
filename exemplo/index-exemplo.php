<?php 

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;


$router = new Router(projectUrl: URL_BASE); //url_base é uma constante que esta em config 

$router->group(group:null); //serve para automatizar uma camada da aplicação / o null indica que não quer usar nenhum grupo de url


$router->get("/",  function($data){
    echo "<H1>Olá Mundo!</H1>";
    var_dump($data);
});

$router->get("/contato",  function($data){
    echo "<H1>aqui é o cantato</H1>";
    var_dump($data);
});

$router->group(group:"ops");
$router->get("/{errcode}", function($data){
    echo "<H1>Erro {$data["errcode"]}</H1>";
    var_dump($data);
});


$router->dispatch();

if ($router->error()) {
    $router->redirect(route:"/ops/". $router->error());
}