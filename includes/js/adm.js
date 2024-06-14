// entrar
$('#entrar').click(function(e){

    e.preventDefault();  

    var u_email = $('#email').val();
    var u_senha = $('#senha').val();

    $.ajax({ 

        url: 'entrar.php',
        method: 'POST' ,
        data: {email: u_email, senha: u_senha},
        dataType:'json'


}).done(function(result){

if(result == "error"){
    Swal.fire({
        position: "top-end",
        icon: "error",
        title: "Email ou senha inválidos",
        showConfirmButton: false,
        timer: 1500
      });
}
else{
 
   window.location.href = "index.php";
   
}

});
});
