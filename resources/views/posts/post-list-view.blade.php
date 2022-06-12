<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach ($posts as $post)
            <div class="pt-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p class="pb-3">
                                <a href="{{ route('post.viewSingle', ['postId' => $post['id']]) }}">{{ $post['title'] }}</a>
                                <a href="{{ route('post.edit', ['postId' => $post['id']]) }}">Edit post</a>
                            </p>
                            <hr>
                            <p class="py-4">{{ $post['description'] }}</p>
                            <hr>
                            <p class="pt-3">{{ $post['kcal'] }} kcal {{ round($post['time']/60,1) }} min</p>
                            <p class="pt-3">{{ $post['author_name'] }}</p>
                            <p >{{ Illuminate\Support\Carbon::parse($post['updated_at'])->format('d/m/Y H:i') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</x-app-layout>
