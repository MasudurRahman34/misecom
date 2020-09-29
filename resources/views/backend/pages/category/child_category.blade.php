{{-- <li>{{ $child_category->name }}</li>
@if ($child_category->categories) --}}
    <ul>
        @foreach ($catagories->childrenCategories as $childCategory)
        <li>{{ $childCategory->name }},</li>
            {{-- @include('child_category', ['child_category' => $childCategory]) --}}
        @endforeach
    </ul>
{{-- @endif --}}