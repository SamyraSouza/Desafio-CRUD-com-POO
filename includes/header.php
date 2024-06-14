<!DOCTYPE html>
<html lang="pt-BR">
  <head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="./assets/img/livro.png">

<title>Livraria</title>
<link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="g-sidenav-show  bg-gray-100">
    
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="index.php">
      
      <span class="ms-1 font-weight-bold text-white">Gerenciamento de Livraria</span>
    </a>
  </div>

  <hr class="horizontal light mt-0 mb-2">

  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      
<li class="nav-item">
  <a class="nav-link text-white " href="index.php">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">dashboard</i>
      </div>
    <span class="nav-link-text ms-1">Página Inicial</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link text-white " href="listagemCategorias.php">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">assignment</i>
      </div>
    <span class="nav-link-text ms-1">Categorias</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link text-white " href="listagemAutores.php">
  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
  <i class="material-icons">face</i>
      </div>
    <span class="nav-link-text ms-1">Autores</span>
  </a>
</li>
  
<li class="nav-item">
  <a class="nav-link text-white " href="listagemLivros.php">
  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">assignment</i>
      </div> 
    <span class="nav-link-text ms-1">Livros</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link text-white " href="listagemClientes.php">
  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
  <i class="material-icons">face</i>
      </div>
    <span class="nav-link-text ms-1">Leitores</span>
  </a>
</li>

  
<li class="nav-item">
  <a class="nav-link text-white " href="listagemEmprestimo.php">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">receipt_long</i>
      </div>
    <span class="nav-link-text ms-1">Empréstimos</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link text-white" id="reque" href="requerimento.php">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">receipt_long</i>
      </div>
    <span class="nav-link-text ms-1">Requerimentos</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link text-white " href="listagemRelatorio.php">
      <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="material-icons opacity-10">view_in_ar</i>
      </div>
    <span class="nav-link-text ms-1">Relatórios</span>
  </a>
</li>
    </ul>
  </div>

  </div>
</aside>


      <main class="main-content border-radius-lg ">
        <!-- Navbar -->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Páginas</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?=PG?></li>
      </ol>
      <h6 class="font-weight-bolder mb-0"><?=PG?></h6>
      
    </nav>
  
      <ul class="navbar-nav  justify-content-end">
        
        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
          <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
            </div>
       </main>

<!--Começar aqui-->
<div class="container mt-5">
  



