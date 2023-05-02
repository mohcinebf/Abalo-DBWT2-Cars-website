window.onload = function () {
// Create a menu structure
const menuStructure =[
    {name:"Home",link:"#"},
    {name:"Kategorien",link:"#"},
    {name: "Verkaufen",link:"#"},
    {name: "Unternehmen",subMenu:[
        {name:"Philosophie",link:"#"},
        {name: "Karriere",link:"#"}]
    },
];

function createMenu(menuStructure) {
    const menu = document.createElement("ul");

    for(let i=0;i<menuStructure.length;i++){
        //let lastElement = menuStructure.length-1;

        const menuItemElement = document.createElement("li");
        //const menuItemLink = document.createElement("a");
        //menuItemLink.href = menuStructure[i].link;
        menuItemElement.innerText = menuStructure[i].name;
        //menuItemElement.appendChild(menuItemLink);


        if (menuStructure[i].subMenu) {
            const subMenu = createMenu(menuStructure[i].subMenu);
            subMenu.classList.add("childList");
            menuItemElement.classList.add("has-children");
            menuItemElement.appendChild(subMenu);
        }
        menu.appendChild(menuItemElement);
        let Navigationsmenues = document.getElementById("Navigationsmenues");
        Navigationsmenues.appendChild(menu);

    }

    return menu;
}

createMenu(menuStructure);

    let hasChildren = document.querySelectorAll('.has-children');
    hasChildren.forEach(item => {
    item.addEventListener('click', () => {
    item.querySelector('.childList').classList.toggle('active');
    });
});

}

