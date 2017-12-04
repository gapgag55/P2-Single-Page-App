<div class="container top-page">
    <div class="movie-list-title">
        Top rating
    </div>
    <div id="top-page" class="movie-list-body"></div>
</div>

<script>
    var api = new MovieApi()
    var output = $('#top-page')
    var page = 1

    api.getTopRate({page})
        .then(function (data) {
            let results = data.results.map(display)
            output.html(results)
        })
        .then(function () {
            shareSocial()
            render()
        })
        .then(function () {
            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    page += 1
                    api.getTopRate({page})
                        .then(function(data) {
                            let results = data.results.map(display)
                            output.append(results)
                        })
                        .then(function () {
                            shareSocial()
                            render()
                        })
                }
            });
        })

    function display(item) {
        return `
        <div class="movie">
            <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.poster_path})">
                <div class="action-group">
                    <i class="favorite icon-add" key=${item.id}></i>
                    <a href="/movie/${item.id}" class="icon-play"></a>
                    <i class="icon-share">
                        <div class="share">
                            <ul>
                                <li key=${item.id} type="facebook">
                                    <i class="icon-facebook"></i>
                                    <p>Facebook</p>
                                </li>
                                <li key=${item.id} type="twitter">
                                    <i class="icon-twitter"></i>
                                    <p>Twitter</p>
                                </li>
                                <li key=${item.id} type="line">
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
    }

    function shareSocial() {
        let url;
        
        $('.share li').on('click', function () {
            api.getById($(this).attr('key'))
                .then(function (item) {

                    switch ($(this).attr('type')) {
                        case 'facebook': 
                            url = `https://www.facebook.com/sharer/sharer.php?u=http://www.imdb.com/title/${item.imdb_id}`
                            break;
                        case 'twitter':
                            url = `http://twitter.com/share?text=${item.original_title}&url=http://www.imdb.com/title/${item.imdb_id}`
                            break;
                        case 'line':
                            url = `https://lineit.line.me/share/ui?url=http://www.imdb.com/title/${item.imdb_id}`
                            break;
                    }


                    window.open(url, '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500')
                }.bind(this))
        })
    }
</script>