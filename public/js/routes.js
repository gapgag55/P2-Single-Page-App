function Router(app) {
    this.app = $(app)
    this.popState()
}

Router.prototype.load = function () {
  let name = window.location.pathname
  this.request(name, {name})
}

Router.prototype.render = function (response) {
  let self = this
  
  this.app.html(response)

  $('a').off('click').on('click', function (e) {
    e.preventDefault()

    let url  = $(this).attr('href')
    name = url

    if (name == '/home') name = '/'
    self.request(url, {name})

  })
}

Router.prototype.request = function (url, options) {
  this.loading()

  if (url == '/') {
    url = '/home'
    options.name = '/'
  }
  
  this.activeMenu(url);

  $.ajax({
    url: '/P2' + url
  }) 
  .done(function (response) {
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

Router.prototype.loading = function () {
  this.app.html(
    `<svg id="triangle" width="100px" height="100px" viewBox="-3 -4 39 39">
      <polygon 
        fill="#181818" 
        stroke="#FFFFFF" 
        stroke-width="0.5" 
        points="16,0 32,32 0,32"
      ></polygon>
    </svg>`
  )
}

Router.prototype.activeMenu = function(url) {

  let a = $(`header li a[href="${url}"]`)
  $(a.parent())
    .addClass('is-active')
    .siblings()
    .removeClass()
}

let router = new Router("#app")
router.load()