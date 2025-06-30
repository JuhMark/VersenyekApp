<x-layout>
    <x-slot:heading>Versenyek</x-slot:heading>
    <x-list>
        @foreach ($versenyek as $verseny)
            <li class="mb-1 mt-1 transition delay-150 duration-300 ease-in-out hover:text-blue-700"><a href="/fordulok/{{ $verseny["name"] }}/{{ $verseny["year"] }}">
                Név: {{$verseny['name']}} <br/> Év: {{$verseny['year']}}
            </a></li>
        @endforeach
    </x-list>
    <button id="add-verseny" class="bg-gray-800 rounded-md px-2 pt-2 pb-3 sm:px-3 text-white font-bold flow-root">Új verseny felvétele</button>
    <form id="versenyek-form" class="hidden"></form>
</x-layout>