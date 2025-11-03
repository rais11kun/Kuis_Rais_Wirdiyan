<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataMahasiswa'] = Mahasiswa::all();
        return view('admin.mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'nim'     => 'required|email|unique:users,email',
            'email'   => 'required|min:8|confirmed',
            'jurusan' => 'required|min:8|confirmed',
            'alamat'  => 'required|min:8|confirmed',
        ]);

        $data = [
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'email'   => $request->email,
            'jurusan' => $request->jurusan,
            'alamt'   => $request->alamat,
        ];

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataMahasiswa'] = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa_id = $id;
        $mahasiswa + mahasiswa::findOrFail($mahasiswa_id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim  = $request->nim;
        $mahasiswa->email = $request->email;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->alamat  = $request->alamat;
        $mahasiswa->save();
        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data berhasil dihapus');
    }
}
