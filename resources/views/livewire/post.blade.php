<div class="space-y-4">
    <x-action-message on="saved" class="w-full text-white bg-green-500 rounded-lg ">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center">
                <svg viewBox="0 0 40 40" class="w-6 h-6 text-white fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                </svg>

                <p class="mx-3 text-white">Added successfully.</p>
            </div>
        </div>
    </x-action-message>

    <x-action-message on="update" class="w-full text-white bg-green-500 rounded-lg ">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center">
                <svg viewBox="0 0 40 40" class="w-6 h-6 text-white fill-current">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                </svg>

                <p class="mx-3 text-white">Updated successfully.</p>
            </div>
        </div>
    </x-action-message>


    <div class="relative overflow-auto rounded-xl">
        <div class="max-w-sm px-6 py-5 mx-auto bg-white shadow dark:bg-gray-100">
            <form wire:submit="save">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Title</label>
                    <div class="mt-1">
                        <input wire:model="title" type="text" class="block w-full px-3 py-2 bg-white border rounded-md shadow-sm dark:text-gray-700 border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1" value="{{!$this->selectedUser ? '' : $this->selectedUser->title}}">
                        <div class="text-red-600">@error('title') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="mt-6">
                    <label class="block text-sm font-medium text-slate-700">Content</label>
                    <div class="mt-1">
                        <textarea class="block w-full px-3 py-2 bg-white border rounded-md shadow-sm dark:text-gray-700 border-slate-300 focus:outline-none focus:border-sky-500 focus:ring-sky-500 sm:text-sm focus:ring-1" id="content" name="content" wire:model="content">{{!$this->selectedUser ? '' : $this->selectedUser->content}}</textarea>
                        <div class="text-red-600">@error('content') {{ $message }} @enderror</div>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <x-secondary-button wire:click="clear()" class="bg-gray-500 hover:bg-gray-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white">
                        Clear
                    </x-secondary-button>
                    <x-primary-button type="submit" class="bg-sky-500 hover:bg-sky-700 px-5 py-2.5 text-sm leading-5 rounded-md font-semibold text-white">
                        @if(!$this->selectedUser)
                        Save
                        @else
                        Update
                        @endif
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white shadow dark:bg-gray-800 dark:shadow-white">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full">
                        <thead class="border-b bg-slate-50 border-slate-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-sm font-medium text-left text-slate-900">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium text-left text-slate-900">
                                    Content
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium text-left text-slate-900">
                                    Created at
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium text-left text-slate-900">
                                    Updated at
                                </th>
                                <th scope="col" class="px-6 py-3 text-sm font-medium text-left text-slate-900">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                            <tr class="odd:bg-white even:bg-slate-50">
                                <td class="px-6 py-4 text-sm font-medium whitespace-nowrap text-slate-900">
                                    {{$post->title}}
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-600">
                                    {{$post->content}}
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-600">
                                    <div class="flex flex-col">
                                        <span>{{$post->created_at->ToFormattedDateString()}}</span>
                                        <span>{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-600">
                                    <div class="flex flex-col">
                                        <span>{{$post->updated_at->ToFormattedDateString()}}</span>
                                        <span>{{$post->updated_at->diffForHumans()}}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm whitespace-nowrap text-slate-600">
                                    <x-secondary-button wire:click="edit({{ $post->id }})">Edit</x-secondary-button>
                                    <x-danger-button wire:click="delete({{ $post->id }})">Delete</x-danger-button>
                                </td>
                            </tr>
                            @empty
                            <tr class="">
                                No posts found.
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>