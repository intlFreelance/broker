<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Repositories\ProducerRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProducerController extends InfyOmBaseController
{
    /** @var  ProducerRepository */
    private $producerRepository;

    public function __construct(ProducerRepository $producerRepo)
    {
        $this->producerRepository = $producerRepo;
    }

    /**
     * Display a listing of the Producer.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->producerRepository->pushCriteria(new RequestCriteria($request));
        $producers = $this->producerRepository->all();

        return view('producers.index')
            ->with('producers', $producers);
    }

    /**
     * Show the form for creating a new Producer.
     *
     * @return Response
     */
    public function create()
    {
        return view('producers.create');
    }

    /**
     * Store a newly created Producer in storage.
     *
     * @param CreateProducerRequest $request
     *
     * @return Response
     */
    public function store(CreateProducerRequest $request)
    {
        $input = $request->all();

        $producer = $this->producerRepository->create($input);

        Flash::success('Producer saved successfully.');

        return redirect(route('producers.index'));
    }

    /**
     * Display the specified Producer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $producer = $this->producerRepository->findWithoutFail($id);

        if (empty($producer)) {
            Flash::error('Producer not found');

            return redirect(route('producers.index'));
        }

        return view('producers.show')->with('producer', $producer);
    }

    /**
     * Show the form for editing the specified Producer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $producer = $this->producerRepository->findWithoutFail($id);

        if (empty($producer)) {
            Flash::error('Producer not found');

            return redirect(route('producers.index'));
        }

        return view('producers.edit')->with('producer', $producer);
    }

    /**
     * Update the specified Producer in storage.
     *
     * @param  int              $id
     * @param UpdateProducerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProducerRequest $request)
    {
        $producer = $this->producerRepository->findWithoutFail($id);

        if (empty($producer)) {
            Flash::error('Producer not found');

            return redirect(route('producers.index'));
        }

        $producer = $this->producerRepository->update($request->all(), $id);

        Flash::success('Producer updated successfully.');

        return redirect(route('producers.index'));
    }

    /**
     * Remove the specified Producer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $producer = $this->producerRepository->findWithoutFail($id);

        if (empty($producer)) {
            Flash::error('Producer not found');

            return redirect(route('producers.index'));
        }

        $this->producerRepository->delete($id);

        Flash::success('Producer deleted successfully.');

        return redirect(route('producers.index'));
    }
}
