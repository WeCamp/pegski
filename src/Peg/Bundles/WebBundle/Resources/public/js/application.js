var graphQLFetch = function(query, variables, callback) {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", callback);
    oReq.open("POST", Routing.generate('overblog_graphql_endpoint'));
    //oReq.responseType = 'json';
    oReq.setRequestHeader('content-type', 'application/json');
    oReq.setRequestHeader('accept', 'application/json');

    oReq.send(JSON.stringify(
        {
            query: query,
            variables: variables
        }
    ));
};

$('#timelineSearch').keyup(function(event) {
    if (event.keyCode == 13) {
        var shortcode = $(event.currentTarget).val();
        window.location = Routing.generate('web_timeline', {'shortcode': shortcode});
    }
});

window.graphQLFetch = graphQLFetch;

if (window.pegShortcode) {
    $('#timelineSearch').prop('value', window.pegShortcode);
}
