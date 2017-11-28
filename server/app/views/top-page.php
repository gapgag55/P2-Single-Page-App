<div class="container top-page">
<div class="movie-list-title">
    Top rating
</div>
<div class="row">
<?php for($i=0;$i<2;$i++): ?>
    <div class="col">
        <div class="row">
            <div class="col movie">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                    <div class="action-group">
                        <i class="icon-add"></i>
                        <a href="#" class="icon-play"></a>
                        <i class="icon-share"></i>
                    </div>
                </div>
            </div>
            <div class="col movie">
                <div class="movie-title"><a href="#">Thor Ragnarok</a></div>
                <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
                <div class="movie-detail">7 / 10 STARS</div>
            </div>
        </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col detail">
                    <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                    <div class="action-group">
                        <i class="icon-add"></i>
                        <a href="#" class="icon-play"></a>
                        <i class="icon-share"></i>
                    </div>
                </div>
            </div>
            <div class="col movie"><div class="movie-title"><a href="#">Thor Ragnarok</a></div>
            <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
            <div class="movie-detail">7 / 10 STARS</div>
        </div>
        </div>
        </div>
        <div class="w-100"></div>
        <?php endfor; ?>
 
</div>


<script>
    let api = new MovieApi()
    api.getTopRate(function (data) {
        console.log(data)
    })
</script>