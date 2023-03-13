<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace MonsterCat\Methods\Artists;

use MonsterCat\Client;

/**
 *
 * https://api.labelmanager.app/help
 *
 * GET  /artist/:artistId/cover
 *
 * @author darius
 */
class ArtistCoverUpdate extends Client {
    public string $Id;

    /**
     * URL to download the file from
     * 
     * @var string
     */
    public ?string $image;

    const URI = '/artist/%s/cover';

    public function __construct(string $Id, ?string $image = null) {
        $this->Id    = $Id;
        $this->image = $image;
    }

    /**
     * TODO needs fixing. Its not clear how this is uploaded yet
     */
    public function call() {

        $files = [
            'cover' => $this->getImage()
        ];

        $res = $this->post_files(
            sprintf(static::URI, $this->getId()),
            $files
        );

        return $res;
    }

    public function getId(): string {
        return $this->Id;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setId(string $Id): void {
        $this->Id = $Id;
    }

    public function setImage(?string $image): void {
        $this->image = $image;
    }
}