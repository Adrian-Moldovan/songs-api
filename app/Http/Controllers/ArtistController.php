<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Http\Requests\ArtistStoreRequest;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Artist::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistStoreRequest $request)
    {
        $validated = $request->validated();
        return Artist::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return $artist
            ->with('songs')
            ->find($artist->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ArtistStoreRequest $request
     * @param  App\Models\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistStoreRequest $request, Artist $artist)
    {
        $validated = $request->validated();
        $artist->update($validated);
        return $artist;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        return $artist->delete();
    }
}
