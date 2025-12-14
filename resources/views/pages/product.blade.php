@extends('MasterLayout.Master')

@section('title', 'Product')
@section('header', 'Product')

@section('modal-button')
    <div id="add-product-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">
        Add
    </div>
@endsection

@section('content')
    <div class="flex flex-col h-full w-full">

        <div id="product-list-container"
            class="flex-1 min-h-0 w-full rounded-md border border-gray-300 relative bg-white overflow-y-auto shadow-sm">
            <div class="flex items-center justify-center h-full text-gray-500">
                Loading data...
            </div>
        </div>

    </div>

    <div id="add-product-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 mx-4 md:mx-0">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add Product</h3>
                <button id="modal-close" class="text-gray-500 hover:text-gray-700 font-bold text-xl">&times;</button>
            </div>

            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6">
                    <form id="add-product-form">
                        <div class="mb-8 space-y-4">

                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                                <input id="add-name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                    placeholder="Nama produk">
                                <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-name"></p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                                    <input id="add-product_type" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                        placeholder="Satuan (e.g. Pcs)">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-product_type"></p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Price (Jual)</label>
                                    <input id="add-sales_price" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                        placeholder="0">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-sales_price"></p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Cost (Modal)</label>
                                    <input id="add-cost_price" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                        placeholder="0">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-cost_price"></p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Category ID</label>
                                    <input id="add-category_id" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                        placeholder="ID Kategori">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-category_id"></p>
                                </div>
                            </div>

                        </div>

                        <div class="flex justify-end items-center gap-3">
                            <button type="button" id="modal-cancel"
                                class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm shadow-sm">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">
                                Tambahkan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="detail-product-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <div
            class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6 mx-4 md:mx-0">

            <div class="mb-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Product Detail</h3>
                    <button class="detail-modal-close text-gray-500 hover:text-gray-700 font-bold text-xl">&times;</button>
                </div>

                <div class="flex gap-6 border-b border-gray-200">
                    <button class="tab-btn pb-2 text-sm font-medium text-blue-600 border-b-2 border-blue-600 active-tab"
                        data-tab="data">
                        Data
                    </button>
                    <button
                        class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent"
                        data-tab="control">
                        Control
                    </button>
                </div>
            </div>

            <div id="tab-data" class="tab-content block">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                    <form id="edit-product-form">
                        <div class="mb-8 space-y-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Product Name</label>
                                <input id="edit-name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-name"></p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Type</label>
                                    <input id="edit-product_type" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-product_type"></p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                    <input id="edit-sales_price" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-sales_price"></p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Cost</label>
                                    <input id="edit-cost_price" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-cost_price"></p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Category ID</label>
                                    <input id="edit-category_id" type="number"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                    <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-category_id"></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end items-center gap-3">
                            <button type="button"
                                class="detail-modal-close px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm shadow-sm">
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

            <div id="tab-control" class="tab-content hidden">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50">
                    <div class="flex flex-col items-center justify-center p-4 text-center">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Product?</h3>
                        <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>

                        <div class="flex gap-3">
                            <button
                                class="detail-modal-close px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm">
                                Batal
                            </button>
                            <button id="btn-delete-product"
                                class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">
                                Hapus
                            </button>
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

            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/products';
            const container = $('#product-list-container');
            let currentId = null;

            // --- HELPERS VALIDASI ---
            function clearErrors() {
                $('.error-msg').text('').addClass('hidden');
            }

            function handleValidationErrors(error, prefix = 'add') {
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;
                    // Loop errors object: key = field name (e.g., sales_price), value = array of messages
                    for (const [key, messages] of Object.entries(errors)) {
                        const errorId = `#error-${prefix}-${key}`;
                        $(errorId).text(messages[0]).removeClass('hidden');
                    }
                } else {
                    console.error(error);
                    alert('Terjadi kesalahan sistem atau koneksi API');
                }
            }

            /* ================= LOAD DATA ================= */
            function loadProduct() {
                axios.get(apiUrl).then(res => {
                    const data = res.data.data;
                    container.empty();

                    if (!data.length) {
                        container.html('<div class="text-center p-6 text-gray-500">No Data</div>');
                        return;
                    }

                    data.forEach(item => {
                        // Data Mapping (Snake Case dari API)
                        const displayPrice = item.sales_price || 0;
                        const displayType = item.product_type || '-';

                        container.append(`
                        <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3.75h3m-3 0h-3m-2.25-5.625h13.5c.75 0 1.125.675 1.125 1.125v1.5c0 .45-.375.75-.75.75H4.125c-.375 0-.75-.3-.75-.75V2.99c0-.45.375-1.125 1.125-1.125z" />
                                    </svg>
                                </div>

                                <div>
                                    <h4 class="font-semibold text-gray-800">${item.name}</h4>
                                    <p class="text-sm text-gray-500">
                                        Rp ${displayPrice} <span class="text-xs text-gray-400">(${displayType})</span>
                                    </p>
                                </div>
                            </div>

                            <button class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition flex-shrink-0"
                                data-item='${JSON.stringify(item)}'>
                                Detail
                            </button>
                        </div>
                    `);
                    });
                }).catch(() => {
                    container.html('<div class="text-red-500 p-6">Failed load data</div>');
                });
            }

            loadProduct();

            /* ================= ADD ================= */
            $('#add-product-btn').click(() => {
                clearErrors();
                $('#add-product-form')[0].reset();
                $('#add-product-modal').addClass('flex').removeClass('hidden')
            });

            $('#modal-close,#modal-cancel,#modal-overlay').click(() => $('#add-product-modal').addClass('hidden'));

            $('#add-product-form').submit(function(e) {
                e.preventDefault();
                clearErrors();

                // Payload sesuai request API
                const payload = {
                    name: $('#add-name').val(),
                    product_type: $('#add-product_type').val(),
                    sales_price: $('#add-sales_price').val(),
                    cost_price: $('#add-cost_price').val(),
                    category_id: $('#add-category_id').val()
                };

                axios.post(apiUrl, payload)
                    .then(() => {
                        alert('Berhasil menambahkan produk');
                        $('#add-product-modal').addClass('hidden');
                        $('#add-product-form')[0].reset();
                        loadProduct();
                    })
                    .catch(err => {
                        handleValidationErrors(err, 'add');
                    });
            });

            /* ================= DETAIL ================= */
            $(document).on('click', '.detail-btn', function() {
                clearErrors();
                const item = $(this).data('item');
                currentId = item.id;

                // Mapping data ke form edit
                $('#edit-name').val(item.name);
                $('#edit-product_type').val(item.product_type);
                $('#edit-sales_price').val(item.sales_price);
                $('#edit-cost_price').val(item.cost_price);
                $('#edit-category_id').val(item.category_id);

                $('#detail-product-modal').addClass('flex').removeClass('hidden');
            });

            $('.detail-modal-close,.detail-modal-overlay').click(() => {
                $('#detail-product-modal').addClass('hidden');
                switchTab('data');
            });

            /* ================= UPDATE ================= */
            $('#edit-product-form').submit(function(e) {
                e.preventDefault();
                clearErrors();

                const payload = {
                    name: $('#edit-name').val(),
                    product_type: $('#edit-product_type').val(),
                    sales_price: $('#edit-sales_price').val(),
                    cost_price: $('#edit-cost_price').val(),
                    category_id: $('#edit-category_id').val()
                };

                axios.put(`${apiUrl}/${currentId}`, payload)
                    .then(() => {
                        alert('Berhasil update');
                        $('#detail-product-modal').addClass('hidden');
                        loadProduct();
                    })
                    .catch(err => {
                        handleValidationErrors(err, 'edit');
                    });
            });

            /* ================= DELETE ================= */
            $('#btn-delete-product').click(() => {
                if (!confirm('Yakin hapus product?')) return;

                axios.delete(`${apiUrl}/${currentId}`)
                    .then(() => {
                        alert('Berhasil dihapus');
                        $('#detail-product-modal').addClass('hidden');
                        loadProduct();
                    })
                    .catch(err => {
                        alert('Gagal menghapus data');
                    });
            });

            /* ================= TAB ================= */
            function switchTab(tab) {
                $('.tab-btn').removeClass('text-blue-600 border-blue-600').addClass(
                    'text-gray-500 border-transparent');
                $(`.tab-btn[data-tab="${tab}"]`).addClass('text-blue-600 border-blue-600').removeClass(
                    'text-gray-500 border-transparent');

                $('.tab-content').addClass('hidden');
                $(`#tab-${tab}`).removeClass('hidden');
            }

            $('.tab-btn').click(function() {
                switchTab($(this).data('tab'));
            });

        });
    </script>
@endsection
