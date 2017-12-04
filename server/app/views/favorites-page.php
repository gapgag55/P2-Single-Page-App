<div class="container favorite-page">
<div class="movie-list-title">
    Favorites 
</div>
<div id="favorite" class="movie-fav"></div>
</div>

<script>
    // create new API object
    var api = new MovieApi();
    // set the output area
    var output = $('#favorite')

    // get the value of variable that named favorites which is in local storage
    var ids = localStorage.getItem('favorites');
    // change JSON to become Array
    var res = Array.from(JSON.parse(ids))
    // use value in array to create list of favorite movie
    getFavorites(res)

    function getFavorites(ids) {
        // if ids is empty, do not thing
        if (ids[0] == null) {
            return
        }

        /**
         * create the movie slide of first position in the array
         * then split the first position and then call getFavorites function
         * by using the array after splicing
         */
        api.getById(ids[0])
            .then(function (data) {
                let result = display(data)
                output.append(result) 
            })
            .then(function () {
                ids.splice(0, 1)
                getFavorites(ids)
            })
    }
    // delay 0.1 second then run render()
    setTimeout(() => {
        render()
    }, 100);

    // the movie-list form to show the information from requesting API
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

</script>