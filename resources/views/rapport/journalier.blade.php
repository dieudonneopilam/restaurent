<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js"></script>
</head>
<body>

<h1 style="font-family: Arial, Helvetica, sans-serif">Rapport Journalier</h1>
<h2 style="font-family: Arial, Helvetica, sans-serif">date : {{ $jour }}</h2>

<table id="customers">
  <tr>
    <th>ventes</th>
    <th>dettes</th>
    <th>achats</th>
    <th>depenses</th>
    <th>argent recu</th>
  </tr>
  @forelse ($rapports as $rapport)
  <tr>
    <td>
        <div style="color: green">{{ $rapport->vente_jour }} FC</div>
    </td>
    <td>
        <div style="color: green">{{ $rapport->dette_payed }} FC</div>
        <div style="color: red">{{ $rapport->dette_non_payer }} FC !!</div>
    </td>
    <td>
        <div style="color: green">{{ $rapport->achat_jour }} FC</div>
    </td>
    <td>
        <div style="color: green">{{ $rapport->depense_jour }} FC</div>
    </td>
    <td>
        <div style="color: green">{{ $rapport->vente_jour + $rapport->dette_payed - $rapport->achat_jour - $rapport->depense_jour }} FC</div>
        <div style="color: red">{{ $rapport->vente_non_payer + $rapport->dette_non_payer }} FC</div>
    </td>
  </tr>
  @empty

  @endforelse
</table>
</body>
</html>
