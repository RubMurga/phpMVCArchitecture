<?php

class App 
{
  protected $controller = 'home';
  protected $method = 'index';
  protected $params = [];

  public function __construct(){
    $url = $this->parseUrl();
    if(file_exists('../app/controllers/'. $url[0] .'.php')){
      $this->controller = $url[0];
      unset($url[0]);
    }
    require_once '../app/controllers/' .$this->controller . '.php';
    $this->controller = new $this->controller();
    if(isset($url[1])){
      if(method_exists($this->controller, $url[1])){
        $this->method = $url[1];
        unset($url[1]);
      }
    }
    $this->params = $url ? array_values($url) : [];  
    call_user_func_array([$this->controller,$this->method], $this->params);
  }

  public function parseUrl(){
    if(isset($_GET['url'])){
      return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
      // array explode ( string $delimiter , string $string [, int $limit = PHP_INT_MAX ] )
      //  Devuelve un array de string, siendo cada uno un substring del parámetro string formado 
      //por la división realizada por los delimitadores indicados en el parámetro delimiter. 
      // filter_var filtra una variable con un filtro especificado
      // El filtro FILTER_SANITIZE_URL elimina todos los caracteres de URL ilegales de una cadena.
      // La función rtrim () elimina el espacio en blanco u otros caracteres predefinidos del lado derecho de una cadena.
    }
  }
  
}