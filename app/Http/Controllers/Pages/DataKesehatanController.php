<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\DataKesehatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataKesehatanController extends Controller
{
    public function index(Request $request)
    {
        $query = DataKesehatan::with('user', 'kader');
        $user = Auth::user();
        if ($user->role === 'user') {
            $query->where('user_id', $user->id);
        } elseif ($user->role === 'kader') {
            $query->where('kader_id', $user->id);
        }
        $data = $query->get();

        return view('pages.data_kesehatan.index', compact('data'));
    }

    public function create()
    {
        $user = User::where('role', 'user')->get();
        $kader = User::where('role', 'kader')->get();
        return view('pages.data_kesehatan.create', compact('user', 'kader'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = new DataKesehatan();
            $data->user_id = $request->user_id;
            $data->kader_id = $request->kader_id;
            $data->tinggi_badan = $request->tinggi_badan;
            $data->berat_badan = $request->berat_badan;
            $data->lingkar_perut = $request->lingkar_perut;
            $data->lingkar_lengan = $request->lingkar_lengan;
            $data->pengecekan_anemia = $request->pengecekan_anemia;
            $data->tekanan_darah = $request->tekanan_darah;
            $data->tgl_pemeriksaan = $request->tgl_pemeriksaan;
            $data->save();
            DB::commit();

            Alert::success('Success', 'Berhasil menambahkan data kesehatan!');
            return redirect()->route('data-kesehatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data = DataKesehatan::findOrFail($id);
        $user = User::where('role', 'user')->get();
        $kader = User::where('role', 'kader')->get();
        return view('pages.data_kesehatan.edit', compact('user', 'kader', 'data'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $data = DataKesehatan::findOrFail($id);
            $data->user_id = $request->user_id;
            $data->kader_id = $request->kader_id;
            $data->tinggi_badan = $request->tinggi_badan;
            $data->berat_badan = $request->berat_badan;
            $data->lingkar_perut = $request->lingkar_perut;
            $data->lingkar_lengan = $request->lingkar_lengan;
            $data->pengecekan_anemia = $request->pengecekan_anemia;
            $data->tekanan_darah = $request->tekanan_darah;
            $data->tgl_pemeriksaan = $request->tgl_pemeriksaan;
            $data->save();
            DB::commit();

            Alert::success('Success', 'Berhasil mengubah data kesehatan!');
            return redirect()->route('data-kesehatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = DataKesehatan::findOrFail($id);
            $user->delete();

            DB::commit();
            Alert::success('Success', 'Data kesehatan berhasil dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }
}
