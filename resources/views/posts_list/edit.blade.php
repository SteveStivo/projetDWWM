<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modification post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-S6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Edit your post') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Titre de l'article : {{ $posts }}
                            </p>
                        </header>
                        <div>
                        <x-input-error/>
                        </div>

                        @foreach ($posts as $post)
                        <div class="flex">
                            <a href="{{ route('posts_list.edit', $post)}}" class="bg-blue-500 p-3 m-1 block">Editer {{ $post->post_title }}</a>
                            <a href="#" class="bg-red-500 p-3 m-1 block">Supprimer {{ $post->post_title }}</a>
                        </div>
                        @endforeach
                        
                        <form method="post" action="{{ route('posts_list.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" />
                            </div>
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <x-text-input id="image" name="image" type="file" />
                            </div>  
                            <div>
                                <x-input-label for="content" :value="__('Content')" />
                                <textarea name="content" id="content" cols="60" rows="5"></textarea>
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                    
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



