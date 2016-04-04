<?php
namespace Kdo\Model;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class unEvenementTable extends AbstractTableGateway
{
	protected $table ='evenements';
	protected $tableName ='evenements';

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
	public function getEvenement($id)
		{
			$id  = (int) $id;
			$rowset = $this->tableGateway->select(array('id' => $id));
			$row = $rowset->current();
			if (!$row) {
				throw new \Exception("Could not find row $id");
			}
			return $row;
		}

	public function saveEvenement(unEvenement $unEvenement)
	{
		$data = array(
				'id' => $unEvenement->id,
				'initiateur_id' => (int)$unEvenement->initiateur_id,
				'destinataire_id' => (int)$unEvenement->destinataire_id,
				'nom'  => $unEvenement->nom,
				'date_evenement'  => $unEvenement->date_evenement,
				'etat_evenement'  => 'En Cours',
				'somme_recoltee'  => '0',
				'adresse' => $unEvenement->adresse,
				'complement_adresse'  => ' ',
				'code_postal'  => $unEvenement->code_postal,
				'ville'  => $unEvenement->ville,
				'pays'  => $unEvenement->pays,
				'cadeaux_id'  => (int)$unEvenement->cadeau_id,
			);
		//var_dump($data);
		$id = (int)$unEvenement->id;
		if ($id == 0)
		{
			$this->tableGateway->insert($data);
			return $this->tableGateway->lastInsertValue;
			
		}
		else
		{
			if ($this->getEvenement($id))
			{
				$this->tableGateway->update($data, array('id' => $id));
			}
			
			else
			{
				throw new \Exception('Form id does not exist');
			}
		}
		
	}
	
	
	
	public function participer($somme,$id)
	{
		$participation = array('somme_recoltee'=> $somme);
		$evenement_id = (int)$id;
		$where = "id = " . $evenement_id;
		$this->tableGateway->update($participation, $where);
	}
	public function supprimer($evenement_id)
	{
		$this->tableGateway->delete(array('id'=> $evenement_id));
		
	}
	
	public function getEvenementByCadeau($idCadeau)
	{
		$rowset = $this->tableGateway->select(array('cadeaux_id' => $idCadeau));
		$row = $rowset->current();
		if (!$row) {
			$row = null;
			// throw new \Exception("Could not find row $idCadeau");
		}
		return $row;
		
	}


}
?>