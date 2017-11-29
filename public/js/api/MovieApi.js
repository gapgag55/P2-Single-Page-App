function MovieApi() {
    this.baseurl = 'https://api.themoviedb.org/3/'
    this.youtube = 'https://www.googleapis.com/youtube/v3/videos?id=7lCDEYXw3mM&key=YOUR_API_KEY'
    this.key = 'aea1c02a2029aa398e2ea649ca42615a'
}

MovieApi.prototype.request = function (api, data, callback) {
    $.ajax({
        url: api,
        method: "GET",
        data: Object.assign({}, data, {api_key: this.key})
    })
    .done(function(response) {
        callback(response)
    })
    .fail(function(error) {
        callback(error)
    })
}

MovieApi.prototype.getUpComing = function (callback) {
    this.request(this.baseurl + 'movie/upcoming', null, callback)
}

MovieApi.prototype.getTopRate = function (callback) {
    this.request(this.baseurl + 'movie/top_rated', null, callback)
}

MovieApi.prototype.getById = function (id, callback) {
    this.request(this.baseurl + 'movie/' + id, null, callback)
}

// MovieApi.prototype.getByMonth = function () {
// }

MovieApi.prototype.getbySearch = function (query, callback) {
    this.request(this.baseurl + 'search/movie', {query: query}, callback)
}

MovieApi.prototype.getCredits = function (id, callback) {
    this.request(this.baseurl + 'movie/'+ id +'/credits', null, callback)
}

MovieApi.prototype.getYoutube = function(query, callback) {
    this.request(
        'https://www.googleapis.com/youtube/v3/search',
        {
            part: 'snippet',
            q: query,
            key: 'AIzaSyDzYWi9z8tE9VodwcNcYAQdUEtvpx3UwvQ',
            maxResults: 12
        },
        callback)
}