<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::where('role', '!=', 'admin')->get();
        return view('pages.user.index', compact('data'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:laki_laki,perempuan'],
        ]);

        try {
            DB::beginTransaction();

            $user = new User();
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->jabatan = $request->jabatan ?? null;
            $user->role = $request->role;

            $user->save();
            DB::commit();

            Alert::success('Success', 'Berhasil menambahkan data pengguna!');
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:laki_laki,perempuan'],
        ]);

        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->jabatan = $request->jabatan ?? null;
            $user->role = $request->role;
            $user->save();
            DB::commit();
            Alert::success('Success', 'Berhasil mengubah data pengguna!');
            return redirect()->route('user.index');
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
            $user = User::findOrFail($id);
            $user->delete();

            DB::commit();
            Alert::success('Success', 'Data pengguna berhasil dihapus!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function export_pdf()
    {
        $user = User::all();

        $pdf = Pdf::loadview('pages.user.report', ['user' => $user])->setPaper('a4', 'landscape');
        return $pdf->stream('user-report_' . now() . '.pdf');
    }

    public function profil()
    {
        $user = User::findOrFail(Auth::id());
        return view('pages.user.profil', compact('user'));
    }

    public function update_profil(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'numeric'],
            'tgl_lahir' => ['required', 'date'],
            'jenis_kelamin' => ['required', 'in:laki_laki,perempuan'],
        ]);

        try {
            DB::beginTransaction();
            $user = User::findOrFail(Auth::id());
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->nama = $request->nama;
            $user->alamat = $request->alamat;
            $user->no_hp = $request->no_hp;
            $user->tgl_lahir = $request->tgl_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->save();
            DB::commit();
            Alert::success('Success', 'Berhasil mengubah profil!');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }
}
