<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndexRequest;
use App\Http\Requests\UpdateIndexRequest;
use App\Models\Menues;
use App\Repositories\IndexRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IndexController extends AppBaseController
{
    /** @var  IndexRepository */
    private $indexRepository;

    public function __construct(IndexRepository $indexRepo)
    {
        parent::__construct();
        $this->indexRepository = $indexRepo;
    }

    /**
     * Display a listing of the Index.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('index.index');
    }

    /**
     * Show the form for creating a new Index.
     *
     * @return Response
     */
    public function create()
    {
        return view('index.create');
    }

    /**
     * Store a newly created Index in storage.
     *
     * @param CreateIndexRequest $request
     *
     * @return Response
     */
    public function store(CreateIndexRequest $request)
    {
        $input = $request->all();

        $index = $this->indexRepository->create($input);

        Flash::success('Index saved successfully.');

        return redirect(route('index.index'));
    }

    /**
     * Display the specified Index.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            Flash::error('Index not found');

            return redirect(route('index.index'));
        }

        return view('index.show')->with('index', $index);
    }

    /**
     * Show the form for editing the specified Index.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            Flash::error('Index not found');

            return redirect(route('index.index'));
        }

        return view('index.edit')->with('index', $index);
    }

    /**
     * Update the specified Index in storage.
     *
     * @param  int              $id
     * @param UpdateIndexRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndexRequest $request)
    {
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            Flash::error('Index not found');

            return redirect(route('index.index'));
        }

        $index = $this->indexRepository->update($request->all(), $id);

        Flash::success('Index updated successfully.');

        return redirect(route('index.index'));
    }

    /**
     * Remove the specified Index from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            Flash::error('Index not found');

            return redirect(route('index.index'));
        }

        $this->indexRepository->delete($id);

        Flash::success('Index deleted successfully.');

        return redirect(route('index.index'));
    }
}
