<div class="flex-shrink-0 p-3">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-light text-decoration-none border-bottom">
      <span class="fs-5">Dashboard</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="{{ route('product.index') }}" class="d-flex align-items-center py-2 link-light text-decoration-none">
                Produk
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('category.index') }}" class="d-flex align-items-center py-2 link-light text-decoration-none">
                Kategori
            </a>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="border border-0 bg-transparent text-light p-0" href="{{ route('logout') }}" role="button">Logout</button>
            </form>
        </li>
    </ul>
  </div>