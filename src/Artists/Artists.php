<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace MonsterCat\Artists;

/**
 * Gets a list of Artists
 * 
 * https://api.labelmanager.app/help
 *
 * @author darius
 */
class Artists extends \MonsterCat\Client {
    public $offset = 0;
    public $page   = 1;
    public $search = '';
    public $sort   = '-';
    public $csv    = false;
    public $limit  = 100;

    const METHOD = 'GET';
    const URI    = '/artists';

    public function call($search = '') {

        $this->get(
            static::METHOD,
            $this,
            static::URI
        );
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