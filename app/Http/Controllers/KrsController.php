<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $krs = Krs::all();
        return response()->json(["meta" => ["code" => 200, "message" => "Success"], "data" => $krs]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nim' => 'required|string|max:255',
        'kode_matakuliah' => 'required|string|max:255',
        'matakuliah' => 'required|string|max:255',
        'semester' => 'required|integer|max:99',
        'tahunakademik' => 'required|integer|max:9999999999',
    ]);

    $krs = Krs::create([
        'nim' => $validatedData['nim'],
        'kode matakuliah' => $validatedData['kode_matakuliah'],
        'matakuliah' => $validatedData['matakuliah'],
        'semester' => $validatedData['semester'],
        'tahunakademik' => $validatedData['tahunakademik'],
    ]);

    return response()->json(["meta" => ["code" => 201, "message" => "Success"], "data" => $krs], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $krs = Krs::find($id);
        if (!$krs) {
            return response()->json(["meta" => ["code" => 404, "message" => "KRS Not Found"]], 404);
        }
        return response()->json(["meta" => ["code" => 200, "message" => "Success"], "data" => $krs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $krs = Krs::find($id);
        if (!$krs) {
            return response()->json(["meta" => ["code" => 404, "message" => "KRS Not Found"]], 404);
        }

        $validatedData = $request->validate([
            'nim' => 'required|string|max:255',
            'kode_matakuliah' => 'required|string|max:255',
            'matakuliah' => 'required|string|max:255',
            'semester' => 'required|integer|max:99',
            'tahunakademik' => 'required|integer|max:9999999999',
        ]);

        $krs->update([
            'nim' => $validatedData['nim'],
            'kode matakuliah' => $validatedData['kode_matakuliah'],
            'matakuliah' => $validatedData['matakuliah'],
            'semester' => $validatedData['semester'],
            'tahunakademik' => $validatedData['tahunakademik'],
        ]);
        return response()->json(["meta" => ["code" => 200, "message" => "Success"], "data" => $krs], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $krs = Krs::find($id);
        if (!$krs) {
            return response()->json(["meta" => ["code" => 404, "message" => "KRS Not Found"]], 404);
        }

        $krs->delete();
        return response()->json(["meta" => ["code" => 200, "message" => "Success"]],200);
    }
}
