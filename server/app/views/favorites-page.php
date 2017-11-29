<div class="container favorite-page">
<div class="movie-list-title">
    Favorites
    
</div>
<div id="favorite" class="movie-fav"></div>
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
        let id = res[i]
        apifav.getById(id,function (item) {
            var result = `
            
                <div class="movie">
                    <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.poster_path})">
                        <div class="action-group">
                            <i class="favorite icon-add" key=${id}></i>
                            <a href="/movie/${id}" class="icon-play"></a>
                            <i class="icon-share"></i>
                        </div>
                    </div>  
                </div>
            `
        output.append(result)    
        render()     
        getRemove()
    })
}
    function getRemove(){

    let movies = $('.movie-fav .movie')

    $.each(movies, function (index, item) {
        // console.log(item)
        let icon = $(item).find(".favorite")
        icon.on('click', function () {
            let parent = $(this).parent().parent().parent()

            if ($(this).hasClass('icon-close')) {
                parent.css({
                    "-webkit-filter": "grayscale(100%)",
                    "filter": "grayscale(100%)"
                })
            } else {
                parent.css({
                    "-webkit-filter": "initial",
                    "filter": "initial"
                })
            }
        })
    })

   
        //  $( "p" ).parent().css("-webkit-filter: grayscale(100%);filter: grayscale(100%);"); break 
   }
   
    </script>