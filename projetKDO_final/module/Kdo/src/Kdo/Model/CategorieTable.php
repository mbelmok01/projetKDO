<?php

	namespace Kdo\Model;
	use Zend\Db\TableGateway\TableGateway;
	use Zend\Db\TableGateway\AbstractTableGateway;
	
	class CategorieTable extends AbstractTableGateway
	{
   	 	protected $table ='categories';
    	protected $tableName ='categories';
    
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
		
		public function getCategorie($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}
		
		public function saveCategorie(Categorie $categorie)
		{
			
		}
		
		public function deleteCategorie($id)
		{
			$this->tableGateway->delete(array('id' => $id));
		}
	
	}