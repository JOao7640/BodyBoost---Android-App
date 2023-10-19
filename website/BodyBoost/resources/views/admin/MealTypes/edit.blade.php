@extends ('components.nutricion-layout')

@section('header')
    <x-navbar/>
@endsection

@section('content')

    <div class="flex justify-center mt-8 p-8">
        <div class="p-8 w-3/4 justify-center bg-gray-50 rounded-xl">
            <h1 class="text-xl text-red-500">Edit Meal type</h1>
            <form method="POST" action="/admin/meal-types/{{$mealType->id}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <x-form.formInput name="name" value="{{$mealType->name}}"/>
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror

                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <x-form.formInput name="slug" value="{{$mealType->slug}}"/>
                @error('slug')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                @enderror

                <div class="flex justify-end mt-2 border-t border-gray-300">
                    <button type="submit"
                            class="bg-red-500 mt-2 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

