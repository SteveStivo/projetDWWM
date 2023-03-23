
<!-- affichage des articles depuis la base de données -->
@foreach ($posts as $post)
<h2>Titre : 
    {{ $post->post_title }} <br>
</h2>
<img src="{{ $post->post_img }}" alt="">
<figure>IMAGE</figure>
<p> Decription : {{ $post->post_description }}</p>   

<h4>Créer : {{ $post->created_at->format('d M Y') }}</h4>
<h3>Autheur : {{ $post->post_author }}</h3>
    
    
@endforeach