<?php
namespace Kdo\Controller;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Kdo\Model\Membre;
use Kdo\Model\MembreTable;
use Kdo\Model\Cadeau;
use Kdo\Model\CadeauTable;
use Kdo\Form\ProfilForm;
use Kdo\Form\SouhaitForm;


class ProfilController extends AbstractActionController {

	protected $membreTable;
	protected $profil;
	protected $form;
	protected $cadeauTable;
	protected $cadeau;
	
	public function indexAction()
	{
		$id = (int) $this->params()->fromRoute('id', 0);
		
		$id = 2;
		$infos = $this->getMembreTable()->getProfil($id);
		return new ViewModel(
			array(
					'profil'=> $this->getMembreTable()->getProfil($id),
					'cadeaux'=> $this->getCadeauTable()->getCadeaux($id),
					'id'=> $id,
		));
	}
	
	// page qui sert a modifier les informations du profil
	public function editAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	    
    	$membre = $this->getMembreTable()->getProfil($id);
    	
    	$form  = new ProfilForm();
    	$form->bind($membre);
    	
    	$request = $this->getRequest();
    	if ($request->isPost()) {
    		//$form->setInputFilter($membre->getInputFilter());
    		$form->setData($request->getPost());
    
    		if ($form->isValid()) {
    			$this->getMembreTable()->saveProfil($membre);
    			
    			return $this->redirect()->toRoute('gestprofil', array('action' => 'index', 'id' => $id));
    		}
    	}
    
    	return array(
    			'id' => $id,
    			'form' => $form,
    	);
    }
    
	
	public function getMembreTable()
	{
		if (!$this->membreTable) {
			$sm = $this->getServiceLocator();
			$this->membreTable = $sm->get('Kdo\Model\MembreTable');
			
		}
		return $this->membreTable;
	}
	
	
	public function getCadeauTable()
	{
		if (!$this->cadeauTable) {
			$sm = $this->getServiceLocator();
			$this->cadeauTable = $sm->get('Kdo\Model\CadeauTable');
		}
		return $this->cadeauTable;
	}
	
}