<?php

namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory; // <-- Add this import
use Zend\InputFilter\InputFilter; // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface; // <-- Add this import
use Zend\InputFilter\InputFilterInterface; // <-- Add this import

class Membre implements InputFilterAwareInterface {
	protected $id;
	protected $nom;
	protected $prenom;
	protected $adresse;
	protected $complement_adresse;
	protected $code_postal;
	protected $ville;
	protected $pays;
	protected $telephone;
	protected $portable;
	protected $email;
	protected $date_naissance;
	protected $presentation;
	protected $photo;
	protected $situations_id;
	
	/**
	 * @param int $id
	 * @return Membre
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	
	/**
	 * @param string $nom
	 * @return Membre
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getNom()
	{
		return $this->nom;
	}
	
	
	
	public function exchangeArray($data) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->nom = (isset ( $data ['nom'] )) ? $data ['nom'] : null;
		$this->prenom = (isset ( $data ['prenom'] )) ? $data ['prenom'] : null;
		$this->adresse = (isset ( $data ['adresse'] )) ? $data ['adresse'] : null;
		$this->complement_adresse = (isset ( $data ['complement_adresse'] )) ? $data ['complement_adresse'] : null;
		$this->code_postal = (isset ( $data ['code_postal'] )) ? $data ['code_postal'] : null;
		$this->ville = (isset ( $data ['ville'] )) ? $data ['ville'] : null;
		$this->pays = (isset ( $data ['pays'] )) ? $data ['pays'] : null;
		$this->telephone = (isset ( $data ['telephone'] )) ? $data ['telephone'] : null;
		$this->portable = (isset ( $data ['portable'] )) ? $data ['portable'] : null;
		$this->email = (isset ( $data ['email'] )) ? $data ['email'] : null;
		$this->date_naissance = (isset ( $data ['date_naissance'] )) ? $data ['date_naissance'] : null;
		$this->presentation = (isset ( $data ['presentation'] )) ? $data ['presentation'] : null;
		$this->photo = (isset ( $data ['photo'] )) ? $data ['photo'] : null;
		$this->situations_id = (isset ( $data ['situations_id'] )) ? $data ['situations_id'] : null;
		
	}
	public function getMembreTable() {
		
		if (! $this->membreTable) {
			$sm = $this->getServiceLocator ();
			$this->membreTable = $sm->get ( 'membre' );
			echo "getMembreTable";
		}
		
		return $this->membreTable;
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
		
		var_dump("passage dans get input filter");
		
		if (! $this->inputFilter) {
			$inputFilter = new InputFilter ();
			$factory = new InputFactory ();
			
			
			// Nom de l'evenement
			$inputFilter->add ( array (
					'name' => 'nom',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							),
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 45,
									) ,
									'messages' => array(
											\Zend\Validator\NotEmpty::IS_EMPTY => 'Please enter a value for "foo".',
									),
							) 
					) 
			) ) ;
			
			$this->inputFilter = $inputFilter;
		} 
		return $this->inputFilter;
	}
}