<?php 

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/source/App/Web.php";

use CoffeeCode\Router\Router;



$router = new Router(URL_BASE); //url_base é uma constante define que esta em Config 

/**
 * controllers
 */
$router->namespace("source\App");


/**
 *controller: WEB
 *method: home
 */
$router->group(null); //serve para automatizar uma camada da aplicação / o null indica que não quer usar nenhum grupo de url
$router->get("/", "Web:home"); //no lugar  da callback passou o controlador
$router->get("/{filter}", "Web:home");


/**
 * blog
 */
$router->group("blog");
$router->get("/", "Web:blog");
$router->get("/{post_uri}", "Web:post"); //o dinâmico sempre fica acima para não ser ignorado
$router->get("/categoria/{cat_uri}", "Web:category"); //sem {} estático / com {} dinâmico 

/**
 * contato
 */
$router->group("contato");
$router->get("/", "Web:contact");
$router->post("/", "Web:contact");
$router->delete("/", "Web:contact");
$router->get("/{sector}", "Web:contactSector"); //está apenas como exemplo(não implementado)
$router->get("/suporte", "Web:support"); //está apenas como exemplo(não implementado)

/**
*controller: ADMIN
*method: home
*/
$router->group("admin");
$router->get("/", "Admin:home");



/**
 * ERROS
 * 
 */
$router->group("ooops");
$router->get("/{errcode}","Web:error");

$router->dispatch();



if($router->error()){
    
$router->redirect("/ooops/{$router->error()}");
   
 }

