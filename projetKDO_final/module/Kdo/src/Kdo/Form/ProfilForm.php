<?php
namespace Kdo\Form;

use Zend\Form\Form;

class ProfilForm extends Form
{
public function __construct($name = null)
	{
		
		parent::__construct('profil');
		$this->setAttribute('method', 'post');
		$this->add(array(
				'name' => 'id',
				'attributes' => array(
						'type'  => 'hidden',
						),
				));
		
		$this->add(array(
				'name' => 'nom',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
						),
				'options' => array(
						//'label' => 'Nom'
						),
				));
		
		$this->add(array(
				'name' => 'prenom',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Prenom'
				),
		));
		
		$this->add(array(
				'name' => 'prenom',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Prenom'
				),
		));
		
		$this->add(array(
				'name' => 'adresse',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Adresse'
				),
		));
		
		$this->add(array(
				'name' => 'complement_adresse',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
						),
				'options' => array(
						//'label' => 'Complement adresse',
						),
				));
		
		$this->add(array(
				'name' => 'code_postal',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Code Postal'
				),
		));
		
		$this->add(array(
				'name' => 'ville',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Ville'
				),
		));
		
		$this->add(array(
				'name' => 'pays',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Pays'
				),
		));
		
		$this->add(array(
				'name' => 'telephone',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Telephone'
				),
		));
		
		$this->add(array(
				'name' => 'portable',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Portable'
				),
		));
		
		$this->add(array(
				'name' => 'email',
				'attributes' => array(
						'type'  => 'email',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Email'
				),
		));
		
		$this->add(array(
				'name' => 'date_naissance',
				'attributes' => array(
						'type'  => 'input',
						'class'=> 'form-control',
				),
				'options' => array(
						//'label' => 'Date de naissance'
				),
		));
		
		$this->add(array(
				'name' => 'presentation',
				'attributes' => array(
						'type'  => 'textarea',
						'class'=> 'form-control',
						'rows'=>'5'
				),
				'options' => array(
						//'label' => 'Presentation'
				),
		));
		
		//<textarea class="form-control" rows="3"></textarea>
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Enregistrer',
						'class'=> 'btn btn-primary pull-right',
						'id' => 'submitbutton',
						),
				));
	}
}
	
	
	