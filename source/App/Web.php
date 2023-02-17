<?php
//controller

//acrescentado no composer/autoload/files


namespace source\App;

class Web
{
    public function home($data)
    {
        echo "<h1>Web Home</h1>";
        var_dump($data);
    }

    public function blog($data)
    {
        echo "<h1>Web Blog</h1>";
        var_dump($data);
    }

    public function post($data)
    {
        echo "<h1>Web Artigo</h1>";
        var_dump($data);
    }

    public function category($data)
    {
        echo "<h1>Web Categoria</h1>";
        var_dump($data);
    }

    public function contact($data)
    {
        echo "<h1>web Contato</h1>";
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        $url = URL_BASE;
        require __DIR__ ."/../../views/contact.php";     //pode usar twig ou plates para renderizar
    }

    public function error($data)
    {
        echo "<h1>Web Erro {$data["errcode"]}</h1>";
        var_dump($data);
    }

}
