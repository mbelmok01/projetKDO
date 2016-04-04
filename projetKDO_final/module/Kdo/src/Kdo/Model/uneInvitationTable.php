<?php
namespace Kdo\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class uneInvitationTable extends AbstractTableGateway
{
	protected $table ='membre_evenement';
	protected $tableName ='membre_evenement';

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway)

	{
		$this->tableGateway = $tableGateway;
	}
	
	public function participer($membre_id,$evenement_id)
	{
		$data = array('type_membre_id'=> '3');	
		
		$this->tableGateway->update($data, array('membre_id' => $membre_id, 'evenement_id'  => $evenement_id));
	}
	
	public function decliner($membre_id,$evenement_id)
	{
		$this->tableGateway->delete(array('membre_id'=> $membre_id, 'type_membre_id'=> '4', 'evenement_id'=>$evenement_id));
		
	}
	public function supprimerIni($membre_id,$evenement_id)
	{
		$this->tableGateway->delete(array('membre_id'=> $membre_id, 'type_membre_id'=> '1', 'evenement_id'=>$evenement_id));
		
	}
	public function supprimerPart($membre_id,$evenement_id)
	{
		$this->tableGateway->delete(array('membre_id'=> $membre_id, 'type_membre_id'=> '3', 'evenement_id'=>$evenement_id));
		
	}
}
?>