<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-bottom: 10px;">
            Admins
        </h2>
        <a href="{{ route('admins.create') }}" class="bg-gray-500 hover:bg-gray-800 text-white font-bold py-2 px-4 border border-red-700 rounded">
            Add Admin
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if(session('success'))

                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-100 dark:text-blue-400" role="alert">
  <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div>
                            {{ session('success') }}
  </div>
</div>
                    
                    @endif

<div class="relative overflow-x-auto">


    <table class="w-full text-sm text-center rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Created Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $key=>$admin)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{$key+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$admin->name}}
                    </th>
                    <td class="px-6 py-4 text-gray-900">
                        {{$admin->email}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">
                        {{Carbon\Carbon::parse($admin->created_at)->format('d/m/Y h:i A')}}
                        </div>
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                    
                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="mr-2">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 border border-red-700 rounded" type="submit">
                            Delete 
                        </button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
