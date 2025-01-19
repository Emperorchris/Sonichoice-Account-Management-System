<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountEntryRequest;
use App\Http\Requests\UpdateAccountEntryRequest;
use App\Models\AccountEntry;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class AccountEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        $entries = AccountEntry::paginate(100);
        return Inertia::render('AllRecords', compact('entries'));
    }
    public function index()
    {
        return Inertia::render('AccountEntry');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validated = request()->validate([
            'product' => "required|string|max:255",
            'amount' => "required|numeric",
            'amount_received' => "required|numeric",
            'tips' => "nullable|numeric",
            'payment_method' => "required|string|max:255",
            'delivery_charge' => "required|numeric",
            'merchant_balance' => "required|numeric",
            'group_name' => "required|string|max:255",
            'rider' => "required|string|max:255",
            'remark' => "nullable|string|max:255",
        ]);

        $entries = AccountEntry::create([
            'product' => $validated['product'],
            'amount' => $validated['amount'],
            'amount_received' => $validated['amount_received'],
            'tips' => $validated['tips'] ?? null,
            'payment_method' => $validated['payment_method'],
            'delivery_charge' => $validated['delivery_charge'],
            'merchant_balance' => $validated['merchant_balance'],
            'group_name' => $validated['group_name'],
            'rider' => $validated['rider'],
            'remark' => $validated['remark'] ?? null,
            'date' => now(),
        ]);

        return redirect()->back()->with('success', 'Account Entry Recorded Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(AccountEntry $accountEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $entry = AccountEntry::find($id);
        
        if (!$entry) {
            return redirect()->back()->with('error', 'Account Entry Not Found');
        }
        return Inertia::render('AccountEntryEdit', compact('entry')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountEntry $accountEntry)
    {

        if (!$accountEntry) {
            return redirect()->back()->with('error', 'Account Entry This Record Not Found');
        }

        $validated = request()->validate([
            'product' => "required|string|max:255",
            'amount' => "required|numeric",
            'amount_received' => "required|numeric",
            'tips' => "nullable|numeric",
            'payment_method' => "required|string|max:255",
            'delivery_charge' => "required|numeric",
            'merchant_balance' => "required|numeric",
            'group_name' => "required|string|max:255",
            'rider' => "required|string|max:255",
            'remark' => "nullable|string|max:255",
        ]);

        $entries = $accountEntry->update([
            'product' => $validated['product'],
            'amount' => $validated['amount'],
            'amount_received' => $validated['amount_received'],
            'tips' => $validated['tips'] ?? null,
            'payment_method' => $validated['payment_method'],
            'delivery_charge' => $validated['delivery_charge'],
            'merchant_balance' => $validated['merchant_balance'],
            'group_name' => $validated['group_name'],
            'rider' => $validated['rider'],
            'remark' => $validated['remark'] ?? null,
            'updated_at' => now(),
        ]); 

        if (!$entries) {
            return redirect()->back()->with('error', 'Failed to Update Account Entry');
        }

        return redirect()->back()->with('success', 'Account Entry Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountEntry $accountEntry)
    {
        if (!$accountEntry) {
            return redirect()->back()->with('error', 'Account Entry Not Found');
        }

        $accountEntry->delete();

        return redirect()->back()->with('success', 'Account Entry Deleted Successfully');
    }
}
