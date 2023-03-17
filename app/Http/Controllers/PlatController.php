<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatRequest;
use App\Http\Resources\PlatRessources;
use App\Models\Plat;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class PlatController extends Controller
{

    use HttpResponses;

    public function index()
    {
        return PlatRessources::collection(Plat::all());
    }

    public function store(StorePlatRequest $request)
    {
        $request->validated($request->all());
        $plat = Plat::create([
            'name'          =>  $request->name,
            'title'          =>  $request->title,
            'description'          =>  $request->description,
            'price'          =>  $request->price,
            'image'         =>  $request->has('image')? $request->image: '',
            'level'         =>  $request->has('level')? $request->level: Plat::count()+1,
            'category_id'     =>  $request->has('category_id')? $request->category_id: -1,
            'is_active'     =>  $request->has('is_active')? $request->is_active: 0,
        ]);
        return new PlatRessources($plat);
    }

    public function show(Plat $plat)
    {
        return new PlatRessources($plat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePlatRequest $request, Plat $plat)
    {
        $plat->name = $request->name;
        $plat->title = $request->title;
        $plat->description = $request->description;
        $plat->price = $request->price;
        $plat->image = $request->image;
        $plat->level = $request->level;
        $plat->category_id = $request->category_id;
        $plat->is_active = $request->is_active;

        return $this->success($plat, 'Plat was successfuly updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plat $plat)
    {
        $plat->delete();
    }
}
