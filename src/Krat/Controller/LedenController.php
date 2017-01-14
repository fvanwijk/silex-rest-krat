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
 *     basePath="/",
 *     resourcePath="/leden",
 *     description="Leden opvragen en beheren"
 * )
 */
class LedenController extends RestController implements RestControllerInterface
{

    /**
     * @SWG\Api(
     *   path="/leden/{id}",
     *   @SWG\Operation(
     *     method="GET",
     *     nickname="lid",
     *     summary="Get a member with {id}",
     *     type="Lid",
     *     @SWG\Parameter(
     *       name="id",
     *       description="The id of the member",
     *       required=true,
     *       type="integer",
     *       paramType="path"
     *     )
     *   )
     * )
     **/
    public function getAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->get($app, $id)
        );
    }

    /**
     * @SWG\Api(
     *   path="/leden",
     *   @SWG\Operation(
     *     method="GET",
     *     nickname="lid",
     *     summary="Get all members",
     *   )
     * )
     **/
    public function getCollectionAction(Request $request, Application $app)
    {
        return new JsonResponse(
            $this->getCollection($app)
        );
    }

    /**
     * @SWG\Api(
     *   path="/leden/{id}",
     *   @SWG\Operation(
     *     method="DELETE",
     *     nickname="deleteLid",
     *     summary="Het lid met ID {id} verwijderen",
     *   )
     * )
     **/
    public function deleteAction(Request $request, Application $app, $id)
    {
        if($this->delete($app, $id)) {
            return new Response('',204);
        }
    }

    public function postAction(Request $request, Application $app)
    {
        return new JsonResponse(
            $this->post($app)
        );
    }

    public function putAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->put($app, $id)
        );
    }
}
