<?php

namespace Kdorest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;
use Kdo\Model\Membre;
use Kdo\Form\ProfilForm;
use Kdo\Model\MembrelTable;




class ProfilrestController extends AbstractRestfulController
{
	protected $profil;
	protected $profils;
	protected $results;
	protected $membreTable;

	
	public function getList()
	{
		$profils = $this->getMembreTable()->fetchAll();
		$data = array();
		
		foreach($profils as $profil)
		{
			$data[] = $profil;
		}
		return $this->getResponse()->setContent(Json::encode($data));
	}

	
	public function get($id)
	{
		$profil = $this->getMembreTable()->getProfil($id);
	
		return $this->getResponse()->setContent(Json::encode($profil));
	}
	
	
	public function update($id, $data)
	{
			
		$data['id'] = $id;
		$profil = $this->getMembreTable()->getProfil($id);
		$form  = new ProfilForm();
		$form->bind($profil);
		
		//$form->setInputFilter($profil->getInputFilter());
		
		$form->setData($data);
		
		if ($form->isValid())
		{
			$id = $this->getMembreTable()->saveProfil($form->getData());
		}
		
		return new JsonModel(
				array('data' => $this->get($id),)
		);
	}
	
	public function delete($id)
	{
		return new JsonModel(array(
				'data' => 'deleted',));
	
	}
	// Obligatoire pour ne pas se faire jeter par un problme de Access Control Allow Origin sur les XMLHttpRequest
	public function getResponseWithHeader() 
	{
		$response = $this->getResponse();
		$response->getHeaders()->addHeaderLine('Access-Control-Allow-Origin','*')->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET');
		 
		return $response;
	}
	
	public function getMembreTable()
	{
		if (!$this->membreTable) {
			$sm = $this->getServiceLocator();
			$this->membreTable = $sm->get('Kdo\Model\MembreTable');
		}
		return $this->membreTable;
	}
	
}