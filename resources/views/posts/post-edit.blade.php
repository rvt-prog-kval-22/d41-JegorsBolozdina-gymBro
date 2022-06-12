<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('post.submitEdit', ['postId' => $post['id']]) }}">
                        @if ($errors->any())
                            <ul class="my-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="title" :value="'Title'" />

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$post['title']" required autofocus />
                        </div>

                        <!-- Post Description  -->
                        <div class="mt-4">
                            <x-label for="description" :value="'Description'" />

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$post['description']" required />
                        </div>

                        <!-- Time to execute (in seconds)  -->
                        <div class="mt-4">
                            <x-label for="time" :value="'Time (in seconds)'" />

                            <x-input id="time" class="block mt-1 w-full" type="text" name="time" :value="$post['time']" required />
                        </div>

                        <!-- Calories  -->
                        <div class="mt-4">
                            <x-label for="kcal" :value="'Estimated calorie burn'" />

                            <x-input id="kcal" class="block mt-1 w-full" type="text" name="kcal" :value="$post['kcal']" required />
                        </div>

                        <div class="mt-4 xl:w-96">
                            <x-label for="category_id" :value="'Category'" />
                            <select name="category_id" class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}" {{ ( $post['category_id'] === $category['id']) ? 'selected' : '' }} id="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
