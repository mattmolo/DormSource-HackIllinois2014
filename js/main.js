function getDateTime() {
    var now     = new Date();
    var year    = now.getFullYear();
    var month   = now.getMonth()+1;
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();

    if(month.toString().length == 1)
        month = '0'+month;
    if(day.toString().length == 1)
        day = '0'+day;
    if(hour.toString().length == 1)
        hour = '0'+hour;
    if(minute.toString().length == 1)
        minute = '0'+minute;
    if(second.toString().length == 1)
        second = '0'+second;

    var dateTime = year+'/'+month+'/'+day+' '+hour+':'+minute+':'+second;
    return dateTime;
    }

function confirm(key) {
    setTimeout(function() {
        window.location.href = "confirm.html?key=" + key;
    }, 300);
}

function addRequest() {
    var firebase = new Firebase("https://quickdelivery.firebaseio.com");
    var nameI =  $("#name").val();
    var placeI =  $("#place").val();
    var locationI =  $("#location").val();
    var phoneI =  $("#phone").val();
    var notesI =  $("#notes").val();
    var requests = firebase.child('Requests');

    var request = requests.push( {
        Name: nameI,
        Place: placeI,
        Location: locationI,
        Phone: phoneI,
        Note: notesI,
        Time: getDateTime()
    });

    key = request.toString();
    var idx = key.indexOf("Requests/");
    key =  key.substring(idx, key.length);

    NProgress.configure({ trickleRate: 0.1, trickleSpeed: 300, showSpinner: false });
    NProgress.start();
    setTimeout(function() {
        NProgress.done();
        confirm(key);
    }, 500);
 }

function getParams() {
    var idx = document.URL.indexOf('?');
    var params = new Array();
    if (idx != -1) {
        var pairs = document.URL.substring(idx + 1, document.URL.length).split('&');
        for (var i = 0; i < pairs.length; i++) {
            nameVal = pairs[i].split('=');
            params[nameVal[0]] = nameVal[1];
        }
    }
    return params;
}