<?php
namespace Kdo\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class ParticipantsTable extends AbstractTableGateway
{
	protected $table ='participants';
	protected $tableName ='participants';

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
	public function getParticipants($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('evenements_id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}
	
	public function supprimer($evenement_id)
	{
		$this->tableGateway->delete(array('evenements_id'=> $evenement_id));
		
	}

	public function saveParticipants(unEvenement $unEvenement, $evenement_id)
	{

		//$evenement_id  = $unEvenement->id;
		$membres_id = $unEvenement->membres_id;
		//$lastInsertID = $this->getAdaptater()->lastInsertId();
		//var_dump($lastInsertID);

		foreach ($membres_id as $membre_id)
     	{	
     		$this->tableGateway->insert(array('membres_id'=>(int)$membre_id,'evenements_id'=> $evenement_id));
     	}
		
		
		
	}
}
?>