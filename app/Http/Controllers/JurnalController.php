<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Jurnal;


class JurnalController extends Controller
{
    /**
     * Menampilkan daftar jurnal.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurnals = Jurnal::all();
        return response()->json($jurnals);
    }

    /**
     * Menyimpan jurnal baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $jurnal = Jurnal::create($request->all());
        return response()->json($jurnal, 201);
    }

    /**
     * Menampilkan jurnal spesifik.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        return response()->json($jurnal);
    }

    /**
     * Memperbarui jurnal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $jurnal = Jurnal::findOrFail($id);
        $jurnal->update($request->all());
        return response()->json($jurnal);
    }

    /**
     * Menghapus jurnal.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->delete();
        return response()->json(null, 204);
    }
}
