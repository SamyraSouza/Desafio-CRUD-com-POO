
// selecionar requerimentos
function reque(){
     var html = '';
     
    $.ajax({

        url: 'requer.php',
        method: 'POST' ,
        dataType:'json'

    }).done(function(result){
     
        if(result == "error"){
          $('#nenhum').show();
        }
        else{
          $('#nenhum').hide();
        for(var i = 0; i<result.length; i++){

        data = new Date(result[i].dataDevo);
        dataFormatadaD = data.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
    

           html+=
                '<tr> <td style="display: flex;justify-content: center; align-items:center; height: 70px;"> <div class="d-flex text-center px-2 py-1"><div class="d-flex flex-column justify-content-center"> <h6 class="mb-0 text-center text-xs">'+result[i].Nome +'</h6></td>'+
                '<td> <p class="text-xs font-weight-bold mb-0 text-center">'+result[i].Contato+'</p> </td> '+
                '<td> <p class="text-xs text-center font-weight-bold mb-0">'+result[i].ISBN+'</p> </td><td> <p class="text-xs text-center  font-weight-bold mb-0">'+result[i].titulo+'</p> </td>'
                +'<td><div class="text-center"><button onclick="fazer( ISBN ='+"'"+result[i].ISBN+"', leitor= "+"'"+result[i].email+"')"+'"id="fazer" type="submit" class="btn btn-info">Fazer empréstimo</button>    <button onclick="deletar( ISBN ='+"'"+result[i].ISBN+"', leitor= "+"'"+result[i].email+"')"+'"id="fazer" type="submit" class="btn btn-warning">Deletar</button></div></td>'
                +'</tr>';
                           
        }
        $('#requerimentos').html(html);
 }              
    });  
};

reque();



//fazer o emprestimo
function fazer(){

    var u_livro = ISBN;
    var u_nome = leitor;

    Swal.fire({
  title: "Data de devolução: ",
  input: "date",
  inputAttributes: {
    autocapitalize: "off"
  },
  showCancelButton: true,
  confirmButtonText: "Fazer empréstimo",
  showLoaderOnConfirm: true,
  preConfirm: async (empre) => {
    try {
      var data = `
        ${empre}
      `;
    } catch (error) {
      Swal.showValidationMessage(`
        Request failed: ${error}
      `);
    }
  
    $.ajax({
        url: 'emprestimo.php',
        method: 'POST' ,
        data: {livro: u_livro, pessoa: u_nome, data: data},
        dataType:'json'

    }).done(function(result){

        if(result == "success"){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Livro emprestado com sucesso",
                showConfirmButton: false,
                timer: 1500
              });  
           reque();
        }
    });
  },

}).then((result) => {
  console.log(result);
});
reque();
};



// cancelar requerimento
function deletar(){

  var u_livro = ISBN;
  var u_nome = leitor;

  Swal.fire({
    title: "Tem certeza?",
    text: "Você irá deletar o requerimento!",
    icon: "warning",
    showCancelButton: true,
    cancelButtonText: "Cancelar",
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Deletar!"

  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: 'deletar.php',
        method: 'POST' ,
        data: {livro: u_livro, pessoa: u_nome, data: data},
        dataType:'json'

    }).done(function(result){

        if(result == "success"){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Livro deletado com sucesso",
                showConfirmButton: false,
                timer: 1500
              });  
           reque();
            } 
    });
  };
});
};