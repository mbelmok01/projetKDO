<?php

namespace Kdo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Kdo\Model\Evenement;

use Kdo\Form\ContribuerForm;
use Kdo\Form\AddEvenementForm;
use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

use Kdo\Model\unEvenement;
use Kdo\Model\unEvenementTable;
use Kdo\Model\Participants;
use Kdo\Model\ParticipantsTable;
use Kdo\Model\Cadeau;
use Kdo\Model\CadeauTable;
use Kdo\Form\DbAdapterForm;
class EvenementController extends AbstractActionController {

	protected $evenementTable;
	protected $evenement;

	protected $CadeauTable;
	protected $Cadeau;

	protected $invitationTable;
	protected $uneinvitationTable;

	protected $unEvenementTable;
	protected $unEvenement;

	protected $ParticipantsTable;
	protected $Participants;

	protected $form;
	public function indexAction()
	{
			
			
	        $request = $this->getRequest();
	        if ($request->isPost())
	        {
	        	$evenement = new unEvenement();
	        	$form = new ContribuerForm();
	            $form->setData($request->getPost());
	            if ($form->isValid())
	            {
	            	$evenement->exchangeArray($form->getData());
	            	$id = $evenement->id;
	            	$prix=$this->getEvenementTable()->getEvenement2($id);
					$sommeRecolt=$prix->somme_recoltee;
					$prix_cadeau=$prix->prix_cadeau;

	            	$somme=($evenement->somme_recoltee)+$sommeRecolt;
	            	
	            	if($somme<=$prix_cadeau)
	            	{

	            		$this->getunEvenementTable()->participer($somme,$id);
	            	}
	            
	            
	            }
	        }
	    
	    
		return new ViewModel(
			array(
				'evenements'=> $this->getEvenementTable()->fetchAll(),	
				'evenements2'=> $this->getEvenementTable()->fetchAll(),	
				'evenements3'=> $this->getEvenementTable()->fetchAll(),
			)
		);
		
		//return new ViewModel();
	}

	
	
	public function updateAction()
	{
		return new ViewModel ();
	}
	
	public function editAction()
	{
		return new ViewModel ();
	}
	
	
	
	public function afficherAction()
	{
		return new ViewModel ();
	}

	public function accepteInvitationAction()
	{
		$membre_id = (int) $this->params()->fromRoute('id',0);
		$evenement_id = (int) $this->params()->fromRoute('id2',0);
		
		
		
		
				$this->getuneInvitationTable()->participer($membre_id,$evenement_id);
		
		return new ViewModel();

	}
	
	public function declineInvitationAction()
	{
		$membre_id = (int) $this->params()->fromRoute('id',0);
		$evenement_id = (int) $this->params()->fromRoute('id2',0);
		
		//va à la fonction decliner
		$this->getuneInvitationTable()->decliner($membre_id,$evenement_id);
	
		return new ViewModel();	
	}

	public function participerAction()
	{
		
		$id = (int) $this->params()->fromRoute('id', 0);
		
		if($id!=null)
		{
			$form = new ContribuerForm();

			$form->setData(array('id' => $id,));

			return new ViewModel(
				array(	
					'form' => $form,
				)
			);
		
	}
			
	}



	public function deleteAction()
	{
		$evenement_id = (int) $this->params()->fromRoute('id',0);
		
		//va à la fonction decliner

	    $this->getunEvenementTable()->supprimer($evenement_id);
		return new ViewModel();	
	}

	public function ajoutAction()
	{
		
		return new ViewModel();	
	}


	public function addAction()
	{
		
		
		$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
		$form = new AddEvenementForm($dbAdapter);
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$unEvenement = new unEvenement();

			$form->setInputFilter($unEvenement->getInputFilter());
			$form->setData($request->getPost());
			
			if ($form->isValid()) {
				$unEvenement->exchangeArray($form->getData());
				$id_evenement = $this->getunEvenementTable()->saveEvenement($unEvenement);
				$this->getParticipantsTable()->saveParticipants($unEvenement, (int)$id_evenement);
				return $this->redirect()->toRoute('gestevenement');
			}
		}
		return array ('form' => $form);	
	}
	
	public function afficherInvitationsAction()
	{
		
				
		$dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
		$form = new ContribuerForm($dbAdapter, '2');
		
		$request = $this->getRequest();
		if ($request->isPost()) {
			$unEvenement = new unEvenement();

			//$form->setInputFilter($evenement->getInputFilter());
			$form->setData($request->getPost());
			
			if ($form->isValid()) {
				$unEvenement->exchangeArray($form->getData());
			//	$id_evenement = $this->getunEvenementTable()->saveEvenement($unEvenement);
			//	$this->getParticipantsTable()->saveParticipants($unEvenement, (int)$id_evenement);
				return $this->redirect()->toRoute('gestevenement');
			}
		}
		return array ('form' => $form);
	}
	
	public function getEvenementTable()
	{
		if (!$this->evenementTable) {
			$sm = $this->getServiceLocator();
			$this->evenementTable = $sm->get('Kdo\Model\EvenementTable');
		}
		return $this->evenementTable;
	}
	
	
	public function getInvitationTable()
	{
		if (!$this->invitationTable)
		{
			$sm = $this->getServiceLocator();
			$this->invitationTable = $sm->get('Kdo\Model\InvitationTable');
		}
		return $this->invitationTable;
	}
	
	public function getuneInvitationTable()
	{
		if (!$this->uneinvitationTable)
		{
			$sm = $this->getServiceLocator();
			$this->uneinvitationTable = $sm->get('Kdo\Model\uneInvitationTable');
		}
		return $this->uneinvitationTable;
	}


	public function getunEvenementTable()
	{
		if (!$this->unEvenementTable)
		{
			$sm = $this->getServiceLocator();
			$this->unEvenementTable = $sm->get('Kdo\Model\unEvenementTable');
		}
		return $this->unEvenementTable;
	}

	public function getParticipantsTable()
	{
		if (!$this->ParticipantsTable)
		{
			$sm = $this->getServiceLocator();
			$this->ParticipantsTable = $sm->get('Kdo\Model\ParticipantsTable');
		}
		return $this->ParticipantsTable;
	}
	public function getCadeauTable()
	{
		if (!$this->CadeauTable)
		{
			$sm = $this->getServiceLocator();
			$this->CadeauTable = $sm->get('Kdo\Model\CadeauTable');
		}
		return $this->CadeauTable;
	}
}
