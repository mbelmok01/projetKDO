<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Kdorest\Controller\Profilrest' => 'Kdorest\Controller\ProfilrestController',
        	'Kdorest\Controller\Souhaitrest' => 'Kdorest\Controller\SouhaitrestController',
        ),
    ),
 
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'profil-rest' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/profil-rest[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Kdorest\Controller\Profilrest',
                    ),
                ),
            ),
        		
        		'souhait-rest' => array(
        				'type'    => 'segment',
        				'options' => array(
        						'route'    => '/souhait-rest[/:id]',
        						'constraints' => array(
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'Kdorest\Controller\Souhaitrest',
        						),
        				),
        		),
        ),
    ),
 
 		'view_manager' => array(
				'strategies' => array(
						'ViewJsonStrategy',
						),
				),
		);