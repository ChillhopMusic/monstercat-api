<?php

namespace MonsterCat\Models\Tracks;
/**
 * Description of Track
 *
 * @author darius
 */
class Track extends \MonsterCat\Model {
    public ?string $ArtistTitle;
    public ?string $AudioLanguage;
    public ?string $Brand;
    public ?string $BrandId;
    public ?string $ContractuallySatisfiedUntil;
    public ?string $Created;
    public ?string $CreatedById;
    public ?string $CreatedByName;
    public ?string $CreatorFriendly;
    public ?string $DebutDate;
    public ?string $Duration;
    public ?string $Explicit;
    public ?string $FugaId;

    public ?string $GenrePrimary;
    public ?string $GenreSecondary;
    public ?string $Id;
    public ?string $ISRC;
    public ?string $ISWC;
    public ?string $LabelId;
    public ?string $LabelTitle;

    public ?string $LabelDefaultTimezone;
    public ?string $LockStatus;
    public ?string $Lyrics;
    public ?string $LyricsLanguage;
    public ?string $Notes;
    public ?string $OwnedCommercially;
    public ?string $PreApprovedForSync;

    public ?string $PerformanceType;
    public ?string $_Public;
    public ?string $SpotifyId;
    public ?string $SyncRights;
    public ?array $Tags;
    public ?string $TagusId;
    public ?string $Title;
    public ?string $Version;
    public ?string $WavFileId;
    public ?string $TrackInfoErrors;
    public ?string $PreviewStart;
    public ?string $PreviewEnd;

    public ?array $Writers;

    /**
     *
     * @var \MonsterCat\Methods\Artists\Artist
     */
    public ?array $Artists;

    public function populate($jsonObj) {
        parent::populate($jsonObj);

        if($this->Artists){

            $tmp = $this->Artists;
            $this->Artists = [];
            foreach($tmp as $row){
                $this->Artists[] = new \MonsterCat\Methods\Artists\Artist($row);
            }
        }

        /**
         * Populate writers in the same way
         */
    }


}