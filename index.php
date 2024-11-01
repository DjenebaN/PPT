<?php 

include('Accueil.php');


//system de routing

$page = isset($_GET['page']) ? $_GET['page'] : 'Accueil';

switch ($page) {
	case 'Login':
		include('Login.php');
		break;

	case 'Evenement':
		include('Evenement.php');
		break;

	case 'Accueil':
		include('Accueil.php');
		break;

    case 'PubliEvent':
        include('PubliEvent.php');
        break;

	case 'EventDetail':
		include('EventDetail.php');
		break;
	
	case 'Reservation':
		include('Reservation.php');
		break;

	default:
		include('Accueil.php');
		break;
}


?>