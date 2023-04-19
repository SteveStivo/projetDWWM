<x-app-layout>
  <x-slot:header>
  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Events') }}
  </h2>
  </x-slot>
  <x-slot:createPart>
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
                {{ __('Write your article in the following fields') }}
              </p>
            </header>
            <div>
              <x-input-error />
            </div>
            
            <form method="post" action="{{ route('posts_list.store') }}" enctype="multipart/form-data"
            class="mt-6 space-y-6">
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
  </x-slot>
  <x-slot:listPart> 
        <section>
          @if (!isset($post))

        
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
              <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <section>
                    <header>
                      <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Posts list') }}
                      </h2>
                      <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Edit or delet post') }}
                      </p>
                    </header>
                    <div>
                      <x-input-error />
                    </div>

                  </section>
                </div>
              </div>
            </div>

            @foreach ($posts as $post)
            <div class="py-1">
              <div class="max-w-7xl mx-auto sm:px-S6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  <div class="max-w-xl">
                    <section>
                      <div class="">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 ">
                          {{ __('Title') }} : {{ $post->post_title }}
                        </h2>                               
                        <x-input-label for="image" :value="__('Image')" />
                        <img class="post_img_box_content" src="{{ asset('/storage/' . $post->post_img) }}" alt="">
                        <x-input-label for="content" :value="__('Content')" />
                        <p>{{ Str::limit($post->post_description, 100) }}</p>                            
                      </div>
                      <footer class="grid grid-cols-2">
                        
                        <!-- <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')">{{ __('Delete Account') }}</x-danger-button> -->
                        
                        <!-- <x-modal name="confirm-post-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable> -->
                          <form action="{{ route('posts_list.delete', $post) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('posts_list.editPost', $post)}}" class="bg-blue-500 p-3 m-1 shadow sm:rounded-lg">Modifier</a>
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
