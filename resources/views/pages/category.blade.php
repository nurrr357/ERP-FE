@extends('MasterLayout.Master')

@section('title', 'Category')
@section('header', 'Category')
@section('modal-button')
    <div id="add-category-btn" class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Add</div>
    <!-- add additional button here as necessary.. -->
@endsection

@section('content')
    <div class="flex flex-1 h-full rounded-md border border-gray-300 relative">
        <!-- Content goes here -->
    </div>

    <!-- Modal -->
    <div id="add-category-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>
        
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add Category</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                   &times;
                </button>
            </div>
            
            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 relative">
                    <!-- Form Placeholder -->
                    <form>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Nama
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Placeholder">
                        </div>
                    </form>

                    <div class="flex justify-end items-center gap-2 mt-8">
                        <button class="px-4 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm" id="modal-cancel">Batal</button>
                        <button class="px-4 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            const modal = $('#add-category-modal');
            const modalContent = $('#modal-content');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-category-btn').click(function() {
                openModal();
            });

            $('#modal-close, #modal-cancel, #modal-overlay').click(function() {
                closeModal();
            });
        });
    </script>
@endsection