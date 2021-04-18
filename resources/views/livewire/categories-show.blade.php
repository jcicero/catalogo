<div>
  @foreach ($categories as $category)
    <ul>
      <li>{{ $category->categoria }}</li>
    </ul>
  @endforeach
</div>
