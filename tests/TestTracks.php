<?php

include '../vendor/autoload.php';
include 'LoadEnv.php';

use MonsterCat\Artists\Artists;
use MonsterCat\Tracks\Track;

function fetchTracksOfArtist(){

    $art_id = '5c5e4866-a4f3-4d5a-85bd-053ddf6eed5b';
    $artTrack = new MonsterCat\Artists\ArtistTracksGet($art_id);
    $tracks = $artTrack->call();

    var_dump($tracks);

}

fetchTracksOfArtist();