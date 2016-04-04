<?php

namespace Kdorest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Json\Json;
use Zend\View\Model\JsonModel;
use Kdo\Model\Cadeau;
use Kdo\Form\SouhaitForm;
use Kdo\Model\CadeauTable;




class SouhaitrestController extends AbstractRestfulController
{
	protected $souhait;
	protected $souhaits;
	protected $results;
	protected $cadeauTable;


	
	public function getList()
	{
		$souhaits = $this->getCadeauTable()->fetchAll();
		$data = array();
		
		foreach($souhaits as $souhait)
		{
			$data[] = $souhait;
		}
		return $this->getResponse()->setContent(Json::encode($data));
	}

	
	public function get($id)
	{
		$souhait = $this->getCadeauTable()->getCadeaux($id);
	
		return $this->getResponse()->setContent(Json::encode($souhait));
	}
	
	
	public function update($id, $data)
	{
			
		$data['id'] = $id;
		$souhait = $this->getCadeauTable()->getSouhait($id);
		$form  = new souhaitForm();
		$form->bind($souhait);
		
		//$form->setInputFilter($souhait->getInputFilter());
		
		$form->setData($data);
		
		if ($form->isValid())
		{
			$id = $this->getCadeauTable()->saveSouhait($form->getData());
		}
		
		return new JsonModel(
				array('data' => $this->get($id),)
		);
	}
	
	
	// Obligatoire pour ne pas se faire jeter par un problme de Access Control Allow Origin sur les XMLHttpRequest
	public function getResponseWithHeader() 
	{
		$response = $this->getResponse();
		$response->getHeaders()->addHeaderLine('Access-Control-Allow-Origin','*')->addHeaderLine('Access-Control-Allow-Methods','POST PUT DELETE GET CREATE');
		 
		return $response;
	}
	
	public function getCadeauTable()
	{
		if (!$this->cadeauTable) {
			$sm = $this->getServiceLocator();
			$this->cadeauTable = $sm->get('Kdo\Model\cadeauTable');
		}
		return $this->cadeauTable;
	}
	
}