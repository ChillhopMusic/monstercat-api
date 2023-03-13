<?php
include '../vendor/autoload.php';
include 'LoadEnv.php';

use MonsterCat\Client;
use MonsterCat\Methods\Artists\ArtistCoverUpdate;
use MonsterCat\Methods\Artists\ArtistInsert;
use MonsterCat\Methods\Artists\ArtistUpdate;
use MonsterCat\Models\Artist;
use MonsterCat\Methods\Artists\Artists;

getAllArtists();
updateSingleArtist();
insertSingleArtist();
updateCoverArtist();

/**
 *
 * @return MonsterCat\Models\Artists\Artist[]
 */
function getAllArtists() {
    /**
     * Get a list
     */
    $arts    = new Artists();
    $arts->setLimit(10);
    $artists = $arts->call('aso');
    $arts->echo(
        sprintf('Got %s artists', count($artists)),
        Client::MSG_TYPE_INFO
    );

    return $artists;
}

/**
 *
 * @return MonsterCat\Models\Artist
 */
function getSingleArtist() {
    /**
     * Get a single
     */
    $art_id = '5c5e4866-a4f3-4d5a-85bd-053ddf6eed5b';
    /** @var \MonsterCat\Artists\Artist $first */
    $ag     = new \MonsterCat\Methods\Artists\ArtistGet($art_id);
    $ag->echo(
        sprintf('Getting artist %s', $art_id),
        Client::MSG_TYPE_INFO
    );
    $artist = $ag->call();
    if ($artist) {
        $ag->echo(
            sprintf('Got artist %s', $artist->getName()),
            Client::MSG_TYPE_SUCCESS
        );
    }

    return $artist;
}

function updateSingleArtist() {
    /**
     * Update a single artist
     */
    $art = getSingleArtist();
    if(!$art){
        return false;
    }
    $art->setName('Testing name ' . time());

    $ag  = new ArtistUpdate($art);
    $ag->echo(
        sprintf('Updating artist %s', $art->getId()),
        Client::MSG_TYPE_INFO
    );
    $res = $ag->call();
    if ($res) {
        $ag->echo(
            sprintf('Updated the artist'),
            $res ? Client::MSG_TYPE_SUCCESS : Client::MSG_TYPE_ERROR
        );
    }
}

function insertSingleArtist() {

    $art = new Artist();
    $art->setName('Darius Test');
    $art->setURI('this-is-a-uri-' . time());

    $ains = new ArtistInsert($art);

    $ains->echo(
        sprintf('Inserting artist %s', $art->getName()),
        Client::MSG_TYPE_INFO
    );

    $res = $ains->call();
    if ($res) {
        $ains->echo(
            sprintf('Inserted artist %s', $res),
            Client::MSG_TYPE_SUCCESS
        );
    }
}

function updateCoverArtist() {

    $art_id = '5c5e4866-a4f3-4d5a-85bd-053ddf6eed5b';

    $ains = new ArtistCoverUpdate($art_id);
    $ains->setImage(dirname(__FILE__) . '/assets/image.jpg');
    $ains->echo(
        sprintf('Updating the cover of %s', $art_id),
        Client::MSG_TYPE_INFO
    );
    $res  = $ains->call();
    $ains->echo(
        sprintf('Updated cover ', PHP_EOL, $art_id, PHP_EOL),
        $res ? Client::MSG_TYPE_SUCCESS : Client::MSG_TYPE_ERROR
    );
}
