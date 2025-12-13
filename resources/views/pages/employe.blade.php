@extends('MasterLayout.Master')

@section('title', 'Employee')
@section('header', 'Employee')
@section('modal-button')
    <div id="add-employee-btn" class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Create Employee</div>
    <div id="add-employee-btn" class="px-4 py-2 rounded-md bg-gray-100 border-2 border-gray-300 cursor-pointer hover:bg-gray-200 transition">Import Employee</div>

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
            <button class="detail-btn px-3 py-1.5 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50 transition">
                Detail
            </button>
        </div>
    </div>

    <!-- Modal -->
   <div id="add-employee-modal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="absolute inset-0 bg-black/50"></div>

        <div class="bg-gray-100 w-full max-w-3xl rounded-lg shadow-xl z-10">
            <!-- Header -->
            <div class="flex justify-between items-center px-4 py-3 border-b">
                <h3 id="modal-title" class="font-semibold text-lg">Department</h3>
               <button class="text-gray-500 hover:text-gray-700 focus:outline-none font-bold text-xl" id="modal-close">
                   &times;
                </button>
            </div>

            <!-- Body -->
            <div class="p-6 border-2 border-dashed border-gray-400 m-4 rounded-lg">
            
            <!-- STEP 1 -->
            <div class="step" data-step="1">
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name Departement</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Division Departement</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Manager</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Company</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
            </div>

            <!-- STEP 2 -->
            <div class="step hidden" data-step="2">
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Company</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
            </div>

            <!-- STEP 3 -->
            <div class="step hidden" data-step="3">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Work Mobile</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Work Email</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Company</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Department</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Job Position</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
                <div class="mb-3 mt-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Manager</label>
                    <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="category-name" type="text" placeholder="Customer">
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-2 mt-6">
                <button onclick="closeModal()" class="px-4 py-1.5 bg-red-500 text-white rounded text-sm">
                    Cancel
                </button>
                <button id="nextBtn" onclick="nextStep()" class="px-4 py-1.5 bg-blue-500 text-white rounded text-sm">
                    Next
                </button>
                <button id="saveBtn" class="px-4 py-1.5 bg-blue-600 text-white rounded text-sm hidden">
                Save
                </button>
            </div>
            </div>
        </div>
        </div>


    <!-- Detail Modal -->
    <div id="detail-category-modal" class="fixed inset-0 z-50 items-center justify-center hidden">
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
                        <form>
                            <div class="mb-8">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="edit-category-name">
                                    Nama
                                </label>
                                <input class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2.5 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 bg-white" id="edit-category-name" type="text" value="Electronics" placeholder="Placeholder">
                            </div>

                            <div class="flex justify-end items-center gap-3">
                                <button type="button" class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm detail-modal-close shadow-sm">Batal</button>
                                <button type="button" class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition font-medium text-sm shadow-sm">Perbarui</button>
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
                                <button class="px-5 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition font-medium text-sm">Hapus</button>
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
            const modal = $('#add-employee-modal');
            const modalContent = $('#modal-content');

            function openModal() {
                modal.removeClass('hidden').addClass('flex');
            }

            function closeModal() {
                modal.addClass('hidden').removeClass('flex');
            }

            $('#add-employee-btn').click(function() {
                openModal();
            });

            $('#modal-close, #modal-cancel, #modal-overlay').click(function() {
                closeModal();
            });

            // Detail Modal Logic
            const detailModal = $('#detail-category-modal');
            
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
        });
        let step = 1;
        const totalStep = 3;

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal(){
            document.getElementById('modal').classList.add('hidden');
            step = 1;
            updateStep();
        }

        function nextStep() {
            if (step < totalStep) {
                step++;
                updateStep();
            }
        }

        function updateStep() {
            document.querySelectorAll('.step').forEach(s => s.classList.add('hidden'));
            document.querySelector(`[data-step="${step}"]`).classList.remove('hidden');

            document.getElementById('modal-title').innerText =
                step === 1 ? 'Department' :
                step === 2 ? 'Job Positions' : 'Employe';

            document.getElementById('nextBtn').classList.toggle('hidden', step === totalStep);
            document.getElementById('saveBtn').classList.toggle('hidden', step !== totalStep);
        }
    </script>
@endsection