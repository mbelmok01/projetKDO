<?php

namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory; // <-- Add this import
use Zend\InputFilter\InputFilter; // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface; // <-- Add this import
use Zend\InputFilter\InputFilterInterface; // <-- Add this import

class Situation implements InputFilterAwareInterface {
	protected $id;
	protected $libelle;
	
	public function exchangeArray($data) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->libelle = (isset ( $data ['libelle'] )) ? $data ['libelle'] : null;
	}
	public function getSituationTable() {
		if (! $this->situationTable) {
			$sm = $this->getServiceLocator ();
			$this->situationTable = $sm->get ( 'situations' );
			echo "ici";
		}
		return $this->situationTable;
	}
	public function __get($property) {
		if (property_exists ( $this, $property )) {
			return $this->$property;
		}
	}
	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
	public function getInputFilter() {
	}
}