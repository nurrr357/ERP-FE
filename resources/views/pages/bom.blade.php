@extends('MasterLayout.Master')

@section('title', 'Billing of Material')
@section('header', 'Billing of Material')
@section('modal-button')
    <div id="add-bom-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Add
    </div>
    <!-- add additional button here as necessary.. -->
@endsection

@section('content')
    <div id="bom-list-container" class="flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">
        <!-- Data will be populated here -->
        <div class="flex items-center justify-center h-full text-gray-500">
            Loading data...
        </div>
    </div>

    <!-- Modal -->
    <div id="add-bom-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add Billing of Material</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                    &times;
                </button>
            </div>

            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 relative">
                    <!-- Form Placeholder -->
                    <form id="add-bom-form">
                        <div class="mb-8 space-y-4">

                            <!-- PRODUCT -->
                            <div>
                                <label for="add-product" class="block text-gray-700 text-sm font-bold mb-2">
                                    Product
                                </label>
                                <select id="add-product" name="product_id"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3
                       text-gray-700 bg-white
                       focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <option value="">Pilih Product</option>
                                    <option value="1">Product A</option>
                                    <option value="2">Product B</option>
                                </select>
                            </div>

                            <!-- QUANTITY -->
                            <div>
                                <label for="add-quantity" class="block text-gray-700 text-sm font-bold mb-2">
                                    Quantity
                                </label>
                                <input id="add-quantity" name="quantity" type="number" min="1"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3
                       text-gray-700 bg-white
                       focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                    placeholder="Jumlah">
                            </div>

                            <!-- TYPE -->
                            <div>
                                <label for="add-type" class="block text-gray-700 text-sm font-bold mb-2">
                                    Type
                                </label>
                                <select id="add-type" name="type"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3
                       text-gray-700 bg-white
                       focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <option value="">Pilih Type</option>
                                    <option value="product">Product</option>
                                    <option value="service">Service</option>
                                </select>
                            </div>

                            <!-- COMPONENT -->
                            <div>
                                <label for="add-component" class="block text-gray-700 text-sm font-bold mb-2">
                                    Component
                                </label>
                                <select id="add-component" name="component_id"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3
                       text-gray-700 bg-white
                       focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <option value="">Pilih Component</option>
                                    <option value="1">Tomat</option>
                                </select>
                            </div>

                        </div>

                        <!-- BUTTONS -->
                        <div class="flex justify-end items-center gap-3">
                            <button type="button"
                                class="px-5 py-2 bg-red-500 text-white rounded
                    hover:bg-red-600 transition font-medium text-sm shadow-sm"
                                id="modal-cancel">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2 bg-blue-500 text-white rounded
                    hover:bg-blue-600 transition font-medium text-sm shadow-sm">
                                Tambahkan
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detail-bom-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6">
            <!-- Header & Tabs Wrapper -->
            <div class="mb-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Billing of Material Detail</h3>
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
                        <form id="edit-bom-form">
                            <div class="mb-8 space-y-4">

                                <!-- PRODUCT -->
                                <div>
                                    <label for="edit-product" class="block text-gray-700 text-sm font-bold mb-2">
                                        Product
                                    </label>
                                    <select id="edit-product" name="product_id"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                        <option value="1">Product A</option>
                                        <option value="2">Product B</option>
                                    </select>
                                </div>

                                <!-- QUANTITY -->
                                <div>
                                    <label for="edit-quantity" class="block text-gray-700 text-sm font-bold mb-2">
                                        Quantity
                                    </label>
                                    <input id="edit-quantity" name="quantity" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                </div>

                                <!-- TYPE -->
                                <div>
                                    <label for="edit-type" class="block text-gray-700 text-sm font-bold mb-2">
                                        Type
                                    </label>
                                    <select id="edit-type" name="type"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                        <option value="product">Product</option>
                                        <option value="service">Service</option>
                                    </select>
                                </div>

                                <!-- COMPONENT -->
                                <div>
                                    <label for="edit-component" class="block text-gray-700 text-sm font-bold mb-2">
                                        Component
                                    </label>
                                    <select id="edit-component" name="component_id"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white">
                                        <option value="1">Tomat</option>
                                    </select>
                                </div>

                            </div>

                            <div class="flex justify-end items-center gap-3">
                                <button type="button"
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm detail-modal-close shadow-sm">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">
                                    Perbarui
                                </button>
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
                                <button id="btn-delete-bom"
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
            const modal = $('#add-bom-modal');
            const modalContent = $('#modal-content');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-bom-btn').click(function() {
                openModal();
            });

            $('#modal-close, #modal-cancel, #modal-overlay').click(function() {
                closeModal();
            });

            // Detail Modal Logic
            const detailModal = $('#detail-bom-modal');

            function openDetailModal() {
                detailModal.removeClass('hidden').addClass('flex');
            }

            function closeDetailModal() {
                detailModal.addClass('hidden').removeClass('flex');
                // Reset tabs to default (Data) when closing
                switchTab('data');
            }

            // Click handler for Detail buttons (Event Delegation for dynamic items)
            $(document).on('click', '.detail-btn', function() {
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

            // Fetch BOM Data
            const bomContainer = $('#bom-list-container');
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/bill-of-materials';
            let currentBomId = null;

            // Function to load data
            function loadBomData() {
                axios.get(apiUrl)
                    .then(function(response) {
                        const responseBody = response.data;
                        const data = responseBody.data; 
                        
                        bomContainer.empty();

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(function(item) {
                                // Extract names from relations or fallback
                                const productName = item.product ? item.product.name : `Product #${item.product_id}`;
                                const componentName = item.component ? item.component.name : `Component #${item.component_id}`;
                                
                                const html = `
                                    <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
                                        <div class="flex items-center gap-4">
                                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-800">${productName}</h4>
                                                <p class="text-sm text-gray-500">
                                                    Component: <span class="font-medium text-gray-700">${componentName}</span>
                                                    &bull; Qty: ${item.quantity}
                                                    &bull; ${item.type}
                                                </p>
                                            </div>
                                        </div>
                                        <button
                                            class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition"
                                            data-id="${item.id}"
                                            data-item='${JSON.stringify(item)}'>
                                            Detail
                                        </button>
                                    </div>
                                `;
                                bomContainer.append(html);
                            });
                        } else {
                            bomContainer.html('<div class="flex items-center justify-center h-full text-gray-500">No data available</div>');
                        }
                    })
                    .catch(function(error) {
                        console.error('Error fetching BOM data:', error);
                        bomContainer.html(`
                            <div class="flex flex-col items-center justify-center h-full text-red-500 gap-2">
                                <p>Failed to load data</p>
                                <button onclick="window.location.reload()" class="text-sm underline text-blue-500">Retry</button>
                            </div>
                        `);
                    });
            }

            // Initial load
            loadBomData();

            // Click handler for Detail buttons (Event Delegation for dynamic items)
            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const itemData = $(this).data('item');

                currentBomId = id;
                
                // Populate Edit Form
                $('#edit-product').val(itemData.product_id);
                $('#edit-component').val(itemData.component_id);
                $('#edit-quantity').val(itemData.quantity);
                $('#edit-type').val(itemData.type); 

                openDetailModal();
            });

            // Handle Add BOM Form Submission
            $('#add-bom-form').on('submit', function(e) {
                e.preventDefault();
                
                const formData = {
                    product_id: $('#add-product').val(),
                    component_id: $('#add-component').val(),
                    quantity: $('#add-quantity').val(),
                    type: $('#add-type').val(),
                };

                // Simple validation
                if (!formData.product_id || !formData.component_id || !formData.quantity || !formData.type) {
                    alert('Mohon lengkapi semua field yang wajib diisi.');
                    return;
                }

                axios.post(apiUrl, formData)
                    .then(function(response) {
                        alert('Berhasil menambahkan BOM!');
                        closeModal();
                        $('#add-bom-form')[0].reset();
                        loadBomData(); // Refresh list
                    })
                    .catch(function(error) {
                        console.error('Error adding BOM:', error);
                        alert('Gagal menambahkan item. Silakan coba lagi.');
                    });
            });

            // Handle Edit BOM Form Submission
            $('#edit-bom-form').on('submit', function(e) {
                e.preventDefault();

                if (!currentBomId) return;

                const formData = {
                    product_id: $('#edit-product').val(),
                    component_id: $('#edit-component').val(),
                    quantity: $('#edit-quantity').val(),
                    type: $('#edit-type').val(),
                };

                axios.put(`${apiUrl}/${currentBomId}`, formData)
                    .then(function(response) {
                        alert('Berhasil memperbarui BOM!');
                        closeDetailModal();
                        loadBomData();
                    })
                    .catch(function(error) {
                        console.error('Error updating BOM:', error);
                        alert('Gagal memperbarui item. Silakan coba lagi.');
                    });
            });

            // Handle Delete BOM
            $('#btn-delete-bom').click(function() {
                if (!currentBomId) return;

                if (!confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                    return;
                }

                axios.delete(`${apiUrl}/${currentBomId}`)
                    .then(function(response) {
                        alert('Berhasil menghapus BOM!');
                        closeDetailModal();
                        loadBomData();
                    })
                    .catch(function(error) {
                        console.error('Error deleting BOM:', error);
                        alert('Gagal menghapus item. Silakan coba lagi.');
                    });
            });
        });
    </script>
@endsection
