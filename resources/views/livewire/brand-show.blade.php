<div>
  @foreach ($brands as $brand)
    <ul>
      <li>{{ $brand->marca }} - {{ $brand->company->empresa ?? ''}}</li>
    </ul>
  @endforeach
</div>
