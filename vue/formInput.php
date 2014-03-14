 <?php 
 if(isset($_POST['valeur']))
 {
 	include '../controleur/gestionnaireConnexion.php';
 	include '../controleur/motsControleur.php';
 	$gestionnaire = new gestionnaireConnexion();
 	$controleurMots = new motsControleur($gestionnaire->getBdd());
 	$result = $controleurMots->pushWord($_POST['valeur']);
 }
 ?>


 <form method="post" action="formInput.php">
 	<p><input type="text" name="valeur" /></p>
 </form>