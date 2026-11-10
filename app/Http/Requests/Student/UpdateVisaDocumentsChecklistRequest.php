<?php

namespace App\Http\Requests\Student;

use App\Models\Profile\StudentDocument;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVisaDocumentsChecklistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        // Build per-key file rules for each checklist slot
        $rules = [];

        foreach (array_keys(StudentDocument::CHECKLIST) as $key) {
            $rules["documents.{$key}"] = [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                'max:10240', // 10 MB per file
            ];
        }

        return $rules;
    }
}
