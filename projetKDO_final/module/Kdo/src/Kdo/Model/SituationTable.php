<?php

	namespace Kdo\Model;
	use Zend\Db\TableGateway\TableGateway;
	use Zend\Db\TableGateway\AbstractTableGateway;
	
	class SituationTable extends AbstractTableGateway
	{
   	 	protected $table ='situations';
    	protected $tableName ='situations';
    
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
		
		public function getSituation($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}
		
		public function saveSituation(Cadeau $cadeau)
		{
			
		}
		
		public function deleteSituation($id)
		{
			$this->tableGateway->delete(array('id' => $id));
		}
	
	}