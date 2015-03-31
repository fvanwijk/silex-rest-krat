<?php
namespace Krat\Controller;

use MJanssen\Controller\RestController;
use MJanssen\Controller\RestControllerInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

/**
 * Class RestController
 * @package Krat\Controller
 *
 * @SWG\Resource(
 *     apiVersion="1.0",
 *     swaggerVersion="1.2",
 *     resourcePath="/leden",
 *     basePath="http://krat.localhost/api"
 * )
 */
class LedenController extends RestController implements RestControllerInterface
{
    /**
     * @SWG\Api(
     *     path="/leden/{lidId}.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="GET", responseClass="Lid")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Lid not found")
     */
    public function getAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->get($app, $id)
        );
    }

    /**
     * @SWG\Api(
     *     path="/leden.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="GET", responseClass="Lid")
     *     )
     * )
     */
    public function getCollectionAction(Request $request, Application $app)
    {
        return new JsonResponse(
            $this->getCollection($app)
        );
    }

    /**
     * @SWG\Api(
     *     path="/leden/{lidId}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="DELETE", responseClass="Lid")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Lid not found")
     */
    public function deleteAction(Request $request, Application $app, $id)
    {
        if($this->delete($app, $id)) {
            return new Response('',204);
        }
    }

    /**
     * @SWG\Api(
     *     path="/leden",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="POST", responseClass="Lid")
     *     )
     * )
     */
    public function postAction(Request $request, Application $app)
    {
        return new JsonResponse(
            $this->post($app)
        );
    }

    /**
     * @SWG\Api(
     *     path="/leden/{lidId}.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="PUT", responseClass="Lid")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Lid not found")
     */
    public function putAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->put($app, $id)
        );
    }
}
