<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kecamatan = Kecamatan::pluck('name', 'id');
        return view('survey.add-survey', compact('kecamatan'));
    }

    public function kelurahan($id)
    {
        $kelurahan = Kelurahan::where("kecamatan_id", $id)->pluck("nama", "id");
        return json_encode($kelurahan);
    }

    // public function generatePDF(Request $request)
    // {

    //     $survey = Survey::all();
    //     $pdf = PDF::loadView('survey.download-data', compact('survey'))->setPaper('a4', 'landscape');
    //     return $pdf->stream();
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function data(Request $request)
    {
        
        $survey = Survey::when($request->keyword, function ($query) use ($request) {
            $query->where('namalokasi', 'like', "%{$request->keyword}%")
                ->orWhere('kategori', 'like', "%{$request->keyword}%")
                ->orWhere('kelurahan', 'like', "%{$request->keyword}%")
                ->orWhere('rw', 'like', "%{$request->keyword}%");
        })->where('namasurveyor', 'like', auth()->user()->name)->paginate(5);
        return view('survey.data-survey', compact('survey'));

    }

    public function store(Request $request)
    {


        $request->validate([
            'lng' => 'required',
            'lat' => 'required',
            'namalokasi' => 'required',
            'kategori' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'pic1' => 'required',
            'telp1' => 'required',
            'namasurveyor' => 'required',
            'tgl' => 'required',
        ]);

        $survey = new Survey;
        $survey->lattitude = $request->lat;
        $survey->longtitude = $request->lng;
        $survey->namalokasi = $request->namalokasi;
        $survey->kategori = $request->kategori;
        $survey->rt = $request->rt;
        $survey->rw = $request->rw;
        $survey->kelurahan = $request->kelurahan;
        $survey->kecamatan = $request->kecamatan;
        $survey->pic1 = $request->pic1;
        $survey->pic2 = $request->pic2;
        $survey->telp1 = $request->telp1;
        $survey->telp2 = $request->telp2;
        $survey->namasurveyor = $request->namasurveyor;
        $survey->tanggal = $request->tgl;
        $survey->save();

        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            foreach ($files as $file) {
                $name = Str::random(10);
                $extension = $file->getClientOriginalName();
                $fileName = $file->getClientOriginalExtension();
                $imgName = $fileName . $name . '.' . $extension;
                Storage::putFileAs('public/images', $file, $imgName);
                $foto = new foto;
                $foto->path = $imgName;
                $foto->survey_id = $survey->id;
                $foto->survey()->associate($survey);
                $foto->save();
            }
        }
        return redirect('data-survey')->with('alert','Data Sukses Ditambahkan!');
    }

    public function destroy($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect('/data-survey');
    }

    public function destroyadmin($id)
    {
        $survey = Survey::findOrFail($id);
        $survey->delete();
        return redirect('/admin-page');
    }

    public function edit($id)
    {
        $survey = Survey::findOrFail($id);
        return view('survey.edit-survey', compact('survey'));
    }

    public function show($id)
    {
        $survey = Survey::findOrFail($id);
        return view('survey.detail', compact('survey'));
    }

    public function showadmin($id)
    {
        $survey = Survey::findOrFail($id);
        return view('admin.detailadmin', compact('survey'));
    }

    public function print($id)
    {
        $survey = Survey::findOrFail($id);
        return view('survey.cetak', compact('survey'));
    }

    public function printadmin($id)
    {
        $survey = Survey::findOrFail($id);
        return view('admin.Cetakadmin', compact('survey'));
    }

    public function printpdf()
    {
        $survey = Survey::all();
        return view('survey.download-data', compact('survey'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'lng' => 'required',
            'lat' => 'required',
            'namalokasi' => 'required',
            'kategori' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'pic1' => 'required',
            'telp1' => 'required',
            'namasurveyor' => 'required',
            'tgl' => 'required',
        ]);

        $survey = Survey::findOrFail($id);

        $survey->lattitude = $request->lat;
        $survey->longtitude = $request->lng;
        $survey->namalokasi = $request->namalokasi;
        $survey->kategori = $request->kategori;
        $survey->rt = $request->rt;
        $survey->rw = $request->rw;
        $survey->kelurahan = $request->kelurahan;
        $survey->kecamatan = $request->kecamatan;
        $survey->pic1 = $request->pic1;
        $survey->pic2 = $request->pic2;
        $survey->telp1 = $request->telp1;
        $survey->telp2 = $request->telp2;
        $survey->namasurveyor = $request->namasurveyor;
        $survey->tanggal = $request->tgl;
        $survey->update();

        // if ($request->hasFile('foto')) {
        //     $files = $request->file('foto');
        //     foreach ($files as $file) {
        //         $name = Str::random(10);
        //         $extension = $file->getClientOriginalName();
        //         $fileName = $file->getClientOriginalExtension();
        //         $imgName = $fileName . $name . '.' . $extension;
        //         Storage::putFileAs('public/images', $file, $imgName);
        //         $foto = new foto;
        //         $foto->path = $imgName;
        //         $foto->survey_id = $survey->id;
        //         $foto->survey()->associate($survey);
        //         $foto->save();
        //     }
        // }
        return redirect('/data-survey');
    }

    public function render()
    {
        return view('survey.maps');
    }

    public function addUser(Request $request)
    {
        $user = User::create([
            'name'=>$request->namauser,
            'email'=>$request->emailuser,
            'password'=>bcrypt($request->passuser),
        ]);
        $user->assignRole('user');
        return redirect()->back()->with('alert','User Baru Sukses Ditambahkan!'); 
    }
    
}
