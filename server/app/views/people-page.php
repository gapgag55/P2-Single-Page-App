<div class="container people">
    <div class="movie-list-title">
        Popular People
    </div>
    <div id="largest-page" class="movie-list-body"></div>
    <div id="popup" class="popup">
        <div class="wrapper"></div>
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
                <div class="movie-title">${item.name}</div>
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
    var popup = $('#popup')
    var wrapper = popup.children('.wrapper')

    $('body').on('click', function () {
        popup.removeClass('is-visible')
    })

    wrapper.on('click', function (e) {
        e.stopPropagation()
    })

    people.on('click', function (e) {
        var link = ''

        e.stopPropagation()
        popup.addClass('is-visible')
        wrapper.html('<div class="load">Loading...</div>')
    
        api.getPersonDetail($(this).attr('key'), function (data) {
          
            if( data.homepage ) {
                link = `<div id="people-link" onclick="window.open("${data.homepage}", "_blank", "")">${data.homepage}</a>`
            }

           var output = `
                <i class="icon-close"></i>
                <div class="flex">
                    <div id="people-avatar" class="left bg" style="background-image: url(https://image.tmdb.org/t/p/w500/${data.profile_path})"></div> 
                    <div class="right">
                        <h3 id="people-title">${data.name}</h3>
                        <span id="people-popularity">popularity: ${data.popularity}</span>
                        <p id="people-detail">${data.biography}</p>
                        ${link}
                    </div>
                </div>`

            wrapper.html(output)

            var icon  = $('.icon-close')
            icon.on('click', function () {
                popup.parent().removeClass('is-visible')
            })
        })
    })
}

</script>