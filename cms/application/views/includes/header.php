<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf=8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>

    <link href="/styles/css/bootstrap.css" rel="stylesheet">
    <link href="/styles/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top menu-color" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
        <a href="/" class="btn btn-goto-web navbar-btn navbar-left">
          <span class="glyphicon glyphicon-globe"></span>  Ir a la web
        </a>
    </div>
    
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="<?php echo $this->config->item('base_url'); ?>user">Usuarios</a></li>
            <li><a href="<?php echo $this->config->item('base_url'); ?>comment">Comentarios</a></li>
        </ul>
        <a href="dashboard/logout" class="btn btn-logout navbar-btn navbar-right">
          <span class="glyphicon glyphicon-off"></span> Salir
        </a>
    </div>
    
  </div>
</nav>
    