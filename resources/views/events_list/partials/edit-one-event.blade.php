<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modification post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Modification post') }}
                            </h2>
                        </header>
                        <div>
                        <x-input-error/>
                        </div>
                    
                        <form method="post" action="{{ route('events_list.update', $event) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @method('put')
                            @csrf
                            <div>
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" value="{{ $event->event_title }}" />
                            </div>
                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <img class="post_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
                                <x-text-input id="image" name="image" type="file" />
                            </div>  
                            <div>
                                <x-input-label for="content" :value="__('Content')" />
                                <textarea name="content" id="content" cols="60" rows="5">{{ $event->event_description }}</textarea>
                            </div>
                    
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }} {{ __('Modification post') }}</x-primary-button>
                    
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



