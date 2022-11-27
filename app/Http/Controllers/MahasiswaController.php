<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json([
            'success' => true,
            'data' => $mahasiswa
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->header('Authorization')) {
            $token = explode(' ', $request->header('Authorization'));
            $check = User::where('api_token', $token[1])->first();

            if ($check) {
                $this->validate($request, [
                    "nim" => "required|unique:mahasiswas",
                    "nama" => "required",
                    "alamat" => "required"
                ]);
        
                $data = $request->all();
                Mahasiswa::create($data);
        
                return response()->json(['message' => 'Data inserted successfully'], 200);
            } else {
                return response()->json(['message' => 'Token Not Found'], 401);
            }
        } else { 
            return response()->json(['message' => 'Token Not Found'], 401);
        }                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            return response()->json([
                'success' => true,
                'data' => $mahasiswa
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'data' => $mahasiswa
            ], 201);
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->header('Authorization')) {
            $token = explode(' ', $request->header('Authorization'));
            $check = User::where('api_token', $token[1])->first();

            if ($check) {
                $mahasiswa = Mahasiswa::find($id);
        
                if (!$mahasiswa) {
                    return response()->json(['message' => 'Data not found'], 404);
                }
                
                $this->validate($request, [
                    "nim" => "required|unique:mahasiswas",
                    "nama" => "required",
                    "alamat" => "required"
                ]);

                $data = $request->all();
                $mahasiswa->fill($data);
                $mahasiswa->save();

                return response()->json(['message' => 'Data updated successfully'], 200);
            } else {
                return response()->json(['message' => 'Token Not Found'], 401);
            }
        } else { 
            return response()->json(['message' => 'Token Not Found'], 401);
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->header('Authorization')) {
            $token = explode(' ', $request->header('Authorization'));
            $check = User::where('api_token', $token[1])->first();

            if ($check) {
                $mahasiswa = Mahasiswa::find($id);
                if (!$mahasiswa) {
                    return response()->json(['message' => 'Data not found'], 404);
                }

                $mahasiswa->delete();

                return response()->json(['message' => 'Data deleted successfully'], 200);
            } else {
                return response()->json(['message' => 'Token Not Found'], 401);
            }
        } else { 
            return response()->json(['message' => 'Token Not Found'], 401);
        }           
    }
}
