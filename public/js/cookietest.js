window.onload = checkCookie;
function checkCookie() {
    if(cookieIsSet()) return;
    document.getElementById("cookieformfooter").style.display = "block";
    document.getElementById("acceptCookies").addEventListener("click", acceptCookies);
    document.getElementById("declineCookies").addEventListener("click", declineCookies);
}
function cookieIsSet() {
    return document.cookie.includes("allowcookies");
}

function acceptCookies() {
    document.cookie = "allowcookies=true; samesite = strict";
    document.getElementById("cookieformfooter").style.display = "none";
}
function declineCookies() {
    document.cookie = "allowcookies=false; samesite = strict";
    document.getElementById("cookieformfooter").style.display = "none";
}
