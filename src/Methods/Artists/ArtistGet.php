<?php

namespace MonsterCat\Methods\Artists;

use MonsterCat\Models\Artist;
use MonsterCat\Client;

/**
 * Gets a single artist by MC ID
 *
 * @author darius
 */
class ArtistGet extends Client {
    public string $Id;

    const URI = '/artist/%s';

    public function __construct(string $Id) {
        $this->Id = $Id;
    }

    /**
     *
     * @return Artist
     */
    public function call() {

        $res = $this->get(
            null,
            sprintf(static::URI, $this->getId())
        );

        return isset($res->Artist) ? new Artist($res->Artist) : null;
    }

    public function getId(): string {
        return $this->Id;
    }

    public function setId(string $Id): void {
        $this->Id = $Id;
    }

}