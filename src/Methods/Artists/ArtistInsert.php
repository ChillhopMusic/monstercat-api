<?php

namespace MonsterCat\Methods\Artists;

use MonsterCat\Models\Artist;
use MonsterCat\Client;

/**
 * Description of ArtistUpdate
 *
 * @author darius
 */
class ArtistInsert extends Client {
    public Artist $artist;

    const URI = '/artist';

    public function __construct(Artist $artist = null) {
        $this->artist = $artist;
    }

    /**
     * Inserts an artist and returns the ID as string
     * 
     * @return string
     * @throws Exception
     */
    public function call() {

        if (!$this->artist) {
            throw new Exception('Artist is not set on ArtistUpdate');
        }

        if ($this->artist->getId()) {
            /**
             * If the Id is set then we want to update and not insert.
             */
            $up = new ArtistUpdate($this->artist);
            return $up->call();
        }

        $res = $this->post(
            (object) ['Artist' => $this->artist],
            sprintf(static::URI, $this->artist->getId())
        );

        return !isset($res->ArtistId) ? null : $res->ArtistId;
    }

    public function getArtist(): Artist {
        return $this->artist;
    }

    public function setArtist(Artist $artist): void {
        $this->artist = $artist;
    }
}