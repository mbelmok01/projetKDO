<?php
namespace Kdo\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class InvitationTable extends AbstractTableGateway

{
	protected $table ='v_membre_evenement';
	protected $tableName ='v_membre_evenement';

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
 /*
	public function getInvitation()
	{
		$id  = (int) $id;
		$resultSet = $this->tableGateway->select(array('membre_id' => $id));

		if (!$resultSet)
		{
			throw new \Exception("Could not find row $id");
		}
		return $resultSet;
	}
*/
	
	
}
?>