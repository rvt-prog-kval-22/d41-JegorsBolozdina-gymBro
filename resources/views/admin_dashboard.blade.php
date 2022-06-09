<?php
/**
* @var array $users
*/

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-3 gap-1">
        @foreach ($users as $user)
            <div class="pt-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            {{ $user->name . ' ' . $user->email . ' ' . $user->role }}
                            @if (Auth::user()->email !== $user->email)
                                <form action="{{ route('user.modifyPriveleges', ['userId' => $user->id]) }}" method="POST">
                                    @csrf

                                    @method('POST')

                                    @if ($user->role === 'user')
                                        <button type="submit" class="text-gray-500 flex flex-row-reverse">Rank up to admin</button>
                                    @else
                                        <button type="submit" class="text-gray-500 flex flex-row-reverse">Demote to user</button>
                                    @endif

                                </form>

                                <form action="{{ route('user.delete', ['userId' => $user->id]) }}" method="POST">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="text-gray-500 flex flex-row-reverse">Delete</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
