<?php

namespace Kdo\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Kdo\Model\Cadeau;
use Kdo\Model\CadeauTable;
use Kdo\Model\unEvenementTable;
use Kdo\Form\SouhaitForm;

class CadeauController extends AbstractActionController {

	protected $cadeauTable;
	protected $membreSouhaitTable;
	protected $evenementTable;
	
	
		
	public function indexAction()
	{
		return new ViewModel();
	}
	
	public function addAction()
	{
		$idprofil = (int) $this->params()->fromRoute('id', 0);
		
		$form = new SouhaitForm();
    	
    	$form->get('membres_id')->setValue($idprofil);
    	
    	$request = $this->getRequest();
        if ($request->isPost())
        {
        	$cadeau = new Cadeau();
        	
        	$form->setData($request->getPost());
            
            if ($form->isValid())
            {
            	$cadeau->exchangeArray($form->getData());
            	$this->getCadeauTable()->saveCadeau($cadeau, $idprofil);
            	return $this->redirect()->toRoute('gestcadeau', array('action'=>'add', 'id'=>$idprofil));
            }
        }
        
        return new ViewModel(
        		array(
        				'cadeaux'=> $this->getCadeauTable()->getCadeaux($idprofil),
        				'form' => $form,
        				'id' => $idprofil,
        		));
    }
	
	
	public function editAction()
	{
		return new ViewModel ();
	}
	
	public function deleteAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$id2 = (int) $this->params()->fromRoute('id2', 0);
		

		
		if (!$id) {
            return $this->redirect()->toRoute('gestprofil');
        }
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
        	$del = $request->getPost('del', 'Non');
            
            if ($del == 'Oui')
            {
            	//Suppression de l'evenement
            	$evenement = $this->getEvenementTable()->getEvenementByCadeau($id);
            	if($evenement != null)
            	{
            		$this->getEvenementTable()->supprimer($evenement->id);	
            	}
            	
            	$this->getCadeauTable()->deleteCadeau($id);
            }
           return $this->redirect()->toRoute('gestcadeau', array('action'=>'add', 'id'=>$id2));
        }
        return array(
            'id'    => $id,
        	'id2' =>$id2,
            'cadeau' => $this->getCadeauTable()->getCadeau($id)
        );
        
	}
	
	public function getCadeauTable()
	{
		if (!$this->cadeauTable) {
			$sm = $this->getServiceLocator();
			$this->cadeauTable = $sm->get('Kdo\Model\CadeauTable');
		}
		return $this->cadeauTable;
	}
		
	public function getEvenementTable()
	{
		if (!$this->evenementTable) {
			$sm = $this->getServiceLocator();
			$this->evenementTable = $sm->get('Kdo\Model\unEvenementTable');
		}
		return $this->evenementTable;
	}
	
}