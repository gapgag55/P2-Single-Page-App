<div id="movie-single" class="movie-single container">
<div class="movie-list-title">
    <h1 id="title"></h1>
    <div class="pointer">
        <i class="favorite icon-add" id="favorites"></i> 
        <i class="icon-share">
            <div class="share">
                <ul>
                    <li id="share-facebook">
                        <i class="icon-facebook"></i>
                        <p>Facebook</p>
                    </li>
                    <li id="share-twitter">
                        <i class="icon-twitter"></i>
                        <p>Twitter</p>
                    </li>
                    <li id="share-line">
                        <i class="icon-line"></i>
                        <p>Line</p>
                    </li>
                </ul>
            </div>
        </i> 
    </div>
</div>

<div class="row first">
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
        <div class="border-bottom">
            <b id="rating"></b>
            <p id="description">"A mysterious guide escorts an enthusiastic adventurer and his friend into the Amazon jungle, but their journey turns into a terrifying ordeal as the darkest elements of human nature and the deadliest threats of the wild force them to fight for survival."</p>
        </div>
        <div class="spotify bottom">
            <iframe id="spotify" height="380" frameborder="0" allowtransparency="true"></iframe>
        </div>
        <div class="twitter">
            <b>Comment</b>
            <ul id="twitter" class="row"></ul>
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
var favorite = $("#favorites")
var playlists = $('#playlists')
var youtube = $('.youtube iframe')
var twitter = $('#twitter')
var spotify = $('#spotify')
var shareFacebook = $('#share-facebook')
var shareTwitter = $('#share-twitter')
var shareLine = $('#share-line')

var api = new MovieApi() 
// get movie id from controller the sent Themoviedb.org API by using ID
api.getById(<?= $id; ?>)
    .then(function (data) {
        // get the data from data variable
        let {
            id,
            original_title,
            imdb_id,
            overview,
            poster_path,
            budget,
            tagline,
            vote_average,
            release_date
        } = data 

        // set title div to be title of the movie
        title.html(original_title)
        // set attibute named key to be key of movie
        favorite.attr('key', id)
        // set decription of the movie in description div 
        description.html(overview)
        // set background-image to become the movie image
        poster.css({
            'background-image': `url(https://image.tmdb.org/t/p/w500/${poster_path})`
        })
        // set butget div of the movie 
        budgets.html(budget.toLocaleString())
        // set tagline div of the movie 
        taglines.html(tagline)
        // set rating div of the movie 
        rating.html(`Rating: ${vote_average} / 10`)
        // set release-date div of the movie
        release.html(release_date)

        // set share button for sharing the movie
        shareFacebook.attr('onclick', `window.open("https://www.facebook.com/sharer/sharer.php?u=http://www.imdb.com/title/${imdb_id}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500")`)
        shareTwitter.attr('onclick', `window.open("https://twitter.com/share?text=${original_title}&url=http://www.imdb.com/title/${imdb_id}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500")`)
        shareLine.attr('onclick', `window.open("https://lineit.line.me/share/ui?url=http://www.imdb.com/title/${imdb_id}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=400,width=600,height=500")`)

        /** 
         * use for waiting AJAX finish running
         * after that run the code below AJAX
         */
        return new Promise((resolve, reject) => {
            resolve(original_title)
        })       
    })
    .then(function (title) {
        // requset YouTube API by using title of the movie
        api.getYoutube(title)
            .then(function (data) {
                
                let active = '' 

                $.each(data.items, function (index, item) {
                    // set active attribute's movie-list of every items to become ""
                    active = ''

                    // at first time show the first item into ifame
                    if (index == 0) {
                        active = 'is-active'
                        youtube.attr('src', `https://www.youtube.com/embed/${item.id.videoId}`)
                    }

                    // append every items to play list at left side
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
            })
            .then(function () {
                // show the clicked list into ifame
                playlist()
                /** 
                 * after downloading the html
                 * send the twitter and spotify API request
                 */
                getApiServer(title)
            })
        
        /** 
         * use for waiting AJAX finish running
         * after that run the code below AJAX
         */
        return new Promise((resolve, reject) => {
            resolve(title)
        })
    })
    .then(function () {
        // get data by using getCredits API in rountes.js 
        api.getCredits(<?= $id; ?>)
            .then(function(data) {
                let {cast, crew} = data

                // get only name of cast
                cast = cast.map(function (item) {
                    return item.name
                })

                // get only name of crew
                crew = crew.map(function (item) {
                    return item.name
                })

                // set value of casts div by using all casts' name
                casts.html(cast.toString())
                // set value of crews div by using all crews' name
                crews.html(crew.toString())
            })
    })
    .then(function () {
        // check favorite button that was clicked or not
        render()
    })


function getApiServer(title) {
    let status;
    // use twitter API for getting commet that has title of the movie
    api.getComment(title)
        .then(function(data) {
            // convert string to be JSON 
            data = JSON.parse( data )
            let output;
            // create each comment by using data from data variable
            $.each(data, function(index, item) {
                switch (item.analysis) {
                    case 'pos':
                        status = '<span style="color: #2ecc71;">Positive</span>'
                        break;
                    case 'neg':
                        status = '<span style="color: #e74c3c;">Negetive</span>'
                        break;
                        status = '<span style="color: #f1c40f;">Neutral</span>'
                    case 'neu':
                        break;
                }

                output = `
                    <li class="row col-6">
                        <div class="col-3">
                            <div class="bg" style="background-image: url(${item.user.profile_image_url})"></div>
                        </div>
                        <div class="col-9">
                            <b>${item.user.name}</b>
                            <p>${item.text}</p>
                            <p>${status} comment</p>
                        </div>
                    </li>
                    `
                twitter.append(output)
            })
        })
    /** 
     * send API request by using title of the movie
     * and create spotify playlist
     */

    api.getSpotify(title)
        .then(function(data) {
            data = data.replace(/\"/g, '')
            spotify.attr('src', `https://open.spotify.com/embed?uri=${data}`)
        })
}

function playlist() {
    /** 
     * when any list was click
     * change class's that list to be is-active
     * and others to become ""
     * then change src of ifame to be that link
     */

    playlists.find('li').on('click', function () {
        $(this)
            .addClass('is-active')
            .siblings()
            .removeClass('is-active')

        youtube.attr('src', `https://www.youtube.com/embed/${$(this).attr('key')}`)
    })
}

</script>