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
 *     resourcePath="/krattiviteiten",
 *     description="Krattiviteiten opvragen en beheren"
 * )
 */
class KrattiviteitenController extends RestController implements RestControllerInterface
{
    /**
     * @SWG\Api(
     *   path="/krattiviteiten/{id}",
     *   @SWG\Operation(
     *     method="GET",
     *     nickname="krattiviteit",
     *     summary="De krattiviteit met ID {id} ophalen",
     *     type="Krattiviteit",
     *     @SWG\Parameter(
     *       name="id",
     *       description="Het ID van de krattiviteit",
     *       required=true,
     *       type="integer",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code="200", message="Got the krattiviteiten")
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
     *   path="/krattiviteiten",
     *   @SWG\Operation(
     *     method="GET",
     *     nickname="krattiviteit",
     *     summary="Lijst met alle krattiviteiten opvragen",
     *     type="List[Krattiviteit]"
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
     *   path="/krattiviteiten/{id}",
     *   @SWG\Operation(
     *     method="DELETE",
     *     nickname="deleteKrattiviteit",
     *     summary="De krattiviteit met ID {id} verwijderen",
     *     @SWG\Parameter(
     *       name="id",
     *       description="Het ID van de krattiviteit",
     *       required=true,
     *       type="integer",
     *       paramType="path"
     *     ),
     *     @SWG\ResponseMessage(code="204", message="De krattiviteit is verwijderd"),
     *     @SWG\ResponseMessage(code="404", message="Kon de krattiviteit met id {id} niet verwijderen. Er is geen krattiviteit met dat ID in de database.")
     *   )
     * )
     **/
    public function deleteAction(Request $request, Application $app, $id)
    {
        if($this->delete($app, $id)) {
            return new Response('',204);
        }
    }

    /**
     * @SWG\Api(
     *   path="/krattiviteiten/{id}",
     *   @SWG\Operation(
     *     method="POST",
     *     nickname="krattiviteit",
     *     summary="Krattiviteit updaten",
     *     type="Krattiviteit",
     *     @SWG\Parameter(
     *       name="body",
     *       description="Krattiviteit object",
     *       required=true,
     *       type="Krattiviteit",
     *       paramType="body",
     *       defaultValue="{
  ""name"": ""Krattiviteit"",
  ""date"": ""2024-12-24""
}"
     *     ),
     *     @SWG\ResponseMessage(code="200", message="De krattiviteit is aangemaakt"),
     *     @SWG\ResponseMessage(code="404", message="Kon de krattiviteit niet aanmaken")
     *   )
     * )
     **/
    public function postAction(Request $request, Application $app)
    {
        return new JsonResponse(
            $this->post($app)
        );
    }

    /**
     * @SWG\Api(
     *   path="/krattiviteiten/{id}",
     *   @SWG\Operation(
     *     method="PUT",
     *     nickname="krattiviteit",
     *     summary="Krattiviteit updaten",
     *     type="Krattiviteit",
     *     @SWG\Parameter(
     *       name="body",
     *       description="Krattiviteit object",
     *       required=true,
     *       type="Krattiviteit",
     *       paramType="body",
     *       defaultValue="{
  ""name"": ""Krattiviteit"",
  ""date"": ""2024-12-24""
}"
     *     ),
     *     @SWG\ResponseMessage(code="200", message="De krattiviteit is bijgewerkt"),
     *     @SWG\ResponseMessage(code="404", message="Kon de krattiviteit niet bijwerken. Er is geen krattiviteit met ID {id}")
     *   )
     * )
     **/
    public function putAction(Request $request, Application $app, $id)
    {
        return new JsonResponse(
            $this->put($app, $id)
        );
    }
}
