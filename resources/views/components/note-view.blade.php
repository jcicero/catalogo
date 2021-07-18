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
      @foreach ($product->notes as $note)
        <tr>
          <td>{{ $note->dtocorrencia }}</td>
          <td>{{ $note->anvisa . ' / ' . $note->sei }}</td>
          <td>{{ $note->setor }}</td>
          <td>{{ $note->profissional }}</td>
          <td>{{ $note->brand->company->cnpj ?? '' }} {{ $note->brand->company->empresa ?? '' }}</td>
          <td>{{ $note->brand->marca ?? '' }}</td>
          <td>{{ $note->registroanvisa }}</td>
          <td>{{ $note->lote }}</td>
          <td>{{ $note->validade }}</td>
        </tr>
        <tr>
          <td><b>Queixa:</b></td>
          <td colspan="8">{{ $note->queixa }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>