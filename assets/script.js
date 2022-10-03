document.addEventListener('DOMContentLoaded', function () {
    const pathName = window.location.pathname;
    console.log(pathName);
    if (pathName.endsWith("/classroom/")) {
        const tableBody = document.querySelector('#table-body');

        axios.get("http://localhost/classroom/classroom", {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        }).then(r => {
            r.data.forEach(element => {
                tableBody.innerHTML += `
            <tr>
                <td>${element.id}</td>
                <td>${element.nom}</td>
                <td>${element.heure}</td>
                <td>${element.date}</td>
                <td><a href="update/${element.id}">modifié</a></td>
                <td><a href="delete/${element.id}">supprimé</a></td>
            </tr>
            `;
            });
        })
    }
    if (pathName.startsWith("/classroom/add")) {
        const form = document.querySelector('#form');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const nom = document.querySelector('#nom').value;
            const heure = document.querySelector('#heure').value;
            const date = document.querySelector('#date').value;
            const formData = new FormData();
            formData.append('name', nom);
            formData.append('heure', heure);
            formData.append('date', date);
            axios.post("http://localhost/classroom/classroom", formData, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            }).then(r => {
                console.log(r);
            })
        })
    }
    if (pathName.startsWith("/classroom/update")) {
        const form = document.querySelector('#form');
        const id = pathName.split("/")[3];
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const nom = document.querySelector('#nom').value;
            const heure = document.querySelector('#heure').value;
            const date = document.querySelector('#date').value;
            const formData = new FormData();
            formData.append('name', nom);
            formData.append('heure', heure);
            formData.append('date', date);
            axios.put(`http://localhost/classroom/classroom?id=${id}`, formData, {}).then(r => {
                console.log(r);
                window.location.href = "http://localhost/classroom/";
            })
        })
    }
    if (pathName.startsWith("/classroom/delete")) {
        const id = pathName.split("/")[3];
        axios.delete(`http://localhost/classroom/classroom?id=${id}`, {}).then(r => {
            console.log(r);
            window.location.href = "http://localhost/classroom/";
        })
    }
});
