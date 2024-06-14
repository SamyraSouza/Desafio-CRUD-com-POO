<?php 
    $resultados=''; 

    foreach($autorlivro as $liv){

    $isbn="'".$liv->ISBN."'";


        $resultados .= ' <tr>  

        <td class="align-middle text-center text-sm">'.$liv->ISBN.'</td>
        <td class="align-middle text-center text-sm">'.$liv->titulo.'</td>
        <td class="align-middle text-center text-sm">'.$liv->Nomes.'</td>
        <td class="align-middle text-center text-sm">'.number_format($liv->preco,2,",",".").'</td>
        <td class="align-middle text-center text-sm">'.date('d/m/Y', strtotime($liv->dataPubli)).'</td>
     

        <td class="align-middle text-center text-sm">'.$liv->Nome.'</td>


                        </tr>

                        ';
    }
    $resultados = strlen($resultados) ? $resultados : '<tr><td colspan="6" class="text-center">Nenhum livro encontrado</td><tr>';

    $resultadosautores='';
    foreach($autores as $autor){
        $resultadosautores .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$autor->Nome.'</td>
        <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($autor->DataNasc)).'</td>
        <td class="align-middle text-center text-sm">'.$autor->Biografia.'</td>


                        </tr>';
    }

    $resultadosautores = strlen($resultadosautores) ? $resultadosautores : '<tr><td colspan="3" class="text-center">Nenhum autor encontrado</td><tr>';

    $resultadoscategorias='';
    foreach($categorias as $cat){
        $resultadoscategorias .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cat->Nomes.'</td>


                        </tr>';
    }

    $resultadoscategorias = strlen($resultadoscategorias) ? $resultadoscategorias : '<tr><td colspan="2" class="text-center">Nenhuma categoria encontrada</td><tr>';

    $resultadoscategorias='';
    foreach($categorias as $cat){
        $resultadoscategorias .= ' <tr>  
        <td class="align-middle text-center text-sm">'.$cat->Nomes.'</td>


                        </tr>';
    }

    $resultadoscategorias = strlen($resultadoscategorias) ? $resultadoscategorias : '<tr><td colspan="2" class="text-center">Nenhuma categoria encontrada</td><tr>';


    $resultadosemprestimos='';
    foreach($emprestimos as $emp){
        $resultadosemprestimos .= ' <tr>  
        <td class="align-middle text-center text-sm">'.date(('d/m/Y'),strtotime($emp->dataEmpre)).'</td>
        <td class="align-middle text-center text-sm">'.$emp->idE.'</td>
                        </tr>';
    }
?>

<h1 class="mt-5 text-center mb-3">Relatórios</h1>
<main>
<form action="">
<select name="relatorios" id="" style="border:1px solid lightgray; border-radius:20px; color:gray; padding:5px;">
<option value="todos">Selecione uma tabela</option>
  <option value="livros">Livros</option>
  <option value="autores">Autores</option>
  <option value="categorias">Categorias</option>
  <option value="emprestimo">Empréstimos Por Período</option>
</select>

<button type="submit" class="btn btn-icon btn-2 btn-info mt-3">Ver</button>
</form>

<?php
include("config.php");
    
if(isset($_GET['relatorios'])){
switch ($_GET['relatorios']) {
    case "todos";
        include("todos.php");
        break;
    case "livros":
        include("livros.php");
        break;
    case "categorias":
        include("categorias.php");
        break;
        case "autores":
            include("autores.php");
            break;
      case "emprestimo":
        include("emprestimo.php");
        break;
    default:
        include("todos.php");
}
}
else{
    include("todos.php");
}
?>
