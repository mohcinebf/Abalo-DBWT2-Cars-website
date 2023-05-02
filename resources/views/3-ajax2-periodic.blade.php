<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aufgabe2 ajax2</title>
</head>
<body>
    <div class="message"></div>
<script>
    "use strict";
    let Myrequest = function(){
    let message = document.querySelector('.message');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'static/message.json');
    xhr.setRequestHeader('Content-type','application/json');
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4)
        if(xhr.status === 200){
            let o =JSON.parse(xhr.responseText);
            console.log(o);
            message.innerText = o.message;
        }
        else{
            console.error(xhr.statusText);
        }
    }
    xhr.send();
}
setInterval(Myrequest, 3000);

</script>
</body>
</html>
