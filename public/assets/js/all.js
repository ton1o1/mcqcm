$("#searchUserForm").on("submit",function(e){
    e.preventDefault();
});


$("#searchUser").on("keyup", function(){
    
    var $t = $(this).val();
    
    if($t.length > 1) {

        console.log($t);

        $.ajax({

            "url" : $("#searchUserForm").attr("action"),
                "type": $("#searchUserForm").attr("method"),
                "dataType" : "json",
                "data" : $("#searchUserForm").serialize()
            }).done(function(response){

                $("#userResult").empty();
                var responseLength = response.length;

                for(var i =0; i <responseLength; i++ ){

                    var user = response[i];
                    var line = '<a href="#" data-toggle="modal" data-target="#usermodal" class="list-group-item" id=' + user.id + ' >'   + user.email + " - " + user.first_name + " - " + user.last_name  + '</a>';
                    var  $content = $("#userResult").append(line);
                }
            });
    } else {
         $("#userResult").empty();
    }

});



function completeModal(){

    $currentUser = [];

    $currentUserId = { 'id' : $el.attr('id')};
    console.log("click on : " + $currentUserId.id);



    $.ajax({

        "url" : '/administrator/find-user/',
        "type": 'GET',
        "dataType" : "json",
        "data" : $currentUserId

    }).done(function(response){

        $("#usermodal__userName").empty();
        $("#usermodal__userStatus").empty();
        $("#usermodal__userId").empty();
        $("#usermodal__button").empty();
        
        var user = response;
        var $userName = user.last_name +" " + user.first_name;
        var $userStatus = user.is_active;
        var $userId = user.id;
        var $buttonText = (user.is_active == 1 ) ? 'suspendre' : 'activer';

        $("#usermodal__userName").append($userName);
        $("#usermodal__userStatus").val($userStatus);
        $("#usermodal__userId").val($userId);
        $("#usermodal__button").append($buttonText);

        $("#usermodal").addClass('in').css({"display": "block" ,"padding-right" : "17px"});


    });

}

//EventListener
$("#userResult").on('click', "a", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});


$("#userTable").on('click', "tr", function(e){

    e.preventDefault;
    $el = $(this);
    completeModal($el);


});

//inifiniteScroll
$('#jscroll').jscroll();

/*!
 * jScroll - jQuery Plugin for Infinite Scrolling / Auto-Paging
 * http://jscroll.com/
 *
 * Copyright 2011-2013, Philip Klauzinski
 * http://klauzinski.com/
 * Dual licensed under the MIT and GPL Version 2 licenses.
 * http://jscroll.com/#license
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author Philip Klauzinski
 * @version 2.3.4
 * @requires jQuery v1.4.3+
 * @preserve
 */
