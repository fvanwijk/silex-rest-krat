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
 *     resourcePath="/krattiviteiten",
 *     basePath="http://krat.localhost/api"
 * )
 */
class KrattiviteitenController extends RestController implements RestControllerInterface
{
    /**
     * @SWG\Api(
     *     path="/krattiviteiten/{krattiviteitId}.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="GET", responseClass="Krattiviteit")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Krattiviteit not found")
     */
    public function getAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->get($app, $id)
        );
    }

    /**
     * @SWG\Api(
     *     path="/krattiviteiten.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="GET", responseClass="Krattiviteit")
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
     *     path="/krattiviteiten/{krattiviteitId}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="DELETE", responseClass="Krattiviteit")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Krattiviteit not found")
     */
    public function deleteAction(Request $request, Application $app, $id)
    {
        if($this->delete($app, $id)) {
            return new Response('',204);
        }
    }

    /**
     * @SWG\Api(
     *     path="/krattiviteiten",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="POST", responseClass="Krattiviteit")
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
     *     path="/krattiviteiten/{krattiviteitId}.{format}",
     *     @SWG\Operations(
     *         @SWG\Operation(httpMethod="PUT", responseClass="Krattiviteit")
     *     )
     * )
     * @SWG\ErrorResponse(code="404", reason="Krattiviteit not found")
     */
    public function putAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->put($app, $id)
        );
    }
}
