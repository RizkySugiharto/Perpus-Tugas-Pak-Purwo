<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Http\Requests\StoreLoanRequest;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Loan::all();
        return view('loans.index', ['loans' => $loans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $students = Student::all();
        return view('loans.add', [
            'books' => $books,
            'students' => $students,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $book = Book::find($request->validated('book_id'));
        $user = Auth::user();
        $student = Student::find($request->validated('student_id'));
        $data = [
            'book_id' => $book->id,
            'user_id' => $user->id,
            'student_id' => $student->id,
            'book_title' => $book->title,
            'user_name' => $user->name,
            'student_name' => $student->name,
            'student_class' => $student->class,
        ];

        $loan = new Loan($data);
        if ($loan->save()) {
            return redirect()->route('loans.index');
        } else {
            return redirect()->route('loans.add');
        }
    }

    /**
     * Restore all data which is marked as deleted.
     */
    public function restore()
    {
        Loan::withTrashed()->restore();
        return redirect()->route('loans.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->route('loans.index');
    }
}
