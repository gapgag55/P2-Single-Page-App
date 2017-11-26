<div class="home-page">
    <div class="container">
      <h1>Movies</h1>
      <h2>we create the movie searcher</h2>

      <div class="search-box">
          <input type="text" />
          <button>Search</button>
      </div>
    </div>

    <div class="movie-list">
      <ul class="poster">
        <?php for($i = 0; $i < 7; $i++): ?>
          <li>
            <a href="/movie/<?= $i; ?>">
              <div class="poster-pic" style="background-image:url(public/images/thor.jpg);"></div>
              <h3>Thor ranknarok</h3>
              <span>Fantasy 152 mins</span>
            </a>
          </li>
        <?php endfor; ?>
      </ul>
    </div>

    <div class="container">
      <ul class="point">
      <?php for($i = 0; $i < 7; $i++): ?>
          <li class="<?= ($i == 2) ? 'is-active': ''; ?>">
          </li>
        <?php endfor; ?>
      </ul>
      <div class="button-group">
        <a href="#"><i class="icon-arrow-left"></i>Comming Up Next</a>
        <a href="#">Top Rating Movie<i class="icon-arrow-right"></i></a>
      </div>
    </div>
</div>


<script>

</script>
