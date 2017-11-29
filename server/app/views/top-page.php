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






<!-- 
    <div class="col">
        <div class="row">
            <div class="col movie">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                    <div class="action-group">
                        <i class="icon-add"></i>
                        <a href="#" class="icon-play"></a>
                        <i class="icon-share"></i>
                    </div>
                </div>
            </div>
                <div class="col movie"><div class="movie-title"><a href="#">Thor Ragnarok</a></div>
                <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
                <div class="movie-detail">7 / 10 STARS</div></div>
        </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col detail">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                <div class="action-group">
                        <i class="icon-add"></i>
                        <a href="#" class="icon-play"></a>
                        <i class="icon-share"></i>
                    </div>
            </div>
            </div>
            <div class="col movie"><div class="movie-title"><a href="#">Thor Ragnarok</a></div>
            <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
            <div class="movie-detail">7 / 10 STARS</div></div>
        </div>
        </div>
        <div class="w-100"></div>
       
 
</div> -->