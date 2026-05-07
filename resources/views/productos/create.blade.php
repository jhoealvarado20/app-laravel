<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Nuevo Producto - LIMATEC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-medium mb-6 text-gray-700 border-b pb-2">Detalles del Producto</h3>
                
                <form action="{{ route('productos.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Categoría --}}
                    <div>
                        <label for="category_id" class="block text-sm font-bold text-gray-700 mb-1">Categoría:</label>
                        <select name="category_id" id="category_id" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3 bg-gray-50" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Nombre --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nombre del Producto:</label>
                        <input type="text" name="nombre" placeholder="Ej: Laptop Dell G15" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3" required>
                    </div>

                    {{-- Precio y Stock --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Precio (S/):</label>
                            <input type="number" step="0.01" name="precio" placeholder="0.00" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Stock Inicial:</label>
                            <input type="number" name="stock" placeholder="Cantidad" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 p-3" required>
                        </div>
                    </div>

                    {{-- Botones de Acción --}}
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button type="submit" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-md shadow-md transition">
                            Guardar Producto
                        </button>
                        
                        <a href="{{ route('productos.index') }}" class="w-full sm:w-auto text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3 px-8 rounded-md transition">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>