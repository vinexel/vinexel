/**
* Folio - Multipurpose Bootstrap Theme
*
* @author Webestica (https://www.webestica.com/)
* @version 2.0.0
**/


/* ===================
Table Of Content
======================
01 PRELOADER
02 MENU DROPDOWN HOVER
03 STICKY HEADER
04 STICKY BAR
05 TOOLTIP
06 POPOVER
07 BACK TO TOP
08 GLIGHTBOX
09 AOS ANIMATION
10 PRICING
11 STICKY ELEMENT
12 FAKE PASSWORD
13 PARALLAX BACKGROUND
14 TYPING TEXT ANIMATION
15 ISOTOPE
16 SWIPER SLIDER
17 PURECOUNTER
====================== */

"use strict";
!function () {

    window.Element.prototype.removeClass = function () {
        let className = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
            selectors = this;
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (this.isVariableDefined(selectors) && className) {
            selectors.classList.remove(className);
        }
        return this;
    }, window.Element.prototype.addClass = function () {
        let className = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
            selectors = this;
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (this.isVariableDefined(selectors) && className) {
            selectors.classList.add(className);
        }
        return this;
    }, window.Element.prototype.toggleClass = function () {
        let className = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
            selectors = this;
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (this.isVariableDefined(selectors) && className) {
            selectors.classList.toggle(className);
        }
        return this;
    }, window.Element.prototype.isVariableDefined = function () {
        return !!this && typeof (this) != 'undefined' && this != null;
    }
}();

