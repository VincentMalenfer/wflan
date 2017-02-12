<?php

namespace Controller;
use \W\Controller\Controller;
use \Model\EventsModel;
use \Model\UserModel;


class EventsController extends Controller
{
    // Affichage de l'événement côté administrateur
    public function event(){

	// {	$this->allowTo('admin');

		$this->show('admin/admin_event');
	}


	public function showEvent($id){
		$EventModel = new EventsModel();

		$event = $EventModel->getEvents($id);
		$users = $EventModel->getUsersFromEvent($id);

		$isRegistered = $EventModel->getUserFromEvent($id, $_SESSION['token']);

		$this->show('event/event', [
			'event' => $event,
			'users' => $users,
			'isRegistered' => $isRegistered
		]);
    }
    
	

    // Affichage liste des événements côté administrateur
	public function addEvent()
	{

		// $this->allowTo('admin');

		if(!empty($_POST))
		{
			$mike = new EventsModel();
			$mike->ajouterEvent(	$_POST['title'],
									$_POST['location'],
									$_POST['desc'],
									$_POST['url'],
									$_POST['start'],
									$_POST['end'],
									$_POST['class']);


		}
		// $this->show('admin/admin_list_events');
	}

	public function suppEvent($id)
   {  
       $event= new EventsModel;

       $articleSupp =$event->deleteEvent($id);
       
       $this->redirectToRoute('admin_admin');

   }
}
