<?php

namespace MonsterCat\Methods\Artists;

use MonsterCat\Client;
use MonsterCat\Models\Artist;

/**
 * Gets a list of Artists
 * 
 * https://api.labelmanager.app/help
 *
 * @author darius
 */
class Artists extends Client {
    public $offset = 0;
    public $page   = 1;
    public $search = '';
    public $sort   = '-';
    public $csv    = null;
    public $limit  = 25;

    const METHOD = 'GET';
    const URI    = '/artists';

    /**
     * Returns a list of artists based on the search
     * 
     * @param type $search
     * @return boolean|\MonsterCat\Methods\Artists\Artist[]
     */
    public function call($search = ''): array|bool {

        $res = $this->get(
            $this,
            static::URI
        );

        if (!$res || !isset($res->Artists)) {
            return false;
        }

        $returned_objects = ($res->Artists->Data);
        $arts = [];
        foreach ($returned_objects as $obj) {
            $arts[] = new Artist($obj);
        }

        return $arts;
    }

    public function getOffset() {
        return $this->offset;
    }

    public function getPage() {
        return $this->page;
    }

    public function getSearch() {
        return $this->search;
    }

    public function getSort() {
        return $this->sort;
    }

    public function getCsv() {
        return $this->csv;
    }

    public function getLimit() {
        return $this->limit;
    }

    public function setOffset($offset): void {
        $this->offset = $offset;
    }

    public function setPage($page): void {
        $this->page = $page;
    }

    public function setSearch($search): void {
        $this->search = $search;
    }

    public function setSort($sort): void {
        $this->sort = $sort;
    }

    public function setCsv($csv): void {
        $this->csv = $csv;
    }

    public function setLimit($limit): void {
        $this->limit = $limit;
    }

}