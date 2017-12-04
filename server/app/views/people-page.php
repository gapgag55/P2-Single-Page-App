<div class="container people">
    <div class="movie-list-title">
        Popular People
    </div>
    <div id="largest-page" class="movie-list-body"></div>
    <div id="popup" class="popup">
        <div class="wrapper"></div>
    </div>
</div>

<script>
    // create new API object
    var api = new MovieApi()
    // set the output area
    var output = $('#largest-page')
    // initail the page for loading
    var page = 1

    //sending PersonPopular
    api.getPersonPopular({page})
        .then(function (data) {
            // create display form result that return from send API
            let results = data.results.map(display)
            // set results in output area
            output.html(results)
        })
        .then(function () {
            $(window).scroll(function() {
                /**
                 * if scrolling height is equal to html height
                 * add 1 to page variable
                 * then send new API by using new page value
                 * show the result of sending API
                 * then create sharing button
                 */
                if($(window).scrollTop() + $(window).height() == $(document).height()) {
                    page += 1
                    api.getPersonPopular({page})
                        .then(function(data) {
                            let results = data.results.map(display)
                            output.append(results)
                        })
                        .then(function () {
                            // do the function pop when it is clicked
                            popup()
                        })
                }
            });
        })
        .then(function () {
            // do the function pop when it is clicked
            popup()
            render()
        })

    // the movie-list form to show the information from requesting API
    function display(item) {
        return `
            <div class="movie" key=${item.id}>
                <div class="movie-img" style="background-image: url(https://image.tmdb.org/t/p/w500/${item.profile_path})">
                </div>
                <div class="movie-info">
                    <div class="movie-title">${item.name}</div>
                    <div class="movie-detail">Popularity: ${item.popularity}</div>
                </div>           
            </div>
        `
    }


    function popup() {
        // set the people area
        var people = $('.people .movie')
        // set the pop-up area
        var popup = $('#popup')
        // set the area of pop-up
        var wrapper = popup.children('.wrapper')

        /**
         * if click body of page remove pop-up
         * and set overflow-y to be scroll
         */ 
        $('body').on('click', function () {
            popup.removeClass('is-visible')
            $('body').css("overflow-y","scroll")
        })
        /**
         * when click on pop-up, don't remove itself
         */
        wrapper.on('click', function (e) {
            e.stopPropagation()
        })
        /**
         * when click on people list, show pop-up
         */
        people.on('click', function (e) {
            var link = ''
            /**
             * set the page body can't overflow
             */
            $('body').css('overflow-y', 'hidden')
            /**
             * when click on pop-up, don't remove itself
             */
            e.stopPropagation()
            popup.addClass('is-visible')
            /**
             * loading text while sending AJAX
             */
            wrapper.html('<div class="load">Loading...</div>')
            
            // get Personal Detail by using key paramiter of people list 
            api.getPersonDetail($(this).attr('key'))
                .then(function (data) {
                    // if the actors or actresses have their website show it
                    if( data.homepage ) {
                        link = `<div id="people-link" onclick="window.open("${data.homepage}", "_blank", "")">${data.homepage}</a>`
                    }
                    // output form to show the data
                    var output = `
                        <i class="icon-close"></i>
                        <div class="flex">
                            <div id="people-avatar" class="left bg" style="background-image: url(https://image.tmdb.org/t/p/w500/${data.profile_path})"></div> 
                            <div class="right">
                                <h3 id="people-title">${data.name}</h3>
                                <span id="people-popularity">popularity: ${data.popularity}</span>
                                <p id="people-detail">${data.biography}</p>
                                ${link}
                            </div>
                        </div>`
                    // set the wrapper div to be the personal detail
                    wrapper.html(output)
                    // when click cross button, close the pop-up
                    $('.icon-close').on('click', function () {
                        popup.removeClass('is-visible')
                        $('body').css('overflow-y','scroll')
                    })
                })
        })
    }

</script>