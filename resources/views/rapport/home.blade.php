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

<h1 style="font-family: Arial, Helvetica, sans-serif">Rapport Mensuel</h1>
<h2 style="font-family: Arial, Helvetica, sans-serif">Mois : Avril</h2>

<table id="customers">
  <tr>
    <th>date</th>
    <th>ventes</th>
    <th>dettes</th>
    <th>achats</th>
    <th>depenses</th>
    <th>argent recu</th>
  </tr>
  @forelse ($orders as $order)
  <tr>
    <td>
        <div>{{ $order->date_vente }}</div>
    </td>
    <td>
        @php
            $vente_valide = 0;
            $vente_invalide = 0;
        @endphp
       @forelse ($ventes as $vente)
            @if ( date('Y-m-d', strtotime($order->date_vente)) == date('Y-m-d', strtotime($vente->date_vente)))
                @if ($vente->validate)
                    @php
                        $vente_valide = $vente_valide + $vente->prix_vente * $vente->qte_vente;
                    @endphp
                @else
                    @php
                        $vente_invalide = $vente_valide + $vente->prix_vente * $vente->qte_vente;
                    @endphp
                @endif
            @endif
       @empty

        @endforelse
        @if ($vente_valide == 0)
            <div>
                -
            </div>
        @else
            <div style="color: green">{{ $vente_valide }} FC</div>
        @endif
        @if ($vente_invalide == 0)
            <div>
                -
            </div>
        @else
            <div style="color: red">{{ $vente_invalide }} FC !!</div>
        @endif
    </td>
    <td>
        @php
            $dette_payed = 0;
            $dette_nonpayed = 0;
        @endphp
       @forelse ($dettes as $dette)
            @if ( date('Y-m-d', strtotime($order->date_vente)) == date('Y-m-d', strtotime($dette->date_dette)))
                @if ($dette->payed)
                    @php
                        $dette_payed = $dette_payed + $dette->prix_vente * $dette->qte_dette;
                    @endphp
                @else
                    @php
                        $dette_nonpayed = $dette_nonpayed + $dette->prix_vente * $dette->qte_dette;
                    @endphp
                @endif
            @endif
       @empty

        @endforelse
        @if ($dette_payed == 0)
            <div>
                -
            </div>
        @else
            <div style="color: green">{{ $dette_payed }} FC</div>
        @endif
        @if ($dette_nonpayed == 0)
            <div>
                -
            </div>
        @else
            <div style="color: red">{{ $dette_nonpayed }} FC !!</div>
        @endif
    </td>
    <td>
        @php
            $sum_achats = 0;
        @endphp
       @forelse ($achats as $achat)
            @if ( date('Y-m-d', strtotime($order->date_vente)) == date('Y-m-d', strtotime($achat->date_achat)))
                @php
                    $sum_achats = $sum_achats + $achat->prix_achat;
                @endphp
            @endif
       @empty

        @endforelse
        <div style="color: green">{{ $sum_achats }} FC</div>
    </td>
    <td>
        @php
            $sum_depenses = 0;
        @endphp
       @forelse ($depenses as $depense)
            @if ( date('Y-m-d', strtotime($order->date_vente)) == date('Y-m-d', strtotime($depense->date_depense)))
                @php
                    $sum_depenses = $sum_depenses + $achat->prix_achat;
                @endphp
            @endif
       @empty
        @endforelse
        <div style="color: green">{{ $sum_depenses }} FC</div>
    </td>
    <td>
        <div style="color: green">{{ $vente_valide + $dette_payed - $sum_achats - $sum_depenses }} FC</div>
        <div style="color: red">{{ $vente_invalide + $dette_nonpayed }} FC</div>
    </td>
  </tr>
  @empty

  @endforelse
</table>
</body>
</html>
