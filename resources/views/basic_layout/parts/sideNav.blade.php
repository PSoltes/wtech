<nav class="left-ctg-menu" id="left-ctg-menu">
    <ul>
        @foreach($categories as $category)
            <li><a href="{{url('/'. $category->name)}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</nav>