<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();

        return response()->json($expenses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required' //optional if you want this to be required
        ]);
        $expense = Expense::create($request->all());
        return response()->json(['message'=> 'expense created',
        'expense' => $expense]);
    }

    public function show(Expense $expense)
    {

        return response()->json($expense);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required' //optional if you want this to be required
        ]);
        $expense = Expense::find($request->id());
        $expense->name = $request->name();
        $expense->amount = $request->amount();
        $expense->description = $request->description();
        $expense->save();

        return response()->json([
            'message' => 'expense updated!',
            'expense' => $expense
        ]);
    }

    public function destroy(Request $request)
    {
        $expense = Expense::find($request->id());
        $expense->delete();
        return response()->json([
            'message' => 'expense deleted'
        ]);
    }
}