<input class="searching-box" type="text" placeholder="Search Movie" autofocus>
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

<script>
    /*
     * Include Render Functions
     */

    function updateSlide() {

        let counter = 0
        let element = $('.movie-list-body')
        let width = element.width() + 10
        let items = element.children('.movie').length 
        let maxClick = parseInt(items / 5)

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
        let output = $('#movie-slide')
        let api = new MovieApi()

        api.getUpComing(function (data) {
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
                            <i class="icon-share"></i>
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
            render()
        })
    }

    movieApi()
    updateSlide()

</script>