function MovieApi() {
    this.baseurl = 'https://api.themoviedb.org/3/'
    this.key = 'aea1c02a2029aa398e2ea649ca42615a'
}

MovieApi.prototype.request = function (api, data, callback) {
    $.ajax({
        url: api,
        method: "GET",
        async: false,
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

MovieApi.prototype.getNowPlaying = function (callback) {
    this.request(this.baseurl + 'movie/now_playing', null, callback)
}

MovieApi.prototype.getPersonPopular = function (callback) {
    this.request(this.baseurl + 'person/popular', null, callback)
}

MovieApi.prototype.getById = function (id, callback) {
    this.request(this.baseurl + 'movie/' + id, null, callback)
}

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
            type: 'video',
            key: 'AIzaSyDzYWi9z8tE9VodwcNcYAQdUEtvpx3UwvQ',
            maxResults: 12
        },
        callback)
}

MovieApi.prototype.getComment = function(title, callback) {
    setTimeout(() => {
        this.request( '/P2/twitter/' + title, null, callback)
    }, 500);
}

MovieApi.prototype.getSpotify = function(title, callback) {
    setTimeout(() => {
        this.request( '/P2/spotify/' + title, null, callback)
    }, 300);
}