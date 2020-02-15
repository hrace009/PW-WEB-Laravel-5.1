<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoteSiteRequest;
use App\VoteSite;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        pagetitle([trans('vote.index'), settings('server_name')]);
        $sites = VoteSite::paginate();
        return view('admin.vote.view', compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        pagetitle([trans('vote.create'), settings('server_name')]);
        return view('admin.vote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoteSiteRequest $request
     * @return Response
     */
    public function store(VoteSiteRequest $request)
    {
        VoteSite::create($request->all());

        flash()->success(trans('vote.create_success'));

        return redirect('admin/vote');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param VoteSite $site
     * @return Response
     */
    public function edit(VoteSite $site)
    {
        pagetitle([trans('vote.edit', ['name' => $site->name]), settings('server_name')]);
        return view('admin.vote.edit', compact('site'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VoteSiteRequest $request
     * @param VoteSite $site
     * @return Response
     */
    public function update(VoteSiteRequest $request, VoteSite $site)
    {
        $site->update($request->all());

        flash()->success(trans('vote.edit_success'));

        return redirect('admin/vote');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
