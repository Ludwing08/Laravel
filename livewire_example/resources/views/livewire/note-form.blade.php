<div class=" m-2 p-1 flex flex-col justify-between space-y-3 border-2 border-gray-600 
    lg:flex lg:flex-row lg:space-x-3">
    <div class="border-2 border-gray-600 flex flex-col justify-center p-2 space-y-5
        lg:basis-1/4 lg:m-2">
        <label class="block">
            <span class="block text-sm font-medium text-slate-700">Content</span>
            <!-- Using form state modifiers, the classes can be identical for every input -->
            <input type="text" wire:model="content" placeholder="Description"
                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500                      
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                      " />
            @error('content')
                <span class="text-red-500 text-xs"> {{ $message }}</span>
            @enderror
        </label>


        <label class="block">
            <span class="block text-sm font-medium text-slate-700">Note: </span>
            <!-- Using form state modifiers, the classes can be identical for every input -->
            <input type="text" wire:model="value"
                class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                      invalid:border-pink-500 invalid:text-pink-600
                      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                    " />
            @error('value')
                <span class="text-red-500 text-xs"> {{ $message }}</span>
            @enderror
        </label>

        <button wire:click="store" type="submit" class="rounded-full bg-green-300 p-2">Save</button>
        <button wire:click="clear" type="submit" class="rounded-full bg-gray-300 p-2">Clear</button>
    </div>

    <div class="static lg:basis-9/12 lg:m-2">
        <div class="not-prose relative rounded-xl overflow-hidden bg-slate-800">
            <div class="relative rounded-xl overflow-auto">
                <div class="shadow-sm overflow-hidden my-8">
                    <table class="table-fixed text-white rounded-lg w-full">
                        <thead>
                            <tr>
                                <th>
                                    Note
                                </th>
                                <th>
                                    Value
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-slate-700">
                            @forelse ($notes as $note)
                                <tr class="text-center text-slate-100">
                                    <td class="border-b">
                                        {{ $note->content }}
                                    </td>
                                    <td class="border-b">
                                        {{ $note->value }}
                                    </td>

                                    <td class="flex space-x-1 p-2 border-b">
                                        <button wire:click="show({{ $note->id }})"
                                            class="rounded-lg p-2 font-bold bg-orange-400 hover:bg-orange-600 text-xl">
                                            <svg class="h-4 w-4 lg:h-6 lg:w-6"
                                                data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                                              </svg>
                                        </button>
                                        <button wire:click="edit({{ $note->id }})"
                                            class="rounded-lg p-2 font-bold bg-fuchsia-500 hover:bg-fuchsia-800">
                                            <svg class="h-4 w-4 lg:h-6 lg:w-6" 
                                                data-slot="icon" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10">
                                                </path>
                                            </svg>
                                        </button>
                                        <button wire:click="destroy({{ $note->id }})"
                                            class="rounded-lg p-2 font-bold bg-red-400 hover:bg-red-600">
                                            <svg class="h-4 w-4 lg:h-6 lg:w-6"
                                                data-slot="icon" fill="none" stroke-width="1.5"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0">
                                                </path>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <p class="text-center"> No data </p>
                            @endforelse

                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <td>Sum Total: </td>
                                <td>{{ $sum }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bg-green-300 h-5 m-2"> {{ $feedback }}</div>

</div>
