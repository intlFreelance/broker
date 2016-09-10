<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContractPaymentRequest;
use App\Http\Requests\UpdateContractPaymentRequest;
use App\Repositories\ContractPaymentRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContractPaymentController extends InfyOmBaseController
{
    /** @var  ContractPaymentRepository */
    private $contractPaymentRepository;

    public function __construct(ContractPaymentRepository $contractPaymentRepo)
    {
        $this->contractPaymentRepository = $contractPaymentRepo;
    }

    /**
     * Display a listing of the ContractPayment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contractPaymentRepository->pushCriteria(new RequestCriteria($request));
        $contractPayments = $this->contractPaymentRepository->all();

        return view('contractPayments.index')
            ->with('contractPayments', $contractPayments);
    }

    /**
     * Show the form for creating a new ContractPayment.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractPayments.create');
    }

    /**
     * Store a newly created ContractPayment in storage.
     *
     * @param CreateContractPaymentRequest $request
     *
     * @return Response
     */
    public function store(CreateContractPaymentRequest $request)
    {
        $input = $request->all();

        $contractPayment = $this->contractPaymentRepository->create($input);

        Flash::success('ContractPayment saved successfully.');

        return redirect(route('contractPayments.index'));
    }

    /**
     * Display the specified ContractPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractPayment = $this->contractPaymentRepository->findWithoutFail($id);

        if (empty($contractPayment)) {
            Flash::error('ContractPayment not found');

            return redirect(route('contractPayments.index'));
        }

        return view('contractPayments.show')->with('contractPayment', $contractPayment);
    }

    /**
     * Show the form for editing the specified ContractPayment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractPayment = $this->contractPaymentRepository->findWithoutFail($id);

        if (empty($contractPayment)) {
            Flash::error('ContractPayment not found');

            return redirect(route('contractPayments.index'));
        }

        return view('contractPayments.edit')->with('contractPayment', $contractPayment);
    }

    /**
     * Update the specified ContractPayment in storage.
     *
     * @param  int              $id
     * @param UpdateContractPaymentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractPaymentRequest $request)
    {
        $contractPayment = $this->contractPaymentRepository->findWithoutFail($id);

        if (empty($contractPayment)) {
            Flash::error('ContractPayment not found');

            return redirect(route('contractPayments.index'));
        }

        $contractPayment = $this->contractPaymentRepository->update($request->all(), $id);

        Flash::success('ContractPayment updated successfully.');

        return redirect(route('contractPayments.index'));
    }

    /**
     * Remove the specified ContractPayment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contractPayment = $this->contractPaymentRepository->findWithoutFail($id);

        if (empty($contractPayment)) {
            Flash::error('ContractPayment not found');

            return redirect(route('contractPayments.index'));
        }

        $this->contractPaymentRepository->delete($id);

        Flash::success('ContractPayment deleted successfully.');

        return redirect(route('contractPayments.index'));
    }
}
