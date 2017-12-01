<div class="container">
    <div class="movie-list-title">
        Popular People
    </div>
    <div id="largest-page" class="movie-list-body"></div>
</div>

<script>
var api = new MovieApi()
var output = $('#largest-page')

api.getPersonPopular(function (data) {
    let results = data.results.map(function (item) {
            return `
            <div class="movie">
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
})

render()
</script>