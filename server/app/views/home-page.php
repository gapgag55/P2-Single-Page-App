<div class="home-page"> 
    <div class="container">
        <input id="search" class="searching-box" type="text" placeholder="Search Movie" autofocus>
        <div class="movie-list">
            <div class="movie-list-title">
                Up Coming
                <div class="pointer">
                    <i id="left" class="icon-pagi-left" /> 
                    <i id="right" class="icon-pagi-right" /> 
                </div>
            </div>
            <div id="movie-slide" class="movie-list-body"></div>
        </div>
    </div>
</div>

<script>
    var output = $('#movie-slide')
    var api = new MovieApi()

    api.getUpComing()
        .then(function (data) {
            let results = data.results.map(display)
            output.html(results)
        })
        .then(function () {
            render()
        })
        .then(function () {
            $('#search').keypress(function(e) {
                if(e.which == 13) {
                    let search = $('.searching-box').val()
                    let element = $('.movie-list-body')

                    /*
                    * Reset Slides
                    */
                    element.html('')
                    element.css({
                        '-webkit-transform': 'translate(0px)'
                    })

                    if( search != '' ) {
                        let api = new MovieApi()
                        let output = $('#movie-slide')

                        api.getbySearch(search)
                            .then(function (data) {
                                let results = data.results.map(display)
                                output.html(results)
                            })
                            .then(function () {
                                render()
                                if ( output.is(':empty') ) {
                                    output.html("Oops! The movie was not found!")
                                }
                            })

                    } else {
                        api.getUpComing()
                            .then(function (data) {
                                let results = data.results.map(display)
                                output.html(results)
                            })
                            .then(function () {
                                render()
                            })
                    }
                }
            });
        })

    function display(item) {
        return `
            <div class="movie">
                <div class="movie-img" 
                    style="background-image:url(
                        https://image.tmdb.org/t/p/w500/${item.poster_path})"
                    >
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
                <div class="movie-title"><a href="/movie/${item.id}">${item.original_title}</a></div>
                <div class="movie-detail">${item.overview}</div>
                <div class="movie-detail">${item.vote_average} / 10 STARS</div>
            </div>
            `
    }
    
</script>