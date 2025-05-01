{{-- filepath: c:\laragon\www\gestionEcole\resources\views\pdf.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Élèves</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Liste des Élèves</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Email</th>
                <th>Classe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eleves as $eleve)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->dateNaiss }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td>{{ $eleve->classe->nom ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>