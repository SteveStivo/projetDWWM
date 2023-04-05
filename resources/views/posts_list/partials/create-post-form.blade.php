<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Create new post') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Write your article in the following field") }}
        </p>
    </header>
    <div>
    <x-input-error/>
    </div>

    <form method="post" action="{{ route('posts_list.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
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
            <x-input-label for="author" :value="__('Author')" />
            <x-text-input id="author" name="author" />
            
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
