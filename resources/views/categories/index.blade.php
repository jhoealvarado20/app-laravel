<x-app-layout>
    {{-- Header con navegación --}}
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Categorías - LIMATEC') }}
            </h2>
            <a href="{{ route('productos.index') }}" class="w-full sm:w-auto text-center bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-bold transition shadow-sm">
                Volver a Productos
            </a>
        </div>
    </x-slot>

    <div class="py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 md:p-6">
                
                <!-- Formulario de Creación -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium mb-4 text-gray-700">Nueva Categoría</h3>
                    <form action="{{ route('categories.store') }}" method="POST" class="flex flex-col md:flex-row gap-4">
                        @csrf
                        <input type="text" name="nombre" placeholder="Nombre (ej. Laptops)" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        
                        <input type="text" name="description" placeholder="Descripción corta" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        
                        <button type="submit" class="w-full md:w-auto bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 font-bold transition">
                            Guardar
                        </button>
                    </form>
                </div>

                <hr class="mb-6 border-gray-100">

                <!-- Tabla de Categorías -->
                <div class="overflow-x-auto border border-gray-200 rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Slug</th>
                                <th class="px-4 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->nombre }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500 italic">{{ $category->slug }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex justify-center items-center space-x-6">
                                        {{-- Enlace Editar --}}
                                        <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition">
                                            Editar
                                        </a>

                                        {{-- Formulario Eliminar --}}
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-bold transition" 
                                                onclick="return confirm('¿Estás seguro de eliminar la categoría: {{ $category->nombre }}?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>