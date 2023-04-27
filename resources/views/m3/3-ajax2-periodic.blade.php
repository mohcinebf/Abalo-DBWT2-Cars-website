<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><Message of the Day</title>
    <style>
        .motdcontainer {
            background-color: #718096;
            width: 100%;
            height: 50px;
        }

        .motd {
            font-family: Calibri ,serif;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="motdcontainer">
        <div class="motd" id="motd">
        </div>
    </div>
</body>
<script>
    function updateMOTD(jsonData) {
        document.getElementById("motd").innerHTML = jsonData["message"] || "Empty"
    }
    function makeRequest() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "http://localhost:8000/getMOTD");
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if(xhr.status === 200) {
                    var jsonData = JSON.parse(xhr.responseText);
                    updateMOTD(jsonData);
                } else {
                    console.error(xhr.statusText);
                }
            }
        };
        xhr.onerror = function () {
            console.error(xhr.statusText);
        };
        xhr.send();
    }
    makeRequest();
    setInterval(makeRequest, 3000);
</script>
</html>
