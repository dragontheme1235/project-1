/**
 * @category    DGT
 * @package     DGT_Widget
 * Copyright (C) 2014-2015 dragontheme.com. All Rights Reserved.
 * @license     GNU General Public License version 2 or later
 * @author      dragontheme.com
 * @email       support@dragontheme.com
 */



;'use strict';
if(typeof DGT == 'undefined') {
    var DGT = {};
    DGT.Widget = Class.create();
    DGT.Widget.prototype = {

        DGT_MUTE_BTN_CLASS: 'videoMuteBtn fa',

        DGT_MUTE_BTN_CLASS_ON: 'fa-volume-up',

        DGT_MUTE_BTN_CLASS_OFF: 'fa-volume-off',

        RIT_VIDEO_HW_RATIO: 0.5625,

        VENDOR_PREFIXES: 'webkit|Moz'.split('|'),

        initialize: function (id, config) {
            this.id = id;
            this.container = $(id);
            this.config = config || {};

            this.checkCSS3Support();

            document.observe('dom:loaded', function () {
                this.initTab();
                this.initCountdown();

                if (this.config.carousel && this.config.carousel.enable) {
                    this.initCarousel(function (element) {
                        this.initCarouselAnimation(element, true);
                    }.bind(this));
                } else {
                }
            }.bind(this));
        },

        checkCSS3Support: function () {
            var translate3D = 'translate3d(0px, 0px, 0px)',
                divElm = new Element('div'),
                matches;

            divElm.style.cssText =
                '-moz-transform:' + translate3D +
                ';-ms-transform:' + translate3D +
                ';-o-transform:' + translate3D +
                ';-webkit-transform:' + translate3D +
                ';transform:' + translate3D;

            matches = divElm.style.cssText.match(/translate3d\(0px, 0px, 0px\)/g);

            this.support3d = matches !== null && matches.length >= 1;
        },

        initTab: function () {
            if (!this.config.collectionUrl) return;

            this.container.select('.widget-tabs a').each(function (tab) {
                var tab_content = this.container.down(tab.readAttribute('href'));
                if (!tab_content) return;

                if (tab_content.down('ul')) {
                    tab_content.has_content = true;
                }

                Event.observe(tab, 'click', function (e) {
                    Event.stop(e);

                    this.activeTab(tab, tab_content);
                    if (tab_content.has_content) return;

                    var a = Event.findElement(e, 'a'),
                        type = a.readAttribute('data-type'),
                        value = a.readAttribute('data-value'),
                        limit = a.readAttribute('data-limit'),
                        column = a.readAttribute('data-column'),
                        row = a.readAttribute('data-row'),
                        cid = a.readAttribute('data-cid'),
                        template = a.readAttribute('data-template'),
                        carousel = a.readAttribute('data-carousel'),
                        form_key = DGT['FORM_KEY'] || null;

                    new Ajax.Request(this.config.collectionUrl, {
                        method: 'post',
                        parameters: {
                            type: type,
                            value: value,
                            limit: limit,
                            form_key: form_key,
                            carousel: carousel,
                            column: column,
                            cid: cid,
                            row: row,
                            template: template
                        },
                        onSuccess: function (transport) {
                            tab_content.has_content = true;
                            tab_content.innerHTML = transport.responseText;
                            $dgt(".dgt-tooltip").tooltip();
                            this.initCarousel(function (element) {
                                this.initCarouselAnimation(element, false);
                                this.initCountdown();
                                tab_content.setStyle({
                                    height: 'auto'
                                });
                            }.bind(this));

                            if (this.config.collectionCallback) {
                                this.config.collectionCallback();
                            }
                        }.bind(this)
                    });
                }.bind(this));
            }.bind(this));
        },

        initCountdown: function () {
            if (!window['jQuery']) return;
            if (!this.config.countdown) return;
            if (!this.config.countdown.enable) return;

            if (!jQuery.fn.countdown) {
                jQuery.getScript(this.config.countdown.engineSrc, function () {
                    this.bindCountdownEvent();
                }.bind(this));
            } else {
                this.bindCountdownEvent();
            }
        },

        initCarousel: function (callback) {
            if (!window['jQuery']) return;
            if (!this.container) return;
            if (!this.config.carousel) return;
            if (!this.config.carousel.enable) return;

            if (callback) {
                this.config.carousel.afterInit = callback;
            }

            if (!jQuery.fn.owlCarousel) {
                jQuery.getScript(this.config.carousel.engineSrc, function () {
                    this.initCarouselElement(this.config.carousel);
                }.bind(this));
            } else {
                this.initCarouselElement(this.config.carousel);
            }
        },


        bindCountdownEvent: function () {
            this.container.select('.product-date').each(function (item) {
                var date = item.readAttribute('data-date');
                if (date) {
                    var config = {
                        date: date,
                        dayText: '',
                        hourText: '',
                        minText: '',
                        secText: '',
                    };
                    //Object.extend(config, this.config.countdown);
                    //Object.extend(config, this.config.countdownConfig);
                    if (this.config.countdownTemplate) {
                        config.template = this.config.countdownTemplate;
                    }
                    jQuery(item).countdown(config);
                }
            }.bind(this));
        },

        initCarouselAnimation: function (element, isInit) {
            if (!this.config.animation) return;
            if (!this.config.animation.enable) return;

            var animClass = this.config.animation.animationName,
                visibleItems = [];

            element.find('.owl-item').each(function (i, item) {
                var $item = $(item);

                $item.addClassName(animClass);

                if ($item.hasClassName('active')) {
                    $item.removeClassName('active');
                    $item.setStyle({visibility: 'hidden'});
                    visibleItems.push($item);
                }
            }.bind(this));

            if (isInit) this.bindAnimateEvent(visibleItems);
            else this.animateElements(visibleItems);
        },

        bindAnimateEvent: function (visibleItems) {
            'DOMContentLoaded|load|resize|scroll'.split('|').each(function (event) {
                Event.observe(window, event, function () {
                    if (!this.animated && this.isElementInViewport(1 / 2)) {
                        this.animated = true;
                        this.animateElements(visibleItems);
                    }
                }.bind(this));
            }.bind(this));
        },

        animateElements: function (items) {
            var animDelay = this.config.animation.animationDelay || 300;

            items.each(function (item, i) {
                var value = i == 0 ? 0 : animDelay * i;
                this.setVendorCss(item, 'animationDelay', value + 'ms');
                item.addClassName('active');
                item.setStyle({visibility: 'visible'});
            }.bind(this));

            setTimeout(function () {
                items.each(function (item) {
                    this.setVendorCss(item, 'animationDelay', 'initial');
                }.bind(this));
            }.bind(this), (items.length + 1) * animDelay);
        },

        setVendorCss: function (element, property, value) {
            var cssObj = {property: value};

            this.VENDOR_PREFIXES.each(function (prefix) {
                cssObj[prefix + property.charAt(0).toUpperCase() + property.substr(1)] = value;
            });

            element.setStyle(cssObj);
        },


        activeTab: function (tab, content) {
            if (!tab || !content) return;

            this.container.select('.widget-tabs .active').invoke('removeClassName', 'active');
            tab.up().addClassName('active');

            if (!content.has_content) {
                var prev = this.container.down('.tab-pane.active');
                if (prev) {
                    content.setStyle({
                        height: prev.getDimensions().height + 'px'
                    });

                    prev.removeClassName('active');

                    var spinner = new Element('div', {'class': 'widget-spinner'});
                    spinner.setStyle({width: '100%', height: '100%'});

                    if (this.config.spinnerClass) {
                        spinner.addClassName(this.config.spinnerClass);
                    }

                    if (this.config.spinnerImg) {
                        spinner.setStyle({position: 'relative'});
                        var img = new Element('img', {src: this.config.spinnerImg});
                        Event.observe(img, 'load', function () {
                            img.setStyle({
                                position: 'absolute',
                                top: '50%',
                                left: '50%',
                                marginLeft: (-1 * img.width / 2) + 'px',
                                marginTop: (-1 * img.height / 2) + 'px'
                            });
                            spinner.insert(img);
                        });
                    }

                    content.insert(spinner);
                }
            } else {
                this.container.select('.tab-pane.active').invoke('removeClassName', 'active');
            }

            content.addClassName('active');
        },


        initCarouselElement: function (config) {
            if (this.config.carouselConfig) {
                config = Object.extend(config, this.config.carouselConfig);
            }

            this.container.select('.owl-carousel').each(function (div) {
                jQuery(div).owlCarousel(config);
            });
        },

        initOverlay: function () {
            if (this.config.parallax.overlay == 'none') {
                this.container.insert({
                    top: new Element('div', {
                        'class': 'widget-overlay'
                    }).setStyle({
                        position: 'absolute',
                        left: 0,
                        top: 0,
                        width: '100%',
                        height: '100%',
                        backgroundColor: 'rgba(0, 0, 0, 0.6)'
                    })
                });
            }
            ;
            if (this.config.parallax.overlay != 'none') {
                this.container.insert({
                    top: new Element('div', {
                        'class': 'widget-overlay'
                    }).setStyle({
                        position: 'absolute',
                        left: 0,
                        top: 0,
                        width: '100%',
                        height: '100%',
                        backgroundColor: 'rgba(0, 0, 0, 0.6)',
                        backgroundImage: 'url(' + dgtThemes.url + this.config.parallax.overlay + ')',
                        backgroundRepeat: 'repeat'
                    })
                });
            }
        },

        isElementInViewport: function (percent) {
            percent = percent || 1;

            var rect = this.container.getBoundingClientRect(),
                window_height = window.innerHeight || document.documentElement.clientHeight;

            if (rect.top > 0) return rect.top < window_height - rect.height * percent;
            else return rect.bottom > rect.height * percent;
        },

        isElementPartialInViewport: function () {
            var rect = this.container.getBoundingClientRect();

            return (rect.bottom > 0 && rect.bottom <= rect.height) ||
                (rect.top > 0 && rect.top <= (window.innerHeight || document.documentElement.clientHeight));
        },

        postmessage: function (player, method, value) {
            var data = {method: method};
            if (value != null) data.value = value;
            player.contentWindow.postMessage(JSON.stringify(data), player.src.split('?')[0]);
        }
    };
}
