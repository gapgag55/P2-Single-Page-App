<div class="home-page"> 
    <div class="container">
        <input class="searching-box" type="text" placeholder="Search Movie" autofocus onkeyup="searching()">
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
    /*
     * Include Render Functions
     */
    
    function updateSlide() {

        let counter = 0
        let element = $('.movie-list-body')
        let width = element.width() + 10
        let items = element.children('.movie').length 
        let maxClick = Math.floor(items / 5)-1

        $("#left").on('click', moveSlide.bind(this, 'decrease'))
        $("#right").on('click', moveSlide.bind(this, 'increase'))

        function moveSlide(trigger) {
    
            switch (trigger) {
                case 'decrease': counter -= 1; break
                case 'increase': counter += 1; break
            }
    
            if (counter < 0 ) {
                counter = 0
                return false
            }
            if (counter > maxClick) {
                counter = maxClick
                return false
            }
            if (counter == maxClick) {
                counter = items/5-1
            }

            element.css({
                "-webkit-transform":`translate(${counter*-width}px)`
            })

            if (counter == items/5-1) {
                counter = maxClick
            }
    
        }
    }

    function movieApi() {
        
        var output = $('#movie-slide')
        var api = new MovieApi()

        api.getUpComing(function (data) {
            let results = data.results.map(function (item) {
                console.log(item)
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
                                        <li>
                                            <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                <i class="icon-facebook"></i>
                                                <p>Facebook</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="window.open('http://twitter.com/share?text=test&url=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                <i class="icon-twitter"></i>
                                                <p>Twitter</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="window.open('https://lineit.line.me/share/ui?url=http://www.imdb.com/title/${item.imdb_id}', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                <i class="icon-line"></i>
                                                <p>Line</p>
                                            </a>
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
            })

            output.html(results)
            updateSlide()
            updateShare()
            render()
        })
    }

    function updateShare() {
        let iconShare = $('.movie .icon-share')
       
        iconShare.on('click', function (e) {
            e.stopPropagation()
            $(this).toggleClass('is-active')

            /*
             * Remove Class is-active
             */
            var divMovie = $(this)
                            .parent()
                            .parent()
                            .parent()
                            .siblings()

            divMovie.find('.icon-share').removeClass('is-active')
        })

        $('body').on('click', function () {
            $(iconShare).removeClass('is-active')
        })
    }
    
    function searching() {
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

            api.getbySearch(search,function (data) {

                let results = data.results.map(function (item) {

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
                                            <li>
                                                <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://localhost/movie/24222', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                    <i class="icon-facebook"></i>
                                                    <p>Facebook</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a onclick="window.open('http://twitter.com/share?text=test&url=http://localhost/movie/24222', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                    <i class="icon-twitter"></i>
                                                    <p>Twitter</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a onclick="window.open('https://lineit.line.me/share/ui?url=http://localhost/movie/24222', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')">
                                                    <i class="icon-line"></i>
                                                    <p>Line</p>
                                                </a>
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
                })

                output.html(results)
                updateSlide()
                updateShare()
                render()
            })

        } else {
            movieApi()
        }
    }

    movieApi()

</script>