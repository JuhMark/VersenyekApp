<x-layout>
    <x-slot:heading>Új felhasználó hozzáadása</x-slot:heading>
<form method="POST" action="/felhasznalok">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="firstName" class="block text-sm/6 font-medium text-gray-900">Keresztnév</label>
              <div class="mt-2">
                <input type="text" name="firstName" id="firstName" required placeholder="Keresztnév" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>

            <div class="sm:col-span-3">
              <label for="lastName" class="block text-sm/6 font-medium text-gray-900">Vezetéknév</label>
              <div class="mt-2">
                <input type="text" name="lastName" id="lastName" required placeholder="Vezetéknév" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>

            <div class="sm:col-span-full">
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Email cím</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" required placeholder="Email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>

            <div class="col-span-3">
              <label for="address" class="block text-sm/6 font-medium text-gray-900">Lakcím</label>
              <div class="mt-2">
                <input type="text" name="address" id="address" placeholder="Lakcím" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>
            <div class="col-span-3">
              <label for="phone" class="block text-sm/6 font-medium text-gray-900">Telefonszám</label>
              <div class="mt-2">
                <input type="text" name="phone" id="phone" placeholder="Telefonszám" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="sm:col-span-4">
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
  </div>
  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Mentés</button>
  </div>
</form>
</x-layout>