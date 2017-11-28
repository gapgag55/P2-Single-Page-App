<input class="searching-box" type="text" placeholder="Search Movie" autofocus>
<div class="movie-list">
    <div class="movie-list-title">
        Up Coming
        <div class="pointer">
            <i id="left" class="icon-pagi-left" /> 
            <i id="right" class="icon-pagi-right" /> 
        </div>
    </div>
    <div class="movie-list-body">
        <?php for($i=0;$i<12;$i++): ?>
            <div class="movie">
                <div class="movie-img" style="background-image:url(public/images/thor.jpg)">
                    <div class="action-group">
                        <i class="icon-add"></i>
                        <a href="#" class="icon-play"></a>
                        <i class="icon-share"></i>
                    </div>
                </div>
                <div class="movie-title"><a href="#">Thor Ragnarok</a></div>
                <div class="movie-detail">Imprisoned, the almighty Thor finds himself in a lethal gladiatorial contest against the Hulk, his former ally. Thor must fight for survival and race against time to prevent the all-powerful Hela from destroying his home and the Asgardian civilization.</div>
                <div class="movie-detail">7 / 10 STARS</div>
            </div>
        <?php endfor; ?>
    </div>
</div>

<script>
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
        console.log(items / 5)
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

</script>