<div class="container top-page">
    <div class="movie-list-title">
        Top rating
    </div>
    <div id="top-page" class="movie-list-body"></div>
</div>

<script>
    var api = new MovieApi()
    var output = $('#top-page')

    api.getTopRate( function (data) {
        let results = data.results.map(function (item) {
                return `
                <div class="movie">
                    <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.poster_path})">
                        <div class="action-group">
                            <i class="favorite icon-add" key=${item.id}></i>
                            <a href="/movie/${item.id}" class="icon-play"></a>
                            <i class="icon-share">
                                <div class="share">
                                    <ul>
                                        <li onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                            <i class="icon-facebook"></i>
                                            <p>Facebook</p>
                                        </li>
                                        <li onclick="window.open('http://twitter.com/share?text=${item.original_title}&url=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                            <i class="icon-twitter"></i>
                                            <p>Twitter</p>
                                        </li>
                                        <li onclick="window.open('https://lineit.line.me/share/ui?url=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                            <i class="icon-line"></i>
                                            <p>Line</p>
                                        </li>
                                    </ul>
                                </div>
                            </i>
                        </div>
                    </div>
                    <div class="movie-info">
                        <div class="movie-title"><a href="/movie/${item.id}">${item.original_title}</a></div>
                        <div class="movie-detail">${item.overview}</div>
                        <div class="movie-detail">${item.vote_average} / 10 STARS</div>
                    </div>           
                </div>
                `
            })

        output.html(results)
    })

    render()
</script>