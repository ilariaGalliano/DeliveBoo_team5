<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Restype;
use App\Dishtype;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $restaurant = Restaurant::where('user_id', Auth::id())
            ->where('slug', $slug)->first();

        $dishes = Dish::where('restaurant_id', $restaurant['id'])
                ->orderBy('created_at', 'desc')
                ->get();

        return view('admin.dishes.index', compact('restaurant', 'dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $dishtypes = Dishtype::all();

        return view('admin.dishes.create', compact('restaurant', 'dishtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $data = $request->all();

        $request->validate([
            'name' => 'required|max:60',
            'description' => 'required',
            'visibility' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);

        $data['restaurant_id'] = $restaurant->id;

        $data['slug'] = Str::slug($data['name'], '-');

        if (!empty($data['path_image'])) {
            $data['path_image'] = Storage::disk('public')->put('images', $data['path_image']);
        }

        $newDish = new Dish();
        $newDish->fill($data); // fillable

        $saved = $newDish->save();

        if($saved){
            return redirect()->route('admin.dishes.index', $restaurant->slug);
        } else{
            return redirect()->route('homepage');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $dish)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $dish = Dish::where('slug', $dish)->first();

        return view('admin.dishes.show', compact('restaurant', 'dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $pippo)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $dish = Dish::where('slug', $pippo)->first();
        $dishtypes = Dishtype::all();

        return view('admin.dishes.edit', compact('restaurant', 'dish', 'dishtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $id)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $dish = Dish::where('id', $id)->first();

        $data = $request->all();

        $request->validate([
            'name' => 'required|max:60',
            'description' => 'required',
            'visibility' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ]);

        $data['slug'] = Str::slug($data['name'], '-');

        if(!empty($data['path_image'])) {
            // se prima c'era (if ! empty restaurant->img) => DELETE
            if(!empty($dish->path_image)) {
                Storage::disk('public')->delete($dish->path_image);
            }
            // se prima NON c'era, e l'aggiungiamo
            $data['path_image'] = Storage::disk('public')->put('images', $data['path_image']);
        }

        $updated = $dish->update($data);

        if ($updated) {
           return redirect()->route('admin.dishes.show', ['slug'=>$restaurant->slug, 'dish'=>$dish->slug]);
        }
        else{
            return redirect()->route('homepage');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $pippo)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $dish = Dish::where('slug', $pippo)->first();

        // Quando eliminiamo un piatto ci esce il nome
        $title = $dish->name;
        $deleted = $dish->delete();

        if($deleted) {
            if(!empty($dish->path_image)) {
                Storage::disk('public')->delete($dish->path_image);
            }
            return redirect()->route('admin.dishes.index', $restaurant->slug)->with('dish-deleted', $title);
        } else {
            return redirect()->route('homepage');
        }

    }
}
