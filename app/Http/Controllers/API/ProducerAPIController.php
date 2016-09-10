<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProducerAPIRequest;
use App\Http\Requests\API\UpdateProducerAPIRequest;
use App\Models\Producer;
use App\Repositories\ProducerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProducerController
 * @package App\Http\Controllers\API
 */

class ProducerAPIController extends InfyOmBaseController
{
    /** @var  ProducerRepository */
    private $producerRepository;

    public function __construct(ProducerRepository $producerRepo)
    {
        $this->producerRepository = $producerRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/producers",
     *      summary="Get a listing of the Producers.",
     *      tags={"Producer"},
     *      description="Get all Producers",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Producer")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->producerRepository->pushCriteria(new RequestCriteria($request));
        $this->producerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $producers = $this->producerRepository->all();

        return $this->sendResponse($producers->toArray(), 'Producers retrieved successfully');
    }

    /**
     * @param CreateProducerAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/producers",
     *      summary="Store a newly created Producer in storage",
     *      tags={"Producer"},
     *      description="Store Producer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Producer that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Producer")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Producer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProducerAPIRequest $request)
    {
        $input = $request->all();

        $producers = $this->producerRepository->create($input);

        return $this->sendResponse($producers->toArray(), 'Producer saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/producers/{id}",
     *      summary="Display the specified Producer",
     *      tags={"Producer"},
     *      description="Get Producer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producer",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Producer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Producer $producer */
        $producer = $this->producerRepository->find($id);

        if (empty($producer)) {
            return Response::json(ResponseUtil::makeError('Producer not found'), 404);
        }

        return $this->sendResponse($producer->toArray(), 'Producer retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateProducerAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/producers/{id}",
     *      summary="Update the specified Producer in storage",
     *      tags={"Producer"},
     *      description="Update Producer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producer",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Producer that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Producer")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Producer"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProducerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Producer $producer */
        $producer = $this->producerRepository->find($id);

        if (empty($producer)) {
            return Response::json(ResponseUtil::makeError('Producer not found'), 404);
        }

        $producer = $this->producerRepository->update($input, $id);

        return $this->sendResponse($producer->toArray(), 'Producer updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/producers/{id}",
     *      summary="Remove the specified Producer from storage",
     *      tags={"Producer"},
     *      description="Delete Producer",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producer",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Producer $producer */
        $producer = $this->producerRepository->find($id);

        if (empty($producer)) {
            return Response::json(ResponseUtil::makeError('Producer not found'), 404);
        }

        $producer->delete();

        return $this->sendResponse($id, 'Producer deleted successfully');
    }
}
