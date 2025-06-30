<x-layout>
    <x-slot:heading>Felhasználók</x-slot:heading>
    <x-list>
        @foreach ($felhasznalok as $felhasznalo)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700 border-b-2"><a href="/felhasznalok/{{$felhasznalo['email']}}">Név: {{$felhasznalo['firstName']." ".$felhasznalo['lastName']}} Email: {{$felhasznalo['email']}}</a></li>
        @endforeach
    </x-list>
    <div>
    <a href="/felhasznalok/create" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új felhasználó hozzáadása</a>
    </div>
</x-layout>