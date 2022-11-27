<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

/**
 * Class BankAccountController
 * @package App\Http\Controllers
 */
class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = BankAccount::paginate();

        return view('bank-account.index', compact('bankAccounts'))
            ->with('i', (request()->input('page', 1) - 1) * $bankAccounts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bankAccount = new BankAccount();
        return view('bank-account.create', compact('bankAccount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BankAccount::$rules);

        $bankAccount = BankAccount::create($request->all());

        return redirect()->route('bank-accounts.index')
            ->with('success', 'BankAccount created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bankAccount = BankAccount::find($id);

        return view('bank-account.show', compact('bankAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankAccount = BankAccount::find($id);

        return view('bank-account.edit', compact('bankAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BankAccount $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankAccount)
    {
        request()->validate(BankAccount::$rules);

        $bankAccount->update($request->all());

        return redirect()->route('bank-accounts.index')
            ->with('success', 'BankAccount updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bankAccount = BankAccount::find($id)->delete();

        return redirect()->route('bank-accounts.index')
            ->with('success', 'BankAccount deleted successfully');
    }
}
