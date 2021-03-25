<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
              <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Create User
              </a>
            </div>
            <div class="bg-white">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <td class="border px-6 py-6">ID</td>
                    <td class="border px-6 py-6">Name</td>
                    <td class="border px-6 py-6">Email</td>
                    <td class="border px-6 py-6">Roles</td>
                    <td class="border px-6 py-6">Action</td>
                  </tr>
                </thead>
                <tbody>
                  @forelse($users as $item)
                  <tr>
                    <td class="border px-6 py-6">{{ $item->id }}</td>
                    <td class="border px-6 py-6">{{ $item->name }}</td>
                    <td class="border px-6 py-6">{{ $item->email }}</td>
                    <td class="border px-6 py-6">{{ $item->roles }}</td>
                    <td class="border px-6 py-6 text-center">
                      <a href="{{ route('users.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Edit</a>
                      <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="inline-bloc">
                        {!! method_field('delete') . csrf_field() !!}
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="border text-center">Data tidak ditemukan</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="text-center mt-5">
              {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
