<?php

namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class Participants implements InputFilterAwareInterface
{


	protected $membres_id;
	protected $evenements_id;

	public function exchangeArray($data)
	{
		echo 'exchangeArray()';
		$this->membres_id= (!empty($data['membres_id'])) ?$data['membres_id'] :null;
		$this->evenements_id= (!empty($data['evenements_id'])) ?$data['evenements_id'] :null;
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