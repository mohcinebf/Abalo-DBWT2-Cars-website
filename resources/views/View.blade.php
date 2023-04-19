<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikeln</title>
</head>
<body>
<div class="Navigationsmenues"></div>
<h2>Search for a Item</h2>
<form method="GET" action="/articles">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="enter the item name here">
    <button type="submit">Search</button>
</form>
<br>
<br>

{{-- Warenkorb --}}
    <div>
        <h2>Shopping Cart</h2>
        <table border="1px">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>REMOVE</th>
            </tr>
            </thead>
            <tbody id="cart">

            </tbody>
        </table>
        <br>
    </div>
<br>

{{-- Artikelübersicht --}}
<h1>List of Articles</h1>
<table border="1px">
    <thead>
    <tr>
        <th>id</th>
        <th>ab_name</th>
        <th>ab_price</th>
        <th>ab_description</th>
        <th>ab_creator_id</th>
        <th>ab_created_date</th>
        <th>ab_image</th>
        <th>ADD TO SHOPPING CART</th>

    </tr>
    </thead>
    <tbody>
    @foreach ($abarticle as $article)
        <tr id="{{$article->id}}">
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
            <td><input type="button" id="input{{ $article->id }}" value="+" onclick="shoppingCart({{ $article->id }})"></td>
        </tr>
    @endforeach
    </tbody>


    {{-- Hinzufügen zum Warenkorb --}}
    <script>
        'use strict'

        let cartTable = document.getElementById("cart");

        function shoppingCart(id) {

            let new_cartElement = document.createElement("tr");

            let tdName = document.createElement("td");
            let tdPrice = document.createElement("td");
            let tdImage = document.createElement("td");
            let tdRemove = document.createElement("td");

            /** find selected items
             *
             * @type {HTMLElement}
             */
            let addButtonColumn = document.getElementById("input" + id);
            let articleRow = document.getElementById(id);

            /**
             ** add content from the selected article to cart (name, price, image)
             ** this 'if' trigger when button '+' has been clicked.
             */
            if (addButtonColumn.getAttribute("value") === "+") {

                let tdNameContent = articleRow.getElementsByTagName("td").item(1).innerHTML;
                let tdPriceContent = articleRow.getElementsByTagName("td").item(2).innerHTML;
                let tdImageContent = articleRow.getElementsByTagName("td").item(6).innerHTML;
                tdName.innerHTML = tdNameContent;
                tdPrice.innerHTML = tdPriceContent;
                tdImage.innerHTML = tdImageContent;

                // hide the already clicked button
                addButtonColumn.style.visibility="hidden";
            }

            /** create remove button
             *
             * @type {HTMLInputElement}
             */
            let removeButton = document.createElement("input");
            removeButton.setAttribute("id", "remove" + id);
            removeButton.setAttribute("type", "button");
            removeButton.setAttribute("value", "-");
            tdRemove.append(removeButton);

            new_cartElement.append(tdName);
            new_cartElement.append(tdPrice);
            new_cartElement.append(tdImage);
            new_cartElement.append(tdRemove);

            cartTable.append(new_cartElement);

            let rmv = document.getElementById("remove" + id);
            if (rmv.getAttribute("value") === "-") {
                document.removeChild(new_cartElement);}
        }
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
