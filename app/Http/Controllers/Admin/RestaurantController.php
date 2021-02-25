<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Dish;
use App\User;
use App\Restype;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restypes = Restype::all();
        return view('admin.restaurants.create', compact('restypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);

        $request->validate([
            'name' => 'required|max:60',
            'vat' => 'required|max:13|unique:restaurants',
            'address' => 'required|max:80',
            'body' => 'required',
            'phone' => 'required|max:20',
            'delivery_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'name' => 'required|max:60',
        ]);

        // User ID associato all'utente loggato
        $data['user_id'] = Auth::id();

        $data['slug'] = Str::slug($data['name'], '-');
        
        if (!empty($data['path_image'])) {
            $data['path_image'] = Storage::disk('public')->put('images', $data['path_image']);
        }

        $newRestaurant = new Restaurant();
        $newRestaurant->fill($data); // fillable

        $saved = $newRestaurant->save();

        if($saved){
            // Se restypes_status non è vuoto, fare questo per unire i restypes e i restaurant nella pivot 
            if(!empty($data['restypes_status'])){
                $newRestaurant->restypes()->attach($data['restypes_status']);
            }
            return redirect()->route('admin.restaurants.index');
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        //$restypes = Restype::all();

        return view('admin.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        $restypes = Restype::all();

        return view('admin.restaurants.edit', compact('restaurant', 'restypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Data dal DB
        $data = $request->all();
        //dd($data);

        // Validazione
        $request->validate([
            'name' => 'required|max:60',
            'vat' => 'required|max:13',
            'address' => 'required|max:80',
            'body' => 'required',
            'phone' => 'required|max:20',
            'delivery_price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'name' => 'required|max:60',
        ]);

        $restaurant = Restaurant::find($id);

        // new slug 
        $data['slug'] = Str::slug($data['name'], '-');

        // Update **IMAGE** ..if ! empty
        if(!empty($data['path_image'])) {
            // se prima c'era (if ! empty restaurant->img) => DELETE
            if(!empty($restaurant->path_image)) {
                Storage::disk('public')->delete($restaurant->path_image);
            }
            // se prima NON c'era, e l'aggiungiamo
            $data['path_image'] = Storage::disk('public')->put('images', $data['path_image']);
        }

        // Update DB
        $updated = $restaurant->update($data);

        if($updated){
            // se ci sono elementi nel form per restypes, sincronizza la tabella dalla form
            if(!empty($data['restypes_status'])) {
                $restaurant->restypes()->sync($data['restypes_status']);
            } else {
                // se non ci sono, stacca/ cancella tutto dalla tabella
                $restaurant->restypes()->detach();
            }    
                return redirect()->route('admin.restaurants.show', $restaurant->slug);
            } else {
                return redirect()->route('homepage');
            }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $title = $restaurant->name;
        // in caso di delete cancella anche tutte le relazioni di quella tabella
        $restaurant->restypes()->detach();
        $deleted = $restaurant->delete();

        if($deleted) {
            if(!empty($restaurant->path_image)) {
                Storage::disk('public')->delete($restaurant->path_image);
            }
            return redirect()->route('admin.restaurants.index')->with('restaurant-deleted', $title);
        } else {
            return redirect()->route('homepage');
        }
    }
}
