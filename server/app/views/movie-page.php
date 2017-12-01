<div id="movie-single" class="movie-single container">
    <div class="movie-list-title">
        <h1 id="title"><?= $keyword; ?></h1>
        <div class="pointer">
            <i class="favorite icon-add" key=${item.id}></i> 
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

    <div class="row">
        <div class="col-3">
            <div id="poster" class="bg"></div>
            <div class="group">
                <b>Budget</b>
                <p id="budget"></p>
                <b>Tagline</b>
                <p id="tagline"></p>
                <b>Release Date</b>
                <p id="release"></p>
                <b>Cast</b>
                <p id="cast"></p>
                <b>Crew</b>
                <p id="crew"></p>
            </div>
        </div>
        <div class="col-9">
            <div class="youtube row">
                <div class="col-8 left">
                    <iframe width="560" height="400" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-4 right">
                    <ul id="playlists">
                    </ul>
                </div>
            </div>
            <div class="border-bottom"></div>  
            <div class="border-bottom">
                <b id="rating"></b>
                <p id="description">"A mysterious guide escorts an enthusiastic adventurer and his friend into the Amazon jungle, but their journey turns into a terrifying ordeal as the darkest elements of human nature and the deadliest threats of the wild force them to fight for survival."</p>
            </div>
            <div class="spotify border-bottom">
                <iframe src="https://open.spotify.com/embed?uri=<?= $spotify; ?>" height="380" frameborder="0" allowtransparency="true"></iframe>
            </div>
            <div class="twitter">
                <b>Comment <span>67% talked Good From 1,200 comments</span></b>
                <ul class="row">
                    <?php foreach($tweets as $tweet): ?>
                    <li class="row col-6">
                        <div class="col-3">
                            <div class="bg" style="background-image: url(<?= $tweet->user->profile_image_url; ?>)"></div>
                        </div>
                        <div class="col-9">
                            <b><?= $tweet->user->name; ?></b>
                            <p><?= $tweet->text; ?></p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<script>
    var title = $('#title')
    var poster = $('#poster')
    var rating = $('#rating')
    var budgets = $('#budget')
    var taglines = $('#tagline')
    var release = $('#release')
    var description = $('#description')
    var crews = $('#crew')
    var casts = $('#cast')
    var playlists = $('#playlists')
    var youtube = $('.youtube iframe')

    var api = new MovieApi() 

    api.getById(<?= $id; ?>, function (data) {
        let {
            overview,
            poster_path,
            budget,
            tagline,
            vote_average,
            release_date
        } = data 

        description.html(overview)
        poster.css({
            'background-image': `url(https://image.tmdb.org/t/p/w500/${poster_path})`
        })
        budgets.html(budget.toLocaleString())
        taglines.html(tagline)
        rating.html(`Rating: ${vote_average} / 10`)
        release.html(release_date)
        
    })
    api.getCredits(<?= $id; ?>, function(data) {
        let {cast, crew} = data

        // cast = cast.map(function (item) {
        //     return item.name
        // })

        // crew = crew.map(function (item) {
        //     return item.name
        // })

        // casts.html(cast.toString())
        // crews.html(crew.toString())
    })
    api.getYoutube(title.html(), function (data) {
        let active = '' 

        $.each(data.items, function (index, item) {
            active = ''

            if (index == 0) {
                active = 'is-active'
                youtube.attr('src', `https://www.youtube.com/embed/${item.id.videoId}`)
            }

            playlists.append( `
                <li class="${active}" key="${item.id.videoId}">
                    <div class="bg" style="background-image:url(${item.snippet.thumbnails.default.url});"></div>
                    <div class="detail">
                        <b>${item.snippet.title}</b>
                        <p>${item.snippet.channelTitle}</p>
                    </div>
                </li>
            `)
        })

        playlist()
    })

    function playlist() {
        playlists.find('li').on('click', function () {
            $(this)
                .addClass('is-active')
                .siblings()
                .removeClass('is-active')

            youtube.attr('src', `https://www.youtube.com/embed/${$(this).attr('key')}`)
        })
    }

    render()
    
</script>