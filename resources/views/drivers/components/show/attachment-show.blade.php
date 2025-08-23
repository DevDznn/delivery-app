<div id="attachments" class="tab-content hidden">
    <div class="bg-gradient-to-r from-[#F0F8FF] via-white to-green-50 rounded-2xl shadow-md p-6 hover:shadow-lg transition">
        <h2 class="text-lg font-bold mb-6 text-green-700">Attachments</h2>

        @if($driver->vehicle && $driver->vehicle->attachments->count())
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-xs">
            @foreach(['resident_permit','driver_license','estermara_registration','passport','other'] as $type)
                @php
                    $attachment = $driver->vehicle->attachments->firstWhere('attachment_type', $type);
                @endphp
                <div class="p-3 bg-white rounded-lg shadow">
                    <p class="text-[11px] font-semibold text-gray-500 mb-2">{{ ucwords(str_replace('_',' ',$type)) }}</p>

                    @if($attachment)
                        @php
                            $fileUrl = asset('storage/' . $attachment->file_path);
                            $fileName = basename($attachment->file_path);
                            $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                        @endphp

                        {{-- IMAGE PREVIEW --}}
                        @if(in_array($extension, ['jpg','jpeg','png','gif']))
                            <img src="{{ $fileUrl }}" 
                                 alt="{{ $type }}" 
                                 class="mt-1 rounded-lg shadow-sm w-full max-h-48 object-cover cursor-pointer preview-image"
                                 data-src="{{ $fileUrl }}">
                        
                        {{-- PDF THUMBNAIL PREVIEW --}}
                        @elseif($extension === 'pdf')
                            <div class="relative">
                                <canvas class="pdf-thumbnail cursor-pointer rounded-lg shadow-sm w-full max-h-48 object-cover" 
                                        data-src="{{ $fileUrl }}"></canvas>
                                <span class="absolute top-2 left-2 bg-red-600 text-white text-[10px] px-2 py-1 rounded">PDF</span>
                            </div>
                        @else
                            <div class="mt-1 p-3 rounded-lg bg-gray-100 text-gray-500">File type not previewable</div>
                        @endif

                        {{-- FILE NAME + DOWNLOAD LINK --}}
                        <p class="mt-2 text-gray-600 text-xs break-words">{{ $fileName }}</p>
                        <a href="{{ $fileUrl }}" download 
                           class="text-green-600 text-xs font-semibold hover:underline">Download</a>
                    @else
                        <div class="mt-1 p-3 rounded-lg bg-white/90 shadow-sm text-gray-500">No file uploaded</div>
                    @endif
                </div>
            @endforeach
        </div>
        @else
            <p class="text-gray-700 text-xs">No attachments uploaded.</p>
        @endif
    </div>
</div>

{{-- MODAL FOR IMAGE PREVIEW --}}
<div id="imageModal" class="fixed inset-0 bg-black/70 hidden items-center justify-center z-50">
    <span id="closeModal" class="absolute top-4 right-6 text-white text-3xl cursor-pointer">&times;</span>
    <img id="modalImage" src="" class="max-w-[90%] max-h-[90%] rounded-lg shadow-lg">
</div>

{{-- MODAL FOR PDF PREVIEW FULL SCREEN --}}
<div id="pdfModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50">
    <span id="closePdfModal" class="absolute top-4 right-6 text-white text-3xl cursor-pointer">&times;</span>
    <iframe id="modalPdf" src="" class="w-[90%] h-[90%] rounded-lg shadow-lg bg-white"></iframe>
</div>

<!-- PDF.js CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const closeModal = document.getElementById('closeModal');

    const pdfModal = document.getElementById('pdfModal');
    const modalPdf = document.getElementById('modalPdf');
    const closePdfModal = document.getElementById('closePdfModal');

    // Image click → open modal
    document.querySelectorAll('.preview-image').forEach(img => {
        img.addEventListener('click', () => {
            modalImage.src = img.dataset.src;
            imageModal.classList.remove('hidden');
            imageModal.classList.add('flex');
        });
    });

    closeModal.addEventListener('click', () => {
        imageModal.classList.add('hidden');
        imageModal.classList.remove('flex');
    });

    imageModal.addEventListener('click', (e) => {
        if (e.target === imageModal) {
            imageModal.classList.add('hidden');
            imageModal.classList.remove('flex');
        }
    });

    // PDF click → open modal
    document.querySelectorAll('.pdf-thumbnail').forEach(canvas => {
        canvas.addEventListener('click', () => {
            modalPdf.src = canvas.dataset.src;
            pdfModal.classList.remove('hidden');
            pdfModal.classList.add('flex');
        });
    });

    closePdfModal.addEventListener('click', () => {
        pdfModal.classList.add('hidden');
        pdfModal.classList.remove('flex');
        modalPdf.src = ''; // clear PDF to stop loading
    });

    pdfModal.addEventListener('click', (e) => {
        if (e.target === pdfModal) {
            pdfModal.classList.add('hidden');
            pdfModal.classList.remove('flex');
            modalPdf.src = '';
        }
    });

    // Render PDF thumbnails
    const pdfjsLib = window['pdfjs-dist/build/pdf'];
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

    document.querySelectorAll('.pdf-thumbnail').forEach(async (canvas) => {
        const url = canvas.dataset.src;
        const loadingTask = pdfjsLib.getDocument(url);
        const pdf = await loadingTask.promise;
        const page = await pdf.getPage(1);

        const viewport = page.getViewport({ scale: 1 });
        const context = canvas.getContext('2d');

        // Adjust thumbnail size to fit like image
        const scale = 0.3; // Smaller scale for thumbnail
        const scaledViewport = page.getViewport({ scale: scale });

        canvas.width = scaledViewport.width;
        canvas.height = scaledViewport.height;

        await page.render({
            canvasContext: context,
            viewport: scaledViewport
        }).promise;
    });
});
</script>
