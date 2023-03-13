<?php

namespace MonsterCat\Methods\Artists;

use MonsterCat\Models\Artist;
use MonsterCat\Client;

/**
 * Description of ArtistUpdate
 *
 * @author darius
 */
class ArtistUpdate extends Client {
    public Artist $artist;

    const URI = '/artist/%s';

    public function __construct(Artist $artist = null) {
        $this->artist = $artist;
    }

    /**
     *
     * @throws Exception
     */
    public function call() {

        if (!$this->artist || !$this->artist->getId()) {
            throw new Exception('Artist is not set on ArtistUpdate');
        }

        $res = $this->post(
            (object)['Artist' => $this->artist],
            sprintf(static::URI, $this->artist->getId())
        );

        /**
         * $res will be empty on success
         * errors are caught on the post command
         */
        return $res ? false : true;
    }

    public function getArtist(): Artist {
        return $this->artist;
    }

    public function setArtist(Artist $artist): void {
        $this->artist = $artist;
    }

}