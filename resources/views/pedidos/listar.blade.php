<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de pedidos') }}
        </h2>
    </x-slot>
    <div class="py-12">


  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

          

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
              
            
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">ID Cliente</th>
                            <th class="px-4 py-2 border">Cliente</th>
                            <th class="px-4 py-2 border">E-mail</th>
                            <th class="px-4 py-2 border">Telefone</th>
                            <th class="px-4 py-2 border">Data de entrega</th>
                            <th class="px-4 py-2 border">Valor do frete</th>
                            <th class="px-4 py-2 border">Descrição</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($pedidos))
                            @foreach($pedidos as $row)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $row->id }}</td>
                                    <td class="px-4 py-2 border">{{ $row->customer_id }}</td>
                                    <td class="px-4 py-2 border">{{ $row->name }}</td>
                                    <td class="px-4 py-2 border">{{ $row->email }}</td>
                                    <td class="px-4 py-2 border">{{ $row->phone }}</td>
                                    <td class="px-4 py-2 border">{{ $row->delivery_date }}</td>
                                    <td class="px-4 py-2 border">{{ $row->freight_value }}</td>
                                    <td class="px-4 py-2 border">{{ $row->order_description }}</td>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td class="px-4 py-2 border text-red-500" colspan="3">Nenhum registro encontrado.</td>
                        </tr>
                        @endif
                    </tbody>
                    {!! $pedidos->render() !!}
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
