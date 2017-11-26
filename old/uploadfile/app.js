const API_KEY = 'กระเป๋า coach'// my API key
const BASE_URL = `https://www.googleapis.com/youtube/v3/search`//Base URL to sent API

// search function
function search() {
    //send API to request information 
    $.get(BASE_URL, {
        // the imformation that youtube request
        q: $('#Seach-Box').val(),// searching key word 
        part: 'snippet', 
        maxResults: 50, // get 50 video 
        key: API_KEY // my API key
    }).done(function (response) {
        // if it's success, do this function
        var element = $('#resultSearch') // get id form HTML
        element.html('') // to clear the resultSearch area to be emtyp every time that users search new things
        $.each(response.items, function (index, item) {
            console.log(item)
            // loop to spread each result of searching (50 items) to each card ( card in bootstrap ) 
            let html = `<div  class="row">
            <div class="card">
                <div class="card-body row">
                    <div class="col-2">
                        <div class="bg" style="background-image:url(${item.snippet.thumbnails.high.url});"></div>
                    </div>
                    <div class="col-10">
                        <h4 class="card-title">${item.snippet.title}</h4>
                        <p class="card-text">${item.snippet.description}</p>
                        <a href="https://www.youtube.com/embed/${item.id.videoId}" class="btn btn-primary">URL</a>
                    </div>
                </div>
            </div>
        </div>`
        element.append(html) // add each card in to resultSearch area
        })
    });
}