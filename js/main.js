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

function login() {
    var newWindow = window.open("","Login","width=328,height=425, top=300, left=800");
    newWindow.location = "https://api.venmo.com/v1/oauth/authorize?client_id=1685&scope=make_payments%20access_profile%20access_email%20access_phone%20access_balance&response_type=token";
}

function loadPage(url) {
    var params = getParams();
    var key = unescape(params.access_token);
    window.location = url + key;
}

function addRequest(userId, json) {
    var firebase = new Firebase("https://quickdelivery.firebaseio.com");
    var Requests = firebase.child('Requests/');

    var full_name =  json.full_name;
    var phone =  json.phone;
    var restaurant =  $("#restaurant").val();
    var address =  $("#address").val();
    var notes =  $("#notes").val();


    var Request = Requests.push( {
        "user_id": userId,
        "restaurant": restaurant,
        "address": address,
        "phone": phone,
        "note": notes,
        "time": getDateTime(),
        "pin" : Math.floor((Math.random()*8999)+1000),
        "confirmation": 0
        },

        function() {
            key = Request.toString();
            var idx = key.indexOf("Requests/");
            key =  key.substring(idx + 9, key.length);
            var r = firebase.child('Users/' + userId + '/requests');
            r.child(key).set("0");

            NProgress.configure({ trickleRate: 0.1, trickleSpeed: 300, showSpinner: false });
            NProgress.start();
            setTimeout(function() {
                NProgress.done();
                post("confirm.php", "key", key);
            }, 800);
        });
 }

function post(url, name, value) {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.setAttribute("action", url);
    form.setAttribute("target", "_self");

    var hiddenField = document.createElement("input");
    hiddenField.setAttribute("type", "hidden");
    hiddenField.setAttribute("name", name);
    hiddenField.setAttribute("value", value);
    form.appendChild(hiddenField);
    document.body.appendChild(form);
    form.submit();
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