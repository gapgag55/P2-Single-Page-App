function MovieApi() {
    this.baseurl = 'https://api.themoviedb.org/3/'
    this.key = 'aea1c02a2029aa398e2ea649ca42615a'
}

MovieApi.prototype.request = function (api, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: api,
            method: "GET",
            data: Object.assign({}, data, {api_key: this.key})
        })
        .done(function(response) {
            resolve(response)
        })
        .fail(function(error) {
            reject(error)
        })
    })
}

MovieApi.prototype.getUpComing = function ( ) {
    return this.request(this.baseurl + 'movie/upcoming', null)
}

MovieApi.prototype.getTopRate = function (data) {
    return this.request(this.baseurl + 'movie/top_rated', data)
}

MovieApi.prototype.getNowPlaying = function (data) {
    return this.request(this.baseurl + 'movie/now_playing', data)
}

MovieApi.prototype.getById = function (id) {
    return this.request(this.baseurl + 'movie/' + id, null)
}

MovieApi.prototype.getbySearch = function (query) {
    return this.request(this.baseurl + 'search/movie', {query})
}

MovieApi.prototype.getCredits = function (id) {
    return this.request(this.baseurl + 'movie/'+ id +'/credits', null)
}

MovieApi.prototype.getYoutube = function(query) {
    return this.request(
        'https://www.googleapis.com/youtube/v3/search',
        {
            part: 'snippet',
            q: query,
            type: 'video',
            key: 'AIzaSyDzYWi9z8tE9VodwcNcYAQdUEtvpx3UwvQ',
            maxResults: 12
        })
}

MovieApi.prototype.getComment = function(title) {
    return this.request( '/P2/twitter/' + title, null)
}

MovieApi.prototype.getSpotify = function(title) {
    return this.request( '/P2/spotify/' + title, null)
}

MovieApi.prototype.getPersonPopular = function (data) {
    return this.request(this.baseurl + 'person/popular', data)
}

MovieApi.prototype.getPersonDetail = function (id) {
    return this.request(this.baseurl + 'person/' + id, null)
}