(function($) {

    'use strict';

    // Define the jscroll namespace and default settings
    $.jscroll = {
        defaults: {
            debug: false,
            autoTrigger: true,
            autoTriggerUntil: false,
            loadingHtml: '<small>Loading...</small>',
            padding: 0,
            nextSelector: 'a:last',
            contentSelector: '',
            pagingSelector: '',
            callback: false
        }
    };

    // Constructor
    var jScroll = function($e, options) {

        // Private vars and methods
        var _data = $e.data('jscroll'),
            _userOptions = (typeof options === 'function') ? { callback: options } : options,
            _options = $.extend({}, $.jscroll.defaults, _userOptions, _data || {}),
            _isWindow = ($e.css('overflow-y') === 'visible'),
            _$next = $e.find(_options.nextSelector).first(),
            _$window = $(window),
            _$body = $('body'),
            _$scroll = _isWindow ? _$window : $e,
            _nextHref = $.trim(_$next.attr('href') + ' ' + _options.contentSelector),

            // Check if a loading image is defined and preload
            _preloadImage = function() {
                var src = $(_options.loadingHtml).filter('img').attr('src');
                if (src) {
                    var image = new Image();
                    image.src = src;
                }
            },

            // Wrap inner content, if it isn't already
            _wrapInnerContent = function() {
                if (!$e.find('.jscroll-inner').length) {
                    $e.contents().wrapAll('<div class="jscroll-inner" />');
                }
            },

            // Find the next link's parent, or add one, and hide it
            _nextWrap = function($next) {
                var $parent;
                if (_options.pagingSelector) {
                    $next.closest(_options.pagingSelector).hide();
                } else {
                    $parent = $next.parent().not('.jscroll-inner,.jscroll-added').addClass('jscroll-next-parent').hide();
                    if (!$parent.length) {
                        $next.wrap('<div class="jscroll-next-parent" />').parent().hide();
                    }
                }
            },

            // Remove the jscroll behavior and data from an element
            _destroy = function() {
                return _$scroll.unbind('.jscroll')
                    .removeData('jscroll')
                    .find('.jscroll-inner').children().unwrap()
                    .filter('.jscroll-added').children().unwrap();
            },

            // Observe the scroll event for when to trigger the next load
            _observe = function() {
                _wrapInnerContent();
                var $inner = $e.find('div.jscroll-inner').first(),
                    data = $e.data('jscroll'),
                    borderTopWidth = parseInt($e.css('borderTopWidth'), 10),
                    borderTopWidthInt = isNaN(borderTopWidth) ? 0 : borderTopWidth,
                    iContainerTop = parseInt($e.css('paddingTop'), 10) + borderTopWidthInt,
                    iTopHeight = _isWindow ? _$scroll.scrollTop() : $e.offset().top,
                    innerTop = $inner.length ? $inner.offset().top : 0,
                    iTotalHeight = Math.ceil(iTopHeight - innerTop + _$scroll.height() + iContainerTop);

                if (!data.waiting && iTotalHeight + _options.padding >= $inner.outerHeight()) {
                    //data.nextHref = $.trim(data.nextHref + ' ' + _options.contentSelector);
                    _debug('info', 'jScroll:', $inner.outerHeight() - iTotalHeight, 'from bottom. Loading next request...');
                    return _load();
                }
            },

            // Check if the href for the next set of content has been set
            _checkNextHref = function(data) {
                data = data || $e.data('jscroll');
                if (!data || !data.nextHref) {
                    _debug('warn', 'jScroll: nextSelector not found - destroying');
                    _destroy();
                    return false;
                } else {
                    _setBindings();
                    return true;
                }
            },

            _setBindings = function() {
                var $next = $e.find(_options.nextSelector).first();
                if (!$next.length) {
                    return;
                }
                if (_options.autoTrigger && (_options.autoTriggerUntil === false || _options.autoTriggerUntil > 0)) {
                    _nextWrap($next);
                    if (_$body.height() <= _$window.height()) {
                        _observe();
                    }
                    _$scroll.unbind('.jscroll').bind('scroll.jscroll', function() {
                        return _observe();
                    });
                    if (_options.autoTriggerUntil > 0) {
                        _options.autoTriggerUntil--;
                    }
                } else {
                    _$scroll.unbind('.jscroll');
                    $next.bind('click.jscroll', function() {
                        _nextWrap($next);
                        _load();
                        return false;
                    });
                }
            },

            // Load the next set of content, if available
            _load = function() {
                var $inner = $e.find('div.jscroll-inner').first(),
                    data = $e.data('jscroll');

                data.waiting = true;
                $inner.append('<div class="jscroll-added" />')
                    .children('.jscroll-added').last()
                    .html('<div class="jscroll-loading">' + _options.loadingHtml + '</div>');

                return $e.animate({scrollTop: $inner.outerHeight()}, 0, function() {
                    $inner.find('div.jscroll-added').last().load(data.nextHref, function(r, status) {
                        if (status === 'error') {
                            return _destroy();
                        }
                        var $next = $(this).find(_options.nextSelector).first();
                        data.waiting = false;
                        data.nextHref = $next.attr('href') ? $.trim($next.attr('href') + ' ' + _options.contentSelector) : false;
                        $('.jscroll-next-parent', $e).remove(); // Remove the previous next link now that we have a new one
                        _checkNextHref();
                        if (_options.callback) {
                            _options.callback.call(this);
                        }
                        _debug('dir', data);
                    });
                });
            },

            // Safe console debug - http://klauzinski.com/javascript/safe-firebug-console-in-javascript
            _debug = function(m) {
                if (_options.debug && typeof console === 'object' && (typeof m === 'object' || typeof console[m] === 'function')) {
                    if (typeof m === 'object') {
                        var args = [];
                        for (var sMethod in m) {
                            if (typeof console[sMethod] === 'function') {
                                args = (m[sMethod].length) ? m[sMethod] : [m[sMethod]];
                                console[sMethod].apply(console, args);
                            } else {
                                console.log.apply(console, args);
                            }
                        }
                    } else {
                        console[m].apply(console, Array.prototype.slice.call(arguments, 1));
                    }
                }
            };

        // Initialization
        $e.data('jscroll', $.extend({}, _data, {initialized: true, waiting: false, nextHref: _nextHref}));
        _wrapInnerContent();
        _preloadImage();
        _setBindings();

        // Expose API methods via the jQuery.jscroll namespace, e.g. $('sel').jscroll.method()
        $.extend($e.jscroll, {
            destroy: _destroy
        });
        return $e;
    };

    // Define the jscroll plugin method and loop
    $.fn.jscroll = function(m) {
        return this.each(function() {
            var $this = $(this),
                data = $this.data('jscroll'), jscroll;

            // Instantiate jScroll on this element if it hasn't been already
            if (data && data.initialized) {
                return;
            }
            jscroll = new jScroll($this, m);
        });
    };

})(jQuery);
$(".navigation__button").on('click', function(){
	$(".navigation__list").toggle();
});
