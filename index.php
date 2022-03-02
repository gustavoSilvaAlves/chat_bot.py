<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'bot';
$conn = mysqli_connect($servidor,$usuario,$senha,$banco);

if (!$conn){
//echo "deu ruim";


}else{

//echo"deu tudo certo";
}

?>
<?php

$menu1 = "Olá bem vindo, sou seu atendente virtual\n vamos começar seu atendimento\n escolha a opção de sua preferência\n 
  *1* Chamado\n
  *2* Outras opcoes\n";


$menu2 = "*Opções de bebida*
  *1* coca *R$ 7,00*\n
  *2* fanta *R$ 5,00*\n
  *3* suco *R$ 10,00*\n";

$menu3 = "Seu endereço completo, por favor.";

$menu4 = "Algum ponto de referência? ";

$menu5 = "Qual a forma de pagamento? dinheiro ou cartão.";

$menu6 = "Ok entraremos encontrado";

$data = date('d/m/Y');

?>



<?php 
$msg = $_GET['msg'];
$telefone_cliente = $_GET['telefone'];

$sql = "SELECT * FROM usuario WHERE telefone = '$telefone_cliente'";
$query = mysqli_query($conn, $sql);
$total = mysqli_num_rows($query);

while($rows_usuarios = mysqli_fetch_array($query)){
$status = $rows_usuarios['status'];

}

if ( $total > 0){

  //echo "numero encontrado";


if($status == 2){

  echo $menu2;
  $resposta = $menu2 ;

}


if($status == 3){

  echo $menu3;
  $resposta = $menu3 ;


}



if($status == 4){

  echo $menu4;
  $resposta = $menu4 ;


}



if($status == 5){

  echo $menu5;
  $resposta = $menu5 ;


}


if($status == 6){

  echo $menu6;
  $resposta = $menu6 ;


}


if($status == 7){

$menu7 = "Ja ja entramos em contato";
  echo $menu7 ;
  $resposta = $menu7 ;


}















  }else{

$sql = "INSERT INTO usuario (telefone, status) VALUES ('$telefone_cliente', '1')";
$query = mysqli_query($conn,$sql);


if(!$query){

}else{


  echo $menu1;

  $resposta = $menu1;

}
 

  }///nao existe o numero no banco







?>

<?php 

$sql = "SELECT * FROM usuario WHERE telefone = '$telefone_cliente'";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($query);

while($rows_usuarios = mysqli_fetch_array($query)){
$status = $rows_usuarios['status'];

}

if($status < 7){

$status2 = $status + 1;

$sql = "UPDATE usuario SET status = '$status2' WHERE telefone = '$telefone_cliente'";
$query = mysqli_query($conn, $sql);


}

?>
<?php

$sql = "INSERT INTO historico (telefone, cliente1, bot, data) VALUES ('$telefone_cliente', '$msg','$resposta','$data')";
$query = mysqli_query($conn,$sql);


if(!$query){

}else{


  

}

?>
