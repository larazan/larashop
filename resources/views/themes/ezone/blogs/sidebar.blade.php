<div class="sidebar-top-rated-all">
   
    @foreach ($articles as $article)
    <div class="sidebar-top-rated mb-30">
        <div class="single-top-rated">
            <div class="top-rated-img">
            <a href="{{ url('blog/'. $article->slug) }}"><img src="{{ asset('storage/'.$article->small) }}" alt=""></a>
            </div>
            <div class="top-rated-text">
                <span>{{ date('M j, Y', strtotime($article->created_at)) }}</span>
                <h4><a href="{{ url('blog/'. $article->slug) }}">{{ $article->title }}</a></h4>
            </div>
        </div>
    </div>
    @endforeach
  
</div>