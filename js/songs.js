export default class Songs {
    constructor() {
        this.data = {
            password: "Qwerty123",
        }

        this.rootElem = document.querySelector('.products');
        this.filter = this.rootElem.querySelector('.filter');
        this.items = this.rootElem.querySelector('.items');

        this.nameSearch = this.filter.querySelector('.nameSearch');
    }

    async init() { // index.html kalder på init funktionen, hvor init kalder på render funktionen, som til sidst kalder på getData funktionen
        this.nameSearch.addEventListener('input', () => {
            if (this.nameSearch.value.length >= 3) {
                this.render();
            }
            this.render();
        });

        await this.render();
    }

    async render() {
        const data = await this.getData();

        const row = document.createElement('div');
        row.classList.add('row', 'g-4');

        for (const item of data) {
            const col = document.createElement('div');
            col.classList.add('col-md-6', 'col-lg-4', 'col-xl-3');

            col.innerHTML = `
                    <div class="card bg-customSecondary bg-gradient h-100">
                        <a href="product.php?songId=${item.songId}"><img src="uploads/${item.songImg}" class="card-img-top"></a>
                        <div class="card-body">
                            <h5 class="card-title">${item.songArtist} - ${item.songName}</h5>
                            <hr>
                            <p class="card-text">${item.songDescShort}</p>
                        </div>
                        <div class="p-3">
                            <a href="product.php?songId=${item.songId}" class="btn btn-customBtn bg-gradient text-white w-100">See more</a>
                        </div>
                    </div>
                    `;
            row.appendChild(col);
        }

        this.items.innerHTML = '';
        this.items.appendChild(row);

    }

    async getData() { // Fetcher dataen fra api.php
        this.data.nameSearch = this.nameSearch.value;

        const response = await fetch('api.php', {
            method: "POST",
            body: JSON.stringify(this.data)
        });
        return await response.json();
    }
}