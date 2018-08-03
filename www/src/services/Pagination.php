<?php
/**
 * Created by PhpStorm.
 * User: mbrostami
 * Date: 8/3/18
 * Time: 4:29 PM
 */
namespace App\Services;

class Pagination
{
    /**
     * @var \ArrayIterator
     */
    protected $iterator;
    protected $page = 1;
    protected $limit = 10;
    protected $currentItems = [];

    public function setIterator(\ArrayIterator $iterator)
    {
        $this->iterator = $iterator;
        return $this;
    }

    public function getIterator()
    {
        return $this->iterator;
    }

    public function toArrayCurrentPage()
    {
        for ($index = $this->getFirstItemIndexOfCurrentPage(); $index <= $this->getLastItemIndexOfCurrentPage(); $index++) {
            if (!$this->iterator->offsetExists($index)) {
                break;
            }
            $this->currentItems[] = $this->iterator->offsetGet($index); // FIXME make iterator instead of array
        }
        return $this->currentItems;
    }

    protected function getFirstItemIndexOfCurrentPage()
    {
        if ($this->page > 0) {
            return ($this->page * $this->limit) + 1;
        }
        return 0;
    }

    protected function getLastItemIndexOfCurrentPage()
    {
        if ($this->page > 0) {
            return ($this->page * $this->limit) + $this->limit;
        }
        return $this->limit;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }
}
