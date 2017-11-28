<div id="movie-single" class="movie-list-title"></div>

<script>
    let output = $('#movie-slide')
    let api = new MovieApi() 
    api.getById(<?= $id; ?>, function (data) {
        console.log(data.original_title)

        let result = `
            ${data.original_title}
            <div class="pointer">
                <i id="left" class="icon-pagi-left" /> 
                <i id="right" class="icon-pagi-right" /> 
            </div>
        `
        output.html(result)
    })
</script>