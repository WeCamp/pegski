(function () {

    'use strict';

    // define variables
    var items = document.querySelectorAll(".timeline li");

    // check if an element is in viewport
    // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
    function isElementInViewport(el) {
        var rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function callbackFunc() {
        for (var i = 0; i < items.length; i++) {
            if (isElementInViewport(items[i])) {
                items[i].classList.add("in-view");
            }
        }
    }

    function reqListener() {
        var response = JSON.parse(this.responseText);
        var pegsContainer = $('.pegski-recent-pegs');

        response.data.pegs.map(function(peg){
            console.info(peg);
            console.log(pegsContainer);
            pegsContainer.append('<div class="col-md-3"><div class="pegski-peg-block" style=""><div class="pegski-peg-image" style="height: 200px; background-color: #333"><span style="color: #fff;">Picture!</span></div><div class="pegski-peg-description"><i class="fa fa-clock-o" aria-hidden="true"></i>      9:40 @ Veluwemeer by <span class="peg-owner">' +
                peg.shortcode +
                '</span></div></div></div>');
        });


    }

    function fetchPegs() {
        const fetchPegsQuery = 'query Test { pegs { shortcode } }';
        window.graphQLFetch(fetchPegsQuery, {}, reqListener);
    }

    fetchPegs();

    // listen for events
    window.addEventListener("load", callbackFunc);
    window.addEventListener("resize", callbackFunc);
    window.addEventListener("scroll", callbackFunc);

    $('#registerPeg').click(function(event) {
        event.preventDefault();

        const fetchPegsQuery = 'mutation NewPeg { createPeg { shortcode } }';
        window.graphQLFetch(fetchPegsQuery, {}, function() {
            var response = JSON.parse(this.responseText);
            var shortcode = response.data.createPeg.shortcode;
            window.location = '/' + shortcode;
        });
    });
})();
