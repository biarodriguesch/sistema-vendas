<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mb-3">
                    Detalhamento de vendas
                    <a type="button" class="btn btn-outline-success d-flex justify-content-evenly mb-3" href="{{route('vendas.create')}}">Nova venda</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Vendedor</th>
                            <th scope="col">Método de pagamento</th>
                            <th scope="col">Parcelas</th>
                            <th scope="col">Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendas as $vendas)
                          <tr>
                            <td>{{ $vendas->produto }}</td>
                            <td>{{ $vendas->name }}</td>
                            <td>{{ $vendas->parcelado}}{{$vendas->a_vista}}</td>
                            <td>{{ $vendas->parcelas }}</td>
                            <td>
                            <form action="{{ route('vendas.destroy',$vendas->id) }}" method="GET">

                            <a class="btn btn-primary" href="{{ route('vendas.edit', $vendas->id) }}"><i class="bi bi-pencil"></i> </a>
                            <a class="btn btn-success" href="{{ route('vendas.show',$vendas->id) }}"><i class="bi bi-arrow-up-right-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button  class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                            </form>
                            </td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
