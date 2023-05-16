const app = new (function () {

    this.tbody = document.getElementById("tbody");
    this.id = document.getElementById("id");
    this.nombres = document.getElementById("nombres");
    this.email = document.getElementById("email");
    this.edad = document.getElementById("edad");

    this.listado = () => {

        fetch("../controllers/listado.php")
            .then((res) => res.json())
            .then((data) => {

                this.tbody.innerHTML = "";

                data.forEach((item) => {

                    this.tbody.innerHTML += `
                    <tr>
                    <th>${item.id}</th>
                    <th>${item.nombres}</th>
                    <th>${item.email}</th>
                    <th>${item.edad}</th>
                    <th>
                        <a href="javascript:;" onclick="app.edit(${item.id})">EDITAR</a>
                        <a href="javascript:;" onclick="app.eliminar(${item.id})">ELIMINAR</a>
                    </th>
                    
                    </tr>
                    `;

                });
            })
            .catch((err) => console.log(err))
    }

    this.save = () => {
        var form = new FormData();
        form.append("nombres", this.nombres.value);
        form.append("email", this.email.value);
        form.append("edad", this.edad.value);
        form.append("id", this.id.value);

        if (this.id.value === "") {

            fetch("../controllers/create.php", {
                method: "POST",
                body: form
            })
                .then((res) => res.json())
                .then((data) => {

                    alert("creado correctamente")
                    this.listado();

                })
                .catch((err) => console.log(err))

        } else {

            fetch("../controllers/update.php", {
                method: "POST",
                body: form
            })
                .then((res) => res.json())
                .then((data) => {

                    alert("actualizado correctamente")
                    this.listado();

                })
                .catch((err) => console.log(err))


        }


    }

    this.edit = (id) => {

        var form = new FormData();
        form.append("id", id);

        fetch("../controllers/edit.php", {
            method: "POST",
            body: form,
        })
            .then((res) => res.json())
            .then((data) => {

                this.id.value = data.id;
                this.nombres.value = data.nombres;
                this.email.value = data.email;
                this.edad.value = data.edad;

            })
            .catch((err) => console.log(err))
    }

    this.eliminar = (id) => {

        var form = new FormData();
        form.append("id", id);

        fetch("../controllers/eliminar.php", {
            method: "POST",
            body: form,
        })
            .then((res) => res.json())
            .then((data) => {

                alert("eliminado correctamente");
                this.listado();

            })
            .catch((err) => console.log(err))
    }


})();

app.listado(); 