<x-layout>
    <x-slot:heading>Versenyek</x-slot:heading>
    @if(!$versenyek->isEmpty())
    <x-list>
        @foreach ($versenyek as $verseny)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700">
                <a href="/fordulok/{{ $verseny["name"] }}/{{ $verseny["year"] }}">
                    Név: {{$verseny['name']}} Év: {{$verseny['year']}}</a>
            <div class="inline-flex justify-end">
            <form method="POST" action="/" >
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{ $verseny['name'] }}" name="name">
                <input type="hidden" value="{{ $verseny['year'] }}" name="year">
                <button class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold">Törlés</button>
            </form>
            </div>
                </li>
        @endforeach
    </x-list>
    @endif
    <div class="sm:col-span-4">
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
  </div>
    <div>
    <a href="versenyek/create" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új verseny hozzáadása</a>
    </div>
</x-layout>