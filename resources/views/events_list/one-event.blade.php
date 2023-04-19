<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Title')}}
            {{ $event->event_title }}
            {{ $event->id }}

        </h2>
        <img class="eventt_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ $event->post_description }}
        </p>
<h1>testiiiiiiiiiing</h1>
    </header>
    <div>
    <x-input-error/>
    </div>

</section>
