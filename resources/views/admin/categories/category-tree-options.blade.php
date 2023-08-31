<option
    value="{{ $parentCategory->id }}" @selected(old('category_id', $selectedCategory ?? '') == $parentCategory->id)  style="padding-left: {{ $indent }}px !important;">{!! str_repeat('--', $indent) !!}{{ $parentCategory->name }}
</option>
@foreach ($parentCategory->childrenCategories as $childCategory)
    @include('admin.categories.category-tree-options', ['parentCategory' => $childCategory, 'indent' => $indent + 1])
@endforeach
