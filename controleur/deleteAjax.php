<?php
//echo '<p>Hi I am some random ' . rand() .' output from the server.</p>';
include '../controleur/gestionnaireConnexion.php';
include '../controleur/motsControleur.php';

$gestionnaire = new gestionnaireConnexion();
$controleurMots = new motsControleur($gestionnaire->getBdd());

$result = $controleurMots->deleteWord($_GET["mot"]);

echo json_encode($result);
?>