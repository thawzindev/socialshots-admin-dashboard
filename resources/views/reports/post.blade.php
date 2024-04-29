<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comment reports
        </h2>
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
                    Report Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Reason
                </th>
                <th scope="col" class="px-6 py-3">
                    Reported By
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $key=>$report)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{$key+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{$report->post?->content}}
                    </th>
                    <td class="px-6 py-4">
                        {{$report->remarks}}
                    </td>
                    <td class="px-6 py-4">
                        {{$report->user?->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-gray-900">
                        {{$report->status}}
                        </div>
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                    
                    @if($report->status === 'PENDING')

                    <form action="{{ route('post-reports.action') }}" method="POST" class="mr-2"
                    onsubmit="return confirm('Are you sure you want to take action on this report? This action cannot be undone.');"
                    >
                        @csrf
                        <input type="hidden" name="id" value={{$report->id}}>
                        <input type="hidden" name="type" value="ACTION_TAKEN">
                        <button class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 border border-red-700 rounded" type="submit">
                            Delete Post
                        </button>
                    </form>
                    <form action="{{ route('post-reports.action') }}" method="POST" onsubmit="return confirm('Are you sure want to reject report?');">
                        @csrf
                        <input type="hidden" name="id" value={{$report->id}}>
                        <input type="hidden" name="type" value="REJECTED">
                        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-gray-700 rounded" type="submit">
                            Reject Report
                        </button>
                    </form>

                    @else

                    -

                    @endif
                        
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
