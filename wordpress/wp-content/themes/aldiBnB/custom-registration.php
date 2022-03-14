<?php
/**
* Template Name: Custom Registration Page
*/

get_header();

if($_POST){
    $username=$wpdb->escape($_POST['txtUsername']);
    $email=$wpdb->escape($_POST['txtEmail']);
    $password=$wpdb->escape($_POST['txtPassword']);
    $confirmPassword=$wpdb->escape($_POST['txtConfirmPassword']);
    $error=array();

    if(strpos($username,' ') !== FALSE ){
        $error['username_space']= "Le nom d'utilisateur ne doit pas contenir d'espace \n"; 
    }
    if(empty($username)){
        $error['username_empty']= "Le nom d'utilisateur ne peut être laissé vide \n";
    }
    if(username_exists($username) ){
        $error['username_exists']= "Le nom d'utilisateur existe dêja \n";
    }
    
    if(!(is_email($email))){
        $error['email_valid']="l'email n'est pas au bon format \n";
    }

    if(email_exists($email)){
        $error['email_existence']="le mail existe dêja \n";
    }

    if(strcmp($password,$confirmPassword) !==0 ){
        $error['password']="les mots de passes sont différents \n";
    }

    if(count($error)==0){
        WP_create_user($username,$password,$email);
        echo "l'utilisateur a été crée avec succés";
        exit;
    }    
    else{
        print_r($error);
    }
}

?>

<form method="post">
    <br>  <br>  <br>  <br>  <br> 
    <p>
        <label for="txtUsername"> Nom d'utilisateur </label>
        <div>
            <input type="text" name="txtUsername" id="txtUsername" placeholder="Entrez un nom d'utilisateur"/>
        </div>    
    </p>
    <p>
        <label for="txtMail"> E-mail </label>
        <div>
            <input type="email" name="txtEmail" id="txtEmail" placeholder="Entrez un mail"/>
        </div>    
    </p>
    <p>
        <label for="txtPassword"> Mot de passe </label>
        <div>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Entrez un nom d'utilisateur"/>
        </div>    
    </p>
    <p>
        <label for="txtPassword"> Confirmation de mot de passe </label>
        <div>
            <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" placeholder="Entrez un nom d'utilisateur"/>
        </div>    
    </p>
    <input type="submit" name="btnSubmit" />

</form>


<?php get_footer(); 

