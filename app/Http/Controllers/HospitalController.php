<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\User;
use App\Http\Requests\StoreHospitalRequest;
use App\Http\Requests\UpdateHospitalRequest;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hospital.hospitals', [
            "url_name" => "Rumah Sakit",
            "nav_title" => "Fasilitas Kesehatan",
            "user" => User::latest()->get(),
            "icon" => "hospital_icon.png",
            "hospitals" => Hospital::latest()->filter(request('search'))->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospital.add', [
            "url_name" => "Rumah Sakit",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHospitalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'schedule' => 'required',
            'rating' => 'required|integer|min:1|max:1',
            'link' => 'required',
            'image' => 'image|file|max:5120'
        ]);

        if ($request->file('image')) {
            $validatedData["image"] = $request->file('image')->store('hospitals');
        }

        $validatedData["link"] = strip_tags($request->link);
        // $validatedData["schedule"] = strip_tags($request->schedule);
        $validatedData["slug"] = SlugService::createSlug(Hospital::class, 'slug', $request->name);

        Hospital::create($validatedData);

        return redirect('/hospitals')->with('success', 'Rumah sakit baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        return view('hospital.edit', [
            "url_name" => "Rumah Sakit",
            "hospital" => $hospital
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHospitalRequest  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required',
            'schedule' => 'required',
            'rating' => 'required|min:1|max:5',
            'link' => 'required',
            'image' => 'image:jpg,jpeg,png|file|max:5120'
        ]);

        if ($request->name != $hospital->name) {
            $validatedData["slug"] = SlugService::createSlug(Hospital::class, 'slug', $request->name);
        }

        $validatedData["link"] = strip_tags($request->link);
        // $validatedData["slug"] = SlugService::createSlug(Hospital::class, 'slug', $request->name);

        if ($request->file('image')) {
            if ($hospital->image) {
                Storage::delete($hospital->image);
            }
            $validatedData["image"] = $request->file('image')->store('hospitals');
        }

        Hospital::where('id', $hospital->id)->update($validatedData);

        return redirect('/hospitals')->with('success', 'Rumah sakit berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        if ($hospital->image) {
            Storage::delete($hospital->image);
        }

        Hospital::destroy($hospital->id);

        return redirect('/hospitals')->with('success', 'Rumah sakit berhasil dihapus');
    }

    public function delete(Hospital $hospital)
    {
        return view('hospital.delete', [
            "url_name" => "Rumah Sakit",
            "hospital" => $hospital
        ]);
    }
}
