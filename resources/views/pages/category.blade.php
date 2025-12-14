@extends('MasterLayout.Master')

@section('title', 'Category')
@section('header', 'Category')

@section('modal-button')
    <div id="add-category-btn"
        class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">
        Add
    </div>
@endsection

@section('content')
    <div class="flex flex-col h-full w-full">

        <div id="category-list-container"
            class="flex-1 min-h-0 w-full rounded-md border border-gray-300 relative bg-white overflow-y-auto shadow-sm">
            <div class="flex items-center justify-center h-full text-gray-500">
                Loading data...
            </div>
        </div>

    </div>

    <div id="add-category-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 mx-4 md:mx-0">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add Category</h3>
                <button id="modal-close" class="text-gray-500 hover:text-gray-700 font-bold text-xl">&times;</button>
            </div>

            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-400 rounded-lg p-6">
                    <form id="add-category-form">
                        <div class="mb-8 space-y-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    Category Name
                                </label>
                                <input id="add-category-name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400"
                                    placeholder="Nama kategori">
                                <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-add-name"></p>
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

    <div id="detail-category-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6 mx-4 md:mx-0">

            <div class="mb-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Category Detail</h3>
                    <button class="detail-modal-close text-gray-500 hover:text-gray-700 font-bold text-xl">
                        &times;
                    </button>
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
                    <form id="edit-category-form">
                        <div class="mb-8 space-y-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">
                                    Category Name
                                </label>
                                <input id="edit-category-name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400">
                                <p class="text-red-500 text-xs mt-1 hidden error-msg" id="error-edit-name"></p>
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
                        <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Category?</h3>
                        <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>

                        <div class="flex gap-3">
                            <button
                                class="detail-modal-close px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm">
                                Batal
                            </button>
                            <button id="btn-delete-category"
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

            const apiUrl = 'https://dev-enterprise-api.labmopro.site/api/categories';
            const container = $('#category-list-container');
            let currentCategoryId = null;

            // --- HELPER VALIDASI ---
            function clearErrors() {
                $('.error-msg').text('').addClass('hidden');
            }

            function handleValidationErrors(error, prefix = 'add') {
                if (error.response && error.response.status === 422) {
                    const errors = error.response.data.errors;
                    for (const [key, messages] of Object.entries(errors)) {
                        // Key 'name' -> ID '#error-add-name'
                        const errorId = `#error-${prefix}-${key}`;
                        $(errorId).text(messages[0]).removeClass('hidden');
                    }
                } else {
                    console.error(error);
                    alert('Terjadi kesalahan sistem');
                }
            }

            /* ================= LOAD DATA ================= */
            function loadCategory() {
                axios.get(apiUrl)
                    .then(res => {
                        const data = res.data.data;
                        container.empty();

                        if (!data.length) {
                            container.html('<div class="text-center p-6 text-gray-500">No Data</div>');
                            return;
                        }

                        data.forEach(item => {
                            container.append(`
        <div class="flex items-center justify-between p-4 border-b border-gray-200 hover:bg-gray-50 transition">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25
                               m9-5.25v9l-9 5.25
                               M3 7.5l9 5.25
                               M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                </div>

                <div>
                    <h4 class="font-semibold text-gray-800">${item.name}</h4>
                    <p class="text-sm text-gray-500">Category</p>
                </div>
            </div>

            <button
                class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition flex-shrink-0"
                data-id="${item.id}"
                data-item='${JSON.stringify(item)}'>
                Detail
            </button>
        </div>
    `);
                        });

                    })
                    .catch(() => {
                        container.html('<div class="text-red-500 p-6">Failed load data</div>');
                    });
            }

            loadCategory();

            /* ================= ADD ================= */
            $('#add-category-btn').click(() => {
                clearErrors();
                $('#add-category-form')[0].reset();
                $('#add-category-modal').addClass('flex').removeClass('hidden')
            });
            $('#modal-close,#modal-cancel,#modal-overlay').click(() => $('#add-category-modal').addClass('hidden'));

            $('#add-category-form').submit(function(e) {
                e.preventDefault();
                clearErrors();

                const name = $('#add-category-name').val();

                axios.post(apiUrl, { name })
                    .then(() => {
                        alert('Berhasil menambahkan category');
                        $('#add-category-modal').addClass('hidden');
                        $('#add-category-form')[0].reset();
                        loadCategory();
                    })
                    .catch(err => {
                        handleValidationErrors(err, 'add');
                    });
            });

            /* ================= DETAIL ================= */
            $(document).on('click', '.detail-btn', function() {
                clearErrors();
                const item = $(this).data('item');
                currentCategoryId = item.id;

                $('#edit-category-name').val(item.name);
                $('#detail-category-modal').addClass('flex').removeClass('hidden');
            });

            $('.detail-modal-close,.detail-modal-overlay').click(() => {
                $('#detail-category-modal').addClass('hidden');
                switchTab('data');
            });

            /* ================= UPDATE ================= */
            $('#edit-category-form').submit(function(e) {
                e.preventDefault();
                clearErrors();

                axios.put(`${apiUrl}/${currentCategoryId}`, {
                    name: $('#edit-category-name').val()
                }).then(() => {
                    alert('Berhasil update');
                    $('#detail-category-modal').addClass('hidden');
                    loadCategory();
                }).catch(err => {
                    handleValidationErrors(err, 'edit');
                });
            });

            /* ================= DELETE ================= */
            $('#btn-delete-category').click(function() {
                if (!confirm('Yakin hapus data?')) return;

                axios.delete(`${apiUrl}/${currentCategoryId}`)
                    .then(() => {
                        alert('Berhasil dihapus');
                        $('#detail-category-modal').addClass('hidden');
                        loadCategory();
                    }).catch(err => {
                        alert('Gagal menghapus');
                    });
            });

            /* ================= TAB ================= */
            function switchTab(tab) {
                $('.tab-btn').removeClass('text-blue-600 border-blue-600').addClass('text-gray-500 border-transparent');
                $(`.tab-btn[data-tab="${tab}"]`).addClass('text-blue-600 border-blue-600').removeClass('text-gray-500 border-transparent');

                $('.tab-content').addClass('hidden');
                $(`#tab-${tab}`).removeClass('hidden');
            }

            $('.tab-btn').click(function() {
                switchTab($(this).data('tab'));
            });

        });
    </script>
@endsection
