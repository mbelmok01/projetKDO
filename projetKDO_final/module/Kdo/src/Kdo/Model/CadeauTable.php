<?php

	namespace Kdo\Model;
	use Zend\Db\TableGateway\TableGateway;
	use Zend\Db\TableGateway\AbstractTableGateway;
	
	class CadeauTable extends AbstractTableGateway
	{
   	 	protected $table ='cadeaux';
    	protected $tableName ='cadeaux';
    
		protected $tableGateway;
		
		public function __construct(TableGateway $tableGateway)
		{
			$this->tableGateway = $tableGateway;
		}
		
		public function fetchAll()
		{
			$resultSet = $this->tableGateway->select();
			return $resultSet;
		}
		
		public function getCadeau($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}
		
		public function getCadeaux($id)
		{
			$id  = (int) $id;
			$resultSet = $this->tableGateway->select(array('membres_id' => $id));
			if (!$resultSet)
			{
				throw new \Exception("Could not find row $id");
			}
			return $resultSet;
		}
		
		public function saveCadeau($cadeau, $idprofil)
		{
			$data = array(
					'membres_id'  => $idprofil,
					'libelle'  => $cadeau->libelle,
					'description'  => $cadeau->description,
					'prix'  => $cadeau->prix,
					'categories_id'  => $cadeau->categories_id,
			);
			$id = (int)$cadeau->id;
			if ($id == 0) {
				$this->tableGateway->insert($data);
			} else {
				if ($this->getCadeau($id)) {
					$this->tableGateway->update($data, array('id' => $id));
				} else {
					throw new \Exception('Form id does not exist');
				}
			}
		}
		
		public function deleteCadeau($id)
		{
			$this->tableGateway->delete(array('id' => $id));
		}

		public function supprimer($evenement_id)
	{
		$this->tableGateway->delete(array('evenements_id'=> $evenement_id));
		
	}
	
	}