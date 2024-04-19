<?php
/**
* Template Name: Custom Login Page
*/



global $user_id;
global $wpdb;

if(!($user_id)){

    if($_POST){
        $username=$wpdb->escape($_POST['username']);
        $password=$wpdb->escape($_POST['password']);
        $login_array=array();
        $login_array['user_login']=$username;
        $login_array['user_password']=$password;

        $verify_user = wp_signon($login_array,true);
        if(!(is_wp_error($verify_user))){
            echo "<script>window.location='".site_url()."'</script>";
        }else{
            echo "<p> Nom d'utilisateur ou mot de pase incorrect</p>";
        }

    } else{
        get_header();
        ?>
        
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Connexion</h2>
        <div class="card my-5">

          <form method="post" class="card-body cardbody-color p-lg-5">

            <div class="text-center">
              <img src="<?php get_template_directory_uri() ?>/wp-content/uploads/2022/03/logo.png"  class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">

              <input type="text" name="username" class="form-control" id="Username" aria-describedby="emailHelp"
                placeholder="Nom d'utilisateur / E-mail">
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Se connecter</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Pas encore inscrit?
                 <a href="http://localhost:5555/register/" class="text-dark fw-bold"> Créer un compte</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>



        <?php
        get_footer();
        
    }
 
} else{ 


}

