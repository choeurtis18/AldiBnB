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

<style>

.btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}

</style>
<!--         
        <form method="post">
            <p>
                <label for="username">Nom d'utilisateur / Email </label>
                <input type="text" id="username" name="username" placeholder="Entrez le nom d'utilisateur"/>
            </p>
        
            <p>
                <label for="password">Mot de passe </label>
                <input type="password" id="username" name="password" placeholder="Entrez le nom d'utilisateur"/>
            </p>
            <p>
                <button type="submit" name=""> Se connecter </button>
            </p>
        </form> -->

        <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Connexion :</h2>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="post">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" id="Username"  name="username" aria-describedby="emailHelp"
                placeholder="Nom d'utilisateur / E-mail">
            </div>
            <div class="mb-3">
              <input type="password" name="txtConfirmPassword" name="password" class="form-control" id="password" placeholder="Mot de passe">
            </div>
            <div class="text-center"><button type="submit" name="" class="btn btn-color px-5 mb-5 w-100">Connexion</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Pas encore inscrit?
            <a href="" class="text-dark fw-bold"> Créer un compte
            </a>
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

