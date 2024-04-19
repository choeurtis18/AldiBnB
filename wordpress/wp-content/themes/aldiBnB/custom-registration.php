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
        echo "l'utilisateur a été crée avec succés, veuillez vous connecter";
        exit;
    }    
    else{
        print_r($error);
    }
}

?>
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Inscription</h2>
        <div class="card my-5">

          <form method="post" class="card-body cardbody-color p-lg-5">

            <div class="text-center">
              <img src="<?php get_template_directory_uri() ?>/wp-content/uploads/2022/03/logo.png"  class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" name="txtUsername" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="Nom d'utilisateur / E-mail">
            </div>
            <div class="mb-3">
              <input type="email" name="txtEmail" class="form-control" id="txtEmail" aria-describedby="emailHelp"
                placeholder="E-mail">
            </div>
            <div class="mb-3">
              <input type="password" name="txtPassword" class="form-control" id="txtPassword" placeholder="Mot de passe">
            </div>
            <div class="mb-3">
              <input type="password" name="txtConfirmPassword" class="form-control" id="txtConfirmPassword" placeholder="Mot de passe">
            </div>
            <div class="text-center"><button name="btnSubmit" type="submit" class="btn btn-color px-5 mb-5 w-100">S'inscrire</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Dêja inscrit?
                 <a href="http://localhost:5555/login/" class="text-dark fw-bold">Se connecter</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>





<?php get_footer(); 

