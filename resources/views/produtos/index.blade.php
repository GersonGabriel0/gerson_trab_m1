@extends('produtos.layout')

@section('title',__('(Produtos)'))

@push('css')
<style>
    /* Personalizar layout*/
</style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <span>@lang('(Produtos)')</span>
                        <a href="{{ url('prod/create') }}" class="btn-primary btn-sm">
                            <i class="fa fa-plus"></i> @lang('Novo Produto')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>@lang('Tipo')</td>
                                <td>@lang('Modelo')</td>
                                <td>@lang('Marca')</td>
                                <td>@lang('Preço Venda')</td>
                                <td>@lang('Cor')</td>
                                <td>@lang('Peso')</td>
                                <td>@lang('Descrição')</td>
                                <td colspan="3" class="text-center">@lang('Ações')</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produtos)
                            <tr>
                                <td>{{$produtos->id}}</td>
                                <td>{{$produtos->tipo}}</td>
                                <td>{{$produtos->modelo}}</td>
                                <td>{{$produtos->marca}}</td>
                                <td>{{$produtos->precoVenda}}</td>
                                <td>{{$produtos->cor}}</td>
                                <td>{{$produtos->peso}}</td>
                                <td>{{$produtos->descricao}}</td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('prod.show', $produtos->id)}}"
                                        class="btn btn-info btn-sm">@lang('Abrir')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <a href="{{ route('prod.edit', $produtos->id)}}"
                                        class="btn btn-primary btn-sm">@lang('Editar')
                                    </a>
                                </td>
                                <td class="text-center p-0 align-middle" width="70">
                                    <form action="{{ route('prod.destroy', $produtos->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Script personalizado
</script>
@endpush