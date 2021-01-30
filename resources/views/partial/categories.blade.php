<ul>
    @foreach ($categories as $category)
        <li>
            @php
                $categoryId = $category['id'];
            @endphp
            <a href="{{ route('categoryById', $categoryId) }}">{{ $category['title'] }}</a>
            @if(count($category['children']))
                @include('partial.categories', ['categories' => $category['children']])
            @endif
        </li>
    @endforeach
</ul>