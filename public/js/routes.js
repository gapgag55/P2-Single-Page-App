function Router(app) {
    this.app = $(app)
    this.popState()
}

Router.prototype.load = function () {
  let name = window.location.pathname

  if (name == '/') {
    return this.request('/home', { 
      name: '/' 
    })
  }

  this.request(name, {name})
}

Router.prototype.render = function (response) {
  let self = this
  
  this.app.html(response)

  $('a').on('click', function (e) {
    e.preventDefault()

    let url  = $(this).attr('href')
    let name = $(this).attr('name')

    self.request(url, {name})
    return false
  })
}

Router.prototype.request = function (url, options) {

  $.ajax({
    url: '/P2' + url
  }) 
  .done(function (response) {

    console.log(history)

    history.pushState(
      {data: response},
      options.name, 
      options.name.replace(/\s/g, '-').toLowerCase()
    )

    this.render(response)
  }.bind(this))
}

Router.prototype.popState = function () {
  window.addEventListener('popstate', function(event) {
    this.render(event.state.data)

  }.bind(this));
}

let router = new Router("#app")
router.load()
