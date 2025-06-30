<x-layout>
    <x-slot:heading>Verseny szerkesztése</x-slot:heading>
<form method="POST" action="/fordulok/{{ $verseny['name'] }}/{{ $verseny['year'] }}">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
              <label for="languages" class="block text-sm/6 font-medium text-gray-900">Nyelvek</label>
              <div class="mt-2">
                <input value="{{ $verseny['languages'] }}" id="languages" name="languages" type="text" required placeholder="Nyelvek szóközzel elválasztva" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>
            <div class="col-span-3">
              <label for="pointsForCorrect" class="block text-sm/6 font-medium text-gray-900">Pontok helyes válaszért</label>
              <div class="mt-2">
                <input value="{{ $verseny['pointsForCorrect'] }}" type="number" name="pointsForCorrect" id="pointsForCorrect" required placeholder="Pontok helyes válaszért" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>
            <div class="col-span-3">
              <label for="pointsForIncorrect" class="block text-sm/6 font-medium text-gray-900">Pontok rossz válaszért</label>
              <div class="mt-2">
                <input value="{{ $verseny['pointsForIncorrect'] }}" type="number" name="pointsForIncorrect" id="pointsForIncorrect" required placeholder="Pontok rossz válaszért" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
              </div>
            </div>
            <div class="col-span-3">
              <label for="pointsForEmpty" class="block text-sm/6 font-medium text-gray-900">Pontok üres válaszért</label>
              <div class="mt-2">
                <input value="{{ $verseny['pointsForEmpty'] }}" type="number" name="pointsForEmpty" id="pointsForEmpty" required placeholder="Pontok üres válaszért" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
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
    <button type="submit" class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-white shadow-xs focus-visible:outline-2 focus-visible:outline-offset-2">Mentés</button>
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
</form>
</x-layout>