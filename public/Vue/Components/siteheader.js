export default {
    mounted() {
        this.createMenu(this.menuStructure);
        let hasChildren = document.querySelectorAll('.has-children');
        hasChildren.forEach(item => {
            item.addEventListener('click', () => {
                item.querySelector('.childList').classList.toggle('active');
            });
        });
    },
    data: function () {
        return {
            menuStructure: [
                { name: "Home", link: "#" },
                { name: "Kategorien", link: "#" },
                { name: "Verkaufen", link: "#" },
                {
                    name: "Unternehmen",
                    subMenu: [
                        { name: "Philosophie", link: "#" },
                        { name: "Karriere", link: "#" }
                    ]
                }
            ],
            search: "",
            items: []
        }
    },
    methods: {
        createMenu: function (menuStructure) {
            const menu = document.createElement("ul");

            for(let i=0;i<menuStructure.length;i++){
                const menuItemElement = document.createElement("li");
                menuItemElement.innerText = menuStructure[i].name;

                if (menuStructure[i].subMenu) {
                    const subMenu = this.createMenu(menuStructure[i].subMenu);
                    subMenu.classList.add("childList");
                    menuItemElement.classList.add("has-children");
                    menuItemElement.appendChild(subMenu);
                }
                menu.appendChild(menuItemElement);
                let Navigationsmenues = document.getElementById("Navigationsmenues");
                Navigationsmenues.appendChild(menu);
            }
            return menu;
        },

        fileExists(id, extension) {
            return new Promise((resolve, reject) => {
                const img = new Image();
                img.onload = () => {
                    resolve(true); // File exists
                };
                img.onerror = () => {
                    resolve(false); // File does not exist
                };
                img.src = this.getImageUrl(id, extension);
            });
        },

    },
    template: `
        <div id="header">
        <div class="logo">
            <img src="../logo.jpg" width="80px">
        </div>
        <div id="Navigationsmenues"></div>
        </div>
        `
}
