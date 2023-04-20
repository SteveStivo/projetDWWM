@extends('layouts.partials._navHome')

@section('hero')
<div class="hero_title_posts">
  <h1>{{ __('Events_Upper') }}</h1>
</div>
@endsection

@section('content')
<main id="main_content">
  
  <!-- ****** SECTION EVENTS LIST ***** -->
  <section class="events ">
    <!-- affichage des articles depuis la base de données -->
    @foreach ($events as $event)
    <div class="post_title_box_content">
      <h2>{{ $event->event_title }}</h2>
    </div>
    <div class="post_description_box_content">
      <figure class="post_figure_box_content">
        @if (isset($event->event_img))
        <img class="post_img_box_content" src="{{ asset('/storage/' . $event->event_img) }}" alt="">
        @else
        <img class="post_img_box_content" src="http://localhost/projetDWWM/public/storage/events/default_event.png
        " alt="">                    
        @endif
        <figcaptation>
          <time>{{ \Carbon\Carbon::parse($event->event_date_start)->translatedFormat('j/m/Y') }}</time>
          <h3>{{ $event->event_place }}</h3> <br>
          <h3>{{ $event->event_location }}</h3>
        </figcaptation>
      </figure>
      <div class="flex-col w-3/4 items-end">
        <p>{{ Str::limit($event->event_description, 600) }}</p>     
        <a class="flex justify-end items-end px-3" href="{{ route('events_list.show', $event) }}">Lire la suite</a>
      </div>
    </div>
    @endforeach
    
  </section>
  <!-- ****** SECTION TOPS SIDE Right ***** -->
  <section class="tops_right_side_box">
    <!-- >>>> top ARISTES <<<< -->
    <div class="top_artistes_content">
      <div class="tops_title_box_content">
        <h2>{{ __('TOP ARTISTS') }}</h2>
      </div>
      <div class="tops_box_content">
        <a href="route('posts_list.index')">Voir le Top 100 Artistes</a>
      </div>
    </div>
    <!-- >>>> top MUSICS <<<< -->
    <div class="top_musics_content">
      <div class="tops_title_box_content">
        <h2>{{ __('TOP MUSICS') }}</h2>
      </div>
      <div class="tops_box_content">
        <a href="route('posts_list.index')">Voir le Top 100 Musics</a>
      </div>
    </div>
    <!-- >>>> EVENT Annonce <<<< -->
    <div class="event_content">
      <div class="event_title_box_content">
        <h2>{{ __('TOP text') }}</h2>
      </div>
      <div class="event_box_content">
        <div class="event_title_box_content">
          <h2>{{ $event->event_title }}</h2>
        </div>
        <div class="post_description_box_content">
          <figure class="event_figure_box_content">
            <img class="event_img_box_content" src="{{ $event->event_img }}" alt="">
            <div class="event_figcaption_box_content">
              <figcaptation>{{ $event->created_at->format('d M Y') }}</figcaptation>
              <a class="event_lieu_box_content" href="#">{{ $event->event_description }}</a>
            </div>
          </figure>
          <p>{{ $event->event_description }}</p>     
        </div>
      </div>
    </div>
    <a class="py-1" href="route('posts_list.index')">Voir tous les Evènement</a>
  </section>
</main>
@endsection