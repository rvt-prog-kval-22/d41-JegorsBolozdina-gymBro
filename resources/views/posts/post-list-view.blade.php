<x-app-layout>
    @if(!empty($posts))
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            @foreach ($posts as $post)
                <div class="pt-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <p class="pb-3">
                                    <a class="underline" href="{{ route('post.viewSingle', ['postId' => $post['id']]) }}">{{ $post['title'] }}</a>
                                </p>
                                <hr>
                                <p class="py-4">{{ $post['description'] }}</p>
                                <hr>
                                <p class="pt-3">{{ $post['kcal'] }} kcal {{ round($post['time']/60,1) }} min</p>
                                <p class="pt-3">{{ $post['author_name'] }}</p>
                                <p>{{ Illuminate\Support\Carbon::parse($post['updated_at'])->format('d/m/Y H:i') }}</p>
                                @if(Auth::user()->name === $post['author_name'] || in_array(Auth::user()->role, ['superadmin','admin']))
                                    <a class="underline" href="{{ route('post.edit', ['postId' => $post['id']]) }}">Edit post</a>
                                    <form action="{{ route('post.delete', ['postId' => $post['id']]) }}" method="POST">
                                        @csrf

                                        @method('DELETE')

                                        <button type="submit" class="underline">Delete</button>
                                    </form>
                                @endif()

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    No posts here, but you can be the first one to make some!
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
