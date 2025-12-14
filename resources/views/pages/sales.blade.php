@extends('MasterLayout.Master')

@section('title', 'Sales')
@section('header', 'Sales')
@section('modal-button')
    <div id="add-sales-btn" class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Create Sales</div>
    <div id="add-category-btn" class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Import</div>

    <!-- add additional button here as necessary.. -->
@endsection

@section('content')
    <div id="sales-list-container" class=" flex flex-col flex-1 h-full rounded-md border border-gray-300 relative bg-white overflow-y-auto">
       
    </div>

    <!-- Modal -->
    <div id="add-sales-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>
        
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">New</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                   &times;
                </button>
            </div>
            
            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6 relative">
                    <!-- Form Placeholder -->
                    <form id="add-sales-form" >
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                SO Number
                            </label>
                            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="so-number" name="so_number" type="text" placeholder="Placeholder">
                        </div>
                        <div class="mb-4 mt-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Customer ID
                            </label>
                            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="customer-id" name="customer_id" type="text" placeholder="Placeholder">
                        </div>
                         <div class="mb-4 mt-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Company ID
                            </label>
                            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="company-id" name="company-id" type="text" placeholder="Placeholder">
                        </div>
                         <div class="mb-4 mt-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Order Date
                            </label>
                            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="order-date" name="order_date" type="date" placeholder="Placeholder">
                        </div>
                         <div class="mb-4 mt-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Expected Delivery Date
                            </label>
                            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="expected-delivery-date" name="expected_delivery_date" type="date" placeholder="Placeholder">
                        </div>
                        <input type="hidden" name="status" value="draft">
                        <div class="mb-4 mt-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category-name">
                                Note
                            </label>
                            <textarea name="notes" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                            <input type="hidden" name="subtotal">
                            <input type="hidden" name="tax">
                            <input type="hidden" name="discount">
                            <input type="hidden" name="total">
                        <table class="w-full">    
                            <tbody id="order-items">
                                <tr class="order-row">
                                    <td>
                                        <label for="product_id">Product ID</label>
                                        <input type="number" name="product_id" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                    <td>
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                    <td>
                                        <label for="unit_price">Unit Price</label>
                                        <input type="number" name="unit_price" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                    <td>
                                        <label for="subtotal">Subtotal</label>
                                        <input type="number" name="subtotal" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                    <td>
                                        <label for="description">Description</label>
                                        <input type="text" name="description" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <div class="flex justify-end items-center gap-2 mt-8">
                            <button class="px-4 py-1.5 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm" id="modal-cancel">Batal</button>
                            <button type="submit" class="px-4 py-1.5 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm">Tambahkan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detail-sales-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>
        
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6">
            <!-- Header & Tabs Wrapper -->
            <div class="mb-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Category Detail</h3>
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl detail-modal-close">
                       &times;
                    </button>
                </div>

                <!-- Tabs -->
                <div class="flex gap-6 border-b border-gray-200">
                    <button class="tab-btn pb-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 focus:outline-none transition active-tab" data-tab="data">
                        Data
                    </button>
                    <button class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent focus:outline-none transition" data-tab="control">
                        Control
                    </button>
                </div>
            </div>
            
            <!-- Content -->
            <div>
                <!-- Data Tab Content -->
                <div id="tab-data" class="tab-content block">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                        <form id="edit-sales-form">

                            <div class="mb-4">
                                <label class="block text-sm font-bold">SO Number</label>
                                <input id="edit-so-number" type="text"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-bold">Customer ID</label>
                                <input id="edit-customer-id" type="number"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-bold">Company ID</label>
                                <input id="edit-company-id" type="number"
                                    class="w-full border border-gray-300 rounded px-3 py-2">
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-bold">Order Date</label>
                                    <input id="edit-order-date" type="date"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>

                                <div>
                                    <label class="block text-sm font-bold">Expected Delivery</label>
                                    <input id="edit-expected-delivery-date" type="date"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-bold">Status</label>
                                <select id="edit-status" class="w-full border border-gray-300 rounded px-3 py-2">
                                    <option value="draft">Draft</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-bold">Subtotal</label>
                                    <input id="edit-subtotal" type="number"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Tax</label>
                                    <input id="edit-tax" type="number"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Discount</label>
                                    <input id="edit-discount" type="number"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold">Total</label>
                                    <input id="edit-total" type="number"
                                        class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label class="block text-sm font-bold">Notes</label>
                                <textarea id="edit-notes"
                                    class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
                            </div>
                            <div>
                                <table class="w-full">    
                                    <tbody id="order-items">
                                        <tr class="order-row">
                                            <td>
                                                <label for="product_id">Product ID</label>
                                                <input type="number" name="product_id" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            </td>
                                            <td>
                                                <label for="quantity">Quantity</label>
                                                <input type="number" name="quantity" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            </td>
                                            <td>
                                                <label for="unit_price">Unit Price</label>
                                                <input type="number" name="unit_price" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            </td>
                                            <td>
                                                <label for="subtotal">Subtotal</label>
                                                <input type="number" name="subtotal" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            </td>
                                            <td>
                                                <label for="description">Description</label>
                                                <input type="text" name="description" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="flex justify-end gap-3 mt-3">
                                <button type="button"
                                    class="detail-modal-close px-4 py-2 bg-gray-300 rounded">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded">
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
                                <button class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button id="btn-delete-sales" class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
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
            const modal = $('#add-sales-modal');
            const modalContent = $('#modal-content');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-sales-btn').click(function() {
                openModal();
            });

            $('#modal-close, #modal-cancel, #modal-overlay').click(function() {
                closeModal();
            });

            // Detail Modal Logic
            const detailModal = $('#detail-sales-modal');
            
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
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass('text-gray-500 border-transparent');
                
                // Add active class to clicked tab
                $(`.tab-btn[data-tab="${tabName}"]`).removeClass('text-gray-500 border-transparent').addClass('text-blue-600 border-blue-600 active-tab');
                
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
            const salesContainer = $('#sales-list-container');
            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/sales-orders';
            let currentSalesId = null;

            function loadSalesData() {
                axios.get(apiUrl)
                    .then(function (response) {
                        const data = response.data.data;

                        salesContainer.empty();

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(function (item) {
                                const html = `
                                    <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50">
                                        <div>
                                            <h4 class="font-semibold text-gray-800">${item.so_number}</h4>
                                            <p class="text-sm text-gray-500">
                                                Total: ${item.total} • Status: ${item.status}
                                            </p>
                                        </div>
                                        <button
                                            class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded"
                                            data-id="${item.id}"
                                            data-item='${JSON.stringify(item)}'>
                                            Detail
                                        </button>
                                    </div>
                                `;
                                salesContainer.append(html);
                            });
                        } else {
                            salesContainer.html('<div class="p-4 text-gray-500">No data available</div>');
                        }
                    })
                    .catch(function (error) {
                        console.error('Error fetching sales orders:', error);
                        salesContainer.html('<div class="p-4 text-red-500">Failed to load data</div>');
                    });
            }

            // initial load
            loadSalesData();

            $(document).on('click', '.detail-btn', function() {
                const id = $(this).data('id');
                const item = $(this).data('item');
                currentSalesId  = id;

                // Populate Edit Form
                $('#edit-so-number').val(item.so_number);
                $('#edit-customer-id').val(item.customer_id);
                $('#edit-company-id').val(item.company_id);
                $('#edit-order-date').val(item.order_date);
                $('#edit-expected-delivery-date').val(item.expected_delivery_date);
                $('#edit-status').val(item.status);
                $('#edit-subtotal').val(item.subtotal);
                $('#edit-tax').val(item.tax);
                $('#edit-discount').val(item.discount);
                $('#edit-total').val(item.total);
                $('#edit-note').val(item.note);

                openDetailModal();
            });

            $('#add-sales-form').on('submit', function (e) {
                e.preventDefault();

                let items = [];


                $('#order-items .order-row').each(function () {
                    const productId = $(this).find('input[name="product_id"]').val();
                    const quantity  = $(this).find('input[name="quantity"]').val();
                    const unitPrice = $(this).find('input[name="unit_price"]').val();
                    const subtotal  = $(this).find('input[name="subtotal"]').val();
                    const desc      = $(this).find('input[name="description"]').val();

                    if (!productId || !quantity || !unitPrice) return;

                    items.push({
                        product_id: Number(productId),
                        quantity: Number(quantity),        
                        unit_price: Number(unitPrice),     
                        subtotal: Number(subtotal || 0),
                        description: desc || ''
                    });
                });



                const payload = {
                    so_number: $('#so-number').val(),
                    customer_id: Number($('#customer-id').val()),
                    company_id: Number($('#company-id').val()),
                    order_date: $('#order-date').val(),
                    expected_delivery_date: $('#expected-delivery-date').val(),
                    status: 'draft',
                    subtotal: 0,
                    tax: 0,
                    discount: 0,
                    total: 0,
                    items: items
                };


                axios.post(apiUrl, payload)
                    .then(function () {
                        alert('Sales Order berhasil dibuat');
                        closeModal();
                        $('#add-sales-form')[0].reset();
                        loadSalesData();
                    })
                    .catch(function (error) {
                        console.log(error.response.data);
                });
            });

            $('#edit-sales-form').on('submit', function (e) {
                e.preventDefault();
                if (!currentSalesId) return;
                let items = [];
                const orderDate = $('#edit-order-date').val();
                const expectedDate = $('#edit-expected-delivery-date').val();

                $('#order-items .order-row').each(function () {
                    const productId = $(this).find('input[name="product_id"]').val();
                    const quantity  = $(this).find('input[name="quantity"]').val();
                    const unitPrice = $(this).find('input[name="unit_price"]').val();
                    const subtotal  = $(this).find('input[name="subtotal"]').val();
                    const desc      = $(this).find('input[name="description"]').val();

                    if (!productId || !quantity || !unitPrice) return;

                    items.push({
                        product_id: Number(productId),
                        quantity: Number(quantity),        
                        unit_price: Number(unitPrice),     
                        subtotal: Number(subtotal || 0),
                        description: desc || ''
                    });
                });

                const payload = {
                    so_number: $('#edit-so-number').val(),
                    customer_id: Number($('#edit-customer-id').val()),
                    company_id: Number($('#edit-company-id').val()),
                    order_date: orderDate,                 
                    expected_delivery_date: expectedDate,  
                    status: $('#edit-status').val(),
                    subtotal: Number($('#edit-subtotal').val()),
                    tax: Number($('#edit-tax').val()),
                    discount: Number($('#edit-discount').val()),
                    total: Number($('#edit-total').val()),
                    notes: $('#edit-notes').val(),
                    items: items
                };

                axios.put(`${apiUrl}/${currentSalesId}`, payload)
                    .then(() => {
                            alert('Sales Order berhasil diperbarui');
                            closeDetailModal();
                            loadSalesData();
                    })
                    .catch(err => console.log(err.response.data));
            });

            $('#btn-delete-sales').click(function() {
                if (!currentSalesId) return;
                if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;

                axios.delete(`${apiUrl}/${currentSalesId}`)
                    .then(function(response) {
                        alert('Berhasil menghapus Sales!');
                        closeDetailModal();
                        loadSalesData();
                    })
                    .catch(function(error) {
                        console.error('Error deleting Sales:', error);
                        alert('Gagal menghapus Sales.');
                    });
            });
        });
    </script>
@endsection