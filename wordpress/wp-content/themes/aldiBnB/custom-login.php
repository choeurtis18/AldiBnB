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
        </form>
        
        <?php
        get_footer();
        
    }
 
} else{ 


}

