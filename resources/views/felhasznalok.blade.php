<x-layout>
    <x-slot:heading>Felhasználók</x-slot:heading>
    @if(!$felhasznalok->isEmpty())
    <x-list>
        @foreach ($felhasznalok as $felhasznalo)
        <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700 border-b-2">
            <a href="/felhasznalok/{{$felhasznalo['email']}}">
                Név: {{$felhasznalo['firstName']." ".$felhasznalo['lastName']}} Email: {{$felhasznalo['email']}}
            </a>
            <div class="inline-flex justify-end">
            <form method="POST" action="/felhasznalok" >
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{ $felhasznalo['email'] }}" name="email">
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
    <a href="/felhasznalok/create" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új felhasználó hozzáadása</a>
    </div>
</x-layout>