<?php

namespace SWAPI\Models;

use SWAPI\Endpoints\Endpoint;

/**
 * Helps iterate over paged responses
 */
class Collection extends \ArrayObject
{
    /**
     * @var Endpoint
     */
    protected $endpoint;
    /**
     * @var Collection|string|null
     */
    protected $next;
    /**
     * @var Collection|string|null
     */
    protected $previous;

    public function setEndpoint(Endpoint $endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param string|int $url A URL with a page= query-string parameter, or a page number
     */
    public function setNext($url)
    {
        if ($url instanceof Collection) {
            $this->next =& $url;
        } elseif (is_numeric($url)) {
            $this->next = intval($url);
        } elseif (!is_null($url)) {
            // Attempt to get the page=%d value
            $this->next = self::getPageFromQueryString($url);
        }
    }

    public function setPrevious($url)
    {
        if ($url instanceof Collection) {
            $this->previous =& $url;
        } elseif (is_numeric($url)) {
            $this->previous = intval($url);
        } elseif (!is_null($url)) {
            // Attempt to get the page=%d value
            $this->previous = self::getPageFromQueryString($url);
        }
    }

    protected static function getPageFromQueryString($url, $parameter = 'page')
    {
        $qs = parse_url($url, PHP_URL_QUERY);
        $qs = explode("&", $qs);
        foreach ($qs as $q) {
            list($k, $v) = explode("=", $q, 2);

            if ($k == $parameter) {
                return intval($v);
            }
        }
    }

    public function hasNext()
    {
        return !is_null($this->next);
    }

    public function hasPrevious()
    {
        return !is_null($this->previous);
    }

    public function getNext()
    {
        if (is_int($this->next)) {
            $this->next = $this->endpoint->index($this->next);
            $this->next->setPrevious($this);
        }
        return $this->next;
    }

    public function getPrevious()
    {
        if (is_int($this->previous)) {
            $this->previous = $this->endpoint->index($this->next);
            $this->previous->setNext($this);
        }

        return $this->previous;
    }
}
