<?php

namespace App\Http\Controllers;

use App\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::latest()->paginate(5);

        return view('buku.index', compact('buku'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cetak()
    {
        
        $bukucetak = Buku::latest()->paginate(5);

        return view('buku.cetak', compact('bukucetak'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $req)
    {
        $path = $req->file('berkas')->storeAs('', $req->file('berkas')->getClientOriginalName(), 'public');

        return view('hasil-upload', ['path' => $path]);
    }

    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->cover;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

            $dtUpload = new Buku;
            $dtUpload->judul = $request->judul;
            $dtUpload->penulis = $request->penulis;
            $dtUpload->penerbit = $request->penerbit;
            $dtUpload->cover = $namaFile;

            $nm->move(public_path().'/img', $namaFile);
            $dtUpload->save();

            return redirect('buku');
        /*  $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ]);

        $path = $request->file('cover')->storeAs('', $request->file('cover')->getClientOriginalName(), 'public');

        Buku::create($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Book Data created successfully.');
    */}

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function unduh($path)
    {
        return Storage::download('public/' . $path);
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required'
        ]);

        $buku->update($request->all());

        return redirect()->route('buku.index')
            ->with('success', 'Book Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Book deleted successfully');
    }
}
