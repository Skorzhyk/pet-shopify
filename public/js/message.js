$(function() {
    $('#messages-grid th').click(function () {

        var url = document.location.href.split('?')[0];
        var params = getParams();

        var order = $(this).data('field');

        params['order_type'] = !params['order'] || params['order'] !== order || params['order_type'] === 'desc' ? 'asc' : 'desc';
        params['order'] = order;

        var isFirstParam = true;
        for (var param in params) {
            if (isFirstParam) {
                url += '?';

                isFirstParam = false;
            } else {
                url += '&';
            }

            url += param + '=' + params[param];
        }

        document.location.href = url;
    });
});

function getParams(){
    var urlVar = window.location.search,
        valueAndKey = [],
        resultArray = [],
        arrayVar = (urlVar.substr(1)).split('&');

    if (arrayVar[0] === '') {
        return [];
    }
    for (var i = 0; i < arrayVar.length; i ++) {
        valueAndKey = arrayVar[i].split('=');
        resultArray[valueAndKey[0]] = valueAndKey[1];
    }

    return resultArray;
}
