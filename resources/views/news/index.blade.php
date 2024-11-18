<!-- resources/views/news/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Articles</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="top-right-corner">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-link">Logout</button>
        </form>
    </div>
    
    <h1>Top News Articles</h1>
    @if(!empty($articles))
        <div class="news-grid">
            @foreach($articles as $article)
                <div class="news-item">
                    @if(isset($article['urlToImage']) && $article['urlToImage'])
                        <img src="{{ $article['urlToImage'] }}" alt="News Image">
                    @endif
                    <div class="news-content">
                        <h2>{{ $article['title'] }}</h2>
                        <p>{{ $article['description'] }}</p>
                        <a href="{{ $article['url'] }}" target="_blank">Read more</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>No articles found.</p>
    @endif
</body>
</html>
