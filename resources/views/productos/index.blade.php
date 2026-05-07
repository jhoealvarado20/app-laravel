<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Productos - LIMATEC') }}
            </h2>
            
            <div class="flex gap-2 w-full sm:w-auto">
                <!-- Botón hacia Categorías -->
                <a href="{{ route('categories.index') }}" class="flex-1 sm:flex-none text-center bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm font-bold transition shadow-sm">
                    Ir a Categorías
                </a>
                
                <!-- Botón Nuevo Producto -->
                <a href="{{ route('productos.create') }}" class="flex-1 sm:flex-none text-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-bold transition shadow-sm">
                    Nuevo Producto
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 md:p-6">
                
                <!-- Contenedor con scroll horizontal para la tabla -->
                <div class="overflow-x-auto border rounded-lg shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 border-t border-gray-100">
                            @foreach($productos as $producto)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $producto->nombre }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 font-semibold">S/ {{ number_format($producto->precio, 2) }}</td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-center text-gray-600">
                                    <span class="px-2 py-1 bg-gray-100 rounded text-xs">{{ $producto->stock }}</span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm">
                                   <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-bold uppercase tracking-tighter">
                                       {{ $producto->category->nombre ?? 'Sin Categoría' }}
                                   </span>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm text-center font-medium">
                                    <div class="flex justify-center items-center space-x-4">
                                        <a href="{{ route('productos.edit', $producto->id) }}" class="text-indigo-600 hover:text-indigo-900 transition">Editar</a>
                                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 transition">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Footer del bloque: Cerrar Sesión -->
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto text-xs text-gray-400 hover:text-red-500 font-bold uppercase tracking-widest transition">
                            {{ __('Cerrar Sesión') }}
                        </button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>