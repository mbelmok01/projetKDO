<?php

return array (
		'controllers' => array (
				'invokables' => array (
						'Kdo\Controller\Cadeau' => 'Kdo\Controller\CadeauController',
						'Kdo\Controller\Evenement' => 'Kdo\Controller\EvenementController',
						'Kdo\Controller\Profil' => 'Kdo\Controller\ProfilController',
						)
		),
		// The following section is new and should be added to
		'router' => array (
				'routes' => array (
						'gestcadeau' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/gestcadeau[/][:action][/:id][/:id2]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+',
												'id2' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'Kdo\Controller\Cadeau',
												'action' => 'index',
												//'action'=> 'edit',
												//'action'=> 'delete',
										)
								),
						),
						
						'gestevenement' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/gestevenement[/][:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'__NAMESPACE__' => 'Kdo\Controller',
												'controller' => 'Kdo\Controller\Evenement',
												'action' => 'index'
						
										)
								)
						),
						'gestprofil' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/gestprofil[/][:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]+'
										),
										'defaults' => array (
												'controller' => 'Kdo\Controller\Profil',
												'action' => 'index',
												//'action' => 'add',
												//'action' => 'edit',
										)
								),
						),
		
				)
		),
		
		'view_manager' => array (
				'template_path_stack' => array (
						'kdo' => __DIR__ . '/../view/'
				)
		)
);