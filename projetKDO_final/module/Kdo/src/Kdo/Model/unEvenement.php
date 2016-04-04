<?php

namespace Kdo\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class unEvenement implements InputFilterAwareInterface
{

	protected $id;
	protected $initiateur_id;
	protected $destinataire_id;
	protected $nom; 
	protected $date_evenement; 
	protected $etat_evenement;
	protected $somme_recoltee;
	protected $adresse; 
	protected $complement_adresse;
	protected $code_postal; 
	protected $ville; 
	protected $pays; 
	protected $inputFilter;
	protected $cadeau_id;
	protected $membres_id;
	
	public function exchangeArray($data) {
		$this->id = (isset ( $data ['id'] )) ? $data ['id'] : null;
		$this->initiateur_id = (isset ( $data ['initiateur_id'] )) ? $data ['initiateur_id'] : null;
		$this->destinataire_id = (isset ( $data ['destinataire_id'] )) ? $data ['destinataire_id'] : null;
		$this->nom = (isset ( $data ['nom'] )) ? $data ['nom'] : null;
		$this->date_evenement = (isset ( $data ['date_evenement'] )) ? $data ['date_evenement'] : null;
		$this->etat_evenement = (isset ( $data ['etat_evenement'] )) ? $data ['etat_evenement'] : null;
		$this->somme_recoltee = (isset ( $data ['somme_recoltee'] )) ? $data ['somme_recoltee'] : null;
		$this->adresse = (isset ( $data ['adresse'] )) ? $data ['adresse'] : null;
		$this->complement_adresse = (isset ( $data ['complement_adresse'] )) ? $data ['complement_adresse'] : null;
		$this->code_postal = (isset ( $data ['code_postal'] )) ? $data ['code_postal'] : null;
		$this->ville = (isset ( $data ['ville'] )) ? $data ['ville'] : null;
		$this->pays = (isset ( $data ['pays'] )) ? $data ['pays'] : null;
		$this->membres_id = (isset ( $data ['membres_id'] )) ? $data ['membres_id'] : null;
		$this->cadeau_id = (isset ( $data ['cadeau_id'] )) ? $data ['cadeau_id'] : null;
	}


	public function __get($property)
	{
		if (property_exists($this, $property))
		{
			return $this->$property;
		}
	}


	public function setInputFilter(InputFilterInterface $inputFilter) {
		throw new \Exception ( "Not used" );
	}
	public function getInputFilter() {
		if (! $this->inputFilter) {
			$inputFilter = new InputFilter ();
			$factory = new InputFactory ();
			
			// ID
			$inputFilter->add (array (
					'name' => 'id',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'Int' 
							) 
					) 
			)  );
			
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
			
			// Date de l'evenement
			$inputFilter->add ( array (
					'name' => 'date_evenement',
					'validators' => array (
							array (
									'name' => 'Between',
									'options' => array (
											'min' => date ( 'Y-m-d' ),
											'max' => date ( 'Y' ) + 10,
									) ,
							) 
					) 
			) );
			
			/*
			// Destinataire
			$inputFilter->add (array (
					'name' => 'destinataire',
					'validators' => array (
							array (
									'name' => 'InArray',
									'options' => array (
											'haystack' => array (
													1,
											),
											'messages' => array (
													'notInArray' => 'Veuillez renseigner le destinataire !' ,
											), 
									) ,
							) 
					) 
			) ) ;
			*/
			
			// Adresse
			$inputFilter->add ( array (
					'name' => 'adresse',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) ,
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 45,
									),
							) 
					) 
			) );
			
			
			// Ville
			$inputFilter->add ( array (
					'name' => 'ville',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) 
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 45 ,
									) ,
							) 
					) 
			) ) ;
			
			// Code Postal
			$inputFilter->add ( array (
					'name' => 'code_postal',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) 
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 11 ,
									) ,
							) 
					) 
			) );
			
			// Pays
			$inputFilter->add ( array (
					'name' => 'pays',
					'required' => true,
					'filters' => array (
							array (
									'name' => 'StripTags' 
							),
							array (
									'name' => 'StringTrim' 
							) 
					),
					'validators' => array (
							array (
									'name' => 'StringLength',
									'options' => array (
											'encoding' => 'UTF-8',
											'min' => 1,
											'max' => 45 ,
									) ,
							) 
					) 
			)  );
			/*
			// Participants
			$inputFilter->add ( array (
					'name' => 'participantList',
					'required' => true 
			)  );
			// Souhaits
			$inputFilter->add ( array (
					'name' => 'souhaitList',
					'required' => true 
			)  );
			*/
			$this->inputFilter = $inputFilter;
		} 
		return $this->inputFilter;
	}
}