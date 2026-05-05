use App\Models\SupplyItem;
use App\Models\Product;

class SupplierController extends Controller
{
    public function stockIn(Request $request)
    {
        $item = SupplyItem::create($request->all());

        $product = Product::find($request->product_id);
        $product->increment('stock_qty', $request->quantity);

        return back()->with('success','Stock added');
    }
}