<?php
return array(
    'config.providers' => array(
        'validator' => array(
            'class' => 'Silex\Provider\ValidatorServiceProvider'
        ),
        'serviceControllerService' => array(
            'class' => 'Silex\Provider\ServiceControllerServiceProvider'
        ),
        'doctrineDbal' => array(
            'class' => 'Silex\Provider\DoctrineServiceProvider'
        ),
        'doctrineOrm' => array(
            'class' => 'Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider'
        ),
        'doctrineRegistry' => array(
            'class' => 'Dominikzogg\Silex\Provider\DoctrineOrmManagerRegistryProvider'
        ),
        'applicationServices' => array(
            'class' => 'MJanssen\Provider\ServiceProvider'
        ),
        'hmac' => array(
            'class' => 'Wizkunde\Provider\HmacServiceProvider'
        )
    )
);