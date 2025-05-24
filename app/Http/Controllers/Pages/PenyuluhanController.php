<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Penyuluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PenyuluhanController extends Controller
{
    public function index()
    {
        return view('pages.penyuluhan.index');
    }

    public function information()
    {
        $data = Penyuluhan::where('kategori', 'informasi')->get();
        return view('pages.penyuluhan.informasi.index', compact('data'));
    }

    public function information_create()
    {
        return view('pages.penyuluhan.informasi.create');
    }

    public function information_store(Request $request)
    {
        try {
            DB::beginTransaction();

            $informasi = new Penyuluhan();
            $informasi->topik = $request->topik;
            $informasi->kategori = 'informasi';
            $informasi->deskripsi = $request->deskripsi;
            $informasi->save();
            DB::commit();

            Alert::success('Success', 'Berhasil menambah informasi posyandu!');
            return redirect()->route('penyuluhan.informasi.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function information_edit($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.informasi.edit', compact('data'));
    }

    public function information_update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $informasi = Penyuluhan::findOrFail($id);
            $informasi->topik = $request->topik;
            $informasi->deskripsi = $request->deskripsi;
            $informasi->save();
            DB::commit();

            Alert::success('Success', 'Berhasil mengubah informasi posyandu!');
            return redirect()->route('penyuluhan.informasi.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function information_destroy($id)
    {
        try {
            DB::beginTransaction();

            $informasi = Penyuluhan::findOrFail($id);
            $informasi->delete();
            DB::commit();

            Alert::success('Success', 'Berhasil menghapus informasi posyandu!');
            return redirect()->route('penyuluhan.informasi.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function kegiatan()
    {
        $data = Penyuluhan::where('kategori', 'kegiatan')->get();
        return view('pages.penyuluhan.kegiatan.index', compact('data'));
    }

    public function kegiatan_create()
    {
        return view('pages.penyuluhan.kegiatan.create');
    }

    public function kegiatan_store(Request $request)
    {
        try {
            DB::beginTransaction();

            $kegiatan = new Penyuluhan();
            $kegiatan->topik = $request->topik;
            $kegiatan->kategori = 'kegiatan';

            $image_parts1 = explode(';base64,', $request->image);
            $image_type_aux1 = explode('image/', $image_parts1[0]);
            $image_type1 = $image_type_aux1[1];
            $image_base641 = base64_decode($image_parts1[1]);

            $folderPath1 = storage_path('app/public/kegiatan/');
            $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
            $file1 = $folderPath1 . '' . $image_name1;
            $kegiatan->image = $image_name1;

            $kegiatan->save();
            DB::commit();

            file_put_contents($file1, $image_base641);

            Alert::success('Success', 'Berhasil menambah kegiatan posyandu!');
            return redirect()->route('penyuluhan.kegiatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function kegiatan_edit($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.kegiatan.edit', compact('data'));
    }

    public function kegiatan_update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $kegiatan = Penyuluhan::findOrFail($id);

            $kegiatan->topik = $request->topik;

            if ($request->image) {
                $image_parts1 = explode(';base64,', $request->image);
                $image_type_aux1 = explode('image/', $image_parts1[0]);
                $image_type1 = $image_type_aux1[1];
                $image_base641 = base64_decode($image_parts1[1]);

                $folderPath1 = storage_path('app/public/kegiatan/');
                $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
                $file1 = $folderPath1 . '' . $image_name1;
                $kegiatan->image = $image_name1;
            }

            $kegiatan->save();
            DB::commit();
            if ($request->image) {
                file_put_contents($file1, $image_base641);
            }

            Alert::success('Success', 'Berhasil mengubah kegiatan posyandu!');
            return redirect()->route('penyuluhan.kegiatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function kegiatan_destroy($id)
    {
        try {
            DB::beginTransaction();

            $kegiatan = Penyuluhan::findOrFail($id);
            $kegiatan->delete();
            DB::commit();

            Alert::success('Success', 'Berhasil menghapus kegiatan posyandu!');
            return redirect()->route('penyuluhan.kegiatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_kesehatan()
    {
        $data = Penyuluhan::where('kategori', 'artikel_kesehatan')->get();
        return view('pages.penyuluhan.artikel_kesehatan.index', compact('data'));
    }

    public function artikel_kesehatan_create()
    {
        return view('pages.penyuluhan.artikel_kesehatan.create');
    }

    public function artikel_kesehatan_store(Request $request)
    {
        try {
            DB::beginTransaction();

            $artikel_kesehatan = new Penyuluhan();
            $artikel_kesehatan->topik = $request->topik;
            $artikel_kesehatan->kategori = 'artikel_kesehatan';
            $artikel_kesehatan->deskripsi = $request->deskripsi;

            $image_parts1 = explode(';base64,', $request->image);
            $image_type_aux1 = explode('image/', $image_parts1[0]);
            $image_type1 = $image_type_aux1[1];
            $image_base641 = base64_decode($image_parts1[1]);

            $folderPath1 = storage_path('app/public/artikel_kesehatan/');
            $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
            $file1 = $folderPath1 . '' . $image_name1;
            $artikel_kesehatan->image = $image_name1;

            $artikel_kesehatan->save();
            DB::commit();

            file_put_contents($file1, $image_base641);

            Alert::success('Success', 'Berhasil menambah Artikel Kesehatan posyandu!');
            return redirect()->route('penyuluhan.artikel_kesehatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_kesehatan_edit($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.artikel_kesehatan.edit', compact('data'));
    }

    public function artikel_kesehatan_update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $artikel_kesehatan = Penyuluhan::findOrFail($id);

            $artikel_kesehatan->topik = $request->topik;
            $artikel_kesehatan->deskripsi = $request->deskripsi;

            if ($request->image) {
                $image_parts1 = explode(';base64,', $request->image);
                $image_type_aux1 = explode('image/', $image_parts1[0]);
                $image_type1 = $image_type_aux1[1];
                $image_base641 = base64_decode($image_parts1[1]);

                $folderPath1 = storage_path('app/public/artikel_kesehatan/');
                $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
                $file1 = $folderPath1 . '' . $image_name1;
                $artikel_kesehatan->image = $image_name1;
            }

            $artikel_kesehatan->save();
            DB::commit();
            if ($request->image) {
                file_put_contents($file1, $image_base641);
            }

            Alert::success('Success', 'Berhasil mengubah Artikel Kesehatan posyandu!');
            return redirect()->route('penyuluhan.artikel_kesehatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_kesehatan_destroy($id)
    {
        try {
            DB::beginTransaction();
            $artikel_kesehatan = Penyuluhan::findOrFail($id);
            $artikel_kesehatan->delete();
            DB::commit();

            Alert::success('Success', 'Berhasil menghapus Artikel Kesehatan posyandu!');
            return redirect()->route('penyuluhan.artikel_kesehatan.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_mental()
    {
        $data = Penyuluhan::where('kategori', 'artikel_mental')->get();
        return view('pages.penyuluhan.artikel_mental.index', compact('data'));
    }

    public function artikel_mental_create()
    {
        return view('pages.penyuluhan.artikel_mental.create');
    }

    public function artikel_mental_store(Request $request)
    {
        try {
            DB::beginTransaction();

            $artikel_mental = new Penyuluhan();
            $artikel_mental->topik = $request->topik;
            $artikel_mental->kategori = 'artikel_mental';
            $artikel_mental->deskripsi = $request->deskripsi;

            $image_parts1 = explode(';base64,', $request->image);
            $image_type_aux1 = explode('image/', $image_parts1[0]);
            $image_type1 = $image_type_aux1[1];
            $image_base641 = base64_decode($image_parts1[1]);

            $folderPath1 = storage_path('app/public/artikel_mental/');
            $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
            $file1 = $folderPath1 . '' . $image_name1;
            $artikel_mental->image = $image_name1;

            $artikel_mental->save();
            DB::commit();

            file_put_contents($file1, $image_base641);

            Alert::success('Success', 'Berhasil menambah Artikel Kesehatan Mental posyandu!');
            return redirect()->route('penyuluhan.artikel_mental.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_mental_edit($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.artikel_mental.edit', compact('data'));
    }

    public function artikel_mental_update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $artikel_mental = Penyuluhan::findOrFail($id);

            $artikel_mental->topik = $request->topik;
            $artikel_mental->deskripsi = $request->deskripsi;

            if ($request->image) {
                $image_parts1 = explode(';base64,', $request->image);
                $image_type_aux1 = explode('image/', $image_parts1[0]);
                $image_type1 = $image_type_aux1[1];
                $image_base641 = base64_decode($image_parts1[1]);

                $folderPath1 = storage_path('app/public/artikel_mental/');
                $image_name1 = date('YmdHi') . '_' . preg_replace('/[^A-Za-z0-9.\-_ ]/', '', $request->topik) . '.' . $image_type1;
                $file1 = $folderPath1 . '' . $image_name1;
                $artikel_mental->image = $image_name1;
            }

            $artikel_mental->save();
            DB::commit();
            if ($request->image) {
                file_put_contents($file1, $image_base641);
            }

            Alert::success('Success', 'Berhasil mengubah Artikel Kesehatan Mental posyandu!');
            return redirect()->route('penyuluhan.artikel_mental.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_mental_destroy($id)
    {
        try {
            DB::beginTransaction();
            $artikel_mental = Penyuluhan::findOrFail($id);
            $artikel_mental->delete();
            DB::commit();

            Alert::success('Success', 'Berhasil menghapus Artikel Kesehatan Mental posyandu!');
            return redirect()->route('penyuluhan.artikel_mental.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error('Failed', $th->getMessage());
            return redirect()->back();
        }
    }

    public function artikel_mental_show($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.artikel_mental.show', compact('data'));
    }

    public function artikel_kesehatan_show($id)
    {
        $data = Penyuluhan::findOrFail($id);
        return view('pages.penyuluhan.artikel_kesehatan.show', compact('data'));
    }
}
