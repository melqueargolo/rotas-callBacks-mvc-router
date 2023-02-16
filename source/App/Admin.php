<?php  
//controller
namespace source\App;

class Admin
{
    public function home($data)
    {
        echo"<h1>Admin Home</h1>";
        var_dump($data);
    }
}
