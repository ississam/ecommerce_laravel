
<form action="{{ route('products.search') }}">
    <input type="text" name="q" class="input" placeholder="Search here"  value="{{ request()->q ?? '' }}">
    <button  type="submit" class="search-btn">Search</button>
</form>
