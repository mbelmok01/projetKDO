<?php

namespace Kdo\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\TableGateway\AbstractTableGateway;

class CentreInteretTable extends AbstractTableGateway {
	protected $table = 'centresInteret';
	protected $tableName = 'centresInteret';
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll() {
		$resultSet = $this->tableGateway->select ();
		return $resultSet;
	}
	public function getCentreInteret($id) {
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
	public function saveCentreInteret(CentreInteret $centreInteret) {
	}
	public function deleteCentreInteret($id) {
		$this->tableGateway->delete(array('id' => $id));
		}
	
	}