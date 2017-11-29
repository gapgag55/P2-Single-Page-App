    <div id="movie-single" class="movie-single">
        <i class="icon-line"></i>
    <div class="movie-list-title">
        The snowman
        <div class="pointer">
            <i id="left" class="icon-add" /> 
            <i id="right" class="icon-share" /> 
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="bg" style="background-image: url(https://image.tmdb.org/t/p/w500/tDgxknTVwrScxpCYyGUjXSn5NRk.jpg);"></div>
            <div class="group">
                <b>Director</b>
                <p>Lee Unkrich, Adrian Molina (co-director)</p>
                <b>Writer</b>
                <p>Lee Unkrich (original story by), Jason Katz (original story by)</p>
                <b>Stars</b>
                <p>Anthony Gonzalez, Gael García Bernal, Benjamin Bratt</p>
            </div>
        </div>
        <div class="col-9">
            <div class="youtube row">
                <div class="col-9">
                    <iframe width="560" height="400" src="https://www.youtube.com/embed/r0YyR0_SG5k" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-3">
                    <ul>
                        <li>Play list</li>
                    </ul>
                </div>
            </div>
            <div class="border-bottom"></div>  
            <div class="border-bottom">
                <b>Rating: 8.5/10 </b>
                <p>"A mysterious guide escorts an enthusiastic adventurer and his friend into the Amazon jungle, but their journey turns into a terrifying ordeal as the darkest elements of human nature and the deadliest threats of the wild force them to fight for survival."</p>
            </div>
            <div class="spotify border-bottom">
                <iframe src="https://open.spotify.com/embed?uri=spotify:user:spotify:playlist:3rgsDhGHZxZ9sB9DQWQfuf" height="380" frameborder="0" allowtransparency="true"></iframe>
            </div>
            <div class="twitter">
                <b>Comment <span>67% talked Good From 1,200 comments</span></b>
                <ul class="row">
                    <?php for($i = 0; $i < 10; $i++): ?>
                    <li class="row col-6">
                        <div class="col-3">
                            <div class="bg" style="background-image: url(https://image.tmdb.org/t/p/w500/tDgxknTVwrScxpCYyGUjXSn5NRk.jpg)"></div>
                        </div>
                        <div class="col-9">
                            <b>Buri</b>
                            <p>Burdened with glorious purpose #loki #thorragnarok </p>
                        </div>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>

</div>


<script>
    // let output = $('#movie-single')
    let api = new MovieApi() 
    api.getById(<?= $id; ?>, function (data) {
        console.log(data)
        // let result = `
        //     ${data.original_title}
        //     <div class="pointer">
        //         <i id="left" class="icon-add" /> 
        //         <i id="right" class="icon-share" /> 
        //     </div>
        // `
        // output.html(result)
    })
</script>