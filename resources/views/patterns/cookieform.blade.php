<div id="cookieformfooter">
    <div id="cookieformContainer">
        <div id="cookieform">
            <div class="cookiebutton" id="acceptCookies">Accept Cookies</div>
            <div class="cookiebutton" id="declineCookies">Decline Cookies</div>
        </div>
    </div>
</div>
<style>
    #cookieformfooter {
        display: none;
        position: absolute;
        width: 100%;
        height: 10%;
        background-color: #ff9900;
        bottom: 0;
        left: 0;
    }
    #cookieformContainer {
        position: relative;
        height: 100%;
        width: 30%;
        float: right;
    }
    #cookieform {
        display: flex;
        position: relative;
        flex-direction: row;
        flex-wrap: nowrap;
        margin: auto;
        height: 100%;
        justify-content: space-evenly;
        align-items: center;
    }

    .cookiebutton {
        user-select: none;
        padding: 20px 30px;
        border: solid 2px white;
        border-radius: 3px;
        background-color: #99ff00;
        font-family: "Calibri", serif;
        font-size: 30px;
        transition: 0.3s;
    }

    .cookiebutton:hover {
        background-color: #77dd00;
    }
</style>
<script src="{{url("js/cookietest.js")}}"></script>
