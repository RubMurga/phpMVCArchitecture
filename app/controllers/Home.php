<?php

class Home extends Controller{
  
  public function prueba($correo = ''){
    $model = $this->get_model('PruebaDB');
    $user = $model->get_user_info($correo);
    $this->return_view('test', ['user' => $user]);
  }
  
}