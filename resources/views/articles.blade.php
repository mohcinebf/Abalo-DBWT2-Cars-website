<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikeln</title>
</head>
<body>
@include("patterns/navigation")
<div class="Navigationsmenues"></div>
<h2>Search for a Item</h2>
<form method="GET" action="/articles">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="enter the item name here">
    <button type="submit">Search</button>
</form>
<br>

{{-- Warenkorb --}}
    <div id="Shopping Cart">
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


    {{-- Hinzufügen und Loeschen im Warenkorb --}}
    <script>
        'use strict'

        /** array contains all cart-element id
         * @type {any[]}
         */
        let CartList = new Array();

        /** div element contains cart table
         * @type {HTMLElement}
         * be hidden when no article in cart
         */
        let divShoppingCart = document.getElementById("Shopping Cart");
        if (CartList.length == 0)
            divShoppingCart.style.visibility = "hidden";

        /** table <tbody> element
         * */
        let cartTable = document.getElementById("cart");


        /** function to create a table when '+' button was clicked
         * @param id : id of the selected article
         */
        function shoppingCart(id) {
            CartList.push(id);
            divShoppingCart.style.visibility = "visible";

            let new_cartElement = document.createElement("tr");
            new_cartElement.setAttribute("id", "cartElement" + id);

            let tdName = document.createElement("td");
            let tdPrice = document.createElement("td");
            let tdImage = document.createElement("td");
            let tdRemove = document.createElement("td");

            /** find selected items
             * @type {HTMLElement}
             */
            let addButtonColumn = document.getElementById("input" + id);
            let articleRow = document.getElementById(''+id);

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
                addButtonColumn.style.visibility = "hidden";
            }

            /** create remove button
             * @type {HTMLInputElement}
             */
            let removeButton = document.createElement("input");
            removeButton.setAttribute("id", "remove" + id);
            removeButton.setAttribute("type", "button");
            removeButton.setAttribute("value", "-");
            tdRemove.append(removeButton);
            removeButton.onclick = function() {remove_from_shopping_cart(id)};

            /** add "td" elements to "tr"
             */
            new_cartElement.append(tdName);
            new_cartElement.append(tdPrice);
            new_cartElement.append(tdImage);
            new_cartElement.append(tdRemove);

            /** add "tr" elements to <table body>
             */
            cartTable.append(new_cartElement);
        }

        /**  function to remove a article from shopping cart
         * @param id of the selected article when click '-' button
         */
        function remove_from_shopping_cart(id) {

            /** remove a row by removing a <tr> tag
             * */
            let trRemoveItem = document.getElementById("cartElement" + id);
            cartTable.removeChild(trRemoveItem);

            /** delete article-id in cart-element array
             * hide the <div> area when ta no article in cart
             */
            CartList.splice(CartList.indexOf(id), 1);
            if (CartList.length == 0)
                divShoppingCart.style.visibility = "hidden";

            /** make '+' button visible again
             * give user an option to add to cart again
             * @type {HTMLElement}
             */
            let addButtonColumn = document.getElementById("input" + id);
            addButtonColumn.style.visibility = "visible";
        }
</script>
</table>
@include("patterns/cookieform")
</body>
