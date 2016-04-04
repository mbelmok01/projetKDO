<?php
namespace Kdo;

// Add these import statements:

use Kdo\Model\Evenement;
use Kdo\Model\EvenementTable;
use Kdo\Model\Invitation;
use Kdo\Model\InvitationTable;
use Kdo\Model\uneInvitation;
use Kdo\Model\uneInvitationTable;
use Kdo\Model\unEvenement;
use Kdo\Model\unEvenementTable;
use Kdo\Model\Participants;
use Kdo\Model\ParticipantsTable;

use Kdo\Model\Membre;
use Kdo\Model\MembreTable;

use Kdo\Model\Cadeau;
use Kdo\Model\CadeauTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
   
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					
    					'Kdo\Model\EvenementTable' =>  function($sm) {
    						$tableGateway = $sm->get('EvenementTableGateway');
    						$table = new EvenementTable($tableGateway);
    						return $table;
    						},
    						'EvenementTableGateway' => function ($sm) {
    							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    							$resultSetPrototype = new ResultSet();
    							return new TableGateway('v_evenement', $dbAdapter, null, $resultSetPrototype);
    						},
    						//
    						

                            //pour participer et decliner
                            'Kdo\Model\uneInvitationTable' =>  function($sm) {
                                $tableGateway = $sm->get('uneInvitationTableGateway');
                                $table = new uneInvitationTable($tableGateway);
                                return $table;
                            },
                            'uneInvitationTableGateway' => function ($sm) {
                                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                                // variable dans laquelle mettre le resultat de la requete
                                $resultSetPrototype = new ResultSet();
                                // nom de la table
                                return new TableGateway('membre_evenement', $dbAdapter, null, $resultSetPrototype);
                            },

                            'Kdo\Model\unEvenementTable' =>  function($sm) {
                                $tableGateway = $sm->get('unEvenementTableGateway');
                                $table = new unEvenementTable($tableGateway);
                                return $table;
                            },
                            'unEvenementTableGateway' => function ($sm) {
                                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                                // variable dans laquelle mettre le resultat de la requete
                                $resultSetPrototype = new ResultSet();
                                // nom de la table
                                return new TableGateway('evenements', $dbAdapter, null, $resultSetPrototype);
                            },

                            'Kdo\Model\ParticipantsTable' =>  function($sm) {
                                $tableGateway = $sm->get('ParticipantsTableGateway');
                                $table = new ParticipantsTable($tableGateway);
                                return $table;
                            },
                            'ParticipantsTableGateway' => function ($sm) {
                                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                                // variable dans laquelle mettre le resultat de la requete
                                $resultSetPrototype = new ResultSet();
                                // nom de la table
                                return new TableGateway('participants', $dbAdapter, null, $resultSetPrototype);
                            },
                            'Kdo\Model\CadeauTable' =>  function($sm) {
                                $tableGateway = $sm->get('CadeauTableGateway');
                                $table = new CadeauTable($tableGateway);
                                return $table;
                            },
                            'CadeauTableGateway' => function ($sm) {
                                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                                // variable dans laquelle mettre le resultat de la requete
                                $resultSetPrototype = new ResultSet();
                                // nom de la table
                                return new TableGateway('cadeaux', $dbAdapter, null, $resultSetPrototype);
                            },
                            'Kdo\Model\MembreTable' =>  function($sm) {
                            	$tableGateway = $sm->get('MembreTableGateway');
                            	$table = new MembreTable($tableGateway);
                            	return $table;
                            },
                            'MembreTableGateway' => function ($sm) {
                            	$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                            	// variable dans laquelle mettre le resultat de la requete
                            	$resultSetPrototype = new ResultSet();
                            	// nom de la table
                            	return new TableGateway('membres', $dbAdapter, null, $resultSetPrototype);
                            },
    						
    		),
    	);
    }
}
