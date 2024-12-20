
<x-app-layout>
    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST" action="{{route('requests.store')}}">
        @csrf
        <div class="flex flex-col gap-5">
            <div>
                <x-input-label for="problem" :value="__('Описание проблемы')"/>
                <textarea id="problem" class="block mt-1" type="text" name="problem" required></textarea>
                <x-input-error :messages="$errors->get('problem')" class="mt-2" />
            </div>
            <!-- Desription -->
            <x-input-label for="car_id" :value="__('Выберите машину')"/>
            <select name="car_id">
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{$car->name}}</option>
                @endforeach
            </select>
            <div>
                <x-primary-button class="ms-3">
                    {{__('Создать')}}
                </x-primary-button>
            </div>
    </form>
    </div>
</x-app-layout>
