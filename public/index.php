<?php
use Doctrine\Common\Annotations\AnnotationRegistry;
use MJanssen\Provider\ServiceRegisterProvider;
use MJanssen\Provider\RoutingServiceProvider;
use Igorw\Silex\ConfigServiceProvider;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;

chdir(dirname(__DIR__));

$loader = require_once 'vendor/autoload.php';

$app = new Application();

//Set all service providers
$app->register(
    new ConfigServiceProvider(__DIR__."/../app/config/services.yml")
);

//Register all providers
$app->register(
    new ServiceRegisterProvider()
);

//Configure the service providers
$app->register(
    new ConfigServiceProvider(__DIR__."/../app/config/config.yml", array('app_path' => getcwd()))
);

//Set all available routes
$app->register(
    new ConfigServiceProvider(__DIR__."/../app/config/routes.yml", array('baseUrl' => $app['baseUrl']))
);

//Register all routes
$app->register(
    new RoutingServiceProvider()
);

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

$app->error(function (\Exception $e, $code) use ($app) {
    if(404 === $code) {
        return;
    }
    return new JsonResponse(array('application error'));
});

$app->run();