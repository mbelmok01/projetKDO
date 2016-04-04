<?php 
namespace Kdo\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class EvenementTable extends AbstractTableGateway

{
	protected $table ='v_evenement';
	protected $tableName ='v_evenement';
	
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	
	{
		//echo '__construct(TableGateway $tableGateway)';
		$this->tableGateway = $tableGateway;
	}
	
	public function fetchAll()
	{
		$resultSet = $this->tableGateway->select();
		return $resultSet;
	}
	
	public function getEvenement($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('membre_id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}

		public function getEvenement2($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('id_evenement' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}

	public function getMembre($id)
		{
			$id  = (int) $id;
			$where='';
			$rowset = $this->tableGateway->select(array('evenement_id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}
	
}