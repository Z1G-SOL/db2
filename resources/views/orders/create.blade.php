<form method="POST" action="/order/store">
@csrf

<input name="first_name" placeholder="First Name">
<input name="last_name" placeholder="Last Name">
<input name="phone" placeholder="Phone">

@foreach($products as $i=>$p)
<div>
    {{ $p->product_name }} ({{ $p->stock_qty }})
    <input type="hidden" name="products[{{$i}}][id]" value="{{$p->id}}">
    <input type="number" name="products[{{$i}}][qty]">
</div>
@endforeach

<button type="submit">Order</button>
</form>