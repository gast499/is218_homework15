<?php
  class Model{
    public $password;
    public $reset;

    public function __construct(){
        $this->password = "abc123";
        $this->reset = "Click here to reset the password.";
    }

  }
  
  class View{
    private $model;
    private $controller;

    public function __construct($controller,$model) {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function output() {
      //echo '';
      return '<a href="mvc.php?action=clicked" rel="nofollow">'.$this->model->reset."</a>";
    }
  }
  
  class Controller{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function clicked() {
        $this->model->password = "XyZ962";
    }
  }
  
  echo '<h3>MVC Application</h3>';
  $model = new Model();
  echo 'A user would like to log into his computer but forgot his password.<br>';
  echo 'He would like to reset it.  Before the reset, his password was: ' . "$model->password" . '<br><br>';;
  $controller = new Controller($model);
  $view = new View($controller, $model);

  if(isset($_GET['action']) && !empty($_GET['action'])){
    $controller = $controller->$_GET['action']();
  }
  echo $view->output();
  echo '<br><br>After the reset, the new password is:<br>';
  echo "$model->password";
?>