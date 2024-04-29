<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 h-screen text-gray-900">
                    {{ __("Welcome back!, 👋") }}

                    <div style="display: flex; justify-content: space-between;" class="mt-5">
                        <div style="background-color: #E5E7EB; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); flex: 1; margin-right: 10px;">
                            <h1 style="font-size: 1.25rem; font-weight: bold;">Post Count</h1>
                            <h1 style="font-size: 2.25rem; font-weight: bold;">{{$posts_count}}</h1>
                        </div>

                        <div style="background-color: #E5E7EB; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); flex: 1; margin-right: 10px;">
                            <h1 style="font-size: 1.25rem; font-weight: bold;">Total Post Report Count</h1>
                            <h1 style="font-size: 2.25rem; font-weight: bold;">{{$reported_posts_count}}</h1>
                        </div>

                        <div style="background-color: #E5E7EB; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); flex: 1;">
                            <h1 style="font-size: 1.25rem; font-weight: bold;">Total Comment Report Count</h1>
                            <h1 style="font-size: 2.25rem; font-weight: bold;">{{$reported_comments_count}}</h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>