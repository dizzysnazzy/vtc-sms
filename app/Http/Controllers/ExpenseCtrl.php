<?php

namespace vtc\Http\Controllers;

use Illuminate\Http\Request;
use vtc\Expense;
use vtc\School;
use Sentinel;
use PDF;

class ExpenseCtrl extends Controller
{
    public function index() {
      return view('school-admin.expenses.add');
    }

    public function addExpense(Request $request) {
      $expense = new Expense();

      $email = Sentinel::getUser()->email;

      $school = School::where('email', $email)->get()->first();

      $expense->school_id = $school->id;
      $expense->expense_name = $request->input('expense_name');
      $expense->amount =$request->input('amount');
      $expense->expense_date = $request->input('expense_date');
      $expense->comments = $request->input('comments');
      $expense->photo = $request->input('photo');
      $expense->save();

      return redirect('/schooladmin/expenses/view');
    }

    public function viewExpense() {
      $email = Sentinel::getUser()->email;

      $shule = School::where('email', $email)->get()->first();

      $expenses = Expense::where('school_id', $shule->id)->get();

      return view('school-admin.expenses.view')->with('expenses', $expenses);

    }

    public function allExpenses() {
      $schools = School::with('expenses')->get();

      return view('accounting.expenses.view')->with('schools', $schools);
    }

    public function downloadExpense($id) {
      $expense = Expense::find($id);

      $pdf = PDF::loadView('school-admin.expenses.receipt', compact('expense'));
      return $pdf->download('invoice.pdf');
    }

    public function destroy($id) {
      $expense = Expense::findOrFail($id);

      $expense->delete();

      return redirect()->back();
    }
}
