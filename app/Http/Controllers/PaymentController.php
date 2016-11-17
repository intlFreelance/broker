<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ContractRepository;
use Flash;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ContractRepository $contractRepo)
    {
        $this->middleware('auth');
        $this->contractRepository = $contractRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['contracts'] = $this->contractRepository->all();
        return view('payments.index',$data);
    }

    public function create($id)
    {
        $data['contract'] = $this->contractRepository->findWithoutFail($id);

        if (empty($data['contract'])) {
            Flash::error('Contract not found');

            return redirect(route('payments.index'));
        }

        return view('payments.create',$data);
    }

    public function store(Request $request)
    {
        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
    }
}
