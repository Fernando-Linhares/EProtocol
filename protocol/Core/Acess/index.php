<?php
require_once "../../Connect/Connect.php";

session_start();

/*
* função de tratamento de dados
* que vem nas requisições
* retornando um array
*/
function trate_data() :array
{

    $input_email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);

    $input_password =  filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);

    //filtro de sql injection

    $email = $input_email;
    $password = $input_password;

    return array(
        'email'=>$email,
        'password'=>$password
    );

}


/*
* Função que valida os dados e retorna 
* uma string de resposta utilizada na funcão
* principal
*/

function Validate(array $data) :string
{

    if(empty($data['email']) or empty($data['password'])):
        return "campos obrigatórios";
     endif;
  
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)):
        return "email invalido";
    endif;
    
    

    $con = Connect::getInstance()->prepare("SELECT * FROM users WHERE email = '".$data['email']."'");

    $con->execute();

    $validEmail = $con->rowCount();

    $validPass = $con->fetchAll();

    if($validEmail == 0):
        
        return "email não encontrado";

    elseif(!password_verify($data['password'], $validPass[0]->password)):

        return "password errado";

    else:

        return "ok";

    endif;
    unset($con);
}

/*
* Função principal que da acesso ao
* dashboard caso os dados estejam validados
* corretamente
*/

function Acess()
{
    $request = trate_data();

    $acess = Validate($request);
    switch ($acess):
        case 'campos obrigatórios':

            header("location:../../");
            $_SESSION['span'] = "preencha os campos obrigatórios.";
            die();

        break;

        case "email invalido":

            header("location:../../");
            $_SESSION['span'] = "email inválido";
            die();
        break;

        case "email não encontrado":
            header("location:../../");
            $_SESSION['span'] = "email não cadastrado";
            die();
        break;

        case "password errado":
            header("location:../../");
            $_SESSION['span'] = "senha errada";
            die();
        break;

        case "ok":

        $con = Connect::getInstance()->prepare(
                "SELECT * FROM users WHERE email = '" .$_POST['email']. "'"
            );
            $con->execute();
            
            $_SESSION['data_user'] = $con->fetchAll();
            header("location:dashboard/");
            die();

        default:

            header("location:../../");
            die();

            break;
    endswitch;

    unset($con);

}
Acess();

function getOut(){
    header("location:../../");
}
getOut();