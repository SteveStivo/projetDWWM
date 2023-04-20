<x-app-layout>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modification event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Modification event') }}
                            </h2>
                        </header>
                        <div>
                        <x-input-error/>
                        </div>
                    
                        <form method="post" action="{{ route('events_list.update', $event) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                            @method('put')
                            @csrf
                            <div>
                                <x-input-label class="before:hidden" for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" value="{{ $event->event_title }}" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="date_start" :value="__('Start')" />
                              <x-text-input value="{{ $event->event_date_start }}" id="date_start" name="date_start" type="datetime-local" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="date_end" :value="__('End')" />
                              <x-text-input value="{{ $event->event_date_end }}" id="date_end" name="date_end" type="datetime-local" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="place" :value="__('Place')" />
                              <x-text-input value="{{ $event->event_place }}" id="place" name="place" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="location" :value="__('Country town')" />
                              <x-text-input value="{{ $event->event_location }}" id="location" name="location" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="map" :value="__('Map')" />
                              <x-text-input value="{{ $event->event_map }}" id="map" name="map" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="price" :value="__('Price')" />
                              <x-text-input value="{{ $event->event_price }}" id="price" name="price" />
                            </div>
                            <div>
                              <x-input-label class="before:hidden" for="description" :value="__('Description')" />
                              <textarea name="description" id="description" cols="60" rows="5">{{ $event->event_description }}</textarea>
                            </div>
                            <div>
                                <x-input-label class="before:hidden" for="image" :value="__('Image')" />
                                <img class="post_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
                                <x-text-input id="image" name="image" type="file" />
                            </div>  
                            <div>
                              <x-input-label class="before:hidden" for="video_link" :value="__('Video link')" />
                              <x-text-input value="{{ $event->event_video_link }}" id="video_link" name="video_link" type="url" />
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



