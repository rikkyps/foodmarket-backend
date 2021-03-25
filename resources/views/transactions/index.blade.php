<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white">
              <table class="table-auto w-full">
                <thead>
                  <tr>
                    <td class="border px-6 py-6">ID</td>
                    <td class="border px-6 py-6">Food</td>
                    <td class="border px-6 py-6">User</td>
                    <td class="border px-6 py-6">Quantity</td>
                    <td class="border px-6 py-6">Total</td>
                    <td class="border px-6 py-6">Status</td>
                    <td class="border px-6 py-6">Action</td>
                  </tr>
                </thead>
                <tbody>
                  @forelse($transactions as $item)
                  <tr>
                    <td class="border px-6 py-6">{{ $item->id }}</td>
                    <td class="border px-6 py-6">{{ $item->food->name }}</td>
                    <td class="border px-6 py-6">{{ $item->user->name }}</td>
                    <td class="border px-6 py-6">{{ $item->qty }}</td>
                    <td class="border px-6 py-6">{{ number_format($item->total) }}</td>
                    <td class="border px-6 py-6">{{ $item->status }}</td>
                    <td class="border px-6 py-6 text-center">
                      <a href="{{ route('transactions.show', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Show</a>
                      <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="inline-bloc">
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
              {{ $transactions->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
