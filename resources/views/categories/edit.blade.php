<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoría - LIMATEC') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT') {{-- ¡Esto es vital para actualizar! --}}

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Nombre de la Categoría</label>
                        <input type="text" name="nombre" value="{{ $category->nombre }}" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700">Descripción</label>
                        <input type="text" name="description" value="{{ $category->description }}" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 font-bold transition">
                            Actualizar Categoría
                        </button>
                        <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline text-sm">
                            Cancelar
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>