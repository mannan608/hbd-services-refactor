<section class="rounded-2xl border border-neutral-200/80 bg-white shadow-sm dark:border-neutral-800 dark:bg-neutral-900"
    x-data="{ isEditing: false }">

    {{-- Header --}}
    <div class="border-b border-neutral-100 bg-neutral-50/50 px-6 py-4 dark:border-neutral-800 dark:bg-neutral-800/50 flex items-center justify-between">
        <div>
            <h2 class="text-base font-semibold text-neutral-900 dark:text-white">
                Employee Documents
            </h2>
            <p class="text-xs text-neutral-500 dark:text-neutral-400">
                Manage employee document records, CV, and identity verification files.
            </p>
        </div>

        <button type="button" @click="isEditing = !isEditing" 
            x-text="isEditing ? 'Cancel Edit' : 'Edit Documents'"
            class="inline-flex items-center px-3.5 py-1.5 text-xs font-medium rounded-lg border border-neutral-300 bg-white text-neutral-700 shadow-sm hover:bg-neutral-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300 dark:hover:bg-neutral-700 transition-all">
        </button>
    </div>

    {{-- Form Container --}}
    <form action="" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- READ-ONLY MODE --}}
        <div x-show="!isEditing" class="grid grid-cols-1 gap-5 md:grid-cols-2">
            {{-- CV Read View --}}
            <div class="rounded-xl border border-neutral-200/80 p-4 dark:border-neutral-800 bg-neutral-50/40 dark:bg-neutral-800/30">
                <span class="block text-xs font-medium text-neutral-400 uppercase tracking-wider mb-2">CV / Professional Resume</span>
                @php
                    $cvDocument = $employee?->employeeDocuments?->firstWhere('document_key', 'cv');
                @endphp
                @if($cvDocument && $cvDocument->file_path)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3 truncate">
                            <svg class="w-8 h-8 text-brand-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                            <div class="truncate">
                                <p class="text-sm font-medium text-neutral-800 dark:text-neutral-200 truncate">{{ $cvDocument->original_name ?? 'CV_Document.pdf' }}</p>
                                <p class="text-xs text-neutral-400">{{ $cvDocument->created_at?->format('M d, Y') ?? 'Uploaded' }}</p>
                            </div>
                        </div>
                        <a href="{{ Storage::url($cvDocument->file_path) }}" target="_blank" class="text-xs font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400">View File</a>
                    </div>
                @else
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 italic">No CV uploaded yet.</p>
                @endif
            </div>

            {{-- NID / Passport Read View --}}
            <div class="rounded-xl border border-neutral-200/80 p-4 dark:border-neutral-800 bg-neutral-50/40 dark:bg-neutral-800/30">
                <span class="block text-xs font-medium text-neutral-400 uppercase tracking-wider mb-2">NID / Passport</span>
                @php
                    $nidDocument = $employee?->employeeDocuments?->firstWhere('document_key', 'nid');
                @endphp
                @if($nidDocument && $nidDocument->file_path)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3 truncate">
                            <svg class="w-8 h-8 text-brand-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0"/>
                            </svg>
                            <div class="truncate">
                                <p class="text-sm font-medium text-neutral-800 dark:text-neutral-200 truncate">{{ $nidDocument->original_name ?? 'Identity_Document.pdf' }}</p>
                                <p class="text-xs text-neutral-400">{{ $nidDocument->created_at?->format('M d, Y') ?? 'Uploaded' }}</p>
                            </div>
                        </div>
                        <a href="{{ Storage::url($nidDocument->file_path) }}" target="_blank" class="text-xs font-medium text-brand-600 hover:text-brand-700 dark:text-brand-400">View File</a>
                    </div>
                @else
                    <p class="text-sm text-neutral-500 dark:text-neutral-400 italic">No NID / Passport uploaded yet.</p>
                @endif
            </div>
        </div>

        {{-- EDIT / UPLOAD MODE --}}
        <div x-show="isEditing" x-cloak class="grid grid-cols-1 gap-5 md:grid-cols-2">
            <div>
                <label class="block mb-1.5 text-sm font-medium text-neutral-700 dark:text-neutral-300">
                    CV / Professional Resume
                </label>
                <x-form.dropzone name="documents[cv]" label="Upload CV / Resume" />
            </div>

            <div>
                <label class="block mb-1.5 text-sm font-medium text-neutral-700 dark:text-neutral-300">
                    NID / Passport
                </label>
                <x-form.dropzone name="documents[nid]" label="Upload NID or Passport" />
            </div>
        </div>

        {{-- Submit Buttons --}}
        <div x-show="isEditing" x-cloak x-transition
            class="flex items-center justify-end space-x-3 pt-4 border-t border-neutral-200 dark:border-neutral-800">
            <button type="button" @click="isEditing = false"
                class="px-4 py-2 text-sm font-medium text-neutral-700 bg-white border border-neutral-300 rounded-lg shadow-sm hover:bg-neutral-50 dark:bg-neutral-800 dark:text-neutral-300 dark:border-neutral-700">
                Cancel
            </button>
            <button type="submit"
                class="px-5 py-2 text-sm font-medium text-white bg-brand-600 rounded-lg shadow-sm hover:bg-brand-700 focus:outline-none focus:ring-3 focus:ring-brand-500/10">
                Save Changes
            </button>
        </div>
    </form>
</section>