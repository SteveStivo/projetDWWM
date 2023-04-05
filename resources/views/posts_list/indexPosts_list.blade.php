@extends('layouts.partials._navHome')

@section('hero')
<div class="hero_title_posts">
    <h1>{{ __('Posts_Upper') }}</h1>
</div>
@endsection

@section('content')
<main id="main_content">

    <!-- ****** SECTION POSTS BLOG ARTICLES ***** -->
    <section class="posts ">
        <!-- affichage des articles depuis la base de données -->
        @foreach ($posts as $post)
        <div class="post_title_box_content">
            <h2>{{ $post->post_title }}</h2>
        </div>
        <div class="post_description_box_content">
            <figure class="post_figure_box_content">
                <img class="post_img_box_content" src="{{ asset('/storage/' . $post->post_img) }}" alt="">
                <figcaptation>{{ $post->user->name }} <br> {{ $post->created_at->format('d M Y') }}</figcaptation>
                <<a href="{{ route('posts_list.show', $post) }}">Lire plus</a>
            </figure>
            <p>{{ $post->post_description }}</p>     
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
                    <h2>{{ $post->post_title }}</h2>
                </div>
                <div class="post_description_box_content">
                    <figure class="event_figure_box_content">
                        <img class="event_img_box_content" src="{{ $post->post_img }}" alt="">
                        <div class="event_figcaption_box_content">
                            <figcaptation>{{ $post->created_at->format('d M Y') }}</figcaptation>
                            <a class="event_lieu_box_content" href="#">{{ $post->post_author }}</a>
                        </div>
                    </figure>
                    <p>{{ $post->post_description }}</p>     
                </div>
            </div>
        </div>
        <a class="py-1" href="route('posts_list.index')">Voir tous les Evènement</a>
    </section>
</main>
@endsection