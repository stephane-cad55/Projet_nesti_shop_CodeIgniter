// variable initialisée au départ à 0 pour le total de la commande
var total = 0;

// ajout d'articles(s) ( seulement 1 item de plus )
function dogetItem(produit, price, id) {
    if (window.localStorage.getItem(id) == null) {
        // on l'ajoute
        let s = JSON.stringify({ qty: 1, price: price, name: produit, id: id });
        localStorage.setItem(id, s);
    } else {
        // s'il existe il faut additionner les quantités     
        // sinon on l'ajoute à l'ancienne valeur.
        let oldS = window.localStorage.getItem(id); // récupère l'ancien JSON
        let objet = JSON.parse(oldS); // décode pour récupere l'objet
        let newQty = Number(objet.qty) + 1; // nouvelle qty
        let s = JSON.stringify({ qty: newQty, price: objet.price, name: objet.name, id: objet.id }); // on reconstruit l'objet et  on le transform en string
        localStorage.setItem(id, s);
    }
}

// fonction d'affichage des articles ajoutés dans le panier dans la vue du détail article
function showQuantity(id) {
    if (window.localStorage.getItem(id) !== null) {
        let json = localStorage.getItem(id);
        let value = JSON.parse(json);
        document.getElementById("infoCart").innerHTML = "Vous avez " + value.qty + " " + value.name + " dans votre panier";
    } else {
        document.getElementById("infoCart").innerHTML = "";
    }
}

// mise à jour du panier
function dosetQuantity(id, quantity) {
    if (window.localStorage.getItem(id) !== null) {
        const parsed = Number.parseInt(quantity);
        if (!Number.isNaN(parsed)) {
            let oldS = window.localStorage.getItem(id); // récupère l'ancien JSON
            let objet = JSON.parse(oldS); // décode pour récupere l'objet
            let s = JSON.stringify({ qty: quantity, price: objet.price, name: objet.name, id: objet.id }); // on reconstruit l'objet et  on le transform en string
            localStorage.setItem(id, s);

            // changer la valeur du prix total 
            let tdPriceTot = document.getElementById('price-tot-' + id);
            let lineTotal = quantity * Number(objet.price);
            tdPriceTot.textContent = lineTotal + "€";

            setPriceTotal();

        } else {
            alert("Ceci n'est pas un entier");
        }

    } else {
        alert("Ce produit n'existe pas");
    }
}

// changer la valeur du prix total de la commande
function setPriceTotal() {
    let total = 0;
    for (let i = 0; i < localStorage.length; i++) {
        var localValue = localStorage.getItem(localStorage.key(i));
        if (Number(localStorage.key(i))) {

            let objet = JSON.parse(localValue);
            total += objet.qty * objet.price;
            console.log(objet);
            console.log(objet.qty);
        }
    }
    let totalContent = document.getElementById('totalOrder');
    if (totalContent) {
        totalContent.classList = "font-weight-bold";
        totalContent.innerHTML = "Prix Total Commande : " + total + " €uros";
    }
}

// fonction d'affichage des articles ajoutés dans le panier dans la vue du panier
function showTrItem(produit, quantity, price, id) {

    var arrayCart = document.getElementById("prodCart");

    let tr = document.createElement("tr");

    // nom du produit
    let td = document.createElement('td');
    td.textContent = produit;
    tr.appendChild(td);

    // quantité
    let tdQty = document.createElement('td');
    tdQty.classList = "w-25";
    let divQty = document.createElement('div');
    divQty.classList = "text-center";

    let input = document.createElement('input');
    input.type = 'number'; input.min="1";
    input.value = quantity;
    input.classList = 'form-control, mb-1, rounded, text-center';
    input.addEventListener('change', function () {
        let newQty = this.value;
        dosetQuantity(id, newQty); // event quand on change la qty
    })

    divQty.appendChild(input);
    tdQty.appendChild(divQty);
    tr.appendChild(tdQty);

    // prix
    let tdPrice = document.createElement('td');
    tdPrice.classList = "text-center, font-weight-bold";
    tdPrice.textContent = price + " €";
    tr.appendChild(tdPrice);

    // prix Total 
    quantity = parseInt(quantity, 10);
    price = parseFloat(price, 10);
    let priceTotal = quantity * price;
    let tdPriceTotal = document.createElement('td');
    tdPriceTotal.classList = "text-center, font-weight-bold";
    tdPriceTotal.textContent = priceTotal + " €";
    tdPriceTotal.id = "price-tot-" + id;
    tr.appendChild(tdPriceTotal);

    // total commande
    let totalContent = document.getElementById('totalOrder');
    totalContent.classList = "font-weight-bold";
    totalContent.innerHTML = "Prix Total Commande : " + (total + priceTotal) + " €uros";
    total += priceTotal;

    arrayCart.appendChild(tr);
}
setPriceTotal();

// quand le document est pret 
document.addEventListener("DOMContentLoaded", function () {

    var btnAddCart = document.getElementById("prod");
    if (btnAddCart != null) {
        var produit = btnAddCart.getAttribute('data-name');
        var price = btnAddCart.getAttribute('data-price');
        var id = btnAddCart.getAttribute('data-id');

        showQuantity(id);

        btnAddCart.addEventListener('click', function () {
            // number sera tjs = à 1
            dogetItem(produit, price, id);
            showQuantity(id);
        })
    }

    // table dans la vue du panier
    var arrayCart = document.getElementById("prodCart");
    if (arrayCart != null) {
        // récuperer la liste du panier ( console. log)
        for (var i = 0; i < localStorage.length; i++) {
            let key = localStorage.key(i);
            if (!Number.isNaN(key)) {
                // console.log(key, localStorage.getItem(key));
                try {
                    let json = localStorage.getItem(key);
                    console.log(json);
                    console.log(key);
                    let objet = JSON.parse(json);
                    if (objet.name != undefined && objet.qty != undefined && objet.price != undefined) {
                        showTrItem(objet.name, objet.qty, objet.price, key);
                    }
                } catch (error) {
                    console.log(error);
                }

            }

        }
    }
});