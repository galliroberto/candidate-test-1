<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contract\StoreContract;
use App\Http\Requests\Contract\UpdateContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contracts.index')->withContracts(Contract::paginate(10));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Contract $contract
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contract     $contract
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContractRequest $request, Contract $contract)
    {
        $contract->update($request->all());

        return redirect()->route('contracts.edit', $contract)->withMessage('Contract updated successfully.');
    }

}
