<x-app-layout>
  <x-slot:header>
  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Events') }}
  </h2>
  </x-slot>
  <x-slot:createPart>


    <div class="alert_content_properties">
      <div class="alert_text_properties">
        Votre évènement a bien été modifié
      </div>
    </div>


    @if (session('success'))
    <div class="alert_content_properties">
      <div class="alert_text_properties">
      {{ session('success') }}
      </div>
    </div>
    @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
          <section>
            <header>
              <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create new event') }}
              </h2>
              <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Write your event in the following fields') }}
              </p>
            </header>
            <div>
              <x-input-error />
            </div>
            
            <form method="post" action="{{ route('events_list.store') }}" enctype="multipart/form-data"
            class="mt-6 space-y-6">
            @csrf
            <div>
              <x-input-label for="title" :value="__('Title')" />
              <x-text-input value="{{ old('title') }}" id="title" name="title" />
            </div>
            <div>
              <x-input-label for="date_start" :value="__('Start')" />
              <x-text-input value="{{ old('date_start') }}" id="date_start" name="date_start" type="datetime-local" />
            </div>
            <div>
              <x-input-label for="date_end" :value="__('End')" />
              <x-text-input value="{{ old('date_end') }}" id="date_end" name="date_end" type="datetime-local" />
            </div>
            <div>
              <x-input-label for="place" :value="__('Place')" />
              <x-text-input value="{{ old('place') }}" id="place" name="place" />
            </div>
            <div>
              <x-input-label for="location" :value="__('Country town')" />
              <x-text-input value="{{ old('location') }}" id="location" name="location" />
            </div>
            <div>
              <x-input-label for="map" :value="__('Map')" />
              <x-text-input value="{{ old('map') }}" id="map" name="map" />
            </div>
            <div>
              <x-input-label class="before:hidden" for="price" :value="__('Price')" />
              <x-text-input value="{{ old('price') }}" id="price" name="price" />
            </div>
            <div>
              <x-input-label for="description" :value="__('Description')" />
              <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-sm shadow-sm shadow-gray-400" name="description" id="description" cols="60" rows="5"></textarea>
            </div>
            <div>
              <x-input-label class="before:hidden" for="image" :value="__('Image')" />
              <x-text-input id="image" name="image" type="file" />
            </div>
            <div>
              <x-input-label class="before:hidden" for="video_link" :value="__('Video link')" />
              <x-text-input value="{{ old('video_link') }}" id="video_link" name="video_link" type="url" />
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
  </x-slot>
  <x-slot:listPart> 
    <section>
      @if (!isset($event))
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
              <section>
                <header>
                  <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Events list') }}
                  </h2>
                  <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Edit or delete event') }}
                  </p>
                </header>
              </section>
            </div>
          </div>
        </div>
        @foreach ($events as $event)
        <div class="py-1">
          <div class="max-w-7xl mx-auto sm:px-S6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              <div class="max-w-xl">
                <section>
                  <div class="">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 ">
                      {{ __('Title') }} : {{ $event->event_title }}
                    </h2>                               
                    <x-input-label for="image" :value="__('Image')" />
                    <img class="post_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
                    <x-input-label for="content" :value="__('Description')" />
                    <p>{{ Str::limit($event->event_description, 100) }}</p>                            
                    <x-input-label for="date_start" :value="__('Start')" />
                    <time datetime="{{ $event->event_date_start }}">{{ \Carbon\Carbon::parse($event->event_date_start)->translatedFormat('l j F Y - H\hi') }}</time>
                    <x-input-label for="date_end" :value="__('End')" />
                    <time datetime="{{ $event->event_date_end }}">{{ \Carbon\Carbon::parse($event->event_date_end)->translatedFormat('l j F Y - H\hi') }}</time>
                  </div>
                  <footer class="grid grid-cols-2">
                    
                    <!-- <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">{{ __('Delete Account') }}</x-danger-button> -->
                    
                    <!-- <x-modal name="confirm-post-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> -->
                      <form action="{{ route('events_list.delete', $event) }}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('events_list.editEvent', $event)}}" class="bg-blue-500 p-3 m-1 shadow sm:rounded-lg">Modifier</a>
                        <x-danger-button type="submit" id="delete-post-form" >Supprimer</x-danger-button>
                        <!-- <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                          {{ __('Are you sure you want to delete your account?') }}
                        </h2>
                        
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                          {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>
                        <div class="mt-6 flex justify-end">
                          <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                          </x-secondary-button>
                          
                          <x-danger-button class="ml-3">
                            {{ __('Delete Account') }}
                          </x-danger-button>
                        </div> -->
                      </form>
                      <!-- </x-modal> -->
                  </footer>
                </section>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      @else

      @endif
    </section>     
  </x-slot>
</x-app-layout>