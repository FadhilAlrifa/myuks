<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\User;
use App\Http\Requests\StoreMedicineRequest;
use App\Http\Requests\UpdateMedicineRequest;
use App\Models\MedicineCategory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medicine.medicines', [
            "url_name" => "Obat",
            "nav_title" => "Obat dan Vitamin",
            "user" => User::latest()->get(),
            "icon" => "medicine_icon.png",
            "medicines" => Medicine::with('category')->filter(request(['search', 'category']))->get(),
            "medicines_category" => MedicineCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.add', [
            "url_name" => "Obat",
            "medicines_category" => MedicineCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'stock' => 'required|min:1',
            'dose' => 'required',
            'composition' => 'required',
            'body' => 'required',
            'side_effect' => 'required',
            'image' => 'image|file|max:5120'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('medicines');
        }

        $validatedData["slug"] = SlugService::createSlug(Medicine::class, 'slug', $request->name);
        $validatedData["view"] = 0;
        // $validatedData["schedule"] = strip_tags($request->schedule);

        Medicine::create($validatedData);

        return redirect('/medicines')->with('success', 'Obat berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        $view = $medicine->view;
        $updateView = [
            "view" => $view + 1
        ];

        Medicine::where('id', $medicine->id)->update($updateView);
        return view('medicine.medicine', [
            "url_name" => "Obat",
            "medicine" => $medicine
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        return view('medicine.edit', [
            "url_name" => "Obat",
            "medicine" => $medicine,
            "medicines_category" => MedicineCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicineRequest  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'stock' => 'required|min:1',
            'dose' => 'required',
            'composition' => 'required',
            'body' => 'required',
            'side_effect' => 'required',
            'image' => 'image|file|max:5120'
        ]);

        if ($request->name != $medicine->name) {
            $validatedData["slug"] = SlugService::createSlug(Medicine::class, 'slug', $request->name);
        }

        if ($request->file('image')) {
            if ($medicine->image) {
                Storage::delete($medicine->image);
            }
            $validatedData['image'] = $request->file('image')->store('medicines');
        }

        Medicine::where('id', $medicine->id)->update($validatedData);

        return redirect("/medicines")->with('success', 'Artikel berhasil diedit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Medicine $medicine)
    {
        return view('medicine.delete', [
            "url_name" => "Obat",
            "medicine" => $medicine
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        if ($medicine->image) {
            Storage::delete($medicine->image);
        }

        Medicine::destroy($medicine->id);

        return redirect('/medicines')->with('success', 'Obat berhasil dihapus');
    }
}
