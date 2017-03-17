<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateMenuesRequest;
use App\Http\Requests\UpdateMenuesRequest;
use App\Models\Menues;
use App\Repositories\MenuesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MenuesController extends AppBaseController
{
    /** @var  MenuesRepository */
    private $menuesRepository;

    public function __construct(MenuesRepository $menuesRepo)
    {
        parent::__construct();
        $this->menuesRepository = $menuesRepo;
    }

    /**
     * Display a listing of the Menues.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuesRepository->pushCriteria(new RequestCriteria($request));
        $menues = $this->menuesRepository->all();

        return view('menues.index',compact('menues'))
            ->with('curr_menu', 'manage')
            ->with('curr_submenu','manage_menu');
    }

    /**
     * Show the form for creating a new Menues.
     *
     * @return Response
     */
    public function create()
    {
        return view('menues.create')->with('menues',1);
    }

    /**
     * Store a newly created Menues in storage.
     *
     * @param CreateMenuesRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuesRequest $request)
    {
        $input = $request->all();

        $menues = $this->menuesRepository->create($input);

        Flash::success('Menues saved successfully.');

        return redirect(route('menues.index'));
    }

    /**
     * Display the specified Menues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menues = $this->menuesRepository->findWithoutFail($id);

        if (empty($menues)) {
            Flash::error('Menues not found');

            return redirect(route('menues.index'));
        }

        return view('menues.show')->with('menues', $menues);
    }

    /**
     * Show the form for editing the specified Menues.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menues = $this->menuesRepository->findWithoutFail($id);

        if (empty($menues)) {
            Flash::error('Menues not found');

            return redirect(route('menues.index'));
        }

        return view('menues.edit')->with('menues', $menues);
    }

    /**
     * Update the specified Menues in storage.
     *
     * @param  int              $id
     * @param UpdateMenuesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuesRequest $request)
    {
        $menues = $this->menuesRepository->findWithoutFail($id);

        if (empty($menues)) {
            Flash::error('Menues not found');

            return redirect(route('menues.index'));
        }

        $menues = $this->menuesRepository->update($request->all(), $id);

        Flash::success('Menues updated successfully.');

        return redirect(route('menues.index'));
    }

    /**
     * Remove the specified Menues from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menues = $this->menuesRepository->findWithoutFail($id);

        if (empty($menues)) {
            Flash::error('Menues not found');

            return redirect(route('menues.index'));
        }

        $this->menuesRepository->delete($id);

        Flash::success('Menues deleted successfully.');

        return redirect(route('menues.index'));
    }
}
