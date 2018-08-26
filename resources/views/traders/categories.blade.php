<div class="col-4">
    @if (Auth::user()->categories->count() > 0)
      <ul>
          @foreach(Auth::user()->categories as $category)
                <li>
                    <a href="/auctions/category/{{ $category->id }}">{{ $category->name }}</a>
                </li>
          @endforeach
      </ul>
    @endif
</div>
