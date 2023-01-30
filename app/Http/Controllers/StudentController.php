<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("patient.add", [
            "url_name" => "Siswa UKS",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'class' => 'required|max:255',
            'status' => 'required',
            'keluhan' => 'required|max:255',
            // 'image' => 'image|file|max:5120'
        ]);

        if ($request->file('image')) {
            $validatedData["image"] = $request->file('image')->store('patients');
        } else {
            $validatedData["image"] = 'patients/sample.jpg';
        }

        $validatedData["slug"] = SlugService::createSlug(Student::class, 'slug', $request->name);

        Student::create($validatedData);

        return redirect('/')->with('success', 'Pasien baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('patient.edit', [
            "url_name" => "Siswa UKS",
            "student" => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'class' => 'required|max:255',
            'status' => 'required',
            'keluhan' => 'required|max:255',
            // 'image' => 'image|file|max:5120'
        ]);

        if ($request->name != $student->name) {
            $validatedData["slug"] = SlugService::createSlug(student::class, 'slug', $request->name);
        }

        if ($request->file('image')) {
            if ($student->image) {
                Storage::delete($student->image);
            }
            $validatedData['image'] = $request->file('image')->store('patients');
        } else {
            $validatedData["image"] = 'patients/sample.jpg';
        }

        // $validatedData["updated_at"] = strtotime(now()->format('Y-m-d H:i:s'));

        // return $validatedData;
        Student::where('id', $student->id)->update($validatedData);

        return redirect("/")->with('success', 'Data pasien berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
