<div class="container people">
    <div class="movie-list-title">
        Popular People
    </div>
    <div id="largest-page" class="movie-list-body"></div>
    <div id="popup" class="popup">
        <div class="wrapper">
            <i class="icon-close"></i>
            <div class="flex">
                <div id="people-avatar" class="left bg"></div> 
                <div class="right">
                    <h3 id="people-title"></h3>
                    <span id="people-popularity"></span>
                    <p id="people-detail"></p>
                    <div id="people-link"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var api = new MovieApi()
var output = $('#largest-page')

api.getPersonPopular(function (data) {
    let results = data.results.map(function (item, index) {
        return `
        <div class="movie" key=${item.id}>
            <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.profile_path})">
            </div>
            <div class="movie-info">
                <div class="movie-title"><a href="/person/${item.id}">${item.name}</a></div>
                <div class="movie-detail">Popularity: ${item.popularity}</div>
            </div>           
        </div>
        `
    })

    output.html(results)
    popup()
    render()
})

function popup() {
    var people = $('.people .movie')
    var name = $('#people-title')
    var avatar = $('#people-avatar')
    var popularity = $('#people-popularity')
    var detail = $('#people-detail')
    var link = $('#people-link')

    var popup = $('#popup')
    var icon  = $('.icon-close')

    icon.on('click', function () {
        popup.removeClass('is-visible')
    })

    $('body').on('click', function () {
        popup.removeClass('is-visible')
    })

    popup.children('.wrapper').on('click', function (e) {
        e.stopPropagation()
    })

    people.on('click', function (e) {
        e.stopPropagation()

        resetPopup()
        popup.addClass('is-visible')
    
        api.getPersonDetail($(this).attr('key'), function (data) {
            name.html(data.name)
            avatar.css({
                'background-image': `url(https://image.tmdb.org/t/p/w500/${data.profile_path})`
            })
            popularity.html('popularity: ' + data.popularity)
            detail.html(data.biography)
            link.attr('href', data.homepage)
            link.html(data.homepage)
            link.attr('onclick', `window.open("${data.homepage}", "_blank", "")`)
        })
    })

    function resetPopup() {
        name.html('')
        avatar.css({
            'background-image': `url()`
        })
        popularity.html('')
        detail.html('')
        link.attr('')
        link.html('')
        link.attr('')
    }
}

</script>