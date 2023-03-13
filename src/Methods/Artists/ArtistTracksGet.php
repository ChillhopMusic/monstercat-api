<?php


namespace MonsterCat\Methods\Artists;

use \MonsterCat\Client;

/**
 * Description of ArtistTracksGet
 *
 * @author darius
 */
class ArtistTracksGet extends Client {
    public string $artistId;

    const URI = '/artist/%s/tracks';

    public function __construct(string $artistId) {
        $this->artistId = $artistId;
    }

    /**
     * Returns a list of track that belong to the artist.
     * 
     * @return \MonsterCat\Tracks\Track
     */
    public function call() {

        $response = $this->get(null, sprintf(static::URI, $this->artistId));

        if (!isset($response['Tracks'])) {
            return [];
        }

        $tracks     = [];
        $tracksRows = $response['Tracks']['Data'];
        foreach ($tracksRows as $row) {
            $tracks[] = new \MonsterCat\Tracks\Track($row);
        }
        return $tracks;
    }

    public function getArtistId(): string {
        return $this->artistId;
    }

    public function setArtistId(string $artistId): void {
        $this->artistId = $artistId;
    }

}