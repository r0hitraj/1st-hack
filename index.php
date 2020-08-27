<?php
    $Page = [
        "title" => "MyMusic"
    ];

    require_once("models/SpotifyStats.php");
    require_once("models/include/header.php");

    if ($User['valid']) {
?>

<div class="text-center">
    <h1 class="display-4 mt-5 bold">Time to jam!</h1>
    <h3 class="mt-1">What's good this week? <i class="fas fa-music"></i></h3>
</div>

<div class="mt-5 pl-5 pr-5 container wide">
    <h4 class="mb-4">Weekly Tracks</h4>
    <div class="row">
        <?php foreach (getTopSongs("short_term", 6) as $a) { ?>
            <div class="col-2">
                <div class="card mb-3">
                    <div class="view overlay zoom">
                        <img class="card-img-top cover" src=<?php echo "'".$a['image']."'" ?>>
                        <a href=<?php echo "'".$a['link']."'" ?>>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title song-title"><?php echo $a['name'] ?></h4>
                        <p class="card-text song-sub"><?php echo $a['artist'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <p class="float-right"><a href="tracks.php">View More & History <i class="ml-1 fas fa-arrow-right"></i></a></p>

    <h4 class="mb-4 mt-4">Weekly Artists</h4>
    <div class="row">
        <?php foreach (getTopArtist("short_term", 6) as $a) { ?>
            <div class="col-2">
                <div class="card mb-3">
                    <div class="view overlay zoom">
                        <img class="card-img-top cover" src=<?php echo "'".$a['image']."'" ?>>
                        <a href=<?php echo "'".$a['link']."'" ?>>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title song-title"><?php echo $a['name'] ?></h4>
                        <p class="card-text song-sub"><?php echo $a['followers'] ?> Followers</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <p class="float-right"><a href="artists.php">View More & History <i class="ml-1 fas fa-arrow-right"></i></a></p>
</div>

<?php } else { ?>

<div class="text-center">
    <h1 class="display-4 mt-5 bold">Music Speaks</h1>
    <h3 class="mt-1">What have you been listening to?</h3>
</div>

<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><a>Let's Jump In!</a></h4>
                    <p class="card-text">Signing in will allow you to view statistics about the music and artists you listen to on Spotify. Your token is stored locally and is not saved on any server, feel free to take a look at the code in the <a href="https://github.com/MastaCoder/mySpotify">GitHub Repo.</a></p>
                    <a href="auth.php" class="btn btn-primary"><i class="fab fa-spotify"></i> Login with Spotify</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>

<?php require_once("models/include/footer.php"); ?>
