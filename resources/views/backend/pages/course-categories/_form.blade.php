@php
    $isEdit = isset($category) && $category;
@endphp

<div class="grid grid-cols-1 gap-6 lg:grid-cols-12">

    <div class="space-y-6 lg:col-span-8">
     <x-form.input-text name="name" label="Category Name" value="{{ old('name', $category?->name) }}"
                    placeholder="Enter Category name..." />    

    </div>

</div>


