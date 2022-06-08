<x-app-layout>
    <x-slot name="header">
        <x-nav-link :href="route('post.viewList')">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post list') }}
            </h2>
        </x-nav-link>
        <x-nav-link :href="route('post.create')">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create post') }}
            </h2>
        </x-nav-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="title" :value="'Title'" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <!-- Post Description  -->
                        <div class="mt-4">
                            <x-label for="description" :value="'Description'" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                        </div>

                        <!-- Time to execute (in seconds)  -->
                        <div class="mt-4">
                            <x-label for="time" :value="'Time (in seconds)'" />

                            <x-input id="time" class="block mt-1 w-full" type="text" name="time" :value="old('time')" required />
                        </div>

                        <!-- Calories  -->
                        <div class="mt-4">
                            <x-label for="kcal" :value="'Estimated calorie burn'" />

                            <x-input id="kcal" class="block mt-1 w-full" type="text" name="kcal" :value="old('kcal')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
