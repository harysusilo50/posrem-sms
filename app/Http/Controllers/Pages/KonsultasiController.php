<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Konsultasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KonsultasiController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'user') {
            $data = Konsultasi::with('user', 'petugas')->where('user_id', Auth::id())->get();
        } else {
            $data = Konsultasi::with('user', 'petugas')->get();
        }

        return view('pages.konsultasi.index', compact('data'));
    }

    public function create()
    {
        $user = User::findOrFail(Auth::id());
        return view('pages.konsultasi.create', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $konsultasi = new Konsultasi();
            $konsultasi->user_id = Auth::id();
            $konsultasi->tgl_Konsultasi = now()->format('Y-m-d');
            $konsultasi->pertanyaan = $request->pertanyaan;
            $konsultasi->save();
            DB::commit();

            Alert::success('Success', 'Berhasil mengajukan konsultasi!');
            return redirect()->route('konsultasi.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $konsultasi = Konsultasi::with('user', 'petugas')->findOrFail($id);
        return view('pages.konsultasi.show', compact('konsultasi'));
    }

        public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $konsultasi = Konsultasi::findOrFail($id);
            $konsultasi->petugas_id = Auth::id();
            $konsultasi->jawaban = $request->jawaban;
            $konsultasi->save();
            DB::commit();

            Alert::success('Success', 'Berhasil menjawab pertanyaan konsultasi!');
            return redirect()->route('konsultasi.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }
}
