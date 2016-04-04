<?php
namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class Invitation implements InputFilterAwareInterface
{
	
	protected $membre_id;
	protected $nom_evenement;
	protected $date_evenement;
	protected $destinaire;
	protected $descriptionkdo ;
	protected $somme_recoltee;
	protected $evenement_id;
	
	public function exchangeArray($data)
	{
		echo 'exchangeArray()';
		$this->membre_id= (!empty($data['membre_id'])) ?$data['membre_id'] :null;
		$this->membre_type_id=(!empty($data['membre_type_id'])) ?$data['membre_type_id'] :null;
		$this->evenement_id=(!empty($data['evenement_id'])) ?$data['evenement_id'] :null;
		$this->type_membre= (!empty($data['type_membre'])) ?$data['type_membre'] :null;
		$this->nom_evenement= (!empty($data['nom_evenement'])) ?$data['nom_evenement'] :null;
		$this->date_evenement= (!empty($data['date_evenement'])) ? $data['date_evenement'] :null;
		$this->nom_membre= (!empty($data['nom_membre'])) ?$data['nom_membre'] :null;
		$this->descriptionkdo= (!empty($data['descriptionkdo'])) ?$data['descriptionkdo'] :null;
		$this->somme_recoltee= (!empty($data['somme_recoltee'])) ?$data['somme_recoltee'] :null;
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