<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIndexAPIRequest;
use App\Http\Requests\API\UpdateIndexAPIRequest;
use App\Models\Index;
use App\Repositories\IndexRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IndexController
 * @package App\Http\Controllers\API
 */

class IndexAPIController extends AppBaseController
{
    /** @var  IndexRepository */
    private $indexRepository;

    public function __construct(IndexRepository $indexRepo)
    {
        $this->indexRepository = $indexRepo;
    }

    /**
     * Display a listing of the Index.
     * GET|HEAD /index
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->indexRepository->pushCriteria(new RequestCriteria($request));
        $this->indexRepository->pushCriteria(new LimitOffsetCriteria($request));
        $indices = $this->indexRepository->all();

        return $this->sendResponse($indices->toArray(), 'Indices retrieved successfully');
    }

    /**
     * Store a newly created Index in storage.
     * POST /index
     *
     * @param CreateIndexAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIndexAPIRequest $request)
    {
        $input = $request->all();

        $indices = $this->indexRepository->create($input);

        return $this->sendResponse($indices->toArray(), 'Index saved successfully');
    }

    /**
     * Display the specified Index.
     * GET|HEAD /index/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Index $index */
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            return $this->sendError('Index not found');
        }

        return $this->sendResponse($index->toArray(), 'Index retrieved successfully');
    }

    /**
     * Update the specified Index in storage.
     * PUT/PATCH /index/{id}
     *
     * @param  int $id
     * @param UpdateIndexAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndexAPIRequest $request)
    {
        $input = $request->all();

        /** @var Index $index */
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            return $this->sendError('Index not found');
        }

        $index = $this->indexRepository->update($input, $id);

        return $this->sendResponse($index->toArray(), 'Index updated successfully');
    }

    /**
     * Remove the specified Index from storage.
     * DELETE /index/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Index $index */
        $index = $this->indexRepository->findWithoutFail($id);

        if (empty($index)) {
            return $this->sendError('Index not found');
        }

        $index->delete();

        return $this->sendResponse($id, 'Index deleted successfully');
    }
}
