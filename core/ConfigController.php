<?php

namespace Core;

class ConfigController
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;

    public function __construct()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))){
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            $this->urlArray = explode("/", $this->url);
           
            if (isset($this->urlArray[0]) && isset($this->urlArray[1])){
                $this->urlController = $this->urlArray[0];
                $this->urlMetodo = $this->urlArray[1];
            } else {
                $this->urlController = "erro";
                $this->urlMetodo = "index";
            }
        } else {
            $this->urlController = "home";
            $this->urlMetodo = "index";
            
        }
    }

    public function loadPage()
    {
        $classLoad = "\\Sts\Controllers\\" . $this->urlController;
        $classPage = new $classLoad;

        $classPage->index();
    }
}