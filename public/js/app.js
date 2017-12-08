function favorites() {
    console.log("OK")
    /*
     * Check Favorites
     */
    $.each($('.favorite'), function (index, value) {

        // get value in key attribute
        let id =  $(this).attr('key')
        // get value in local storage that is named favorites
        let item = localStorage.getItem('favorites')

        // if the movie ID is in local storage change cross sign to plus sign
        if (item) {
            if (item.indexOf(id) >= 0) {
                $(this).addClass('icon-close')
                $(this).removeClass('icon-add')
            }
        }
    })


    /*
     * Add Movie to localStorage in browser
     */
    $('.favorite').on('click', function () {

        // get value in key attribute
        let id =  $(this).attr('key')
        // get value in local storage that is named favorites
        let item = localStorage.getItem('favorites')
        // pasrse string to JSON
        item = JSON.parse(item)

        /*
         * Remove Movie in browser
         */
        if (item) {
            if (item.indexOf(id) < 0) {
                
                // push the id move in item (JSON)
                item.push(id)
                // save string (that is form JSON) to local storage is named "favorites"
                localStorage.setItem('favorites', JSON.stringify(item));
                
                // change plus sign to cross sign
                $(this).addClass('icon-close')
                $(this).removeClass('icon-add')

            } else {
                /**
                 * Remove Movie in browser
                 */
                
                // find the index of ID
                let index = item.indexOf(id)
                // remove the index 1 number
                item.splice(index, 1)

                // save string (that is form JSON) to local storage is named "favorites"
                localStorage.setItem('favorites', JSON.stringify(item));

                // change cross sign to plus sign
                $(this).addClass('icon-add')
                $(this).removeClass('icon-close')
            }

            // send this and run this function
            favoritesPage.call(this)
        } else {
            // if local storage is nothing save the first ID is named Favorites
            localStorage.setItem('favorites', JSON.stringify([id]));

            $(this).addClass('icon-close')
            $(this).removeClass('icon-add')
        }

    })
}

function favoritesPage() {
    if ($('.movie-fav').length) {
        // go to image div
        let parent = $(this).parent().parent().parent()

        /**
         * if this has class "icon-add" (it's not added)
         * change image to grayscale
         */
        if ($(this).hasClass('icon-add')) {
            parent.css({
                "-webkit-filter": "grayscale(100%)",
                "filter": "grayscale(100%)"
            })
        } else {
        // if it's added, use the same color
            parent.css({
                "-webkit-filter": "initial",
                "filter": "initial"
            })
        }
    }
}

function shareIcon() {
    let iconShare = $('.icon-share')
    // when click sharing icon show sharing pop-up
    iconShare.on('click', function (e) {
        e.stopPropagation()
        $(this).toggleClass('is-active')

        /*
         * Remove Class is-active
         */
        var divMovie = $(this)
                        .parent()
                        .parent()
                        .parent()
                        .siblings()
    // if users click other div, remove pop-up(remove class "is-active")
        divMovie.find('.icon-share').removeClass('is-active')
    })

    $('body').on('click', function () {
        $(iconShare).removeClass('is-active')
    })
}

function updateSlide() {
    
    // current page
    let counter = 0
    // set the active div
    let element = $('.movie-list-body')
    // get value of right margin
    let marginRight = parseInt($('.movie').css("margin-right"))
    // find the width of movie-list body
    let width = element.width() + marginRight
    // find how many of div that has movie class
    let items = element.children('.movie').length 
    // find the width of div that has movie class
    let movieSize = $('.movie').width()
    // find the items is shown in movie-lsit-body
    let numWindow = Math.floor(width/movieSize)
    // find the max click
    let maxClick = Math.floor(items / numWindow)-1
    
    /**
     * if click left sign, decrease counter
     * if click right sign, increase counter
     */
    $("#left").on('click', moveSlide.bind(this, 'decrease'))
    $("#right").on('click', moveSlide.bind(this, 'increase'))
    
    function moveSlide(trigger) {
        
        switch (trigger) {
            case 'decrease': counter -= 1; break
            case 'increase': counter += 1; break
        }
        
        // if counter is less than 0, set it to be 0
        if (counter < 0 ) {
            counter = 0
            return false
        }

        // if counter is greater than max click, set it to be max click
        if (counter > maxClick) {
            counter = maxClick
            return false
        }
        
        /**
         * if the counter is equal to max click, 
         * translate movie-list-body div to items/numWindow-1
         */
        
        if (counter == maxClick) {
            counter = items/numWindow-1
        }

        element.css({
            "-webkit-transform":`translate(${counter*-width}px)`
        })

        // at counter is equal to items/numWindow-1, set it back to max click
        if (counter == items/numWindow-1) {
            counter = maxClick
        }

    }
}

function MenuHamburger() {
    /**
     * at moblie version, if click the Menuhamburger, nav bar is removed
     * , but click it agin nav bar is added again
     */ 
    $('.hamburger').on('click', function () {
        $(this).toggleClass('icon-menu icon-close')
        $('nav').toggleClass('is-visible')
    })
    /**
     * when click at list of nav bar, remove the nav bar list
     */
    $('nav li').on('click', function (e) {
        $('.hamburger').removeClass('icon-close')
        $('.hamburger').addClass('icon-menu')

        $('nav').removeClass('is-visible')

    })
}

MenuHamburger()

function render() {
    // render screen of the whole website
    console.log('render')
    favorites()
    updateSlide()
    shareIcon()
}