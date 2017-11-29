
<?php for($j = 0;$j<12;$j++):?>
    <div class="movie-list" counter="0">
        <div class="movie-list-title">
            Up Coming
            <div class="pointer">
                <i id="left" class="icon-pagi-left" /> 
                <i id="right" class="icon-pagi-right" /> 
            </div>
        </div>
        <div id="movie-slide"  class="movie-list-body">
            <?php for($i = 0;$i<22;$i++):?>
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
<?php endfor?>
<script>
    function updateSlide() {
        let elements = $('#app .movie-list')
        $.each(elements, function(index, item) {
            
            let left = $(item).find("#left")
            let right = $(item).find("#right")
            left.on('click', moveSlide.bind(this, 'decrease'))
            right.on('click', moveSlide.bind(this, 'increase'))

            let counter = 0
            let element = $(item).find("#movie-slide")
            let width = element.width() + 10
            let items = element.children('.movie').length 
            let maxClick = Math.floor(items / 5)
            console.log(maxClick)
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
                console.log(counter)
                element.css({
                    "-webkit-transform":`translate(${counter*-width}px)`
                })

                if (counter == items/5-1) {
                    counter = maxClick
                }
            }
        })
    }
    updateSlide()
</script>