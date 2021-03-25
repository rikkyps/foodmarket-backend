<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {!! __('User &raquo; Edit &raquo; ') !!}{{$user->name}}
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
              <form action="{{ route('users.update', $user->id) }}" class="w-full" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Name</label>
                    <input type="text" value="{{ old('name') ?? $user->name }}" name="name" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="User Name">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Email</label>
                    <input type="email" value="{{ old('email') ?? $user->email }}" name="email" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Email">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Picture</label>
                    <input type="file" value="{{ old('profile_photo_path') }}" name="profile_photo_path" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Password</label>
                    <input type="password" value="{{ old('password') }}" name="password" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Password">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Password Confirmation</label>
                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Password Confirmation">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Roles</label>
                    <select name="roles" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                      <option value="{{ $user->roles }}">{{ $user->roles }}</option>
                      <option value="ADMIN">Admin</option>
                      <option value="USER">User</option>
                    </select>
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Address</label>
                    <input type="text" value="{{ old('address') ?? $user->address }}" name="address" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Address">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">House Number</label>
                    <input type="text" value="{{ old('houseNumber') ?? $user->houseNumber }}" name="houseNumber" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="House Number">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">Phone Number</label>
                    <input type="text" value="{{ old('phoneNumber') ?? $user->phoneNumber }}" name="phoneNumber" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Phone Number">
                  </div>
                </div>
                <div class="flex flex-wrap mx-3 mb-6">
                  <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-700 text-xs font-bold mb-2" for="grid-last-name">City</label>
                    <input type="text" value="{{ old('city') ?? $user->city }}" name="city" id="grid-last-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="City">
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
