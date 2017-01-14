<?php
$regex = array();
$regex['string'] = '^[a-z\-]+$';
$regex['id']     = '^[\d]+$';

return array(
    'config.routes' => array(
        /*array(
            'pattern' => '%baseUrl%/api/api-docs',
            'controller' => 'MJanssen\Controller\ApiDocsController::getAction',
            'method' => array(
                'get'
            )
        ),
        array(
            'pattern' => '%baseUrl%/api/api-docs/resources/{resource}.json',
            'controller' => 'MJanssen\Controller\ApiDocsController::getResourceAction',
            'method' => array(
                'get'
            ),
            'assert' => array(
                'resource' => $regex['string']
            )
        ),*/
        array(
            'pattern' => '%baseUrl%/api/leden/{id}',
            'controller' => 'Krat\Controller\LedenController::resolveAction',
            'method' => array(
                'get', 'put', 'delete'
            ),
            'assert' => array(
                'id' => $regex['id']
            ),
            'value' => array(
                'namespace' => 'core',
                'entity'    => 'lid'
            )
        ),
        array(
            'pattern' => '%baseUrl%/api/leden',
            'controller' => 'Krat\Controller\LedenController::resolveAction',
            'method' => array(
                'get', 'post'
            ),
            'value' => array(
                'namespace' => 'core',
                'entity'    => 'lid'
            )
        ),
        array(
            'pattern' => '%baseUrl%/api/krattiviteiten/{id}',
            'controller' => 'Krat\Controller\KrattiviteitenController::resolveAction',
            'method' => array(
                'get', 'put', 'delete'
            ),
            'assert' => array(
                'id' => $regex['id']
            ),
            'value' => array(
                'namespace' => 'core',
                'entity'    => 'krattiviteit'
            )
        ),
        array(
            'pattern' => '%baseUrl%/api/krattiviteiten',
            'controller' => 'Krat\Controller\KrattiviteitenController::resolveAction',
            'method' => array(
                'get', 'post'
            ),
            'value' => array(
                'namespace' => 'core',
                'entity'    => 'krattiviteit'
            )
        )
    )
);