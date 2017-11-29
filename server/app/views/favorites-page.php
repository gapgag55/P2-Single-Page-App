<div class="container favorite-page">
<div class="movie-list-title">
    Favorites
    <div id="favorite" class="movie-fav"></div>
</div>
    <script>
    var apifav = new MovieApi ();
    var numsfav = localStorage.getItem('favorites');
    var output = $('#favorite')
    var res = numsfav.split(/\"/g);
    var i;

    res = res.filter(function(item) {
        return item != ""
    })

    for(i=0;i<res.length;i++){
        apifav.getById(res[i] ,function (item) {
            var result = `
            
                <div class="movie">
                    <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.poster_path})">
                        <div class="action-group">
                            <i class="icon-add"></i>
                            <a href="/movie/" class="icon-play"></a>
                            <i class="icon-share"></i>
                        </div>
                    </div>  
                </div>
            `
            console.log(result)
            output.append(result)         
        })
    }
         
    </script>