var e = {
    init: function () {
        e.preLoader(),
        e.dropdownHover(),
        e.stickyHeader(),
        e.stickyBar(),
        e.toolTipFunc(),
        e.popOverFunc(),
        e.backTotop(),
        e.lightBox(),
        e.aosFunc(),
        e.pricing(),
        e.stickyElement(),
        e.fakePwd(),
        e.parallaxBG(),
        e.typeText(),
        e.enableIsotope(),
        e.swiperSlider(),
        e.pCounter()       
        
    },
    isVariableDefined: function (el) {
        return typeof !!el && (el) != 'undefined' && el != null;
    },
    getParents: function (el, selector, filter) {
        const result = [];
        const matchesSelector = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;

        // match start from parent
        el = el.parentElement;
        while (el && !matchesSelector.call(el, selector)) {
            if (!filter) {
                if (selector) {
                    if (matchesSelector.call(el, selector)) {
                        return result.push(el);
                    }
                } else {
                    result.push(el);
                }
            } else {
                if (matchesSelector.call(el, filter)) {
                    result.push(el);
                }
            }
            el = el.parentElement;
            if (e.isVariableDefined(el)) {
                if (matchesSelector.call(el, selector)) {
                    return el;
                }
            }

        }
        return result;
    },
    getNextSiblings: function (el, selector, filter) {
        let sibs = [];
        let nextElem = el.parentNode.firstChild;
        const matchesSelector = el.matches || el.webkitMatchesSelector || el.mozMatchesSelector || el.msMatchesSelector;
        do {
            if (nextElem.nodeType === 3) continue; // ignore text nodes
            if (nextElem === el) continue; // ignore elem of target
            if (nextElem === el.nextElementSibling) {
                if ((!filter || filter(el))) {
                    if (selector) {
                        if (matchesSelector.call(nextElem, selector)) {
                            return nextElem;
                        }
                    } else {
                        sibs.push(nextElem);
                    }
                    el = nextElem;

                }
            }
        } while (nextElem = nextElem.nextSibling)
        return sibs;
    },
    on: function (selectors, type, listener) {
        document.addEventListener("DOMContentLoaded", () => {
            if (!(selectors instanceof HTMLElement) && selectors !== null) {
                selectors = document.querySelector(selectors);
            }
            selectors.addEventListener(type, listener);
        });
    },
    onAll: function (selectors, type, listener) {
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(selectors).forEach((element) => {
                if (type.indexOf(',') > -1) {
                    let types = type.split(',');
                    types.forEach((type) => {
                        element.addEventListener(type, listener);
                    });
                } else {
                    element.addEventListener(type, listener);
                }


            });
        });
    },
    removeClass: function (selectors, className) {
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (e.isVariableDefined(selectors)) {
            selectors.removeClass(className);
        }
    },
    removeAllClass: function (selectors, className) {
        if (e.isVariableDefined(selectors) && (selectors instanceof HTMLElement)) {
            document.querySelectorAll(selectors).forEach((element) => {
                element.removeClass(className);
            });
        }

    },
    toggleClass: function (selectors, className) {
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (e.isVariableDefined(selectors)) {
            selectors.toggleClass(className);
        }
    },
    toggleAllClass: function (selectors, className) {
        if (e.isVariableDefined(selectors)  && (selectors instanceof HTMLElement)) {
            document.querySelectorAll(selectors).forEach((element) => {
                element.toggleClass(className);
            });
        }
    },
    addClass: function (selectors, className) {
        if (!(selectors instanceof HTMLElement) && selectors !== null) {
            selectors = document.querySelector(selectors);
        }
        if (e.isVariableDefined(selectors)) {
            selectors.addClass(className);
        }
    },
    select: function (selectors) {
        return document.querySelector(selectors);
    },
    selectAll: function (selectors) {
        return document.querySelectorAll(selectors);
    },


    // START: 01 Preloader
    preLoader: function () {
        window.onload = function () {
            var preloader = e.select('.preloader');
            if (e.isVariableDefined(preloader)) {
                preloader.className += ' animate__animated animate__fadeOut';
                setTimeout(function(){
                    preloader.style.display = 'none';
                }, 200);
            }
        };
    },
    // END: Preloader

    // START: 02 Menu Dropdown Hover
    dropdownHover: function () {
      if (window.matchMedia('(min-width: 992px)').matches) {
        (function($bs) {
          document.querySelectorAll('.dropdown-hover .dropdown').forEach(function(dd) {
              dd.addEventListener('mouseenter', function(e) {
                  let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                  if (!toggle.classList.contains('show')) {
                      $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                  }
              });
              dd.addEventListener('mouseleave', function(e) {
                  let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
                  if (toggle.classList.contains('show')) {
                      $bs.Dropdown.getOrCreateInstance(toggle).toggle();
                  }
              });
          });
        })(bootstrap);
      }
    },
    // END: Menu Dropdown Hover

    // START: 03 Sticky Header
    stickyHeader: function () {
      if (window.matchMedia('(min-width: 992px)').matches) {
          var stickyNav = e.select('.header-sticky');
          if (e.isVariableDefined(stickyNav)) {
              document.addEventListener('scroll', function (event) {
                  var scTop = window.pageYOffset || document.documentElement.scrollTop;
                  if (scTop >= 400) {
                      stickyNav.addClass('header-sticky-on');
                  } else {
                      stickyNav.removeClass("header-sticky-on");
                  }
              });
          }
      }
    },  
    // END: Sticky Header

    // START: 04 Sticky Bar
    /* @required https://github.com/rgalus/sticky-js */
    stickyBar: function () {
        var sb = e.select('[data-sticky]');
        if (e.isVariableDefined(sb)) {
            var sticky = new Sticky('[data-sticky]');
        }
    },
    // END: Sticky Bar

    // START: 05 Tooltip
    // Enable tooltips everywhere via data-toggle attribute
    toolTipFunc: function () {
        var tooltipTriggerList = [].slice.call(e.selectAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    },
    // END: Tooltip

    // START: 06 Popover
    // Enable popover everywhere via data-toggle attribute
    popOverFunc: function () {
        var popoverTriggerList = [].slice.call(e.selectAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
          return new bootstrap.Popover(popoverTriggerEl)
        })
    },
    // END: Popover

    // START: 07 Back to Top
    backTotop: function () {
        var scrollpos = window.scrollY;
        var backBtn = e.select('.back-top');
        if (e.isVariableDefined(backBtn)) {
            var add_class_on_scroll = () => backBtn.addClass("back-top-show");
            var remove_class_on_scroll = () => backBtn.removeClass("back-top-show");

            window.addEventListener('scroll', function () {
                scrollpos = window.scrollY;
                if (scrollpos >= 800) {
                    add_class_on_scroll()
                } else {
                    remove_class_on_scroll()
                }
            });

            backBtn.addEventListener('click', () => window.scrollTo({
                top: 0,
                behavior: 'smooth',
            }));
        }
    },
    // END: Back to Top

    // START: 08 GLightbox
    /* @required https://github.com/biati-digital/glightbox */
    lightBox: function () {
        var light = e.select('[data-glightbox]');
        if (e.isVariableDefined(light)) {
            var lb = GLightbox({
                selector: '*[data-glightbox]',
                openEffect: 'fade',
                closeEffect: 'fade'
            });
        }
    },
    // END: GLightbox

    // START: 09 AOS Animation
    /* @required https://github.com/michalsnik/aos/tree/v2 */
    aosFunc: function () {
        var aos = e.select('.aos');
        if (e.isVariableDefined(aos)) {
            AOS.init({
                duration: 500,
                easing: 'ease-out-quart',
                once: true
            });
        }
    },
    // END: AOS Animation

    // START: 10 Pricing
    pricing: function () {
        var p = e.select('.price-wrap');
        if (e.isVariableDefined(p)) {
          var pWrap = e.selectAll(".price-wrap");
          pWrap.forEach(item => {

            var priceSwitch = item.querySelector('.price-toggle'),
            priceElement = item.querySelectorAll('.plan-price');

            priceSwitch.addEventListener('change', function () {
              if (priceSwitch.checked) {
                priceElement.forEach(pItem => {
                  var dd = pItem.getAttribute('data-annual-price');
                  pItem.innerHTML = dd;
                });
              } else {
                priceElement.forEach(pItem => {
                  var ee = pItem.getAttribute('data-monthly-price');
                  pItem.innerHTML = ee;
                });
              }
            });
          });
        }
    },
    // END: Pricing

    // START: 11 Sticky element
    /* @required https://github.com/rgalus/sticky-js */
    stickyElement: function () {
    var scrollpos = window.scrollY;
    var sp = e.select('.sticky-element');
    if (e.isVariableDefined(sp)) {
        var add_class_on_scroll = () => sp.addClass("sticky-element-sticked");
        var remove_class_on_scroll = () => sp.removeClass("sticky-element-sticked");

        window.addEventListener('scroll', function () {
            scrollpos = window.scrollY;
            if (scrollpos >= 800) {
                add_class_on_scroll()
            } else {
                remove_class_on_scroll()
            }
        });
    }
    },
    // END: Sticky element

    // START: 12 Fake Password
    fakePwd: function () {
      if (e.isVariableDefined(e.select('.fakepassword'))) {
        var password = document.querySelector('.fakepassword');
        var toggler = document.querySelector('.fakepasswordicon');
      
        var showHidePassword = () => {
          if (password.type == 'password') {
            password.setAttribute('type', 'text');
            toggler.classList.add('fa-eye');
          } else {
            toggler.classList.remove('fa-eye');
            password.setAttribute('type', 'password');
          }
        };
      
        toggler.addEventListener('click', showHidePassword);
      }
    },
    // END: Fake Password

     // START: 13 Parallax Background
    /* @required https://github.com/nk-o/jarallax */
    parallaxBG: function () {
      var parBG = e.select('.bg-parallax');
      if (e.isVariableDefined(parBG)) {
          jarallax(e.selectAll('.bg-parallax'), {
              speed: 0.6
          });
      }
    },
    // END: Parallax Background

    // START: 14 Typing Text Animation
    /* @required https://github.com/luisvinicius167/ityped */
    typeText: function () {
      var t = e.select('.typed');
      if (e.isVariableDefined(t)) {
          var type = e.selectAll('.typed');
          type.forEach(el => {
              var strings = el.getAttribute('data-type-text');
              var split_strings = strings.split("&&");
              var typespeed = el.getAttribute('data-speed') ? el.getAttribute('data-speed') : 200;
              var typeBackSpeed = el.getAttribute('data-back-speed') ? el.getAttribute('data-back-speed') : 50;

              ityped.init(el, {
                  strings: split_strings,
                  showCursor: true,
                  typeSpeed: typespeed,
                  backSpeed: typeBackSpeed
              });
          });
      }
    },
  // END: Typing Text Animation

    // START: 15 Isotope
    /* @required https://isotope.metafizzy.co/ */

    enableIsotope: function () {
    var isGridItem = e.select('.grid-item');
    if (e.isVariableDefined(isGridItem)) {

        // Code only for normal Grid
        var onlyGrid = e.select('[data-isotope]');
        if (e.isVariableDefined(onlyGrid)) {
            var allGrid = e.selectAll("[data-isotope]");
            allGrid.forEach(gridItem => {
                var gridItemData = gridItem.getAttribute('data-isotope');
                var gridItemDataObj = JSON.parse(gridItemData);
                var iso = new Isotope(gridItem, {
                    itemSelector: '.grid-item',
                    layoutMode: gridItemDataObj.layoutMode
                });

                imagesLoaded(gridItem).on('progress', function () {
                    // layout Isotope after each image loads
                    iso.layout();
                });
            });
        }

        // Code only for normal Grid
        var onlyGridFilter = e.select('.grid-menu');
        if (e.isVariableDefined(onlyGridFilter)) {
            var filterMenu = e.selectAll('.grid-menu');
            filterMenu.forEach(menu => {
                var filterContainer = menu.getAttribute('data-target');
                var a = menu.dataset.target;
                var b = e.select(a);
                var filterContainerItemData = b.getAttribute('data-isotope');
                var filterContainerItemDataObj = JSON.parse(filterContainerItemData);
                var filter = new Isotope(filterContainer, {
                    itemSelector: '.grid-item',
                    transitionDuration: '0.7s',
                    layoutMode: filterContainerItemDataObj.layoutMode
                });

                var menuItems = menu.querySelectorAll('li a');
                menuItems.forEach(menuItem => {
                    menuItem.addEventListener('click', function (event) {
                        var filterValue = menuItem.getAttribute('data-filter');
                        filter.arrange({filter: filterValue});
                        menuItems.forEach((control) => control.removeClass('active'));
                        menuItem.addClass('active');
                    });
                });

                imagesLoaded(filterContainer).on('progress', function () {
                    filter.layout();
                });
            });
        }

        }
    },
    // END: Isotope

  // START: 16 Swiper slider
  /* @required https://github.com/nolimits4web/Swiper */
  swiperSlider: function () {

    var swpr = e.select('[data-swiper-options]');
    if (e.isVariableDefined(swpr)) {

      // basic options for all sliders
      let defaults = {
        spaceBetween: 0,
        slidesPerView: 1,
        loop: true,
        autoplay:{
          delay: 2000,
          disableOnInteraction: false,
          pauseOnMouseEnter: false,
        },
        freeMode: false,
      };
      
      // call init function
      initSwipers(defaults);
      
      function initSwipers(defaults = {}, selector = ".swiper") {
        // get all swiper elements
        let swipers = document.querySelectorAll(selector);
      
        // iterate over swiper elements
        swipers.forEach((swiper) => {
          // get custom options
          let optionsData = swiper.getAttribute("data-swiper-options")
            ? JSON.parse(swiper.getAttribute("data-swiper-options"))
            : {};
      
          // combine defaults and custom options
          let options = {
            ...defaults,
            ...optionsData
          };
      
          // init swiper
          new Swiper(swiper, options);
        });
      }
    }
  },
  // END: Swiper slider

    // START: 17 Purecounter
    /* @required https://github.com/srexi/purecounterjs */
    pCounter: function () {
        var pCounter = e.select('.purecounter');
        if (e.isVariableDefined(pCounter)) {
            new PureCounter();
        }
    },
    // END: Purecounter

};
e.init();