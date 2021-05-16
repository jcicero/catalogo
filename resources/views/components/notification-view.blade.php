<div>
  <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">Data</th>
        <th scope="col">Protocolo ANVISA / Processo</th>
        <th scope="col">Setor</th>
        <th scope="col">Profissional</th>
        <th scope="col">Empresa</th>
        <th scope="col">Marca</th>
        <th scope="col">Registro ANVISA</th>
        <th scope="col">Lote</th>
        <th scope="col">Validade</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($product->notifications as $notification)
        <tr>
          <td>{{ $notification->dtocorrencia }}</td>
          <td>{{ $notification->anvisa . ' / ' . $notification->sei }}</td>
          <td>{{ $notification->setor }}</td>
          <td>{{ $notification->profissional }}</td>
          <td>{{ $notification->brand->company->cnpj ?? '' }} {{ $notification->brand->company->empresa ?? '' }}</td>
          <td>{{ $notification->brand->marca }}</td>
          <td>{{ $notification->registroanvisa }}</td>
          <td>{{ $notification->lote }}</td>
          <td>{{ $notification->validade }}</td>
        </tr>
        <tr>
          <td colspan="9">{{ $notification->queixa }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>