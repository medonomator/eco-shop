<ul>
    @foreach ($categories as $category)
        <li>{{ $category['title'] }}</li>
        @if(count($category['children']))
            @include('partial.categories', ['categories' => $category['children']])
        @endif
    @endforeach
</ul>