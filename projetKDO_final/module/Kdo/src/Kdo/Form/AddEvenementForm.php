<?php
namespace Kdo\Form;
use Zend\Form\Form;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;

class AddEvenementForm extends Form
{
	protected $adapter;
	public function __construct(AdapterInterface $dbAdapter)
	{
		
		

		$this->adapter =$dbAdapter;
		parent::__construct("Evenement Form");
		
		$this->setAttribute('method', 'post');
		 
		$this->add(array(
				'name' => 'id',
				'attributes' => array(
						'type'  => 'hidden',
				),
		));
		 
			//Nom evenement
		$this->add(array(
				'name' => 'nom',
				'options' => array(
						'label' => 'Nom ',

				),
				'attributes' => array(
						'class'=> 'form-control',
						//'required' => 'required'
				)
		));
		
		//Date evenement
		$this->add(array(
				'name' => 'date_evenement',
				'type' => 'Zend\Form\Element\Date',
				'attributes' => array(
						'placeholder' => 'Veuillez renseigner le champ.',
						//'required' => 'required',
						'min' => date('Y-m-d'),
						'max' => date('Y') + 10,
						'step' => '1',
						'class'=> 'form-control',
				),
				'options' => array(
						'label' => 'Date de l\'Evenement ',
				),
		));
		
		
		//Adresse
		$this->add(array(
				'name' => 'adresse',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Veuillez renseigner le champ.',
						'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Adresse Evenement ',
				),
		));
		
		//Code Postal
		$this->add(array(
				'name' => 'code_postal',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Veuillez renseigner le champ.',
						'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Code Postal ',
				),
		));
		
		//Ville
		$this->add(array(
				'name' => 'ville',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Veuillez renseigner le champ.',
						//'required' => 'required',
						'class'=> 'form-control',
				),
				'options' => array(
						'label' => 'Ville ',
				),
		));
		
		//Pays
		$this->add(array(
				'name' => 'pays',
				'type' => 'Zend\Form\Element\Text',
				'attributes' => array(
						'placeholder' => 'Veuillez renseigner le champ.',
						'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Pays ',
				),
		));
		
		//Liste des membres - Destinataire
		$this->add(array(
				'name' => 'destinataire_id',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
					'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Destinataire ',
						'empty_option' => 'Veuillez selectionner un destinataire',
						'value_options' => $this->getMembres(),
						'disable_inarray_validator' => true,
						//'value_options' => $params['membres']
				)
		));
		
		//Initiateur
		$this->add(array(
				'name' => 'initiateur_id',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
					'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Initiateur ',
						'empty_option' => 'Veuillez selectionner un destinataire',
						'value_options' => $this->getMembres(),
						'disable_inarray_validator' => true,
						//'value_options' => $params['membres']
				)
		));
		
		//Liste des membres - Participants
		$this->add(array(
				'name' => 'membres_id',
				'type' => 'Zend\Form\Element\MultiCheckbox',
				'attributes' => array(
						'id' => 'membres_id',
						'multiple' => 'multiple',
						'class'=> 'form-control',
						
				),
				'options' => array(
						'label' => 'Participants ',
						'value_options' => $this->getMembres(),
				),
		));
		
	
		
		
		
			$this->add(array(
				'name' => 'cadeau_id',
				'type' => 'Zend\Form\Element\Select',
				'attributes' => array(
					'class'=> 'form-control',
						//'required' => 'required',
				),
				'options' => array(
						'label' => 'Cadeaux ',
						'value_options' => $this->getCadeaux(),
						//'value_options' => $params['membres']
				)
		));		
			
		
		$this->add(array(
				'name' => 'submit',
				'attributes' => array(
						'type'  => 'submit',
						'value' => 'Valider',
						'class'=> 'btn btn-primary pull-right',
						'id' => 'submitbutton',
				),
		));
	}
	 
	//IF YOU WILL WORK WITH DATABASE
	//AND NEED bind() FORM FOR EDIT DATA, YOU NEED OVERRIDE
	//populateValues() FUNC LIKE THIS
	public function populateValues($data)
	{
		foreach($data as $key=>$row)
		{
			if (is_array(@json_decode($row))){
				$data[$key] =   new \ArrayObject(\Zend\Json\Json::decode($row), \ArrayObject::ARRAY_AS_PROPS);
			}
		}
		 
		parent::populateValues($data);
	}
	
	public function getMembres()
	{
		try {
			$dbAdapter = $this->adapter;
			$sql       = 'SELECT id,prenom, nom  FROM membres ';
			$statement = $dbAdapter->query($sql);
			$result    = $statement->execute();
			
			$selectData = array();
			
			foreach ($result as $res) {
				$selectData[$res['id']] = $res['prenom'] . ' ' . $res['nom'];
			}
			return $selectData;
		} catch (Exception $e) {
			$pdoException = $e->getPrevious();
			var_dump($pdoException);
		}
	
	}
	
	public function getCadeaux()
	{
		try {
			$dbAdapter = $this->adapter;
			$sql       = 'SELECT id,libelle,prix  FROM cadeaux ';
			$statement = $dbAdapter->query($sql);
			$result    = $statement->execute();
				
			$selectData = array();
				
			foreach ($result as $res) {
				$selectData[$res['id']] = $res['libelle'] . ' - ' . $res['prix'].'€';
			}
			return $selectData;
		} catch (Exception $e) {
			$pdoException = $e->getPrevious();
			var_dump($pdoException);
		}
	
	}
}