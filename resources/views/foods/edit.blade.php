<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('Food &raquo; Create &raquo; ') !!} {{$food->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
              @if($errors->any())
              <div class="mb-5" role="alert">
                <div class="bg-red-500 text-white font-bold rounded px-4 py-2">
                  There something wrong!
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                  <p>
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </p>
                </div>
              </div>
              @endif
              <form action="{{ route('foods.update', $food->id) }}" class="w-full" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Name</label>
                    <input type="text" value="{{ old('name') ?? $food->name }}" name="name" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Food Name">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Picture</label>
                    <input type="file" value="{{ old('picturePath') }}" name="picturePath" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Description</label>
                    <textarea value="" name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ old('description') ?? $food->description }}</textarea>
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Type</label>
                    <select name="type" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                      <option value="{{ $food->type }}">{{ $food->type }}</option>
                      <option value="recommended">Recommended</option>
                      <option value="popular">Popular</option>
                      <option value="new_food">New Food</option>
                    </select>
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Komposisi</label>
                    <input type="text" value="{{ old('ingredients') ?? $food->ingredients }}" name="ingredients" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Food Ingredients">
                    <p class="text-grey-600 text-xs italic">Dipisahkan dengan koma, contoh: bawang merah, bawang putih, paprika</p>
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Price</label>
                    <input type="number" value="{{ old('price') ?? $food->price }}" name="price" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Price">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Rate</label>
                    <input type="number" step="0.01" max="5" value="{{ old('rate') ?? $food->rate }}" name="rate" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Rate">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3 text-right">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update</button>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</x-app-layout>
