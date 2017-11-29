function Favorites() {
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

function render() {
    Favorites()
}