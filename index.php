  <?php

  include  'config.php';
  include  'autoload.php';
  include  'rotas.php';
  
  $cidades = ['Jaú', 'Bariri', 'Itapui', 'Dois Córregos'];

 // var_dump($cidades);

 use ApiCep\Controller;

 include 'Controller/Controller.php';

 \ApiCep\Controller\Controller::getResponseAsJSON($cidades);