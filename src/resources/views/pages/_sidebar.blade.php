<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">

        <aside class="widget news-letter">
            <h3 class="widget-title text-uppercase text-center">Получать рассылку</h3>

            <form action="{{route('createSubscription')}}" method="post">
                @csrf

                <input type="email" name="email" placeholder="Email">
                <input type="submit" value="Подписаться"
                       class="text-uppercase text-center btn btn-subscribe">
            </form>

        </aside>
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Избранные посты</h3>

            <div id="widget-feature" class="owl-carousel">
                @foreach($featuredPosts as $featuredPost)
                    <div class="item">
                    <div class="feature-content">
                        <img src="{{$featuredPost->getImage()}}" alt="">

                        <a href="{{route('post.show', $featuredPost->slug)}}" class="overlay-text text-center">
                            <h5 class="text-uppercase">{{$featuredPost->title}}</h5>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </aside>

        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Недавние посты</h3>

            @foreach($recentPosts as $recentPost)
                <div class="thumb-latest-posts">
                    <div class="media">
                    <div class="media-left">
                        <a href="{{route('post.show', $recentPost->slug)}}" class="popular-img">
                            <img src="{{$recentPost->getImage()}}" alt="">
                            <div class="p-overlay"></div>
                        </a>
                    </div>
                    <div class="p-content">
                        <a href="#" class="text-uppercase">{{$recentPost->title}}</a>
                        <span class="p-date">{{$recentPost->date}}</span>
                    </div>
                </div>
                </div>
            @endforeach
        </aside>

        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Категории</h3>
            <ul>
                @foreach($categories as $category)
                    <li>
                    <a href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                    <span class="post-count pull-right">{{$category->posts->count()}}</span>
                </li>
                @endforeach
            </ul>
        </aside>
    </div>
</div>
