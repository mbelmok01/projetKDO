<?php

namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class uneInvitation implements InputFilterAwareInterface
{

	protected $membre_id;
	protected $evenement_id;
	protected $type_membre_id;

	public function exchangeArray($data)
	{
		echo 'exchangeArray()';
		$this->membre_id= (!empty($data['membre_id'])) ?$data['membre_id'] :null;
		$this->evenement_id= (!empty($data['evenement_id'])) ?$data['evenement_id'] :null;
		$this->type_membre_id= (!empty($data['type_membre_id'])) ?$data['type_membre_id'] :null;
	}


	public function __get($property)
	{
		echo '__get()';
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
		return null;
	}
	
}