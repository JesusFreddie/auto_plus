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
                    <a href="{{ route('cars.create') }}" class="">
                        <x-primary-button class="ms-3">
                            {{__('Добавить свой автомобиль')}}
                        </x-primary-button>
                    </a>

                    @foreach ($cars as $car)
                        <div class="rounded shadow-xl py-4 px-5 w-64 mt-4">
                            <p class="text-xl font-medium">Имя: {{$car->name}}</p>
                            <p class="text-lg">Марка: {{$car->make}}</p>
                            <p class="text-lg">Модель: {{$car->model}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('requests.create') }}" class="">
                        <x-primary-button class="ms-3">
                            {{__('Добавить Заявку')}}
                        </x-primary-button>
                    </a>

                    @foreach ($requests as $request)
                        <div class="rounded shadow-xl py-4 px-5 w-64 mt-4">
                            <p class="text-lg">Описание: {{$request->problem}}</p>
                            <p class="text-lg">Дата создания: {{$request->created_at}}</p>
                            @if ($request->repait_date)
                                <p>Дата выполнения: {{ $request->repait_date }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
