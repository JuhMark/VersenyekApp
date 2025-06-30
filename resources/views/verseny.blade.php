<x-layout>
    <x-slot:heading>{{$verseny['name']." - ".$verseny['year']}}</x-slot:heading>
    <x-list>
        <li class="mb-1 mt-1">Elérhető nyelvek: {{
             implode(', ',explode(" ",$verseny['languages']))
            }}</li>
        <li class="mb-1 mt-1">Pontok a jó válaszért: {{$verseny['pointsForCorrect']}}</li>
        <li class="mb-1 mt-1">Pontok a rossz válaszért: {{$verseny['pointsForIncorrect']}}</li>
        <li class="mb-1 mt-1">Pontok az üres válaszért: {{$verseny['pointsForEmpty']}}</li>
    </x-list>
    <h1 class=" text-2xl font-bold">Fordulók:</h1>
    <x-list>
        @foreach($verseny->fordulok() as $fordulo)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700 border-2"><a href="\versenyzok\{{ $fordulo['id'] }}">
                {{ $fordulo['roundNumber'].". forduló" }}
            </a></li>
        @endforeach
    </x-list>
    <button id="add-fordulo" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új forduló felvétele</button>
    <form id="fordulok-form" class="hidden"></form>
</x-layout>