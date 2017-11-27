<input class="searching-box" type="text" placeholder="Search Movie" autofocus>
<div class="movie-list">
    <div class="movie-list-title">
        Trends
        <div class="pointer">
            <i id="left" class="icon-pagi-left" /> 
            <i id="right" class="icon-pagi-right" /> 
        </div>
    </div>
    <div class="movie-list-body">
        <?php for($i=0;$i<5;$i++): ?>
            <div class="movie">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                    <?php if ($i == 0): ?>
                        <div class="action-group">
                            <i class="icon-add"></i>
                            <i class="icon-play"></i>
                            <i class="icon-share"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="movie-title">Thor Ragnarok</div>
                <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
                <div class="movie-detail">7 / 10 STARS</div>
            </div>
        <?php endfor; ?>
    </div>
</div>