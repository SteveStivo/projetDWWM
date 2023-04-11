<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Title')}}
            {{ $post->post_title }}
            {{ $post->id }}

        </h2>
        <img class="post_img_box_content" src="{{ asset('/storage/' . $post->post_img) }}" alt="">
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $post->post_description }}
        </p>
<h1>testiiiiiiiiiing</h1>
    </header>
    <div>
    <x-input-error/>
    </div>

</section>
