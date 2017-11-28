function MovieApi() {
    this.baseurl = 'https://api.themoviedb.org/3/movie/'
    this.key = 'aea1c02a2029aa398e2ea649ca42615a'
}

MovieApi.prototype.request = async function (api, data, callback) {
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
    let api  = this.baseurl + 'upcoming'
    let data = {language: 'en-US', page: 1}

    this.request(api, data, callback)
}

// MovieApi.prototype.getById = function (id) {
// }

// MovieApi.prototype.getByMonth = function () {
// }

// MovieApi.prototype.getbySearch = function (query) {
// }
