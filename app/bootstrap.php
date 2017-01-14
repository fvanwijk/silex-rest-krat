<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use MJanssen\Provider\ServiceRegisterProvider;
use MJanssen\Provider\RoutingServiceProvider;
use Igorw\Silex\ConfigServiceProvider;

//Set all service providers
$app->register(
    new ConfigServiceProvider(__DIR__."/../app/config/services.php")
);

if(true === $app['debug']) {
    $app->register(
        new ConfigServiceProvider(__DIR__."/../app/config/services_dev.php")
    );
}

//Register all providers
$app->register(
    new ServiceRegisterProvider()
);

//Configure the service providers
$app->register(
    new ConfigServiceProvider(__DIR__."/../app/config/config.php", array('app.path' => getcwd()))
);

if(true === $app['debug']) {
    $app->register(
        new ConfigServiceProvider(__DIR__."/../app/config/config_dev.php", array('app.path' => getcwd()))
    );
}

if(true !== $cli) {
    //Set all available routes
    $app->register(
        new ConfigServiceProvider(__DIR__."/../app/config/routes.php", array('baseUrl' => $app['baseUrl']))
    );

    //Register all routes
    $app->register(
        new RoutingServiceProvider()
    );
}

// Set up swagger ui service for viewing the swagger docs
$app->register(new SwaggerUI\Silex\Provider\SwaggerUIServiceProvider(), array(
    "swaggerui.path"       => "/swagger-ui", // "swagger" werkt niet?
    "swaggerui.apiDocPath" => "/api/api-docs"
));

$app->register(new JDesrosiers\Silex\Provider\SwaggerServiceProvider(), array(
    "swagger.srcDir" => __DIR__ . "/../vendor/zircote/swagger-php/library",
    "swagger.servicePath" => __DIR__ . "/../src/Krat",
    "swagger.apiDocPath" => "/api/api-docs"
));

$app['validator.mapping.class_metadata_factory'] = new Symfony\Component\Validator\Mapping\Factory\LazyLoadingMetadataFactory(
    new Symfony\Component\Validator\Mapping\Loader\YamlFileLoader(__DIR__.'/../app/config/validation.yml')
);

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));