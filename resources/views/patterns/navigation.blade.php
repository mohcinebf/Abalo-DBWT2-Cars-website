<style>
    body {
        font-family: Calibri, serif;
    }

    a {
        color: floralwhite;
        text-decoration: none;
    }

    .navigation {
        display: flex;
        width: 50%;
        margin: auto;
        left: 25%;
        right: 25%;
        height: 50px;
        max-height: 300px;
        justify-content: space-evenly;
        background-color: #3a4558;
    }


    .maincategory {
        display: flex;
        width: 100%;
        height: 100%;
        text-align: center;
        justify-content: center;
        align-items: center;
    }
    .maincategory:hover {
        background-color: #4a5568;
    }

    .subnav {
        display: flex;
        width: 50%;
        margin: auto;
        left: 25%;
        right: 25%;
        height: 30px;
        max-height: 300px;
        justify-content: space-evenly;
        background-color: #4a5568;
        opacity: 0.7;
    }

    .textcategory {
        font-size: 20px;
    }

</style>
<div class="navigation" id="navigation">
</div>
<div class="subnav" id="subnav">
</div>
<script>
    "use strict";

    //region ClassDefinitions
    class InteractiveMenu {
        categories = [];
        addCategory(category) {
            this.categories.push(category);
        }
    }
    class MenuAbstractCategory {
        name = "Default"
        link = "localhost:8000/"
        constructor(obj) {
            this.link = obj["link"];
            this.name = obj["name"];
        }
        handleClick() {
            console.log(this.link);
            //location.href = this.link;
        }
    }
    class MenuCategory extends MenuAbstractCategory {
        subCategories = [];

        constructor(obj) {
            super(obj);
        }

        onHover() {
            this.expandSubCategories();
        }
        addChild(subCategory) {
            this.subCategories.push(subCategory);
        }
        expandSubCategories() {
            if(currentSub === this.name) return;
            currentSub = this.name;
            showSub(this.subCategories);
        }
    }
    class MenuSubCategory extends MenuAbstractCategory {
        constructor(obj, parent) {
            super(obj);
            this.parent = parent;
            parent.addChild(this);
        }
        parent = null;
    }
    //endregion

    var currentSub;
    const menuStructure = {
        home: {
            name: "Home",
            link: "http://localhost:8000/home"
        },
        categories: {
            name: "Kategorien",
            link: "http://localhost:8000/categories",
            subcategories: {
                cars: {
                    name: "Autos",
                    link: "#"
                },
                phones: {
                    name: "Handys",
                    link: "#"
                },
                tools: {
                    name: "Werkzeuge",
                    link: "#"
                }
            }
        },
        sell: {
            name: "Verkaufen",
            link: "http://localhost:8000/sell"
        },
        company: {
            name: "Unternehmen",
            link: "http://localhost:8000/company",
            subcategories: {
                philosophy: {
                    name: "Philosophie",
                    link: "http://localhost:8000/company/philosophy"
                },
                career: {
                    name: "Karriere",
                    link: "http://localhost:8000/company/career"
                }
            }
        }
    }
    const navigation = new InteractiveMenu();

    function initMenu(){
        for (const [, value] of Object.entries(menuStructure)) {
            let category = new MenuCategory(value);
            navigation.addCategory(category);

            if(value["subcategories"] === undefined) continue;
            for (const [, subvalue] of Object.entries(value["subcategories"])) {
                new MenuSubCategory(subvalue, category);
            }
        }
    } //Initialisiert navigations Struktur navigation von menuStructure.
    function createMenu(){
        let div = document.getElementById("navigation");
        for(const val of navigation.categories) {
            let mainCategoryLink = document.createElement("a");
            let textdiv = document.createElement("div");

            textdiv.className = "textcategory";
            textdiv.innerText = val.name;

            mainCategoryLink.className = "maincategory";
            mainCategoryLink.href = val.link;
            mainCategoryLink.addEventListener("mouseover", function() {
                val.onHover();
            })

            mainCategoryLink.appendChild(textdiv);
            div.appendChild(mainCategoryLink);
        }
    } //Zeigt die initialisierte Navigations Struktur an.
    function showSub(subs){
        let div = document.getElementById("subnav");
        div.innerHTML = "";
        if(subs.length === 0) return;
        for(const val of subs) {
            let subCategoryLink = document.createElement("a");
            let textdiv = document.createElement("div");

            textdiv.className = "textcategory";
            textdiv.innerText = val.name;

            subCategoryLink.className = "maincategory";
            subCategoryLink.href = val.link;

            subCategoryLink.appendChild(textdiv);
            div.appendChild(subCategoryLink);
        }
    } //Zeigt die Subkategorien an.

    initMenu();
    createMenu();
</script>
