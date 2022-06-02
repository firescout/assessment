<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './models/Movie.php';
$movies = Movie::getData();
$filters = Movie::getFilters($movies);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Movies</title>
        <link href="dist/css/select2.min.css" rel="stylesheet" />
        <link href="dist/css/main.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="dist/js/select2.min.js"></script>
        <script src="dist/js/main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </head>
    <body class="d-flex flex-column h-100">
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                </div>
            </div>
        </header>

        <main>
            <section class="py-5 container">
                <div class="row">
                    <div class="col-md-10">
                        <h3>Search By</h3>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="changeView">
                            <label class="form-check-label" for="changeView">Grid view</label>
                        </div>
                    </div>
                </div>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-title-tab" data-bs-toggle="tab" data-bs-target="#nav-title" type="button" role="tab" aria-controls="nav-title" aria-selected="true" onclick="clearSelects()">Title</button>
                    <button class="nav-link" id="nav-genres-tab" data-bs-toggle="tab" data-bs-target="#nav-genres" type="button" role="tab" aria-controls="nav-genres" aria-selected="false" onclick="clearSelects()">Genres</button>
                    <button class="nav-link" id="nav-actors-tab" data-bs-toggle="tab" data-bs-target="#nav-actors" type="button" role="tab" aria-controls="nav-actors" aria-selected="false" onclick="clearSelects()">Actors</button>
                    <button class="nav-link" id="nav-year-tab" data-bs-toggle="tab" data-bs-target="#nav-year" type="button" role="tab" aria-controls="nav-year" aria-selected="false" onclick="clearSelects()">Year</button>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-title" role="tabpanel" aria-labelledby="nav-title-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-10">
                                <select class="title_filter form-control">
                                    <?php foreach($filters['titles'] as $filter) : ?>
                                        <option value="<?= $filter; ?>"><?= $filter; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="d-grid gap-2 mx-auto">
                                    <button  onclick="clearSelects()" class="btn btn-primary" type="button">clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-genres" role="tabpanel" aria-labelledby="nav-genres-tab">
                        <div class="row">
                            <div class="col-lg-10">
                                <select class="genres_filter form-control" multiple="multiple">
                                    <?php foreach($filters['genres'] as $filter) : ?>
                                        <option value="<?= $filter; ?>"><?= $filter; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="d-grid gap-2 mx-auto">
                                    <button  onclick="clearSelects()" class="btn btn-primary" type="button">clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-actors" role="tabpanel" aria-labelledby="nav-actors-tab">
                        <div class="row">
                            <div class="col-lg-10">
                                <select class="actors_filter" multiple="multiple">
                                    <?php foreach($filters['actors'] as $k=>$v) : ?>
                                        <option value="<?= $k; ?>"><?= $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="d-grid gap-2 mx-auto">
                                    <button  onclick="clearSelects()" class="btn btn-primary" type="button">clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-year" role="tabpanel" aria-labelledby="nav-year-tab">
                        <div class="row">
                            <div class="col-lg-10">
                                <select class="year_filter" multiple="multiple">
                                    <?php foreach($filters['year'] as $item) : ?>
                                        <option value="<?= $item; ?>"><?= $item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <div class="d-grid gap-2 mx-auto">
                                    <button  onclick="clearSelects()" class="btn btn-primary" type="button">clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-content">
                    <hr />
                    <div class="row">
                        <?php foreach ($movies as $key => $movie) : ?>
                            <div class="col-md-2 movie" data-title="<?= $movie['title']; ?>" data-genres="<?= implode(' ', $movie['genres']); ?>" data-year="<?= $movie['year']; ?>" data-actors="<?= implode(' ', str_replace(' ','_',$movie['actors'])); ?>">
                                <div class="movie-item">
                                    <div class="row">
                                        <div class="movie-poster-wrapper col-12">
                                            <div class="movie-poster" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='updateModal(<?= $key; ?>)'>
                                                <img src="<?= $movie['posterurl']; ?>" alt="<?= $movie['title']; ?>" />
                                            </div>
                                        </div>
                                        <div class="movie-content col-8">
                                            <h2><?= $movie['title']; ?></h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h5>Story</h5>
                                                    <p><?= $movie['storyline']; ?></p>
                                                </div>                                        
                                                <h5>Actors</h5>
                                                <div class="col-md-12 text-center">
                                                    <?php foreach($movie['actors'] as $actor) : ?>
                                                        <span class="badge rounded-pill text-bg-secondary"><?= $actor; ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                                <h5>Genres</h5>
                                                <div class="col-md-12 text-center">
                                                    <?php foreach($movie['genres'] as $genre) : ?>
                                                        <span class="badge rounded-pill text-bg-secondary"><?= $genre; ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="col-md-12 clearboth">
                                                    <p class="text-left float-left"><small class="bold modal-year"><?= $movie['year']; ?></small></p>
                                                    <p class="text-right float-right"><small class="bold modal-rated"><?= ($movie['contentRating'] != '') ? 'Rated: ': ''; ?><?= $movie['contentRating']; ?></small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 text-left movie-grid-content">
                                            <p><small><?= $movie['year']; ?></small></p>
                                        </div>
                                        <div class="col-6 text-right movie-grid-content">
                                            <p><small><?= ($movie['contentRating'] != '') ? 'Rated: ': ''; ?><?= $movie['contentRating']; ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>       
                    </div>
                </div>
            </section>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <img class="modal-poster" src="" alt="" />
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5>Story</h5>
                                            <p class="modal-story"></p>
                                        </div>                                        
                                        <h5>Actors</h5>
                                        <div class="col-md-12 text-center modal-actors">
                                        </div>
                                        <h5>Genres</h5>
                                        <div class="col-md-12 text-center modal-genre">
                                        </div>
                                        <div class="col-md-12 clearboth">
                                            <p class="text-left float-left"><small class="bold modal-year"></small></p>
                                            <p class="text-right float-right"><small class="bold modal-rated"></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var movies = <?= json_encode($movies); ?>;
                function updateModal(key) {
                    clearModal();
                    var movie = movies[key];
                    $('.modal-title').text(movie.title);
                    $('.modal-year').text(movie.year);
                    $('.modal-story').text(movie.storyline);
                    $('.modal-poster').attr('src',movie.posterurl).attr('alt', movie.title);
                    if (movie.contentRating) {
                        $('.modal-rated').text('Rated: '+movie.contentRating);
                    }
                    $.each(movie.genres, function(k,item){
                        $('.modal-genre').append('<span class="badge rounded-pill text-bg-secondary">'+item+'</span> ');
                    });
                    $.each(movie.actors, function(k,item){
                        $('.modal-actors').append('<span class="badge rounded-pill text-bg-primary">'+item+'</span> ');
                    });
                }
            </script>
        </main>

        <footer class="footer mt-auto py-3 text-muted">
            <div class="container">
            </div>
        </footer>
    </body>
</html>