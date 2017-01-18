<?php

namespace Core;


abstract class BaseController
{
    protected $view;
    private $viewPath;
    private $layoutPath;

    public function __construct()
    {
        $this->view = new \stdClass;
    }

    protected function renderView($viewPath, $layoutPath = null)
    {
        $this->viewPath = $viewPath;
        $this->layoutPath = $layoutPath;
        if($layoutPath){
            $this->layout();
        }else{
            $this->content();
        }
    }

    protected function content()
    {
        if(file_exists(__DIR__ . "/../app/Views/{$this->viewPath}.phtml")){
            require_once __DIR__ . "/../app/Views/{$this->viewPath}.phtml";
        }else{
            echo "Error: View path not found!";
        }
    }

    protected function layout()
    {
        if(file_exists(__DIR__ . "/../app/Views/{$this->layoutPath}.phtml")){
            require_once __DIR__ . "/../app/Views/{$this->layoutPath}.phtml";
        }else{
            echo "Error: Layout path not found!";
        }
    }
}