(function($) {
    'use strict';

    var match = {};
    edgtf.modules.match = match;

    match.edgtfOnDocumentReady = edgtfOnDocumentReady;

    $(document).ready(edgtfOnDocumentReady);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function edgtfOnDocumentReady() {
        edgtfInitMatchLoadMore();
    }

    /**
     * Initializes matches load more function
     */
    function edgtfInitMatchLoadMore() {
        var matchList = $('.edgtf-match-list-holder-outer.edgtf-match-load-more');
        if (matchList.length) {
            matchList.each(function () {

                var thisMatchList = $(this);
                var thisMatchListInner = thisMatchList.find('.edgtf-match-list-holder');
                var nextPage;
                var maxNumPages;
                var loadMoreButton = thisMatchList.find('.edgtf-match-list-load-more a');
                var loadMoreInitialText = loadMoreButton.text();
                var loadMoreLoadingText = edgtfGlobalVars.vars.edgtfPtfLoadMoreMessage;

                if (typeof thisMatchListInner.data('max-num-pages') !== 'undefined' && thisMatchListInner.data('max-num-pages') !== false) {
                    maxNumPages = thisMatchListInner.data('max-num-pages');
                }

                loadMoreButton.on('click', function (e) {
                    var loadMoreDatta = edgtfGetMatchAjaxData(thisMatchListInner);
                    nextPage = loadMoreDatta.nextPage;
                    loadMoreButton.text(loadMoreLoadingText);
                    e.preventDefault();
                    e.stopPropagation();

                    if (nextPage <= maxNumPages) {

                        var ajaxData = edgtfSetMatchAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisMatchListInner.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml = edgtfConvertHTML(response.html);
                                thisMatchListInner.waitForImages(function () {
                                    setTimeout(function () {
                                        thisMatchListInner.append(responseHtml);
                                        loadMoreButton.text(loadMoreInitialText);
                                    }, 400);
                                });
                            }
                        });

                    }
                    if (nextPage === maxNumPages) {
                        loadMoreButton.hide();
                    }
                });

            });
        }
    }

    function edgtfConvertHTML ( html ) {
        var newHtml = $.trim( html ),
            $html = $(newHtml ),
            $empty = $();

        $html.each(function ( index, value ) {
            if ( value.nodeType === 1) {
                $empty = $empty.add ( this );
            }
        });

        return $empty;
    }

    /**
     * Initializes match load more data params
     * @param match list container with defined data params
     * return array
     */
    function edgtfGetMatchAjaxData(container) {
        var returnValue = {};

        returnValue.orderBy = '';
        returnValue.order = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.status = '';
        returnValue.selectedProjects = '';
        returnValue.titleTag = '';
        returnValue.teamTitleTag = '';
        returnValue.showLoadMore = '';
        returnValue.showCategories = '';
        returnValue.showDate = '';
        returnValue.showResult = '';
        returnValue.nextPage = '';
        returnValue.skin = '';
        returnValue.maxNumPages = '';

        if (typeof container.data('order-by') !== 'undefined' && container.data('order-by') !== false) {
            returnValue.orderBy = container.data('order-by');
        }

        if (typeof container.data('order') !== 'undefined' && container.data('order') !== false) {
            returnValue.order = container.data('order');
        }

        if (typeof container.data('number') !== 'undefined' && container.data('number') !== false) {
            returnValue.number = container.data('number');
        }

        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {
            returnValue.category = container.data('category');
        }

        if (typeof container.data('status') !== 'undefined' && container.data('status') !== false) {
            returnValue.status = container.data('status');
        }

        if (typeof container.data('selected-projects') !== 'undefined' && container.data('selected-projects') !== false) {
            returnValue.selectedProjects = container.data('selected-projects');
        }

        if (typeof container.data('title-tag') !== 'undefined' && container.data('title-tag') !== false) {
            returnValue.titleTag = container.data('title-tag');
        }

        if (typeof container.data('team-title-tag') !== 'undefined' && container.data('team-title-tag') !== false) {
            returnValue.teamTitleTag = container.data('team-title-tag');
        }

        if (typeof container.data('show-load-more') !== 'undefined' && container.data('show-load-more') !== false) {
            returnValue.showLoadMore = container.data('show-load-more');
        }

        if (typeof container.data('show-categories') !== 'undefined' && container.data('show-categories') !== false) {
            returnValue.showCategories = container.data('show-categories');
        }

        if (typeof container.data('show-date') !== 'undefined' && container.data('show-date') !== false) {
            returnValue.showDate = container.data('show-date');
        }

        if (typeof container.data('show-result') !== 'undefined' && container.data('show-result') !== false) {
            returnValue.showResult = container.data('show-result');
        }

        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }

        if (typeof container.data('skin') !== 'undefined' && container.data('skin') !== false) {
            returnValue.skin = container.data('skin');
        }

        if (typeof container.data('max-num-pages') !== 'undefined' && container.data('max-num-pages') !== false) {
            returnValue.maxNumPages = container.data('max-num-pages');
        }

        return returnValue;
    }

    /**
     * Sets match load more data params for ajax function
     * @param match list container with defined data params
     * return array
     */
    function edgtfSetMatchAjaxData(container) {
        var returnValue = {
            action: 'edgtf_core_match_ajax_load_more',
            orderBy: container.orderBy,
            order: container.order,
            number: container.number,
            category: container.category,
            status: container.status,
            selectedProjectes: container.selectedProjectes,
            showLoadMore: container.showLoadMore,
            titleTag: container.titleTag,
            teamTitleTag: container.teamTitleTag,
            showCategories: container.showCategories,
            showDate: container.showDate,
            showResult: container.showResult,
            skin: container.skin,
            nextPage: container.nextPage,
        };
        return returnValue;
    }


})(jQuery);