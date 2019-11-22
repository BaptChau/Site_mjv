<?php

namespace App;
use AltoRouter;

class Router 
{

    /**
     * Undocumented variable
     *
     * @var string
     */
    private $viewPath;
    
    /**
     * @var AltoRouter
     */
    private $router;

    public function __construct(string $viewPath)
    {
        
        $this->viewPath = $viewPath;
        $this->router = new \AltoRouter();
        // $this->router->setBasePath('/alto-app/');
    }

    public function get (string $url, string $view, ?string $name = null) :self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function run() :self
    {
        $match = $this->router->match();
        // var_dump($match);
        $view = $match['target'];
        // var_dump($view);
        \ob_start();
        $router = $this->router;
        require $this->viewPath . DIRECTORY_SEPARATOR .$view . '.php';
        $content = \ob_get_clean();
        // $content = 'test';
        require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/default.php';
        
        return $this;
    }
}