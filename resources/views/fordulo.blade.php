<x-layout>
    <x-slot:heading>{{$fordulo['versenyName']." - ".$fordulo['versenyYear']." - ".$fordulo['roundNumber'].". forduló"}}</x-slot:heading>
    <h1 class=" text-2xl font-bold">Versenyzők:</h1>
    <x-list>
        @foreach($fordulo->versenyzok() as $versenyzo)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700"><a href="/felhasznalok/{{ $versenyzo['felhasznaloEmail'] }}">{{ $versenyzo['felhasznaloEmail'] }}</a></li>
        @endforeach
    </x-list>
    <div>
    <form method="POST" action="/versenyzok/{{ $fordulo['id'] }}">
        @csrf
        <select name="emails" id="emails" required>
            @foreach($felhasznalok as $felhasznalo)
                <option value="{{ $felhasznalo['email'] }}">{{ $felhasznalo['email'] }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új versenyző hozzáadása</button>
    </form>
    </div>
</x-layout>