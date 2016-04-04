

<?php

	namespace Kdo\Model;
	
use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import
	
	class Evenement implements InputFilterAwareInterface
	{
		
		protected $membre_id;
		protected $id_evenement;
		protected $nom_evenement;
		protected $date_evenement;
		protected $etat_evenement;
		protected $somme_recoltee;
		protected $nom_destinataire;
		protected $nom_cadeau;
		protected $prix_cadeau;
		protected $initiateur_id;
		protected $description_cadeau;
		protected $etat_achat_cadeau;
		protected $type_membre;
		protected $adresse;
		protected $complement_adresse;
		protected $code_postal;
		protected $ville;
		protected $pays;
		
		
	public function exchangeArray($data)
	{
		echo 'exchangeArray()';
		$this->membre_id= (!empty($data['membre_id'])) ?$data['membre_id'] :null;
		$this->id_evenement= (!empty($data['id_evenement'])) ?$data['id_evenement'] :null;
		$this->nom_evenement= (!empty($data['nom_evenement'])) ?$data['nom_evenement'] :null;
		$this->date_evenement= (!empty($data['date_evenement'])) ? $data['date_evenement'] :null;
		$this->etat_evenement= (!empty($data['etat_evenement'])) ?$data['etat_evenement'] :null;
		$this->somme_recoltee= (!empty($data['somme_recoltee'])) ?$data['somme_recoltee'] :null;
		$this->nom_destinataire= (!empty($data['nom_destinataire'])) ?$data['nom_destinataire'] :null;
		$this->nom_cadeau= (!empty($data['nom_cadeau'])) ?$data['nom_cadeau'] :null;
		$this->prix_cadeau= (!empty($data['prix_cadeau'])) ?$data['prix_cadeau'] :null;
		$this->description_cadeau= (!empty($data['description_cadeau'])) ?$data['description_cadeau'] :null;
		$this->initiateur_id= (!empty($data['initiateur_id'])) ?$data['initiateur_id'] :null;
		$this->etat_achat_cadeau= (!empty($data['etat_achat_cadeau'])) ?$data['etat_achat_cadeau'] :null;
		$this->type_membre= (!empty($data['type_membre'])) ?$data['type_membre'] :null;
		$this->adresse= (!empty($data['adresse'])) ?$data['adresse'] :null;
		$this->complement_adresse= (!empty($data['complement_adresse'])) ?$data['complement_adresse'] :null;
		$this->code_postal= (!empty($data['code_postal'])) ?$data['code_postal'] :null;
		$this->ville= (!empty($data['ville'])) ?$data['ville'] :null;
		$this->pays= (!empty($data['pays'])) ?$data['pays'] :null;
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