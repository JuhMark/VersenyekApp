<x-layout>
    <x-slot:heading>{{$felhasznalo['firstName']." ".$felhasznalo['lastName']}}</x-slot:heading>
    <x-list>
        <li class="mb-1 mt-1">Email: {{$felhasznalo['email']}}</li>
        <li class="mb-1 mt-1">Telefonszám: {{$felhasznalo['phone'] ? $felhasznalo['phone'] : "Nincs megadva"}}</li>
        <li class="mb-1 mt-1">Lakcím: {{$felhasznalo['address'] ? $felhasznalo['address'] : "Nincs megadva"}}</li>
    </x-list>
    <div>
    <a href="/felhasznalok/{{ $felhasznalo['email'] }}/edit" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Felhasználó szerkesztése</a>
    </div>
</x-layout>