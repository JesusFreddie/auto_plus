
<x-app-layout>
    <form class="mx-auto max-w-2xl p-4 md:p-5 space-y-4 flex flex-col gap-5" method="POST" action="{{route('cars.store')}}">
        @csrf
        <div class="flex flex-col gap-5">
            <!-- Number -->
            <div>
                <x-input-label for="name" :value="__('Имя авто')"/>
                <x-text-input id="name" class="block mt-1" type="text" name="name" required/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <!-- Desription -->
            <div>
                <x-input-label for="make" :value="__('Марка авто')"/>
                <x-text-input id="make" class="block mt-1" type="text" name="make" required/>
                {{-- <textarea id="description" class="block mt-1" rows="10" cols="35" name="description" required></textarea> --}}
                <x-input-error :messages="$errors->get('make')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="model" :value="__('Модель авто')"/>
                <x-text-input id="model" class="block mt-1" type="text" name="model" required/>
                <x-input-error :messages="$errors->get('model')" class="mt-2" />
            </div>
            <div>
                <x-primary-button class="ms-3">
                    {{__('Создать')}}
                </x-primary-button>
            </div>
    </form>
    </div>
</x-app-layout>
