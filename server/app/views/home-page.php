<div class="container home-page">
    <h1>Movies</h1>
    <h2>we create the movie searcher</h2>

    <div class="search-box">
        <input type="text" />
        <button>Search</button>
    </div>
</div>
<div class="movie-list">
  <ul>
    <?php for($i = 0; $i < 6; $i++): ?>
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


<script>
 
</script>