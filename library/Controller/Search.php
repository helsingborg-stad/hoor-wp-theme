<?php

namespace Hoor\Controller;

class Search extends \Municipio\Controller\Search
{
    /**
     * Google Site Search init
     * @return void
     */
    public function googleSearch()
    {
        $search = new \Hoor\Search\Google(get_search_query(), $this->getIndex());
        $this->data['search'] = $search;
        $this->data['results'] = $search->results;
    }
}
