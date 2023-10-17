<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\User;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function createMeals(){

        $meals = Meal::latest()
            ->paginate(10);

        return view('admin.meals.create', [
            'meals' => $meals
        ]);
    }
    public function createUsers(){
        $users = User::latest()
            ->paginate(10);


        return view('admin.users.create', [
            'users' => $users
        ]);
    }
    public function createNews(){
        $news = News::latest()
            ->paginate(10);

        return view('admin.news.create', [
            'news' => $news
        ]);
    }


    public function destroyUser(User $user){
        $user->delete();

        return back()->with('success', 'User Deleted');
    }
    public function destroyMeal(Meal $meal){
        $meal->delete();

        return back()->with('success', 'Meal Deleted');
    }
    public function destroyNews(News $news){
        $news->delete();

        return back()->with('success', 'News Deleted');
    }


    public function editUser(User $user){
        return view('admin.users.edit', ['user' => $user]);
    }
    public function editMeal(Meal $meal){
        return view('admin.meals.edit', ['meal' => $meal]);
    }
    public function editNews(News $news){
        return view('admin.news.edit', ['news' => $news]);
    }


    public function updateUser(User $user){

        $attributes = request()->validate([
            'name' => ['required','max:30'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => [Rules\Password::defaults()],
        ]);


        $user->update($attributes);

        return back()->with('success', 'User Updated');

    }

    public function updateMeal(Meal $meal){
        $attributes = request()->validate([
            'name'=>'required',
            'thumbnail' => ['image'],
            'excerpt'=>['required', 'min:20', 'max:255' ],
            'recipe'=>['required', 'min:20'],
            'prep_time'=>'required',
            'cook_time'=>'required',
            'servings'=>['required', 'min:1'],
            'dietary_types_id' => ['required', Rule::exists('dietary_types', 'id')],
            'meal_types_id' => ['required', Rule::exists('meal_types', 'id')],
        ]);

        if(isset($attributes['thumbnail'])){
            $storingPath = request()->file('thumbnail')->store('public/thumbnails');
            $attributes['thumbnail'] = str_replace("public/", "",$storingPath);

        }


        $meal->update($attributes);

        return back()->with('success', 'Meal Updated');

    }

}

