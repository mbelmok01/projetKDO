<?php
namespace Kdo\Form;

use Zend\Form\Form;


class SouhaitForm extends Form {
public function __construct($name = null)
	{
		
		parent::__construct('souhait');
		$this->setAttribute('method', 'post');
		$this->add(array(
				'name' => 'id',
				'attributes' => array(
						'type'  => 'hidden',
						),
				));
		$this->add(array(
				'name' => 'membres_id',
				'attributes' => array(
						'type'  => 'hidden',
				),
		));
		
		$this->add(array(
				'name' => 'libelle',
				'attributes' => array(
						'type'  => 'text',
						'class'=> 'form-control',
						'placeholder' => 'Macbook Pro',
						),
				'options' => array(
						),
				));
		
		$this->add(array(
				'name' => 'description',
				'attributes' => array(
						'type'  => 'text',
						'class'=> 'form-control',
						'placeholder' => 'Ordinateur portable',
				),
				'options' => array(
				),
		));
		
		$this->add(array(
				'name' => 'prix',
				'attributes' => array(
						'type'  => 'text',
						'class'=> 'form-control',
						'placeholder' => '1000$',
				),
				'options' => array(
				),
		));
		
		// $this->add(array(
		// 		'name' => 'importance',
		// 		'attributes' => array(
		// 				'type'  => 'text',
		// 				'class'=> 'form-control',
		// 				'placeholder' => 'Moyenne',
		// 		),
		// 		'options' => array(
		// 		),
		// ));
		
		$this->add(array(
				'name' => 'categories_id',
				'attributes' => array(
						'type'  => 'text',
						'class'=> 'form-control',
						'placeholder' => 'Jeux video',
				),
				'options' => array(
				),
		));
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Ajouter',
						'class'=> 'btn btn-default',
						'id' => 'submitbutton',
						),
				));
	}
}