(function ($) {
    "use strict";

    var blog = {};
    edgtf.modules.blog = blog;

    blog.edgtfOnDocumentReady = edgtfOnDocumentReady;
    blog.edgtfOnWindowLoad = edgtfOnWindowLoad;
    blog.edgtfOnWindowScroll = edgtfOnWindowScroll;
    
    blog.edgtfBlogExcerptAnimation = edgtfBlogExcerptAnimation;

    $(document).ready(edgtfOnDocumentReady);
    $(window).on('load', edgtfOnWindowLoad)
    $(window).scroll(edgtfOnWindowScroll);

    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitAudioPlayer();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfInitBlogPagination().init();
        edgtfBlogExcerptAnimation();
    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function edgtfOnWindowScroll() {
        edgtfInitBlogPagination().scroll();
    }

    /**
     * Init audio player for Blog list and single pages
     */
    function edgtfInitAudioPlayer() {
        var players = $('audio.edgtf-blog-audio');

        if (players.length) {
            players.mediaelementplayer({
                audioWidth: '100%'
            });
        }
    }

    /**
     * Initializes blog pagination functions
     */
    function edgtfInitBlogPagination() {
        var holder = $('.edgtf-blog-holder');

        var initLoadMorePagination = function (thisHolder) {
            var loadMoreButton = thisHolder.find('.edgtf-blog-pag-load-more a');

            loadMoreButton.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                initMainPagFunctionality(thisHolder);
            });
        };

        var initInifiteScrollPagination = function (thisHolder) {
            var blogListHeight = thisHolder.outerHeight(),
                blogListTopOffest = thisHolder.offset().top,
                blogListPosition = blogListHeight + blogListTopOffest - edgtfGlobalVars.vars.edgtfAddForAdminBar;

            if (!thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started') && edgtf.scroll + edgtf.windowHeight > blogListPosition) {
                initMainPagFunctionality(thisHolder);
            }
        };

        var initMainPagFunctionality = function (thisHolder) {
            var thisHolderInner = thisHolder.children('.edgtf-blog-holder-inner'),
                nextPage,
                maxNumPages;

            if (typeof thisHolder.data('max-num-pages') !== 'undefined' && thisHolder.data('max-num-pages') !== false) {
                maxNumPages = thisHolder.data('max-num-pages');
            }

            if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                thisHolder.addClass('edgtf-blog-pagination-infinite-scroll-started');
            }

            var loadMoreDatta = edgtf.modules.common.getLoadMoreData(thisHolder),
                loadingItem = thisHolder.find('.edgtf-blog-pag-loading');

            nextPage = loadMoreDatta.nextPage;

            var nonceHolder = thisHolder.find('input[name*="edgtf_blog_load_more_nonce_"]');

            loadMoreDatta.blog_load_more_id = nonceHolder.attr('name').substring(nonceHolder.attr('name').length - 4, nonceHolder.attr('name').length);
            loadMoreDatta.blog_load_more_nonce = nonceHolder.val();

            if (nextPage <= maxNumPages) {
                loadingItem.addClass('edgtf-showing');

                var ajaxData = edgtf.modules.common.setLoadMoreAjaxData(loadMoreDatta, 'playerx_edge_blog_load_more');

                $.ajax({
                    type: 'POST',
                    data: ajaxData,
                    url: edgtfGlobalVars.vars.edgtfAjaxUrl,
                    success: function (data) {
                        nextPage++;

                        thisHolder.data('next-page', nextPage);

                        var response = $.parseJSON(data),
                            responseHtml = response.html;

                        thisHolder.waitForImages(function () {
                            if (thisHolder.hasClass('edgtf-grid-masonry-list')) {
                                edgtfInitAppendIsotopeNewContent(thisHolderInner, loadingItem, responseHtml);
                                edgtf.modules.common.setFixedImageProportionSize(thisHolder, thisHolder.find('article'), thisHolderInner.find('.edgtf-masonry-grid-sizer').width());
                            } else {
                                edgtfInitAppendGalleryNewContent(thisHolderInner, loadingItem, responseHtml);
                            }

                            setTimeout(function () {
                                edgtfInitAudioPlayer();
                                edgtf.modules.common.edgtfOwlSlider();
                                edgtf.modules.common.edgtfFluidVideo();
                                edgtf.modules.common.edgtfInitSelfHostedVideoPlayer();
                                edgtf.modules.common.edgtfSelfHostedVideoSize();

                                if (typeof edgtf.modules.common.edgtfStickySidebarWidget === 'function') {
                                    edgtf.modules.common.edgtfStickySidebarWidget().reInit();
                                }

                                // Trigger event.
                                $(document.body).trigger('blog_list_load_more_trigger');

                            }, 400);
                        });

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll-started')) {
                            thisHolder.removeClass('edgtf-blog-pagination-infinite-scroll-started');
                        }
                    }
                });
            }

            if (nextPage === maxNumPages) {
                thisHolder.find('.edgtf-blog-pag-load-more').hide();
            }
        };

        var edgtfInitAppendIsotopeNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            thisHolderInner.append(responseHtml).isotope('reloadItems').isotope({sortBy: 'original-order'});
            loadingItem.removeClass('edgtf-showing');

            setTimeout(function () {
                thisHolderInner.isotope('layout');
            }, 600);
        };

        var edgtfInitAppendGalleryNewContent = function (thisHolderInner, loadingItem, responseHtml) {
            loadingItem.removeClass('edgtf-showing');
            thisHolderInner.append(responseHtml);
        };

        return {
            init: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-blog-pagination-load-more')) {
                            initLoadMorePagination(thisHolder);
                        }

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            },
            scroll: function () {
                if (holder.length) {
                    holder.each(function () {
                        var thisHolder = $(this);

                        if (thisHolder.hasClass('edgtf-blog-pagination-infinite-scroll')) {
                            initInifiteScrollPagination(thisHolder);
                        }
                    });
                }
            }
        };
    }

    function edgtfBlogExcerptAnimation() {
        var instances = $('[data-post-info-excerpt="yes"]');

        if (instances.length) {
            var animateExcerpt = function (excerpt, wrapper, trigger, delta) {
                wrapper
                    .css({
                        'transform': 'translate3d(0, ' + delta + 'px, 0)',
                        'transition': '.5s cubic-bezier(0.23, 1, 0.32, 1)'
                    });
                excerpt
                    .css({
                        'opacity': 0,
                        'transition': 'opacity .4s'
                    });
                trigger
                    .css({
                        'overflow': 'hidden'
                    })
                    .on('mouseover', function () {
                        wrapper.css({'transform': 'translate3d(0, 0, 0)'});
                        excerpt.css({'opacity': 1});
                    })
                    .on('mouseleave', function () {
                        wrapper.css({'transform': 'translate3d(0, ' + delta + 'px, 0)'});
                        excerpt.css({'opacity': 0});
                    });
            }

            var setType = function (holder, type) {
                var excerpts = holder.find('.edgtf-post-excerpt-holder');

                excerpts.each(function () {
                    var excerpt = $(this),
                        wrapper, trigger, delta;

                    if (type === 'slider') {
                        wrapper = excerpt.closest('.edgtf-item-text-wrapper');
                        trigger = wrapper.closest('.owl-item');
                        delta = excerpt.outerHeight(true) + parseInt(wrapper.css('paddingTop'));
                    }

                    if (type === 'list') {
                        wrapper = excerpt.closest('.edgtf-bli-content');
                        trigger = wrapper.closest('.edgtf-bl-item');
                        delta = excerpt.outerHeight();
                    }

                    animateExcerpt(excerpt, wrapper, trigger, delta);
                });
            }

            instances.each(function () {
                var type = $(this).hasClass('edgtf-blog-slider') ? 'slider' : 'list';

                setType($(this), type)
            });
        }
    }

})(jQuery);