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
                            <i class="icon-add"></i>
                            <a href="/movie/${item.id}" class="icon-play"></a>
                            <i class="icon-share"></i>
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
</script>
<<<<<<< HEAD






=======
>>>>>>> de3f7204ca367967c9930b34b1b0630997ba621a
