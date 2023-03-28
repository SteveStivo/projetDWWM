@extends('header')

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
            <figure class="post_figure_box_content float-left">
                <img class="post_img_box_content" src="{{ $post->post_img }}" alt="">
                <figcaptation>{{ $post->post_author }} <br> {{ $post->created_at->format('d M Y') }}</figcaptation>
            </figure>
            <p>{{ $post->post_description }}</p>     
        </div>
        @endforeach
    
    </section>
    <!-- ****** SECTION TOPS SIDE Right ***** -->
    <section class="tops_right_side_box">
        <div class="top_artistes_content">
            <div class="tops_title_box_content">
                <h2>{{ __('TOP ARTISTS') }}</h2>
            </div>
            <div class="tops_box_content">
                <a href="route('posts_list.index')">Voir le Top 100 Artistes</a>
            </div>
        </div>
        <div class="top_musics_content">
            <div class="tops_title_box_content">
                <h2>{{ __('TOP MUSICS') }}</h2>
            </div>
            <div class="tops_box_content">
                <a href="route('posts_list.index')">Voir le Top 100 Musics</a>
            </div>
        </div>
    </section>
</main>
@endsection