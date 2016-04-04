<?php

namespace Kdo\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class MembreTable extends AbstractTableGateway {
	protected $table = 'membres';
	protected $tableName = 'membres';
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		return $resultSet;
	}
	public function getMembre($id) {
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id 
		) );
		$row = $rowset->current ();
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
		return $row;
	}
	
	
	public function saveMembre(Membre $membre) {
		throw new \Exception("Fonction pas encore implŽmentŽe");
	}
	public function deleteMembre($id) {
		$this->tableGateway->delete ( array (
				'id' => $id 
		) );
	}
	/*
	public function getProfil($id) {
	
		$id = ( int ) $id;
		$rowset = $this->tableGateway->select ( array (
				'id' => $id
		) );
		$row = $rowset->current ();
	
		if (! $row) {
			throw new \Exception ( "Could not find row $id" );
		}
	
		return $row;
	}
	*/
	
	public function getProfil($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}
	
	public function saveProfil($profil) {
		
		$data = array(
				'id' => $profil->id,
				'nom'  => $profil->nom,
				'prenom'  => $profil->prenom,
				'adresse'  => $profil->adresse,
				'complement_adresse'  => $profil->complement_adresse,
				'code_postal'  => $profil->code_postal,
				'ville'  => $profil->ville,
				'pays'  => $profil->pays,
				'telephone'  => $profil->telephone,
				'portable'  => $profil->portable,
				'email'  => $profil->email,
				'date_naissance'  => $profil->date_naissance,
				'presentation'  => $profil->presentation,
			);
			
			$id = (int)$profil->id;
			
			if ($id == 0) {
				$this->tableGateway->insert($data);
			} else {
				
				if ($this->getProfil($id)) {
					
					$this->tableGateway->update($data, array('id' => $id));
					
				} else {
					throw new \Exception('Form id does not exist');
				}
			}
		}
}