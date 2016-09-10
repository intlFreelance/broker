<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContractPaymentAPIRequest;
use App\Http\Requests\API\UpdateContractPaymentAPIRequest;
use App\Models\ContractPayment;
use App\Repositories\ContractPaymentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContractPaymentController
 * @package App\Http\Controllers\API
 */

class ContractPaymentAPIController extends InfyOmBaseController
{
    /** @var  ContractPaymentRepository */
    private $contractPaymentRepository;

    public function __construct(ContractPaymentRepository $contractPaymentRepo)
    {
        $this->contractPaymentRepository = $contractPaymentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractPayments",
     *      summary="Get a listing of the ContractPayments.",
     *      tags={"ContractPayment"},
     *      description="Get all ContractPayments",
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
     *                  @SWG\Items(ref="#/definitions/ContractPayment")
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
        $this->contractPaymentRepository->pushCriteria(new RequestCriteria($request));
        $this->contractPaymentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contractPayments = $this->contractPaymentRepository->all();

        return $this->sendResponse($contractPayments->toArray(), 'ContractPayments retrieved successfully');
    }

    /**
     * @param CreateContractPaymentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contractPayments",
     *      summary="Store a newly created ContractPayment in storage",
     *      tags={"ContractPayment"},
     *      description="Store ContractPayment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractPayment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractPayment")
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
     *                  ref="#/definitions/ContractPayment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContractPaymentAPIRequest $request)
    {
        $input = $request->all();

        $contractPayments = $this->contractPaymentRepository->create($input);

        return $this->sendResponse($contractPayments->toArray(), 'ContractPayment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contractPayments/{id}",
     *      summary="Display the specified ContractPayment",
     *      tags={"ContractPayment"},
     *      description="Get ContractPayment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractPayment",
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
     *                  ref="#/definitions/ContractPayment"
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
        /** @var ContractPayment $contractPayment */
        $contractPayment = $this->contractPaymentRepository->find($id);

        if (empty($contractPayment)) {
            return Response::json(ResponseUtil::makeError('ContractPayment not found'), 404);
        }

        return $this->sendResponse($contractPayment->toArray(), 'ContractPayment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContractPaymentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contractPayments/{id}",
     *      summary="Update the specified ContractPayment in storage",
     *      tags={"ContractPayment"},
     *      description="Update ContractPayment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractPayment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContractPayment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContractPayment")
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
     *                  ref="#/definitions/ContractPayment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContractPaymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContractPayment $contractPayment */
        $contractPayment = $this->contractPaymentRepository->find($id);

        if (empty($contractPayment)) {
            return Response::json(ResponseUtil::makeError('ContractPayment not found'), 404);
        }

        $contractPayment = $this->contractPaymentRepository->update($input, $id);

        return $this->sendResponse($contractPayment->toArray(), 'ContractPayment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contractPayments/{id}",
     *      summary="Remove the specified ContractPayment from storage",
     *      tags={"ContractPayment"},
     *      description="Delete ContractPayment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContractPayment",
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
        /** @var ContractPayment $contractPayment */
        $contractPayment = $this->contractPaymentRepository->find($id);

        if (empty($contractPayment)) {
            return Response::json(ResponseUtil::makeError('ContractPayment not found'), 404);
        }

        $contractPayment->delete();

        return $this->sendResponse($id, 'ContractPayment deleted successfully');
    }
}
