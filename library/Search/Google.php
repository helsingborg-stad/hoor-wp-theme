<?php

namespace Hoor\Search;

class Google extends \Municipio\Search\Google
{
    /**
     * Renders the pagination for the current search
     * @param  boolean $echo Wheter to echo the pagination or return as string
     * @return string        The pagination html markup
     */
    public function pagination($echo = false)
    {
        $markup = array();

        // Get needed data
        $results = $this->results;
        $query = $results->queries;

        // Get results per page count
        $this->resultsPerPage = 10;

        if (intval($results->searchInformation->totalResults) <= $this->resultsPerPage) {
            return;
        }

        // Get current page
        $currentPage = 1;
        if (isset($_GET['index']) && $_GET['index'] > 1 && is_numeric(sanitize_text_field($_GET['index']))) {
            $this->currentIndex = sanitize_text_field($_GET['index']);
            $this->currentPage = (($this->currentIndex-1) / $this->resultsPerPage)+1;
        }
        // Note: we are mathching the (ugly) wordpress pagination HTML here in order to not duplciate css.
        $markup[] = '<h2 class="visually-hidden" id="pagination">' . __('Pagination', 'hoor') . '</h2><div class="pagination"><ul class="page-numbers" role="navigation" aria-labelledby="pagination">';

        // Get the previous page
        $previousPage = null;
        if (isset($query->previousPage)) {
            $previousPage = $query->previousPage[0];

            $markup[] = '<li><a class="prev" href="?s=' . urlencode(stripslashes($this->keyword)) .
                        '&amp;index=' . $previousPage->startIndex .
                        '" aria-label="Föregående sida"><span class="previous__label">Föregående<span class="visually-hidden"> sida</span></span></a></li>';
        }

        // Get pages
        if ($this->resultsPerPage < $this->results->searchInformation->totalResults) {
            // Calculate number of pages
            // The JSON API returns up to the first 100 results only,
            // see https://developers.google.com/custom-search/json-api/v1/using_rest#search_request_metadata
            $maxResults = 100;
            $numPages = ceil(min($this->results->searchInformation->totalResults, $maxResults) / $this->resultsPerPage);


            // Output pages
            for ($i = 1; $i <= $numPages; $i++) {
                $thisIndex = ($this->resultsPerPage * ($i-1)) + 1;

                $current = null;
                if ($thisIndex == $this->currentIndex) {
                    $markup[] = '<li><span class="page-numbers current">' . $i . '</span></li>';
                }
                else {
                    $markup[] = '<li><a class="page-numbers" href="?s=' . urlencode(stripslashes($this->keyword)) .
                                '&amp;index=' . $thisIndex . '">' . $i . '</a></li>';
                }
            }
        }

        // Get the next page
        if (isset($query->nextPage)) {
            $startIndex = $query->nextPage[0]->startIndex;
            if ($startIndex < $maxResults) {
                $markup[] = '<li><a class="next" href="?s=' . urlencode(stripslashes($this->keyword)) .
              '&amp;index=' . $startIndex . '" aria-label="Nästa sida"><span class="next__label">Nästa<span class="visually-hidden"> sida</span></span></a></li>';
            }
        }

        $markup[] = '</ul>';

        $markup = implode('', $markup);

        if ($echo === true) {
            echo $markup;
            return;
        } else {
            return $markup;
        }
    }
}
