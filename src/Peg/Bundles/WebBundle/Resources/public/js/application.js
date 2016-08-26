var graphQLFetch = function(query, variables, callback) {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", callback);
    oReq.open("POST", "/app_dev.php/graphql/");
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