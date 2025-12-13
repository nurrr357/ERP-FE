@extends('MasterLayout.Master')

@section('title', 'Prduct')
@section('header', 'Product')
@section('modal-button')
    <div id="add-product-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Add
    </div>
    <!-- add additional button here as necessary.. -->
@endsection

@section('content')
    <div class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">
        <!-- Item 1 -->
        <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">

                </div>
                <div>
                    <h4 class="font-semibold text-gray-800">Electronics</h4>
                </div>
            </div>
            <button
                class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                Detail
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div id="add-product-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add product</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                    &times;
                </button>
            </div>

            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 relative">
                    <!-- Form Placeholder -->
                    <form>
                        <div class="mb-8 space-y-4">

                            <!-- FOTO -->
                            <div>
                                <label for="add-product-photo" class="block text-gray-700 text-sm font-bold mb-2">
                                    Foto
                                </label>
                                <input id="add-product-photo" name="photo" type="file" accept="image/*"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                            </div>

                            <!-- NAMA -->
                            <div>
                                <label for="add-product-name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Nama
                                </label>
                                <input id="add-product-name" name="name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Nama produk">
                            </div>

                            <!-- PRODUCT TYPE -->
                            <div>
                                <label for="add-product-type" class="block text-gray-700 text-sm font-bold mb-2">
                                    Product Type
                                </label>
                                <input id="add-product-type" name="type" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Contoh: Elektronik">
                            </div>

                            <!-- SALES PRICE -->
                            <div>
                                <label for="add-product-price" class="block text-gray-700 text-sm font-bold mb-2">
                                    Sales Price
                                </label>
                                <input id="add-product-price" name="price" type="number" step="0.01"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Harga jual">
                            </div>

                            <!-- COST -->
                            <div>
                                <label for="add-product-cost" class="block text-gray-700 text-sm font-bold mb-2">
                                    Cost
                                </label>
                                <input id="add-product-cost" name="cost" type="number" step="0.01"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Harga modal">
                            </div>

                            <!-- CATEGORY -->
                            <div>
                                <label for="add-product-category" class="block text-gray-700 text-sm font-bold mb-2">
                                    Category
                                </label>
                                <select id="add-product-category" name="category_id"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                    <option value="">Pilih Kategori</option>
                                    <option value="1">Electronics</option>
                                    <option value="2">Accessories</option>
                                </select>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex justify-end items-center gap-3">
                            <button type="button"
                                class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm shadow-sm add-modal-close">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">
                                Simpan
                            </button>
                        </div>
                    </form>
                    <!-- End of Form Placeholder -->
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detail-product-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6">
            <!-- Header & Tabs Wrapper -->
            <div class="mb-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">product Detail</h3>
                    <button
                        class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl detail-modal-close">
                        &times;
                    </button>
                </div>

                <!-- Tabs -->
                <div class="flex gap-6 border-b border-gray-200">
                    <button
                        class="tab-btn pb-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 focus:outline-none transition active-tab"
                        data-tab="data">
                        Data
                    </button>
                    <button
                        class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent focus:outline-none transition"
                        data-tab="control">
                        Control
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div>
                <!-- Data Tab Content -->
                <div id="tab-data" class="tab-content block">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                        <form>
                            <div class="mb-8 space-y-4">

                                <div>
                                    <label for="edit-product-photo" class="block text-gray-700 text-sm font-bold mb-2">
                                        Foto
                                    </label>
                                    <input id="edit-product-photo" name="photo" type="file" accept="image/*"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                </div>

                                <div>
                                    <label for="edit-product-name" class="block text-gray-700 text-sm font-bold mb-2">
                                        Nama
                                    </label>
                                    <input id="edit-product-name" name="name" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Nama produk">
                                </div>

                                <div>
                                    <label for="edit-product-type" class="block text-gray-700 text-sm font-bold mb-2">
                                        Product Type
                                    </label>
                                    <input id="edit-product-type" name="type" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Contoh: Elektronik">
                                </div>

                                <div>
                                    <label for="edit-product-price" class="block text-gray-700 text-sm font-bold mb-2">
                                        Sales Price
                                    </label>
                                    <input id="edit-product-price" name="price" type="number" step="0.01"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Harga jual">
                                </div>

                                <div>
                                    <label for="edit-product-cost" class="block text-gray-700 text-sm font-bold mb-2">
                                        Cost
                                    </label>
                                    <input id="edit-product-cost" name="cost" type="number" step="0.01"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Harga modal">
                                </div>

                                <div>
                                    <label for="edit-product-category" class="block text-gray-700 text-sm font-bold mb-2">
                                        Category
                                    </label>
                                    <select id="edit-product-category" name="category_id"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                        <option value="">Pilih Kategori</option>
                                        <option value="1">Electronics</option>
                                        <option value="2">Accessories</option>
                                    </select>
                                </div>

                            </div>


                            <div class="flex justify-end items-center gap-3">
                                <button type="button"
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm detail-modal-close shadow-sm">Batal</button>
                                <button type="button"
                                    class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Control Tab Content -->
                <div id="tab-control" class="tab-content hidden">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                        <div class="flex flex-col items-center justify-center p-4 text-center text-gray-800">
                            <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Kategori?</h3>
                            <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>

                            <div class="flex gap-3">
                                <button
                                    class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            const modal = $('#add-product-modal');
            const modalContent = $('#modal-content');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-product-btn').click(function() {
                openModal();
            });

            $('#modal-close, #modal-cancel, #modal-overlay, .add-modal-close').click(function() {
                closeModal();
            });

            // Detail Modal Logic
            const detailModal = $('#detail-product-modal');

            function openDetailModal() {
                detailModal.removeClass('hidden').addClass('flex');
            }

            function closeDetailModal() {
                detailModal.addClass('hidden').removeClass('flex');
                // Reset tabs to default (Data) when closing
                switchTab('data');
            }

            // Click handler for Detail buttons
            $('.detail-btn').click(function() {
                openDetailModal();
            });

            // Close handlers for Detail modal
            $('.detail-modal-close, .detail-modal-overlay').click(function() {
                closeDetailModal();
            });

            // Tab Switching Logic
            function switchTab(tabName) {
                // Remove active class from all tabs
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass(
                    'text-gray-500 border-transparent');

                // Add active class to clicked tab
                $(`.tab-btn[data-tab="${tabName}"]`).removeClass('text-gray-500 border-transparent').addClass(
                    'text-blue-600 border-blue-600 active-tab');

                // Hide all tab contents
                $('.tab-content').addClass('hidden').removeClass('block');

                // Show target content
                $(`#tab-${tabName}`).removeClass('hidden').addClass('block');
            }

            // Initialize first tab active state
            switchTab('data');

            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                switchTab(tab);
            });
        });
    </script>
@endsection
