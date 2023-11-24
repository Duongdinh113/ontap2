<h2>Detail</h2>
<li>{{ $product->name }}</li>
<li>{{ $product->price }}</li>
<li>{{ $product->price_sale }}</li>
<img width="100px" src="{{ Storage::url($product->img) }}" alt="">
<li>{{ $product->is_active }}</li>
<li>{{ $product->describe }}</li>
