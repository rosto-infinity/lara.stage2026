<button type="button"
    onclick="document.getElementById('{{ $id }}').showModal()"
    {{ $attributes->merge(['class' => '']) }}>
    {{ $label }}
</button>

<dialog id="{{ $id }}"
    class="rounded-xl shadow-2xl backdrop:bg-black/50 backdrop:backdrop-blur-sm open:flex open:flex-col p-0 w-full max-w-md mx-auto inset-0 my-auto">
    <form action="{{ $action }}" method="POST">
        @csrf
        @method('DELETE')

        <div class="p-6 text-center">
            <div class="mx-auto w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-gray-900">Confirmer la suppression</h3>
            <p class="mt-2 text-sm text-gray-500">{{ $message }}</p>

            <div class="mt-6 flex items-center justify-center gap-3">
                <button type="button" onclick="this.closest('dialog').close()"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 transition-colors">
                    Annuler
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition-colors">
                    Confirmer la suppression
                </button>
            </div>
        </div>
    </form>
</dialog>
