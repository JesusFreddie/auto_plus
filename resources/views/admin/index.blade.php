<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @foreach ($requests as $request)
                        <div class="rounded shadow-xl py-4 px-5 w-64 mt-4">
                            <p class="text-lg">Описание: {{$request->problem}}</p>
                            <p class="text-lg">Дата создания: {{$request->created_at}}</p>
                            @if ($request->repait_date)
                                <p>Дата выполнения: {{ $request->repait_date }}</p>
                            @else
                            <form id="form-update-{{$request->id}}" action="{{route('requests.update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$request->id}}">
                                <input type="date" name="repait_date" onchange="document.getElementById('form-update-{{$request->id}}').submit()">
                            </form>
                            @endif
                            
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
