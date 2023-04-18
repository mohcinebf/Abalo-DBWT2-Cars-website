var data = {
    'produkte': [
        { name: 'Ritterburg', preis: 59.99, kategorie: 1, anzahl: 3 },
        { name: 'Gartenschlau 10m', preis: 6.50, kategorie: 2, anzahl: 5 },
        { name: 'Robomaster' ,preis: 199.99, kategorie: 1, anzahl: 2 },
        { name: 'Pool 250x400', preis: 250, kategorie: 2, anzahl: 8 },
        { name: 'Rasenmähroboter', preis: 380.95, kategorie: 2, anzahl: 4 },
        { name: 'Prinzessinnenschloss', preis: 59.99, kategorie: 1, anzahl: 5 }
    ],
    'kategorien': [
        { id: 1, name: 'Spielzeug' },
        { id: 2, name: 'Garten' }
    ]
};
export default data;

class Product {
    name;
    price;
    category;
    number;

    constructor(new_name, new_price, new_category, new_number) {
        this.name = new_name;
        this.price = new_price;
        this.category = new_category;
        this.number = new_number;
    }
}
class Category {
    id;
    name;

    constructor(new_id, new_name) {
        this.id = new_id;
        this.name = new_name;
    }
}
function data_to_object() {
    let new_product = new Array;
    let i = 0;
    for (const product of data.produkte) {
        new_product[i++] = new Product(product.name, product.preis, product.kategorie, product.anzahl);
    }

    let new_category = new Array;
    let k = 0;
    for (const category of data.kategorien) {
        new_category[k++] = new Category(category.id, category.name);
    }
}
