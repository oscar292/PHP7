<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <h1>CRUD PHP</h1>

    <section>

        <form action="javascript:void(0);" onsubmit="app.save()">

            <input type="hidden" id="id">
            <input type="text" placeholder="nombres" id="nombres">
            <input type="text" placeholder="email" id="email">
            <input type="number" placeholder="edad" id="edad">

            <button type="submit">save</button>

        </form>
    </section>


    <section>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nombres</th>
                    <th>email</th>
                    <th>edad</th>
                    <th>opciones</th>
                </tr>

            </thead>

            <tbody id="tbody"></tbody>

        </table>

    </section>

    <script src="../javascript/peticiones.js"></script>

</body>

</html>