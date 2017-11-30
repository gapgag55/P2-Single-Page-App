function favorites() {
    /*
     * Check Favorites
     */
    $.each($('.favorite'), function (index, value) {

        let id =  $(this).attr('key')
        let item = localStorage.getItem('favorites')

        if (item) {
            if (item.indexOf(id) >= 0) {
    
                $(this).addClass('icon-close')
                $(this).removeClass('icon-add')
            }
        }
    })


    /*
     * Add Movie to cookie in browser
     */
    $.each($('.favorite'), function (index, value) {
        $(value).on('click', function () {

            let id =  $(this).attr('key')
            let item = localStorage.getItem('favorites')
            item = JSON.parse(item)

            if (item) {
                if (item.indexOf(id) < 0) {
                    /*
                     * Add Movie to browser
                     */
                    item.push(id)
                    localStorage.setItem('favorites', JSON.stringify(item));
                    
                    $(this).addClass('icon-close')
                    $(this).removeClass('icon-add')
                } else {
                    /*
                     * Remove Movie in browser
                     */
                    let index = item.indexOf(id)
                    item.splice(index, 1)

                    localStorage.setItem('favorites', JSON.stringify(item));

                    $(this).addClass('icon-add')
                    $(this).removeClass('icon-close')
                }
            } else {
                localStorage.setItem('favorites', JSON.stringify([id]));

                $(this).addClass('icon-close')
                $(this).removeClass('icon-add')
            }
        })
    })
}

function shareIcon() {
    let iconShare = $('.icon-share')
   
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

        divMovie.find('.icon-share').removeClass('is-active')
    })

    $('body').on('click', function () {
        $(iconShare).removeClass('is-active')
    })
}

function updateSlide() {
    
    let counter = 0
    let element = $('.movie-list-body')
    let width = element.width() + 10
    let items = element.children('.movie').length 
    let maxClick = Math.floor(items / 5)-1

    $("#left").on('click', moveSlide.bind(this, 'decrease'))
    $("#right").on('click', moveSlide.bind(this, 'increase'))

    function moveSlide(trigger) {

        switch (trigger) {
            case 'decrease': counter -= 1; break
            case 'increase': counter += 1; break
        }

        if (counter < 0 ) {
            counter = 0
            return false
        }
        if (counter > maxClick) {
            counter = maxClick
            return false
        }
        if (counter == maxClick) {
            counter = items/5-1
        }

        element.css({
            "-webkit-transform":`translate(${counter*-width}px)`
        })

        if (counter == items/5-1) {
            counter = maxClick
        }

    }
}

function render() {
    favorites()
    updateSlide()
    shareIcon()
}