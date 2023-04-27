<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Artikeln</title>
</head>
<body>
<div class="Navigationsmenues"></div>
@include("patterns/cookieform")
</body>
<script>
    const menuStructure =[
        {name:"Home",link:"#"},
        {name:"Kategorien",link:"#"},
        {name: "Verkaufen",link:"#"},
        {name: "Unternehmen",subMenu:[
                {name:"Philosophie",link:"#"},{name: "Karriere",link:"#"}]
        },
    ];
    function createMenu(menuStructure) {
        const menu = document.createElement("ul");

        for(let i=0;i<menuStructure.length;i++){

            const menuItemElement = document.createElement("li");
            const menuItemLink = document.createElement("a");
            menuItemLink.href = menuStructure[i].link;
            menuItemLink.innerText = menuStructure[i].name;
            menuItemElement.appendChild(menuItemLink);

            if (menuStructure[i].subMenu) {
                const subMenu = createMenu(menuStructure[i].subMenu);
                menuItemElement.appendChild(subMenu);
            }

            menu.appendChild(menuItemElement);
            let Navigationsmenues = document.getElementsByClassName("Navigationsmenues")[0];
            Navigationsmenues.appendChild(menu);

        }

        return menu;
    }

    createMenu(menuStructure);

</script>
</html>
