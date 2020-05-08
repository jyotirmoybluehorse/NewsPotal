<section class="ticker-news">
    <div class="container">
        <div class="ticker-news-box">
            <span class="breaking-news">breaking news</span>
            <span class="new-news">New</span>
            <ul id="js-news">
             <?php
                $breaking_news=App\Models\BreakingNews::orderBy('created_at', 'desc')->get()
                ?>
                @foreach ($breaking_news as $breaking)
                <li class="news-item"><span class="time-news">{{$breaking->time}}</span>  {{$breaking->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
