<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikeln</title>
</head>
<body>
<div class="Navigationsmenues"></div>
<h1>List of Articles</h1>
<form method="GET" action="/articles">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="enter the item name here">
    <button type="submit">Search</button>
</form>
<br>
<table border="1px">
    <thead>
    <tr>
        <th>id</th>
        <th>ab_name</th>
        <th>ab_price</th>
        <th>ab_description</th>
        <th>ab_creator_id</th>
        <th>ab_createdate</th>
        <th>ab_image</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($abarticle as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td>{{ $article->ab_name }}</td>
            <td>{{ $article->ab_price }}</td>
            <td>{{ $article->ab_description }}</td>
            <td>{{$article->ab_creator_id}}</td>
            <td>{{$article->ab_createdate}}</td>
            @if($article->id== '18'||$article->id =='24'|| $article->id=='25'|| $article->id=='30')
                <td><img src="{{url('./articelimages/'.$article->id).'.png'}}" alt="Image" width="120"> </td>
            @else
                <td><img src="{{url('./articelimages/'.$article->id).'.jpg'}}" alt="Image" width="120"> </td>
            @endif
        </tr>
    @endforeach
    </tbody>
    <script>
        /*
        let Navigationsmenues = document.getElementsByClassName("Navigationsmenues")[0]; // select the first element with class "Navigationsmenues"
        let ulElement = document.createElement("ul");
        let liHome = document.createElement("li");
        let liKategorien = document.createElement("li");
        let liVerkaufen = document.createElement("li");
        let liUnternehmen = document.createElement("ul");
        let liPhilosophie = document.createElement("li");

        //let aHome = document.createElement("a");
        liHome.innerText = "Home";
        liKategorien.innerText = "Kategorien";
        liVerkaufen.innerText = "Verkaufen";
        liUnternehmen.innerText = "Unternehmen";
        liPhilosophie.innerText = "Philosophie";

        //liHome.appendChild(aHome);
        ulElement.appendChild(liHome);
        ulElement.appendChild(liKategorien);
        ulElement.appendChild(liVerkaufen);
        ulElement.appendChild(liUnternehmen);
        liUnternehmen.appendChild(liPhilosophie);

        Navigationsmenues.appendChild(ulElement);

        */
        //document.body.appendChild(Navigationsmenues);
        </script>
</table>
</body>
