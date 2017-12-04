
function Router(app) {
    this.app = $(app)
    this.popState()
}
// load home page at first time entry
Router.prototype.load = function () {
  let name = window.location.pathname
  this.request(name, {name})
}

// use for go to each page by using nav bar
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

/**
 * send request router.php and then go to controller
 * and then return the page(php) in view
 */ 
Router.prototype.request = function (url, options) {
  this.loading()
  
  // if user input "/" return homepage
  if (url == '/') {
    url = '/home'
    options.name = '/'
  }
  
  // active hyper link in menu line 
  this.activeMenu(url);

  //delay for loading screen
  setTimeout(function() {
    $.ajax({
      url: '/P2' + url
    }) 
    .done(function (response) {
      // collect state of webpage for going to previous state
      history.pushState(
        {data: response},
        options.name, 
        options.name.replace(/\s/g, '-').toLowerCase()
      )
      
      this.render(response)
    }.bind(this))
  }.bind(this), 900)
}

// use for back button on browser 
Router.prototype.popState = function () {
  window.addEventListener('popstate', function(event) {
    this.render(event.state.data)

  }.bind(this));
}

//  use for loading screen
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

// set active menu bar in page that is openning
Router.prototype.activeMenu = function(url) {

  let a = $(`header li a[href="${url}"]`)
  $(a.parent())
    .addClass('is-active')
    .siblings()
    .removeClass()
}

// set the output area of AJAX 
let router = new Router("#app")
router.load()