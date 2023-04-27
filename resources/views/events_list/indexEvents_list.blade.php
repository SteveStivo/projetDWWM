@extends('layouts.partials._navHome')

@section('hero')
<div class="hero_title_posts">
  <h1>{{ __('Events_Upper') }}</h1>
</div>
@endsection

@section('content')
<main id="main_content">
  
  <!-- ****** SECTION EVENTS LIST ***** -->
  <section class="events inline-grid grid-cols-3 gap-4">
    <!-- affichage des évènements depuis la base de données -->
    @foreach ($events as $event)
    <article class="event_global_box">
      <div class="event_title_box_content">
        <h2>{{ $event->event_title }}</h2>
      </div>
      <div class="event_description_box_content">
        <figure class="event_figure_box_content">
          @if (isset($event->event_img))
          <img class="event_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
          @else
          <img class="event_img_box_content" src="http://localhost/projetDWWM/public/storage/events/default_event.png
          " alt="">                    
          @endif
          <figcaptation class="flex gap-1">
            <time class="time_format">{{ \Carbon\Carbon::parse($event->event_date_start)->translatedFormat('d/m/Y') }}</time>
            <div class="place_location">
              <h3>{{ $event->event_place }}</h3>
              <h3>{{ $event->event_location }}</h3>
            </div>
            </figcaptation>
        </figure>
        <div class="pt-2">
          <p>{{ Str::limit($event->event_description, 200) }}</p>     
          <a class="flex justify-end items-end px-3" href="{{ route('events_list.show', $event) }}">Lire la suite</a>
        </div>
      </div>
    </article>

    @endforeach
    
  </section>

</main>
@endsection