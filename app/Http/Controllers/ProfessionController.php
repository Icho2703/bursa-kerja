<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("professions.index", [
            'professions' => Profession::where('statuse', '=', '2')->latest()->paginate(5),
        ]);
    }
    public function dashboard()
    {
        // $count =  Profession::where('user_id', '=', Auth::user('name'));
        $count =  Profession::count();
        return view("professions.dash", compact('count'));
    }
    public function table()
    {
        // $a = Profession::latest()->paginate(10);
        // dd($a);
        return view("professions.table", [
            'professions' => Profession::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("professions.create", [
            'user' => User::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'company' => 'required',
            'owner' => 'required',
            'requirtmen' => 'required',
            'about' => 'required',
            'contactperson' => 'required',
            'statuse' => 'required',

        ]);
        $fileName = time() . '.' . $request->file('thumbnail')->extension();
        $request->file('thumbnail')->storeAs('public', $fileName);
        $professions = Profession::create([
            'name' => request('name'),
            'owner' => request('owner'),
            'user_id' => auth()->user()->id,
            'contactperson' => request('contactperson'),
            'company' => request('company'),
            'requirtmen' => request('requirtmen'),
            'statuse' => request('statuse'),
            'about' => request('about'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $fileName,
            // 'thumbnail' => request()->file('thumbnail')->store('public/storage/image/professions'),

        ]);


        return redirect('professions/table')->with('success', 'Professions telah di unggah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professions = Profession::where('slug', '=', $id)->first();
        if ($professions == []) {
            abort('404');
        }
        return view('professions.show', compact('professions'));
    }
    public function detail($id)
    {
        $professions = Profession::where('slug', '=', $id)->first();
        return view('professions.detail', compact('professions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('professions.edit', [
            'profession' => $profession

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profession $profession)
    {
        request()->validate([
            'name' => 'required',
            'thumbnail' => request('thumbnail') ? 'image|mimes:jpeg,jpg,png,gif' : '',
            'company' => 'required',
            'owner' => 'required',
            'requirtmen' => 'required',
            'about' => 'required',
            'contactperson' => 'required',
            'statuse' => 'required',

        ]);
        // $post = time() . '.' . $request->file('thumbnail')->extension();
        // $request->file('thumbnail')->storeAs('public', $post);
        if ($request->hasFile('thumbnail')) {
            Storage::delete('public/storage/' . $profession->thumbnail);
            $photo = $request->file('thumbnail');
            $image_extension = $photo->extension();
            $image_name = time() . '.' . $image_extension;
            $request->file('thumbnail')->storeAs('public', $image_name);
        } else {
            $image_name = $profession->thumbnail;
        }

        $profession->update([
            'name' => request('name'),
            'owner' => request('owner'),
            'user_id' => auth()->user()->id,
            'contactperson' => request('contactperson'),
            'company' => request('company'),
            'requirtmen' => request('requirtmen'),
            'statuse' => request('statuse'),
            'about' => request('about'),
            'slug' => Str::slug(request('name')),
            'thumbnail' => $image_name,
            // 'thumbnail' => request()->file('thumbnail')->store('public/storage/image/professions'),

        ]);



        return redirect('professions/table')->with('success', 'Professions telah di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {
        if (auth()->user()->is($profession->author)) {
            $profession->delete();
            session()->flash("sukses", "The post was destroy");
            return redirect('professions/table');
        } else {
            session()->flash("error", "It wasn't yout post");
            return redirect('professions/table');
        }
    }
}
