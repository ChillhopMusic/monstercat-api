<?php

namespace MonsterCat\Models;

/**
 * Description of Artist
 *
 * @author darius
 */
class Artist extends \MonsterCat\Model {
    public ?array $ActiveYears                = [];
    public ?string $BandsInTownId              = null;
    public ?string $Id                         = null;
    public ?string $FeaturedReleaseCoverFileId = null;
    public ?string $FeaturedReleaseId          = null;
    public ?object $Details                    = null;
    public ?string $FeaturedVideoURL           = null;
    public ?string $InternalNotes              = "";
    public ?string $LandscapeFileId            = null;
    public ?array $Links                      = [];
    public ?string $LogoFileId                 = null;
    public ?string $Name                       = null;
    public ?string $PortraitFileId             = null;
    public ?string $ProfileFileId              = null;
    public ?bool $Public                     = false;
    public ?bool $ShowEvent                  = false;
    public ?bool $SquareFileId               = null;
    public ?array $Tags                       = [];
    public ?string $URI                        = '';
    public ?array $URLs                       = []; // Read only!

    public function getActiveYears(): ?int {
        return intval($this->ActiveYears);
    }

    public function getBandsInTownId(): ?string {
        return $this->BandsInTownId;
    }

    public function getId(): ?string {
        return $this->Id;
    }

    public function getFeaturedReleaseCoverFileId(): ?string {
        return $this->FeaturedReleaseCoverFileId;
    }

    public function getFeaturedReleaseId(): ?string {
        return $this->FeaturedReleaseId;
    }

    public function getDetails(): ?array {
        return $this->Details;
    }

    public function getFeaturedVideoURL(): ?string {
        return $this->FeaturedVideoURL;
    }

    public function getInternalNotes(): ?string {
        return $this->InternalNotes;
    }

    public function getLandscapeFileId(): ?string {
        return $this->LandscapeFileId;
    }

    public function getLinks(): ?array {
        return $this->Links;
    }

    public function getLogoFileId(): ?string {
        return $this->LogoFileId;
    }

    public function getName(): ?string {
        return $this->Name;
    }

    public function getPortraitFileId(): ?string {
        return $this->PortraitFileId;
    }

    public function getProfileFileId(): ?string {
        return $this->ProfileFileId;
    }

    public function getPublic(): ?bool {
        return $this->Public;
    }

    public function getShowEvent(): ?bool {
        return $this->ShowEvent;
    }

    public function getSquareFileId(): ?bool {
        return $this->SquareFileId;
    }

    public function getTags(): ?array {
        return $this->Tags;
    }

    public function getURI(): ?bool {
        return $this->URI;
    }

    public function getURLs(): ?array {
        return $this->URLs;
    }

    public function setActiveYears(?int $ActiveYears) {
        $this->ActiveYears = $ActiveYears;
    }

    public function setBandsInTownId(?string $BandsInTownId) {
        $this->BandsInTownId = $BandsInTownId;
    }

    public function setId(?string $Id) {
        $this->Id = $Id;
    }

    public function setFeaturedReleaseCoverFileId(?string $FeaturedReleaseCoverFileId) {
        $this->FeaturedReleaseCoverFileId = $FeaturedReleaseCoverFileId;
    }

    public function setFeaturedReleaseId(?string $FeaturedReleaseId) {
        $this->FeaturedReleaseId = $FeaturedReleaseId;
    }

    public function setDetails(?array $Details) {
        $this->Details = $Details;
    }

    public function setFeaturedVideoURL(?string $FeaturedVideoURL) {
        $this->FeaturedVideoURL = $FeaturedVideoURL;
    }

    public function setInternalNotes(?string $InternalNotes) {
        $this->InternalNotes = $InternalNotes;
    }

    public function setLandscapeFileId(?string $LandscapeFileId) {
        $this->LandscapeFileId = $LandscapeFileId;
    }

    public function setLinks(?array $Links) {
        $this->Links = $Links;
    }

    public function setLogoFileId(?string $LogoFileId) {
        $this->LogoFileId = $LogoFileId;
    }

    public function setName(?string $Name) {
        $this->Name = $Name;
    }

    public function setPortraitFileId(?string $PortraitFileId) {
        $this->PortraitFileId = $PortraitFileId;
    }

    public function setProfileFileId(?string $ProfileFileId) {
        $this->ProfileFileId = $ProfileFileId;
    }

    public function setPublic(?bool $Public) {
        $this->Public = $Public;
    }

    public function setShowEvent(?bool $ShowEvent) {
        $this->ShowEvent = $ShowEvent;
    }

    public function setSquareFileId(?bool $SquareFileId) {
        $this->SquareFileId = $SquareFileId;
    }

    public function setTags(?array $Tags) {
        $this->Tags = $Tags;
    }

    public function setURI(?bool $URI) {
        $this->URI = $URI;
    }

    public function setURLs(?array $URLs) {
        $this->URLs = $URLs;
    }
}