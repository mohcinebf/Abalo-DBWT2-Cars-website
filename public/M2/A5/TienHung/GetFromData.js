'use strict'

import data from "./data.js";

/** return the name of the product, which
 *  has the highest price from the received data
 * */
function getMaxPreis(data) {

    let max_price = 0;
    let highest_priced_ProductName;
    for (let product of data.produkte) {
        if (product.preis >= max_price) {
            max_price = product.preis;
            highest_priced_ProductName = product.name;
        }
    }
    return highest_priced_ProductName;
}

/** return the information of the product, which
 *  has the lowest price from the received data
 * */
function getMinPreisProdukt(data) {

    let min_price = Number.MAX_VALUE;
    let lowest_priced_Product;
    for (let product of data.produkte) {
        if (product.preis <= min_price) {
            min_price = product.preis;
            lowest_priced_Product = product;
        }
    }
    return lowest_priced_Product;
}

/** return the total price of all products
 * */
function getPreisSum(data) {
    let sum = 0;
    for (let product of data.produkte) {
        sum += product.preis;
    }
    return sum;
}

/** return the total price include number of product
 * */
function getGesamtWert(data) {
    let sum = 0;
    for (let product of data.produkte) {
        sum += product.preis * product.anzahl;
    }
    return sum;
}

/** die Gesamtanzahl aller Produkte einer
 *  Kategorie berechnet und zurückgibt
 *  */
function getAnzahlProdukteOfKategorie(data, category) {

    let cat_id;
    for (let cat of data.kategorien) {
        if (cat.name === category)
            cat_id = cat.id;
    }

    let sum = 0;
    for (let product of data.produkte) {
        if (product.kategorie === cat_id) {
            sum += product.preis * product.anzahl;
        }
    }
    return sum;
}


let category = 'Spielzeug';

console.log('highest priced product is: ', getMaxPreis(data));
console.log('information about lowest priced product: ', getMinPreisProdukt(data));
console.log('total price of all product types is: ', getPreisSum(data));
console.log('total price of all products is: ', getGesamtWert(data));
console.log(`total price of all products in category ${category} is: `,
    getAnzahlProdukteOfKategorie(data, category));

