(function () {

    'use strict';

    function reqListener() {
        var response = JSON.parse(this.responseText);
        var timelineContainer = $('ul.timeline');

        response.data.peg.pegEvents.map(function(peg){
            var item = timelineContainer.append('<li class="timeline-inverted"><div class="timeline-avatar"><img src="https://nl.gravatar.com/userimage/53532088/935529cd68aca7983949ebcc44355078.jpg?size=200" class="img-responsive img-circle"></div><div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">Some title</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 2016</small></p></div><div class="timeline-body">blabla</div></div></li>');
            $(item).addClass('super-test');
        });
    }

    function fetchPeg() {
        const fetchPegsQuery = 'query MyPeg($pegShortcode: String!) { peg(shortcode: $pegShortcode) { shortcode, pegEvents { description, location, comment } } }';
        window.graphQLFetch(fetchPegsQuery, {pegShortcode: window.pegShortcode}, reqListener);
    }

    fetchPeg();

    $('#addEventModal form').submit(function(event) {
        event.preventDefault();

        // get all the inputs into an array.
        var inputs = $('#addEventModal form :input[class="form-control"]');

        // get an associative array of just the values.
        var values = {};
        inputs.each(function() {
            values[this.name] = $(this).val();
            $(this).val('');
        });

        const query = "query CreateEvent {" +
            "peg(shortcode: \"" + window.pegShortcode + "\") {" +
                "createPegPictureEvent (comment:\"" + values['description'] + "\", location:\"" + values['location'] + "\", pictureUrl:\"" + values['picture'] + "\") { id }" +
            "}" +
        "}";
        window.graphQLFetch(query, {}, function() {
            fetchPeg();
        });

        var modal = $(event.currentTarget).closest('.modal');
        $(modal).modal('hide');
        console.log(modal);
    });
})();
