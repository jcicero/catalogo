@push('styles')
    <link href="./css/tailwind.min.css" rel="stylesheet">
@endpush
<div>
    <br>
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header">
                <b>{{ $title }}</b>
            </div>
            <div class="card-body">
            <livewire:datatable
                model="App\Models\Product"
                sort="descricao|asc"
                include="codigo, descricao, resumida|Descrição Resumida"
                searchable="descricao,resumida"
                exportable
            />
            </div>
        </div>
    </div>
</div>