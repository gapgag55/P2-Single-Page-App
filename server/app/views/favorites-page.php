<div class="container favorite-page">
<div class="movie-list-title">
    Favorites 
</div>
<div id="favorite" class="movie-fav"></div>
</div>

<script>
    var api = new MovieApi();
    var output = $('#favorite')

    var ids = localStorage.getItem('favorites');
    var res = Array.from(JSON.parse(ids))
    getFavorites(res)

    function getFavorites(ids) {
        if (ids[0] == null) {
            return
        }

        api.getById(ids[0])
            .then(function (data) {
                let result = display(data)
                output.append(result) 
            })
            .then(function () {
                ids.splice(0, 1)
                getFavorites(ids)
            })
            .then(function () {
                // getRemove()
            })
    }

    setTimeout(() => {
        render()
    }, 1000);

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
            </div>
        `
    }

    function getRemove() {
        
        // let icons = $('.movie-fav .favorite')
        // icons.on('click', function () {

        //     let parent = $(this).parent().parent().parent()

        //     if ($(this).hasClass('icon-add')) {
        //         parent.css({
        //             "-webkit-filter": "grayscale(100%)",
        //             "filter": "grayscale(100%)"
        //         })
        //     } else {
        //         parent.css({
        //             "-webkit-filter": "initial",
        //             "filter": "initial"
        //         })
        //     }
        // })
    }
</script>