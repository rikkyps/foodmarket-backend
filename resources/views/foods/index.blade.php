<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Food') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
              <a href="{{ route('foods.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Create Foods
              </a>
            </div>
            <div class="bg-white">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <td class="border px-6 py-6">ID</td>
                    <td class="border px-6 py-6">Name</td>
                    <td class="border px-6 py-6">Price</td>
                    <td class="border px-6 py-6">Rate</td>
                    <td class="border px-6 py-6">Type</td>
                    <td class="border px-6 py-6">Photo</td>
                    <td class="border px-6 py-6">Action</td>
                  </tr>
                </thead>
                <tbody>
                  @forelse($foods as $item)
                  <tr>
                    <td class="border px-6 py-6">{{ $item->id }}</td>
                    <td class="border px-6 py-6">{{ $item->name }}</td>
                    <td class="border px-6 py-6">{{ $item->price }}</td>
                    <td class="border px-6 py-6">{{ $item->rate }}</td>
                    <td class="border px-6 py-6">{{ $item->type }}</td>
                    <td class="border px-6 py-6"><img src="{{ $item->picturePath }}" alt="" style="heigt: 150px; width: 150px;"></td>
                    <td class="border px-6 py-6 text-center">
                      <a href="{{ route('foods.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit</a>
                      <form action="{{ route('foods.destroy', $item->id) }}" method="POST" class="inline-bloc">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="border text-center">Data tidak ditemukan</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="text-center mt-5">
              {{ $foods->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
