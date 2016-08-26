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

window.graphQLFetch = graphQLFetch;

if (window.pegShortcode) {
    $('#timelineSearch').prop('value', window.pegShortcode);
}
