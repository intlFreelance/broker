<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use DB;
use App\Models\Producer;

class ClientController extends InfyOmBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $clients = $this->clientRepository->all();

        return view('clients.index')
            ->with('clients', $clients);
    }

    public function getJson()
    {
        $clients = $this->clientRepository->all();
        echo $clients;
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {
        $data['producer_array'] = Producer::select(DB::raw('CONCAT(`first_name`," ",`last_name`) as name'),'id')->lists('name','id');
        return view('clients.create',$data);
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        $client = $this->clientRepository->create($input);

        Flash::success('Client saved successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['client'] = $this->clientRepository->findWithoutFail($id);
        $data['producer_array'] = Producer::select(DB::raw('CONCAT(`first_name`," ",`last_name`) as name'),'id')->lists('name','id');
        if (empty($data['client'])) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        return view('clients.edit', $data);
    }

    /**
     * Update the specified Client in storage.
     *
     * @param  int              $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $client = $this->clientRepository->update($request->all(), $id);

        Flash::success('Client updated successfully.');

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found');

            return redirect(route('clients.index'));
        }

        $this->clientRepository->delete($id);

        Flash::success('Client deleted successfully.');

        return redirect(route('clients.index'));
    }
}
