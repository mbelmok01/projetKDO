<?php

namespace Kdo\Model;
	
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import
	
	class Cadeau implements InputFilterAwareInterface
	{
		protected $id;
		protected $libelle;
		protected $prix;
		protected $importance;
		protected $description;
		protected $etat_achat;
		protected $categories_id;
		
		public function exchangeArray($data)
		{
			$this->id= (!empty($data['id'])) ?$data['id'] :null;
			$this->libelle= (!empty($data['libelle'])) ?$data['libelle'] :null;
			$this->prix= (!empty($data['prix'])) ? $data['prix'] :null;
			// $this->importance= (!empty($data['description'])) ?$data['importance'] :null;
			$this->description= (!empty($data['description'])) ?$data['description'] :null;
			$this->etat_achat= (!empty($data['etat_achat'])) ?$data['etat_achat'] :null;
			$this->categories_id= (!empty($data['categories_id'])) ?$data['categories_id'] :null;
		}
		
		public function getCadeauTable()
		{
			if(!$this->cadeauTable)
			{
				$sm = $this->getServiceLocator();
				$this->cadeauTable=$sm->get('cadeau');
			}
			return $this->cadeauTable;
		}
		
		public function __get($property)
		{
			if (property_exists($this, $property))
			{
				return $this->$property;
			}
		}
		
		
		public function setInputFilter(InputFilterInterface $inputFilter)
		{
			throw new \Exception("Not used");
		}	
		
		public function getInputFilter()
		{
		
		}
		
	}