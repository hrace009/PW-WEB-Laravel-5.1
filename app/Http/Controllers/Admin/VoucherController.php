<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherRequest;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        pagetitle([trans('voucher.index'), settings('server_name')]);
        $vouchers = Voucher::paginate();
        return view('admin.voucher.view', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        pagetitle([trans('voucher.create'), settings('server_name')]);
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VoucherRequest $request
     * @return Response
     */
    public function store(VoucherRequest $request)
    {
        Voucher::create($request->all());

        flash()->success(trans('voucher.create_success'));

        return redirect('admin/voucher');
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
     * @param Voucher $voucher
     * @return Response
     */
    public function edit(Voucher $voucher)
    {
        pagetitle([trans('voucher.edit', ['code' => $voucher->code]), settings('server_name')]);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Voucher $voucher
     * @param VoucherRequest $request
     * @return Response
     */
    public function update(Voucher $voucher, VoucherRequest $request)
    {
        $voucher->update($request->all());

        flash()->success(trans('voucher.edit_success'));

        return redirect('admin/voucher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Voucher $voucher
     * @return Response
     */
    public function destroy(Request $request, Voucher $voucher)
    {
        if ($request->ajax()) {
            $voucher->delete();
        }
    }
}
