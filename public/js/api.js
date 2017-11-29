function MovieApi() {
    this.baseurl = 'https://api.themoviedb.org/3/'
    this.key = 'aea1c02a2029aa398e2ea649ca42615a'
}

MovieApi.prototype.request = async function (api, data, callback) {
    $.ajax({
        url: this.baseurl + api,
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
    let data = {language: 'en-US', page: 1}
    this.request('movie/upcoming', data, callback)
}

MovieApi.prototype.getTopRate = function (callback) {
    this.request('movie/top_rated', null, callback)
}

MovieApi.prototype.getById = function (id, callback) {
    this.request('movie/' + id, null, callback)
}

// MovieApi.prototype.getByMonth = function () {
// }

MovieApi.prototype.getbySearch = function (query, callback) {
    this.request('search/movie', {query: query}, callback)
}
