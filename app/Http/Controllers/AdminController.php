<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Year;
use App\Models\Student;
use App\Models\Profession;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    public function index()
    {
        $count_user = User::count();
        $count_prof = Profession::count();
        $wirausaha = Student::where('continue', '=', 'wirausaha')->count();
        $bekerja = Student::where('continue', '=', 'bekerja')->count();
        $p = [$wirausaha, $bekerja];
        // dd($p);
        // $wirausaha = Student::where('continue', '=', 'wirausaha')->count();
        // dd($wirausaha);
        $tahun = Student::select('years')->distinct()->get();

        $jobs = [];
        foreach ($tahun as $yr) {
            $jobs[] = $yr->years;
        }
        return view('admin.index', compact('count_user', 'count_prof', 'jobs', 'p'));
    }
    public function professions()
    {

        return view("admin.professions", [
            'professions' => Profession::latest()->paginate(10),
        ]);
    }
    public function news()
    {

        return view("admin.news", [
            'news' => News::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create", [
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


        return redirect('admin/professions')->with('success', 'Professions telah di unggah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $professions = Profession::where('slug', '=', $id)->first();
        if ($professions == []) {
            abort('404');
        }
        return view('admin.show', compact('professions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        return view('admin.edit', [
            'profession' => $profession

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        // dd($profession);
        // $oldProfession = Profession::where('slug', $profession)->first();
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



        return redirect('admin/professions')->with('success', 'Professions telah di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profession $profession)
    {

        $profession->delete();
        session()->flash("sukses", "The post was destroy");
        return redirect('admin/professions');
    }
}
