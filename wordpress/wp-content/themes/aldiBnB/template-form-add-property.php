<?php
/*
 * Template Name: Formulaire ajout propriete Page
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<style>
#aldibnb-form-card {
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
	padding: 30px 40px;
	margin: 20px 70px;

	display: flex;
	flex-wrap: wrap;
}
#aldibnb-form-card-title {
	font-weight: 700;
	font-size: 36px;

	flex: 100%;
	margin-bottom: 20px;
}

.aldibnb-form {
	display: flex;
	flex-wrap: wrap;

}
.aldibnb-form-child {
	display: flex;
	flex-wrap: wrap;
	flex: 45%;
}

.form-input {
	background: #F1F1F1;
	border-radius: 5px;
	border: none;

	flex: 100%;
	height: 35px;
	margin-bottom: 10px;
}
.error {color: #FF0000;}

#aldibnb-description {
	background: #F1F1F1;
	border: none;
	margin-left: 40px;
}

#aldibnb-description-err {
	flex: 100%;
	align-content: flex-end; 
	text-align: right;
}
#submit-infos {
	margin-top: 40px;
	background: #A47035;
	box-shadow: 0px 2px 13px rgba(0, 0, 0, 0.25);
	border-radius: 8px;
	border: none;

	padding: 10px 50px;
	color: #fff;
}
</style>
<div id="aldibnb-form-card">
	<span><?php echo $information;?></span>
	<h1 id="aldibnb-form-card-title">Ajouter une Annonce</h1>
	<form action="#" method="POST" class="aldibnb-form" enctype="multipart/form-data">
		<?php wp_nonce_field('add-property', 'property-verif'); ?>
		<div class="aldibnb-form-child" id="aldibnb-a">	
			Titre de l'offre :<span class="error">* <?php echo $nameErr;?></span><input class="form-input" id="aldibnb-name" type="text" name="aldibnb-name" maxlength="20" value="<?php echo $name;?>"/>
			
			Prix par nuit :<span class="error">* <?php echo $priceErr;?></span><input class="form-input" id="aldibnb-prix" type="text" name="aldibnb-prix" maxlength="5000" value="<?php echo $price;?>"/>
			
			Localisation :<span class="error">* <?php echo $localisationErr;?></span><input class="form-input" id="aldibnb-localisation" type="text" name="aldibnb-localisation" maxlength="20" value="<?php echo $localisation;?>"/>
			

			Categorie :<span class="error">* <?php echo $categoryErr;?></span><input class="form-input" list="aldibnb-category" name="aldibnb-category">
			
			<datalist id="aldibnb-category">
				<option value="appartement">
				<option value="chalet">
				<option value="maison">
				<option value="villa">
			</datalist>

			<input id="aldibnb-image" type="file" name="aldibnb-image"/>
			<span class="error">* <?php echo $imageErr;?></span>
		</div>
		<textarea class="aldibnb-form-child" id="aldibnb-description" name="aldibnb-description"><?php echo $description;?></textarea>
		<span id="aldibnb-description-err" class="error"><?php echo '* '.$descriptionErr;?></span>

		<input type="submit" name="property-infos-envoi" id="submit-infos" class="submit-infos" value="Confirmer" />
	</form>
</div>
<?php get_footer(); ?>
