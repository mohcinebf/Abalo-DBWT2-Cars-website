window.onload = checkCookie;
cookieform = "<button onclick='acceptCookies()'>Accept Cookies</button><button onclick='declineCookies()'>Decline Cookies</button>";

function checkCookie() {
    if(cookieIsSet()) return;
    document.getElementById("cookieform").innerHTML = cookieform;
}

function cookieIsSet() {
    return document.cookie.includes("allowcookies");
}

function acceptCookies() {
    document.cookie = "allowcookies=true; samesite = strict";
    document.getElementById("cookieform").innerHTML = "";
}
function declineCookies() {
    document.cookie = "allowcookies=false; samesite = strict";
    document.getElementById("cookieform").innerHTML = "";
}
