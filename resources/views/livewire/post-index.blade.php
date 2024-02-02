<div class="max-w-6xl mx-auto " >
    <div class="flex justify-end m-2 p-2 mt-2">
        <x-button wire:click="showPostModal">Create</x-button>
    </div>

    <div class=" flex justify-center">
        <div class="-my-2  overflow-x-auto sm:-mx-6 lg:-mx-8">
 <div class="py-2 aligne-middle inline-block min-w-full sm:px-6 lg:px-8">
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full text-lg divide-y divide-gray-600 dark:text-gray-200">

            <thead class="bg-gray-50 text-lg dark:bg-gray-600 dark:text-gray-200">
        <tr>
     <th scope="col" class="px-6 py-3  text-left text-lg font-meddium text-gray-500">Id</th>
     <th scope="col" class="px-6 py-3 text-left text-lg font-meddium text-gray-500">Title</th>
     <th scope="col" class="px-6 py-3 text-left text-lg font-meddium text-gray-500">Image</th>
     
   

     <th scope="col" class="relative px-6 py-3">Edit</th>
     
        </tr>

    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
    <tr></tr>

    @foreach ($posts as $post)

    <tr>            
    <td class="px-6 py-4  text-gray-500 whitespace-nowrap">{{ $post->id }}</td>
    <td class="px-6 py-4 text-gray-500 whitespace-nowrap">{{ $post->title }}</td>
    <td class="px-6 py-4 text-gray-500 whitespace-nowrap"><img class="w-10 h-10 rounded-full " src="{{ Storage::url($post->image) }}" alt=""></td>
    <td class="px-6 py-4  text-gray-500 whitespace-nowrap">
            <x-button  wire:click="showEditPostModal({{ $post->id }})">Edit</x-button>
            <x-button class="bg-red-400 hover:bg-red-600" wire:click="deletePost({{ $post->id }})">Delete</x-button>
        </td>
    
    </tr>

    @endforeach

    </tbody>

        </table>
    </div>
   </div>
</div>

    </div>

    <div>
        <x-dialog-modal wire:model="showingPostModal">

            @if ($isEditMode)
        <x-slot name="title">Update Post</x-slot>    
            @else
        <x-slot name="title">Create Post</x-slot>    
            @endif


        <x-slot name="content">
            <form enctype="multipart/form-data">
            
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-white ">Post Title</label>
                    <div class="mt-1">
                        <input
                            type="text"
                            wire:model.lazy="title"
                            name="title"
                            id="title"
                            class="block w-full py-2 px-3 border border-gray-300 rounded-md leading-5 text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                            placeholder="Enter your post title here"
                        >
                    </div>

                    @error('title')<span class="text-red-400">{{ $message }}</span>@enderror
                        
                    
                </div>
                

                <div class="sm:col-span-6 mt-6">
                    <label for="title" class="block text-sm font-medium  text-white">Post Image</label>
                    @if ($oldImage)

                    Old Image:
                    <img src="{{ Storage::url($oldImage) }}" alt="">
                    @endif

                    @if ($newImage)
                    Photo Preview:
                    <img src="{{ $newImage->temporaryUrl() }}" alt="">
                        
                    @endif

                    <div class="mt-1">
                        <input
                            type="file"
                            wire:model.lazy="newImage"
                            name="image"
                            id="image"
                            class="block w-full py-2 px-3 border border-gray-300 rounded-md leading-5 text-gray-700 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                        >
                    </div>

                    @error('newImage')<span class="text-red-400">{{ $message }}</span>@enderror
                        
                    
                </div>
                
                <div class="sm:col-span-6 pt-5">
                    <label for="title" class="block text-sm font-medium text-white">texto</label>
                    <div class="mt-1">
                        <textarea
                            name="body"
                            id="body"
                            wire:model.lazy="body"
                            class="shadow-sm focus:ring-indigo-500 appearance-none block w-full py-2 px-3 border border-gray-300 rounded-md leading-5 text-gray-700 placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out"
                            placeholder="insira seu texto"
                        ></textarea>
                    </div>
                </div>
                
            
            </form>
        </x-slot>
        <x-slot name="footer">

            @if ($isEditMode)
            <x-button wire:click="updatePost">Edit</x-button>

                @else

                <x-button wire:click="storePost">Create</x-button>

            @endif

        </x-slot>

            
        </x-dialog-modal>
    </div>
    
</div>
