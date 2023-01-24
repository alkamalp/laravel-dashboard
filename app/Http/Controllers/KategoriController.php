<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Dari referensi dashboard lama
        // $this->validate(
        //     $request, 
        //     [   
        //         'nama_kategori'=>'required',
        //     ],
        //     [   
        //         'nama_kategori.required' => 'Harap isi nama kategori!',
        //     ]
        // );

        // Kategori::create($request->all());
        // return redirect()->route('kategori.index')
        //     ->with('success', 'Kategori berhasil ditambahkan!');

        // Dari buku
        $kategori = new Kategori;
        $kategori->nama_kategori = $request['nama'];
        $kategori->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        $kategori = Kategori::find($id);
        echo json_encode($kategori);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        // Dari dashboard lama
        // $this->validate(
        //     $request, 
        //     [   
        //         'nama_kategori'=>'required',
        //     ],
        //     [   
        //         'nama_kategori.required' => 'Harap isi nama kategori!',
        //     ]
        // );

        // Kategori::find($id)->update($request->all());

        // return redirect()->route('kategori.index')
        //     ->with('success', 'Kategori berhasil diubah!');

        // Dari buku
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request['nama'];
        $kategori->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        // Dari referensi dashboard lama
        // Kategori::find($id)
        //     ->delete();
            
        // return redirect()->route('kategori.index')
        //     ->with('success', 'Kategori berhasil dihapus!');
        
        // Dari buku
        $kategori = Kategori::find($id)->delete();
    }

    public function listData()
    {
        $kategori = Kategori::orderBy('id_kategori', 'desc')->get();
        $no = 0;
        $data = array();
        foreach ($kategori as $list){
            $no ++;
            $row = array();
            $row[] = $no;
            $row[] = $list->nama_kategori;
            $row[] = '<div class = "btn-group"> <a onclick="editForm('.$list->id_kategori.')" class="btn btn-primary btn-sm">
                        <i class ="fa fa-pencil"></i></a>
                        <a onclick="deleteData('.$list->id_kategori.')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></div>';
            $data[] = $row;
        }

        $output = array("data" => $data);
        return response()->json($output);
    }
}
