<div class="movie-list">
    <div class="movie-list-title">
        Up Coming
        <div class="pointer">
            <i id="left" class="icon-pagi-left" /> 
            <i id="right" class="icon-pagi-right" /> 
        </div>
    </div>
    <div id="movie-slide" class="movie-list-body">
        <?php for($i = 0;$i<10;$i++):?>
            <div class="movie">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
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
        <?php endfor?>
    </div>
</div>