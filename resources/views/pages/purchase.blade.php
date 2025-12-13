@extends('MasterLayout.Master')

@section('title', 'Purchase')
@section('header', 'Purchase')
@section('modal-button')
    <div id="add-purchase-btn"
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
    <div id="add-purchase-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)]" id="modal-overlay"></div>

        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10" id="modal-content">
            <div class="flex justify-between items-center p-4">
                <h3 class="text-xl font-bold text-gray-800">Add Purchase</h3>
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                    &times;
                </button>
            </div>

            <div class="p-6 pt-0">
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                    <form>
                        <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">

                            <div>
                                <label for="add-division" class="block text-gray-700 text-sm font-bold mb-2">
                                    Division
                                </label>
                                <input id="add-division" name="division" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Division">
                            </div>

                            <div>
                                <label for="add-name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Name
                                </label>
                                <input id="add-name" name="name" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Name">
                            </div>

                            <div>
                                <label for="add-address" class="block text-gray-700 text-sm font-bold mb-2">
                                    Company Address
                                </label>
                                <textarea id="add-address" name="address" rows="3"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Company address"></textarea>
                            </div>

                            <div>
                                <label for="add-vat" class="block text-gray-700 text-sm font-bold mb-2">
                                    VAT
                                </label>
                                <input id="add-vat" name="vat" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="VAT number">
                            </div>

                            <div>
                                <label for="add-pkp" class="block text-gray-700 text-sm font-bold mb-2">
                                    ID PKP
                                </label>
                                <input id="add-pkp" name="id_pkp" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="ID PKP">
                            </div>

                            <div>
                                <label for="add-phone" class="block text-gray-700 text-sm font-bold mb-2">
                                    Phone
                                </label>
                                <input id="add-phone" name="phone" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Phone number">
                            </div>

                            <div>
                                <label for="add-mobile" class="block text-gray-700 text-sm font-bold mb-2">
                                    Mobile
                                </label>
                                <input id="add-mobile" name="mobile" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Mobile number">
                            </div>

                            <div>
                                <label for="add-email" class="block text-gray-700 text-sm font-bold mb-2">
                                    Email
                                </label>
                                <input id="add-email" name="email" type="email"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Email address">
                            </div>

                            <div>
                                <label for="add-website" class="block text-gray-700 text-sm font-bold mb-2">
                                    Website Link
                                </label>
                                <input id="add-website" name="website" type="url"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="https://example.com">
                            </div>

                            <div>
                                <label for="add-tags" class="block text-gray-700 text-sm font-bold mb-2">
                                    Tags
                                </label>
                                <input id="add-tags" name="tags" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Supplier, Partner">
                            </div>

                            <div>
                                <label for="add-job-position" class="block text-gray-700 text-sm font-bold mb-2">
                                    Job Position
                                </label>
                                <input id="add-job-position" name="job_position" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Manager">
                            </div>

                            <div>
                                <label for="add-title" class="block text-gray-700 text-sm font-bold mb-2">
                                    Title
                                </label>
                                <input id="add-title" name="title" type="text"
                                    class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                    placeholder="Mr / Mrs / Ms">
                            </div>

                        </div>

                        <div class="flex justify-end items-center gap-3 pt-4 border-t border-gray-200 mt-2 px-4 pb-2">
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
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detail-purchase-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
        <div class="absolute inset-0 bg-[rgba(0,0,0,0.5)] detail-modal-overlay"></div>

        <div
            class="bg-white rounded-lg shadow-xl w-full max-w-2xl z-10 overflow-hidden transform transition-all p-6 relative">

            <div class="mb-4">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">Purchase Detail</h3>
                    <button
                        class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl detail-modal-close">
                        &times;
                    </button>
                </div>

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
                    <button
                        class="tab-btn pb-2 text-sm font-medium text-gray-500 hover:text-gray-700/75 border-b-2 border-transparent focus:outline-none transition"
                        data-tab="vendor">
                        Additional Vendor
                    </button>
                </div>
            </div>

            <div>
                <div id="tab-data" class="tab-content block">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                        <form>
                            <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">

                                <div>
                                    <label for="edit-division"
                                        class="block text-gray-700 text-sm font-bold mb-2">Division</label>
                                    <input id="edit-division" name="division" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Division" value="Sales">
                                </div>

                                <div>
                                    <label for="edit-name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                    <input id="edit-name" name="name" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Name" value="Electronics">
                                </div>

                                <div>
                                    <label for="edit-address" class="block text-gray-700 text-sm font-bold mb-2">Company
                                        Address</label>
                                    <textarea id="edit-address" name="address" rows="3"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Company address">Jl. Sudirman No. 10</textarea>
                                </div>

                                <div>
                                    <label for="edit-vat" class="block text-gray-700 text-sm font-bold mb-2">VAT</label>
                                    <input id="edit-vat" name="vat" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="VAT number" value="VAT-123">
                                </div>

                                <div>
                                    <label for="edit-pkp" class="block text-gray-700 text-sm font-bold mb-2">ID
                                        PKP</label>
                                    <input id="edit-pkp" name="id_pkp" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="ID PKP" value="PKP-001">
                                </div>

                                <div>
                                    <label for="edit-phone"
                                        class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                                    <input id="edit-phone" name="phone" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Phone number" value="021-55555">
                                </div>

                                <div>
                                    <label for="edit-mobile"
                                        class="block text-gray-700 text-sm font-bold mb-2">Mobile</label>
                                    <input id="edit-mobile" name="mobile" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Mobile number" value="0812345678">
                                </div>

                                <div>
                                    <label for="edit-email"
                                        class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                                    <input id="edit-email" name="email" type="email"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Email address" value="test@example.com">
                                </div>

                                <div>
                                    <label for="edit-website" class="block text-gray-700 text-sm font-bold mb-2">Website
                                        Link</label>
                                    <input id="edit-website" name="website" type="url"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="https://example.com" value="https://google.com">
                                </div>

                                <div>
                                    <label for="edit-tags" class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
                                    <input id="edit-tags" name="tags" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Supplier, Partner" value="Supplier">
                                </div>

                                <div>
                                    <label for="edit-job-position" class="block text-gray-700 text-sm font-bold mb-2">Job
                                        Position</label>
                                    <input id="edit-job-position" name="job_position" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Manager" value="Manager">
                                </div>

                                <div>
                                    <label for="edit-title"
                                        class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                    <input id="edit-title" name="title" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Mr / Mrs / Ms" value="Mr">
                                </div>

                            </div>

                            <div class="flex justify-end items-center gap-3 pt-4 border-t border-gray-200 mt-2 px-4 pb-2">
                                <button type="button"
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm shadow-sm detail-modal-close">
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
                    <div
                        class="border-2 border-dashed border-gray-300 rounded-lg p-6 bg-gray-50 h-[300px] flex items-center justify-center">
                        <div class="flex flex-col items-center justify-center p-4 text-center text-gray-800">
                            <h3 class="text-lg font-bold mb-2 text-gray-800">Hapus Data?</h3>
                            <p class="text-gray-500 mb-6 text-sm">Tindakan ini tidak dapat dibatalkan.</p>
                            <div class="flex gap-3">
                                <button type="button"
                                    class="px-5 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition font-medium text-sm detail-modal-close">Batal</button>
                                <button type="button"
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="tab-vendor" class="tab-content hidden">
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-1 bg-gray-50">
                        <form id="vendor-form">
                            <div class="space-y-4 max-h-[60vh] overflow-y-auto p-4 custom-scrollbar">

                                <div>
                                    <label for="vendor-name" class="block text-gray-700 text-sm font-bold mb-2">
                                        Vendor Name
                                    </label>
                                    <input id="vendor-name" name="vendor_name" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Vendor Name">
                                </div>

                                <div>
                                    <label for="vendor-phone" class="block text-gray-700 text-sm font-bold mb-2">
                                        Phone
                                    </label>
                                    <input id="vendor-phone" name="vendor_phone" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Vendor Phone">
                                </div>

                                <div>
                                    <label for="vendor-mobile" class="block text-gray-700 text-sm font-bold mb-2">
                                        Mobile
                                    </label>
                                    <input id="vendor-mobile" name="vendor_mobile" type="text"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="Vendor Mobile">
                                </div>

                                <div>
                                    <label for="vendor-email" class="block text-gray-700 text-sm font-bold mb-2">
                                        Email
                                    </label>
                                    <input id="vendor-email" name="vendor_email" type="email"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="vendor@example.com">
                                </div>

                                <div>
                                    <label for="vendor-website" class="block text-gray-700 text-sm font-bold mb-2">
                                        Website Link
                                    </label>
                                    <input id="vendor-website" name="vendor_website" type="url"
                                        class="shadow-sm border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white"
                                        placeholder="https://vendor-site.com">
                                </div>

                            </div>

                            <div class="flex justify-end items-center gap-3 pt-4 border-t border-gray-200 mt-2 px-4 pb-2">
                                <button type="button"
                                    class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm shadow-sm detail-modal-close">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">
                                    Perbarui Vendor
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            // 1. Definisikan variabel selectedRow di lingkup luar agar bisa diakses semua fungsi
            let selectedRow = null;

            // --- ADD MODAL LOGIC ---
            const modal = $('#add-purchase-modal');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-purchase-btn').click(function() {
                openModal();
            });

            $('#modal-close, .add-modal-close').click(function() {
                closeModal();
            });


            // --- DETAIL MODAL LOGIC ---
            const detailModal = $('#detail-purchase-modal');

            function openDetailModal() {
                detailModal.removeClass('hidden').addClass('flex');
            }

            function closeDetailModal() {
                detailModal.addClass('hidden').removeClass('flex');
                // Reset tab ke Data saat ditutup
                switchTab('data');
                // Reset selectedRow agar tidak salah update jika dibuka lagi tanpa klik tombol
                selectedRow = null;
            }

            // PENTING: Saat tombol Detail diklik, simpan barisnya ke variabel selectedRow
            $('.detail-btn').click(function() {
                // Mencari elemen pembungkus (div row) terdekat dari tombol yang diklik
                selectedRow = $(this).closest('.flex.items-center.justify-between');
                openDetailModal();
            });

            // Close modal handlers
            $('.detail-modal-close, .detail-modal-overlay').click(function() {
                closeDetailModal();
            });


            // --- VENDOR FORM SUBMIT LOGIC ---
            $('#vendor-form').on('submit', function(e) {
                e.preventDefault(); // Mencegah refresh halaman

                const vendorName = $('#vendor-name').val();

                // Cek apakah ada baris yang dipilih & nama vendor diisi
                if (selectedRow && vendorName) {
                    const titleElement = selectedRow.find('h4'); // Cari elemen nama item (h4)

                    // Ambil teks sekarang
                    let currentText = titleElement.text();

                    // Ambil nama asli saja (sebelum tanda |) supaya tidak numpuk
                    let baseName = currentText.split('|')[0].trim();

                    // Update teks di halaman
                    titleElement.text(`${baseName} | ${vendorName}`);
                }

                closeDetailModal();
                this.reset(); // Kosongkan form input
            });

            // --- TAB SWITCHING LOGIC ---
            function switchTab(tabName) {
                // Reset style tombol tab
                $('.tab-btn').removeClass('text-blue-600 border-blue-600 active-tab').addClass(
                    'text-gray-500 border-transparent');

                // Set style tombol aktif
                $(`.tab-btn[data-tab="${tabName}"]`).removeClass('text-gray-500 border-transparent').addClass(
                    'text-blue-600 border-blue-600 active-tab');

                // Sembunyikan semua konten tab
                $('.tab-content').addClass('hidden').removeClass('block');

                // Munculkan konten tab yang dipilih
                $(`#tab-${tabName}`).removeClass('hidden').addClass('block');
            }

            // Inisialisasi tab pertama
            switchTab('data');

            // Handler klik tombol tab
            $('.tab-btn').click(function() {
                const tab = $(this).data('tab');
                switchTab(tab);
            });
        });
    </script>
@endsection
