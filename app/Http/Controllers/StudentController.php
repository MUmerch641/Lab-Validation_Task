<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $students = Student::query()->latest()->get();

        return view('students.index', compact('students'));
    }

    public function create(): View
    {
        return view('students.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Student::create($this->validatedData($request));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    public function edit(int $id): View
    {
        $student = Student::query()->findOrFail($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $student = Student::query()->findOrFail($id);
        $student->update($this->validatedData($request, $student->id));

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $student = Student::query()->findOrFail($id);
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student removed successfully.');
    }

    private function validatedData(Request $request, ?int $studentId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'roll_no' => ['required', 'string', 'max:100', 'unique:students,roll_no,' . $studentId],
            'section' => ['required', 'string', 'max:50'],
            'age' => ['required', 'integer', 'min:1', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:1000'],
        ]);
    }
}
